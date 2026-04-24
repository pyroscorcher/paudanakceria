<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// Show login page
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
// Handle login
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
// Handle logout
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

