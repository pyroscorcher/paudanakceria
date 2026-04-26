<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function create()
    {
        return view('pendaftaran.create');
    }

    public function store(Request $request)
    {
        // 1. Validate incoming data to ensure data integrity before hitting the DB
        $validated = $request->validate([
            'nama'          => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users',
            'password'      => 'required|string|min:8',
            'jenis_kelamin' => 'required|in:L,P',
            'nisn'          => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir'  => 'required|string|max:255',
            'nama_orangtua' => 'required|string|max:255',
        ]);

        try {
            // 2. Wrap database operations in an atomic transaction
            $user = DB::transaction(function () use ($validated) {
                
                // A. Provision the User account
                $newUser = User::create([
                    'name'     => $validated['nama'], // Standard Laravel uses 'name' in users table
                    'email'    => $validated['email'],
                    'password' => Hash::make($validated['password']),
                ]);

                // B. Create the Enrollment record, linking the newly created user_id
                Pendaftaran::create([
                    'user_id'       => $newUser->id,
                    'nama'          => $validated['nama'],
                    'jenis_kelamin' => $validated['jenis_kelamin'],
                    'nisn'          => $validated['nisn'],
                    'tanggal_lahir' => $validated['tanggal_lahir'],
                    'tempat_lahir'  => $validated['tempat_lahir'],
                    'nama_orangtua' => $validated['nama_orangtua'],
                    'status'        => 'Menunggu', // Set a default starting status
                ]);

                // Return the user object so we can use it outside the transaction closure
                return $newUser; 
            });

            // 3. (Optional but recommended) Authenticate the user immediately 
            Auth::login($user);

            // 4. Redirect to the authenticated dashboard
            return redirect()->route('dashboard')
                             ->with('success', 'Your enrollment has been successfully submitted!');

        } catch (\Exception $e) {
            // If any error occurs (e.g., database constraint failure), the transaction rolls back.
            // We catch the error and redirect the user back with their inputs intact.
            
            // Log the actual error for debugging purposes
            \Log::error('Enrollment failure: ' . $e->getMessage());

            return back()->withInput()
                         ->withErrors(['system_error' => 'An error occurred while processing your enrollment. Please try again.']);
        }
    }
}