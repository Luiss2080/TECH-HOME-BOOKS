<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login']);
    
    Route::get('/registro', [App\Http\Controllers\Auth\AuthController::class, 'showRegistrationForm'])->name('register.show');
    Route::post('/registro', [App\Http\Controllers\Auth\AuthController::class, 'register'])->name('register.submit');
    Route::post('/registro/verificar', [App\Http\Controllers\Auth\AuthController::class, 'register'])->name('register.verify'); // Placeholder using same method for now
    
    Route::get('/password/reset', function () {
        return view('auth.recuperar');
    })->name('password.request');
});

Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

