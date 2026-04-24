<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;

class AdminController extends Controller
{
    // LOGIN
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        if (Auth::guard('admins')->attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            return response()->json(['message' => 'Login berhasil']);
            return redirect()->intended('/welcome');
        }

        return response()->json(['message' => 'Login gagal'], 401);
    }

    // LOGOUT
    public function logout()
    {
        Auth::guard('admins')->logout();
        return response()->json(['message' => 'Logout berhasil']);
    }
}
