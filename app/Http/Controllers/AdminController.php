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

    public function showDashboard()
    {
        return view('admin.dashboard');
    }

    public function login(Request $request)
    {
        if (Auth::guard('admins')->attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            return redirect('admin/dashboard');
        }

        return redirect('/admin/login')->with('error', 'Login gagal');
    }

    // LOGOUT
    public function logout()
    {
        Auth::guard('admins')->logout();
        return redirect('/admin/login');
    }
}
