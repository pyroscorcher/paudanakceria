<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    // 1. Show all classes
    public function index()
    {
        // Fetch classes and count how many students are in each
        $kelasList = Kelas::withCount('users')->get();
        return view('admin.kelas.index', compact('kelasList'));
    }

    // 2. Create a new class
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kelas'    => 'required|string|max:255',
            'kelompok_usia' => 'required|string|max:50',
            'kapasitas'     => 'required|integer|min:1',
            'nama_guru'     => 'required|string|max:255',
        ]);

        Kelas::create($validated);
        return redirect()->back()->with('success', 'Kelas baru berhasil dibuat!');
    }

    // 3. Show specific class details AND the assignment panel
    public function show($id)
    {
        // Get the specific class and its currently assigned students
        $kelas = Kelas::with('users')->findOrFail($id);

        // ADVANCED QUERY: Get only students who are "Diterima" AND don't have a class yet
        $unassignedStudents = User::whereNull('kelas_id')
            ->whereHas('pendaftaran', function ($query) {
                $query->where('status', 'Diterima');
            })->get();

        return view('admin.kelas.show', compact('kelas', 'unassignedStudents'));
    }

    // 4. Assign a student to the class
    public function assignStudent(Request $request, $id)
    {
        $request->validate(['user_id' => 'required|exists:users,id']);
        
        $user = User::findOrFail($request->user_id);
        $user->kelas_id = $id;
        $user->save();

        return redirect()->back()->with('success', "{$user->name} berhasil dimasukkan ke kelas!");
    }

    // 5. Delete a class
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->back()->with('success', 'Kelas berhasil dihapus!');
    }
}