<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboard\DataAnakController;
use App\Http\Controllers\UserDashboard\DataOrangtuaController;
use App\Http\Controllers\UserDashboard\DataPeriodikController;
use App\Http\Controllers\UserDashboard\DataPrestasiController;
use App\Http\Controllers\UserDashboard\UserDocumentController;

Route::get('/', function () {
    return view('welcome');
});

// login admin
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// form pendaftaran
Route::get('/daftar', [EnrollmentController::class, 'create'])->name('pendaftaran.create');
Route::post('/daftar', [EnrollmentController::class, 'store'])->name('pendaftaran.store');

// Admin dashboard routes
Route::middleware(['auth:admins'])->group(function () {
    Route::get('/admin', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');
    Route::get('/admin/enrollment/{id}', [AdminDashboardController::class, 'show'])->name('admin.enrollment.show');
    Route::patch('/admin/enrollment/{id}/status', [AdminDashboardController::class, 'updateStatus'])
        ->name('admin.enrollment.update-status');
    Route::resource('/admin/gallery', GalleryController::class);

    Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/admin/gallery/upload', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/admin/gallery/upload', [GalleryController::class, 'store'])->name('gallery.store');
    Route::delete('/admin/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    // News routes
    Route::get('/admin/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/admin/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/admin/news/create', [NewsController::class, 'store'])->name('news.store');

    // Add this GET route to display the form
    Route::get('/admin/news/{id}/update', [NewsController::class, 'showUpdate'])->name('news.showUpdate');

    Route::put('/admin/news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/admin/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

});

// ==========================================
// PUBLIC USER ROUTES (No login required)
// ==========================================
Route::get('/', [UserController::class, 'ShowBeranda'])->name('user.home');

// Grouped Public User Sub-pages
// Automatically attaches '/user' to URLs and 'user.' to route names
Route::prefix('user')->name('user.')->group(function () {
    
    // Informational Pages
    Route::get('/info', [UserController::class, 'ShowInfo'])->name('info');
    Route::get('/daftar', [UserController::class, 'ShowDaftar'])->name('daftar');
    Route::get('/news', [UserController::class, 'ShowPengumuman'])->name('pengumuman');
    Route::get('/kontak', [UserController::class, 'ShowKontak'])->name('kontak');

    // Dynamic News Feed & Individual Articles
    Route::get('/news/{id}', [UserController::class, 'ShowNewsDetail'])->name('news.detail');

    // Authentication Gateways (Unprotected)
    Route::get('/login', [UserController::class, 'ShowLogin'])->name('login');
    Route::post('/login', [UserController::class, 'login'])->name('login.submit');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    
});

// User Login & Logout
Route::get('/user/login', [UserController::class, 'ShowLogin'])->name('user.login');
Route::post('/user/login', [UserController::class, 'login'])->name('user.login.submit');
Route::post('/user/logout', [UserController::class, 'logout'])->name('user.logout');

//user middleware
// ==========================================
// PROTECTED USER DASHBOARD ROUTES
// ==========================================
Route::middleware(['auth'])->group(function () {
    // Core Dashboard
    Route::get('/user', [UserController::class, 'UserDashboard'])->name('user.dashboard');

    // Data Anak (Using your new dedicated controller)
    Route::get('/user/data_anak', [DataAnakController::class, 'index'])->name('user.data_anak');
    Route::put('/user/data_anak', [DataAnakController::class, 'update'])->name('user.data_anak.update'); // Removed {id} for security

    // Data Orangtua
    Route::get('/user/data_orangtua', [DataOrangtuaController::class, 'index'])->name('user.data_orangtua');
    Route::put('/user/data_orangtua', [DataOrangtuaController::class, 'update'])->name('user.data_orangtua.update');

    // Data Periodik
    Route::get('/user/data_periodik', [DataPeriodikController::class, 'index'])->name('user.data_periodik');
    Route::put('/user/data_periodik', [DataPeriodikController::class, 'update'])->name('user.data_periodik.update');

    // Data Prestasi
    Route::get('/user/data_prestasi', [DataPrestasiController::class, 'index'])->name('user.data_prestasi');
    Route::put('/user/data_prestasi', [DataPrestasiController::class, 'update'])->name('user.data_prestasi.update');

    // Documents & Profile
    Route::get('/user/upload_dokumen', [UserDocumentController::class, 'index'])->name('user.upload_dokumen');
    Route::put('/user/upload_dokumen', [UserDocumentController::class, 'update'])->name('user.upload_dokumen.update');
    
    Route::get('/user/profile', [UserController::class, 'ShowProfile'])->name('user.profile');
    Route::post('/user/profile', [UserController::class, 'UpdateProfile'])->name('user.profile.update');

    Route::get('/user/change-password', [UserController::class, 'ShowChangePassword'])->name('user.change-password');
    Route::post('/user/change-password', [UserController::class, 'ChangePassword'])->name('user.change-password.update');

});
