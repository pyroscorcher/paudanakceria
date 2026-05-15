<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller; // Required because we are in a sub-namespace
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserDocumentController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('user.upload_dokumen', [
            'user'             => $user,
            'side_navbar'      => 'Slide Menu',       // Add this line
            'header_dashboard' => 'Header Dashboard'  // Add this line
        ]);
    }

    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        // 1. Validate the incoming HTTP Request (Changed to nullable for progressive uploads)
        $validatedData = $request->validate([
            'akta_kelahiran'   => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'kk'               => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'foto_anak'        => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'ktp'              => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'bukti_pembayaran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // 2. Handle file uploads and save paths to the array
        $dokumenData = [];
        foreach (['akta_kelahiran', 'kk', 'foto_anak', 'ktp', 'bukti_pembayaran'] as $field) {
            // Only process the file if a new one was actually uploaded
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $path = $file->store('dokumen_uploads', 'public');
                $dokumenData[$field] = $path;
            }
        }

        // 3. Update the user's document information in the 'dokumens' table
        // Only run the database update if at least one file was uploaded
        if (!empty($dokumenData)) {
            $user->dokumen()->updateOrCreate(
                ['user_id' => $user->id],
                $dokumenData
            );
        }

        return redirect()->back()->with('success', 'Dokumen berhasil diunggah.');
    }
}