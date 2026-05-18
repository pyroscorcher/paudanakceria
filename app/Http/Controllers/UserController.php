<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // ==========================================
    // COMPANY PROFILE CONTROLLERS
    // ==========================================
    
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

    /**
     * Menampilkan semua berita/pengumuman (Halaman Grid Archive)
     */
    public function ShowPengumuman()
    {
        $all_news = \App\Models\News::latest()->paginate(9);

        return view('user.pengumuman', [
            'navbar'   => 'My Menu',
            'footer'   => 'My Footer',
            'all_news' => $all_news
        ]);
    }


    /**
     * Menampilkan detail single artikel berita berdasarkan ID
     */
    public function ShowNewsDetail($id)
    {
        $news = \App\Models\News::findOrFail($id);

        return view('user.news', [
            'navbar' => 'My Menu',
            'footer' => 'My Footer',
            'news'   => $news
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
        $galleries = \App\Models\Gallery::latest()->take(6)->get();
        $news = \App\Models\News::latest()->take(3)->get();

        return view('user.home', [
            'navbar'    => 'My Menu',
            'galleries' => $galleries,
            'news'      => $news,
        ]);
    }

    // ==========================================
    // PROTECTED USER DASHBOARD CONTROLLERS
    // ==========================================

    public function userDashboard()
    {
        $user = auth()->user();
        $enrollment = $user->pendaftaran;

        return view('user.dashboard_user', [
            'side_navbar'      => 'Slide Menu',
            'header_dashboard' => 'Header Dashboard',
            'user'             => $user,
            'enrollment'       => $enrollment 
        ]);
    }

    public function dataAnak()
    {
        return view('user.data_anak', [
            'side_navbar'      => 'Slide Menu',
            'header_dashboard' => 'Header Dashboard'
        ]);
    }

    public function dataOrangTua()
    {
        return view('user.data_orangtua', [
            'side_navbar'      => 'Slide Menu',
            'header_dashboard' => 'Header Dashboard'
        ]);
    }

    public function dataPeriodik()
    {
        return view('user.data_periodik', [
            'side_navbar'      => 'Slide Menu',
            'header_dashboard' => 'Header Dashboard'
        ]);
    }

    public function dataPrestasi()
    {
        return view('user.data_prestasi', [
            'side_navbar'      => 'Slide Menu',
            'header_dashboard' => 'Header Dashboard'
        ]);
    }

    public function uploadDokumen()
    {
        return view('user.upload_dokumen', [
            'side_navbar'      => 'Slide Menu',
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

    // ==========================================
    // AUTHENTICATION METHODS
    // ==========================================

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nisn'     => ['required', 'string'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('user.dashboard');
        }

        return back()->withErrors([
            'nisn' => __('auth.failed_user'),
        ])->onlyInput('nisn');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')
            ->with('success', 'Kamu Berhasil Keluar dari Dashboard!');
    }
}