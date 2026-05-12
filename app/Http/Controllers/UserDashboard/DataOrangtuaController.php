<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller; // Required because we are in a sub-namespace
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class DataOrangtuaController extends Controller{

    public function index()
    {
        // Retrieve the currently authenticated user
        $user = auth()->user();

        // Return the view and pass ALL required variables to it
        return view('user.data_orangtua', [
            'user'             => $user,
            'side_navbar'      => 'Slide Menu',
            'header_dashboard' => 'Header Dashboard'
        ]);
    }

    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        // 1. Validate the incoming HTTP Request
        $validatedData = $request->validate([
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'tahun_lahir_ayah' => 'required|integer|min:1900|max:' . date('Y'),
            'tahun_lahir_ibu' => 'required|integer|min:1900|max:' . date('Y'),
            'pekerjaan_ayah' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'pendidikan_ayah' => 'required|string|max:255',
            'pendidikan_ibu' => 'required|string|max:255',
            'nama_wali' => 'nullable|string|max:255',
            'tahun_lahir_wali' => 'nullable|integer|min:1900|max:' . date('Y'),
            'pekerjaan_wali' => 'nullable|string|max:255',
            'pendidikan_wali' => 'nullable|string|max:255',
            'penghasilan_ayah' => 'required|numeric|min:0',
            'penghasilan_ibu' => 'required|numeric|min:0',
            'penghasilan_wali' => 'nullable|numeric|min:0',
        ]);

        // 2. Update the related Orangtua record, NOT the User record
        $user->orangtua()->updateOrCreate(
            ['user_id' => $user->id], // The condition to match the record
            $validatedData            // The array of data to update or insert
        );

        return redirect()->back()->with('success', 'Data orangtua berhasil diperbarui.');
    }
}