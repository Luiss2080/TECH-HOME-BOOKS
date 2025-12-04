<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Ruta principal
Route::get('/', function () {
    return redirect('/login');
});

// Rutas simples
Route::get('/login', [App\Http\Controllers\Auth\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login']);

Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');

// Rutas que necesita la vista de login
Route::get('/password/reset', function () {
    return view('auth.login');
})->name('password.request');

Route::get('/registro', function () {
    return view('auth.login');
})->name('register.show');

// Dashboard directo - SIN middleware por ahora
Route::get('/admin/dashboard', function() {
    return view('components.admin');
})->name('admin.dashboard');

