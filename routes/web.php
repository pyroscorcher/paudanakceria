<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AdminDashboardController;

Route::get('/', function () {
    return view('welcome');
});

// login admin
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('/daftar', [EnrollmentController::class, 'create'])->name('pendaftaran.create');
Route::post('/daftar', [EnrollmentController::class, 'store'])->name('pendaftaran.store');

// Group routes that require admin authentication
// Change 'auth' to 'auth:admins'
Route::middleware(['auth:admins'])->group(function () {
    
    // Display the dashboard
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    // Update the status
    Route::patch('/admin/enrollment/{id}/status', [AdminDashboardController::class, 'updateStatus'])
        ->name('admin.enrollment.update-status');

});

