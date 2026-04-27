<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // LOGIN
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Attempt to log in using the 'admins' guard
        if (Auth::guard('admins')->attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            // Security best practice: regenerate the session token
            $request->session()->regenerate();

            // Redirect using the named route we set up in web.php
            return redirect()->route('admin.dashboard');
        }

        // If it fails, send them back with an error and keep their old username input
        return back()->withErrors([
            'error' => 'Login gagal. Username atau password salah.',
        ])->onlyInput('username');
    }

    // LOGOUT
    public function logout(Request $request)
    {
        Auth::guard('admins')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}