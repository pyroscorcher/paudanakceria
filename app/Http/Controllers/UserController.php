<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // COMPANY PROFILE CONTROLLER
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

    // USER DASHBOARD CONTROLLER

    public function userDashboard(){

        $enrollments = Pendaftaran::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('user.dashboard_user', [
            'side_navbar' => 'Slide Menu',
            'header_dashboard' => 'Header Dashboard',
            'enrollments' => $enrollments
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

        // 2. Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // 3. Prevent session fixation attacks
            $request->session()->regenerate();

            // 4. Redirect to the secure user dashboard
            // FIXED: Pointing to the correct route name
            return redirect()->intended(route('user.dashboard'));
        }

        // 5. If authentication fails, redirect back
        return back()->withErrors([
            'nisn' => __('auth.failed_user'),
        ])->onlyInput('nisn');
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')
        ->with('success', 'Kamu Berhasil Keluar dari Dashboard!');
    }
}
