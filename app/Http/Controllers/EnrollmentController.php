<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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
            'nisn'          => 'required|string|max:20|unique:users,nisn', 
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
                    'name'     => $validated['nama'], 
                    'nisn'     => $validated['nisn'],
                    'password' => Hash::make($validated['password']),
                ]);

                // B. Create the Enrollment record using ONLY the $fillable attributes
                Pendaftaran::create([
                    'user_id'       => $newUser->id,
                    'nama'          => $validated['nama'],
                    'tanggal_lahir' => $validated['tanggal_lahir'],
                    'nama_ayah'     => $validated['nama_ayah'],
                    'nama_ibu'      => $validated['nama_ibu'],
                    'telp'          => $validated['telp'],
                    'jenis_kelamin' => $validated['jenis_kelamin'],
                    'alamat_rumah'  => $validated['alamat_rumah'],
                    'status'        => 'Pending',
                ]);

                return $newUser; 
            });

            // 3. Authenticate the user immediately 
            Auth::login($user);

            // 4. Redirect to the authenticated dashboard
            return redirect()->route('user.home')
                             ->with('success', 'Your enrollment has been successfully submitted!');

        } catch (ValidationException $e) {
            // Log the actual error for debugging purposes
            dd($e->errors());
        }
    }
}