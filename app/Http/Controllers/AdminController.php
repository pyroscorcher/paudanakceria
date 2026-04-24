<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;

class AdminController extends Controller
{
    // 🔐 LOGIN
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            return response()->json(['message' => 'Login berhasil']);
        }

        return response()->json(['message' => 'Login gagal'], 401);
    }

    // 🔓 LOGOUT
    public function logout()
    {
        Auth::guard('admin')->logout();
        return response()->json(['message' => 'Logout berhasil']);
    }

    // ✅ VERIFIKASI PENDAFTARAN
    public function verifikasiPendaftaran($user_id)
    {
        $user = User::findOrFail($user_id);

        $user->status = 'verified'; // pastikan ada kolom status di users
        $user->save();

        return response()->json(['message' => 'Pendaftaran diverifikasi']);
    }

    // 👥 KELOLA DAWAL (DATA USER)
    public function kelolaDawal()
    {
        return response()->json(User::all());
    }

    // ℹ️ KELOLA INFORMASI
    public function kelolaInformasi()
    {
        return response()->json(['message' => 'Kelola informasi']);
    }

    // 🖼️ KELOLA GALLERY
    public function kelolaGallery()
    {
        return response()->json(['message' => 'Kelola gallery']);
    }

    // 📰 KELOLA NEWS
    public function kelolaNews()
    {
        return response()->json(['message' => 'Kelola news']);
    }
}
