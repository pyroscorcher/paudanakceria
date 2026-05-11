<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function ShowInfo()
    {
        return view('user.info', [
            'navbar' => 'My Menu'
        ]);
    }

    public function ShowDaftar()
    {
        return view('user.daftar', [
            'navbar' => 'My Menu'
        ]);
    }

    public function ShowLogin()
    {
        return view('user.login');
    }

    public function ShowPengumuman()
    {
        return view('user.pengumuman', [
            'navbar' => 'My Menu',
            'footer' => 'My Footer'
        ]);
    }

    public function ShowKontak()
    {
        return view('user.kontak', [
            'navbar' => 'My Menu'
        ]);
    }

    public function ShowBeranda()
    {
        return view('user.home', [
        'navbar' => 'My Menu'
        ]);
    }

    public function ShowNews()
    {
        return view('user.news', [
            'navbar' => 'My Menu',
            'footer' => 'My Footer'
        ]);
    }

    public function userDashboard(){
        return view('user.dashboard_user', [
            'side_navbar' => 'Slide Menu',
            'header_dashboard' => 'Header Dashboard'
        ]);
    }

    public function dataAnak(){
        return view('user.data_anak', [
            'side_navbar' => 'Slide Menu',
            'header_dashboard' => 'Header Dashboard'
        ]);
    }

    public function dataOrangTua(){
        return view('user.data_orangtua', [
            'side_navbar' => 'Slide Menu',
            'header_dashboard' => 'Header Dashboard'
        ]);
    }

    public function dataPeriodik(){
        return view('user.data_periodik', [
            'side_navbar' => 'Slide Menu',
            'header_dashboard' => 'Header Dashboard'
        ]);
    }

    public function dataPrestasi(){
        return view('user.data_prestasi', [
            'side_navbar' => 'Slide Menu',
            'header_dashboard' => 'Header Dashboard'
        ]);
    }

    public function uploadDokumen(){
        return view('user.upload_dokumen', [
            'side_navbar' => 'Slide Menu',
            'header_dashboard' => 'Header Dashboard'
        ]);
    }

    public function ShowDashboard()
    {
        return view('user.dashboard', [
            'navbar' => 'My Menu',
            'footer' => 'My Footer'
        ]);
    }

    public function ShowDokumen()
    {
        return view('user.dokumen', [
            'navbar' => 'My Menu',
            'footer' => 'My Footer'
        ]);
    }

    // user login method
    public function login(Request $request)
    {
        // 1. Validate the incoming request payload
        $credentials = $request->validate([
            'nisn'     => ['required', 'string'],
            'password' => ['required'],
        ]);

        // 2. Attempt to authenticate the user using the provided NISN and password
        if (Auth::attempt($credentials)) {
            // 3. Prevent session fixation attacks by regenerating the session
            $request->session()->regenerate();

            // 4. Redirect to the user dashboard on success
            // Note: Ensure 'user.dashboard' matches the route name in your web.php
            return redirect()->intended(route('user.dashboard_user'));
        }

        // 5. If authentication fails, redirect back with a localized error message
        return back()->withErrors([
            'nisn' => 'The provided NISN or password does not match our records.',
        ])->onlyInput('nisn'); // Keeps the NISN filled in the form, but clears the password
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
