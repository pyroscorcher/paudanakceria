<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $enrollments = Pendaftaran::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.dashboard', [
            'admin_navbar' => 'My Menu',
            'admin_header' => 'Header'],
            compact('enrollments'));
    }

    public function updateStatus(Request $request, $id)
    {
        // 1. Strictly validate the incoming status to prevent malicious injections
        $validated = $request->validate([
            'status' => 'required|string|in:Menunggu,Diterima,Ditolak',
        ]);

        // 2. Find the record or fail automatically (throws a 404 if tampered with)
        $enrollment = Pendaftaran::findOrFail($id);

        // 3. Update the state
        $enrollment->status = $validated['status'];
        $enrollment->save();

        // 4. Redirect back to the dashboard with a success flash message
        return redirect()->route('admin.dashboard')
                         ->with('success', "Enrollment status for {$enrollment->nama} updated to {$validated['status']}.");
    }

    // show pendaftaran etails
    public function show($id)
    {
        $enrollment = Pendaftaran::with('user')->findOrFail($id);

        return view('admin.show', compact('enrollment'));
    }
}
