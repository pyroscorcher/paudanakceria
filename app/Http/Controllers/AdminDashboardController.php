<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $enrollments = Pendaftaran::with('user.dokumen')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.dashboard', [
            'admin_navbar' => 'My Menu',
            'admin_header' => 'Header',
            'enrollments' => $enrollments
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        // 1. Validate incoming status
        $validated = $request->validate([
            'status' => 'required|string|in:Menunggu,Diterima,Ditolak',
        ]);

        // 2. Fetch the enrollment WITH all of its critical relationships
        $enrollment = Pendaftaran::with([
            'user.orangtua', 
            'user.prestasi', 
            'user.data_periodik', 
            'user.dokumen'
        ])->findOrFail($id);

        // 3. If the Admin is trying to change the status AWAY from 'Menunggu'
        if ($validated['status'] !== 'Menunggu') {
            
            // Run the completeness check
            if (!$this->isDataComplete($enrollment->user)) {
                // If data is missing, reject the update and redirect back with an error
                return redirect()->back()
                    ->with('error', 'Gagal: Status tidak dapat diubah karena data anak, dokumen, atau data periodik belum lengkap.');
            }
        }

        // 4. Update the state if completeness check passes
        $enrollment->status = $validated['status'];
        $enrollment->save();

        return redirect()->route('admin.dashboard')
            ->with('success', "Status verifikasi {$enrollment->nama} diperbarui menjadi {$validated['status']}.");
    }

    public function show($id)
    {
        $enrollment = Pendaftaran::with('user')->findOrFail($id);

        return view('admin.show', [
            'admin_header' => 'Header',
        ], compact('enrollment'));
    }

    /**
     * Private helper method to verify all required tables and columns are filled.
     */
    private function isDataComplete(User $user): bool
    {
        // 1. Check Data Anak (User Table)
        // Assuming NIK, address, and maps coordinates are strictly required
        if (empty($user->nik) || empty($user->alamat_rumah) || empty($user->lintang) || empty($user->bujur)) {
            return false;
        }

        // 2. Check Data Orangtua
        if (!$user->orangtua || 
            empty($user->orangtua->nama_ayah) || empty($user->orangtua->pekerjaan_ayah) || empty($user->orangtua->penghasilan_ayah) ||
            empty($user->orangtua->nama_ibu) || empty($user->orangtua->pekerjaan_ibu) || empty($user->orangtua->penghasilan_ibu)
        ) {
            return false;
        }

        // 3. Check Data Periodik
        if (!$user->data_periodik || 
            empty($user->data_periodik->tinggi_badan) || empty($user->data_periodik->berat_badan) || 
            empty($user->data_periodik->jarak) || empty($user->data_periodik->waktu)
        ) {
            return false;
        }

        // 5. Check Dokumen
        if (!$user->dokumen || 
            empty($user->dokumen->akta_kelahiran) || 
            empty($user->dokumen->kk) || 
            empty($user->dokumen->foto_anak) || 
            empty($user->dokumen->ktp) || 
            empty($user->dokumen->bukti_pembayaran)
        ) {
            return false;
        }

        // If it passes all checks, the data is complete
        return true;
    }
}