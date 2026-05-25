<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Orangtua;

class EnrollmentController extends Controller
{
    public function create()
    {
        return view('user.daftar');
    }

    public function store(Request $request)
    {
        // 1. Validate incoming data mapped exactly to your database schema
        $validated = $request->validate([
            'nama'          => 'required|string|max:255',
            'nik'           => 'required|digits:16|unique:users,nik', // Enforces exactly 16 digits
            'nisn'          => 'nullable|string|unique:users,nisn',   // Optional for PAUD
            'password'      => 'required|string|min:8',
            'tanggal_lahir' => 'required|date',
            'nama_ayah'     => 'required|string|max:255',
            'nama_ibu'      => 'required|string|max:255',
            'telp'          => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat_rumah'  => 'required|string|max:255',
        ]);

        try {
            // 2. Wrap database operations in an atomic transaction
            $user = DB::transaction(function () use ($validated) {
                
                // A. Provision the User account with login credentials
                $newUser = User::create([
                    'name'          => $validated['nama'], 
                    'nik'           => $validated['nik'],
                    'nisn'          => $validated['nisn'] ?? null, // Will insert null if left blank
                    'password'      => Hash::make($validated['password']),
                    'tanggal_lahir' => $validated['tanggal_lahir'],
                    'jenis_kelamin' => $validated['jenis_kelamin'],
                    'telp'          => $validated['telp'],
                    'alamat_rumah'  => $validated['alamat_rumah'],
                ]);

                // B. Create the Orangtua record
                Orangtua::create([
                    'user_id'   => $newUser->id,
                    'nama_ayah' => $validated['nama_ayah'],
                    'nama_ibu'  => $validated['nama_ibu'],
                ]);

                // C. Create the Enrollment record
                Pendaftaran::create([
                    'user_id'       => $newUser->id,
                    'nama'          => $validated['nama'],
                    'tanggal_lahir' => $validated['tanggal_lahir'],
                    'nama_ayah'     => $validated['nama_ayah'],
                    'nama_ibu'      => $validated['nama_ibu'],
                    'telp'          => $validated['telp'],
                    'jenis_kelamin' => $validated['jenis_kelamin'],
                    'alamat_rumah'  => $validated['alamat_rumah'],
                    'status'        => 'Menunggu',
                ]);

                return $newUser; 
            });

            // 3. Authenticate the user immediately     
            Auth::login($user);

            // 4. Redirect to the authenticated dashboard (Change 'dashboard' to your actual route name)
            return redirect()->route('user.login') 
                             ->with('success', 'Your enrollment has been successfully submitted!');

        } catch (\Exception $e) {
            // Log the actual database/system error for debugging
            \Log::error('Enrollment Error: ' . $e->getMessage());
            
            // Redirect back with input and a generic error message
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan sistem saat menyimpan data. Silakan coba lagi.']);
        }
    }
}