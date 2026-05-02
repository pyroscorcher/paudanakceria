<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsController;

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

