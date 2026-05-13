<?php
namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class DataPrestasiController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        // Logic to retrieve and display the user's achievements
        return view('user.data_prestasi',
            [
                'user' => $user,
                'side_navbar' => 'Slide Menu',
                'header_dashboard' => 'Header Dashboard',
            ]
        );
    }

    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        // 1. Validate the array of incoming data
        $validatedData = $request->validate([
            'prestasi'                 => 'nullable|array',
            'prestasi.*.jenis'         => 'required_with:prestasi|string|max:255',
            'prestasi.*.tingkat'       => 'required_with:prestasi|string|max:255',
            'prestasi.*.nama'          => 'required_with:prestasi|string|max:255',
            'prestasi.*.tahun'         => 'required_with:prestasi|integer|min:2000|max:' . date('Y'),
            'prestasi.*.penyelenggara' => 'required_with:prestasi|string|max:255',
        ]);

        // 2. Clear old records to prevent duplicates or orphaned data
        $user->prestasi()->delete();

        // 3. Insert the new array of records
        if (!empty($validatedData['prestasi'])) {
            $user->prestasi()->createMany($validatedData['prestasi']);
        }

        return redirect()->route('user.data_prestasi')->with('success', 'Data prestasi berhasil diperbarui.');
    }
}