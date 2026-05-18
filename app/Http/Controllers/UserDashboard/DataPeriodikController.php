<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller; // Required because we are in a sub-namespace
use Illuminate\Http\Request;

class DataPeriodikController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('user.data_periodik', [
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
            'tinggi_badan' => 'required|integer',
            'berat_badan' => 'required|integer',
            'jarak' => 'required|integer',
            'waktu' => 'required|integer',
            'jumlahsaudara' => 'required|integer',
        ]);

        // 2. Update the related Periodik record, NOT the User record
        $user->data_periodik()->updateOrCreate(
            ['user_id' => $user->id], // The condition to match the record
            $validatedData            // The array of data to update or insert
        );
        return redirect()->back()->with('success', 'Data periodik berhasil diperbarui.');
    }
}