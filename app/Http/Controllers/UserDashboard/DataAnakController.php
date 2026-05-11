<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller; // Required because we are in a sub-namespace
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DataAnakController extends Controller
{
    /**
     * Display the dashboard interface with pre-filled user data.
     */
    public function index()
    {
        // Retrieve the currently authenticated user
        $user = auth()->user();

        // Return the view and pass the user data to it
        // Ensure your blade file is located at resources/views/user/data-anak.blade.php (or adjust accordingly)
        return view('user.data_anak', compact('user'));
    }

    /**
     * Update the authenticated user's biodata.
     */
    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        // 1. Validate the incoming HTTP Request
        $validatedData = $request->validate([
            'name'            => 'required|string|max:255',
            'jenis_kelamin'   => 'required|in:L,P',
            'tanggal_lahir'   => 'required|date',
            'tempatlahir'     => 'nullable|string|max:255',
            'nis'             => 'nullable|string|max:50',
            'nomorseriijazah' => 'nullable|string|max:100',
            'nomorseriskhun'  => 'nullable|string|max:100',
            'nomorseriun'     => 'nullable|string|max:100',
            
            // Critical: Ignore the current user's ID to prevent unique constraint false positives
            'nisn'            => ['required', 'string', Rule::unique('users', 'nisn')->ignore($user->id)],
            'nik'             => ['nullable', 'string', 'size:16', Rule::unique('users', 'nik')->ignore($user->id)],
            
            'npsn'            => 'nullable|string|max:20',
            'asal_sekolah'    => 'nullable|string|max:255',
            'agama'           => 'nullable|string|max:50',
            'kebutuhankhusus' => 'nullable|string|max:100',
            'alamat_rumah'    => 'nullable|string',
            'transportasi'    => 'nullable|string|max:100',
            'telp'            => 'nullable|string|max:20',
            'emailpribadi'    => 'nullable|email|max:255',
            'kks'             => 'nullable|string|max:100',
            'kps'             => 'nullable|string|max:100',
            'kip'             => 'nullable|string|max:100',
            'lintang'         => 'nullable|string|max:50',
            'bujur'           => 'nullable|string|max:50',
        ]);

        // 2. Update the database record securely
        $user->update($validatedData);

        // 3. Redirect the user back to the form with a success notification
        return redirect()->back()->with('success', 'Data anak berhasil diperbarui.');
    }
}