<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;

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

});

//user view
Route::get('/', [UserController::class, 'ShowBeranda'])->name('user.home');
Route::get('/user/info', [UserController::class, 'ShowInfo'])->name('user.info');
Route::get('/user/daftar', [UserController::class, 'ShowDaftar'])->name('user.daftar');
Route::get('/user/login', [UserController::class, 'ShowLogin'])->name('user.login');
Route::get('/user/pengumuman', [UserController::class, 'ShowPengumuman'])->name('user.pengumuman');
Route::get('/user/kontak', [UserController::class, 'ShowKontak'])->name('user.kontak');
