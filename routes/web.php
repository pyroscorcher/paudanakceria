<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

// login admin
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

//user view
Route::get('/', [App\Http\Controllers\UserController::class, 'ShowBeranda'])->name('user.home');
Route::get('/user/info', [App\Http\Controllers\UserController::class, 'ShowInfo'])->name('user.info');
Route::get('/user/daftar', [App\Http\Controllers\UserController::class, 'ShowDaftar'])->name('user.daftar');
Route::get('/user/login', [App\Http\Controllers\UserController::class, 'ShowLogin'])->name('user.login');
Route::get('/user/pengumuman', [App\Http\Controllers\UserController::class, 'ShowPengumuman'])->name('user.pengumuman');
Route::get('/user/kontak', [App\Http\Controllers\UserController::class, 'ShowKontak'])->name('user.kontak');
