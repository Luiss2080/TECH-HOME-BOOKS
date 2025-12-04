<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    // Si el usuario está autenticado, redirigir al dashboard
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    // Si no está autenticado, mostrar login
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

// Dashboard Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        switch ($user->rol) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'docente':
                return redirect()->route('docente.dashboard');
            case 'estudiante':
                return redirect()->route('estudiante.dashboard');
            default:
                Auth::logout();
                return redirect()->route('login')->withErrors(['email' => 'Rol no reconocido.']);
        }
    })->name('dashboard');

    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/docente/dashboard', [App\Http\Controllers\Docente\DashboardController::class, 'index'])->name('docente.dashboard');
    Route::get('/estudiante/dashboard', [App\Http\Controllers\Estudiante\DashboardController::class, 'index'])->name('estudiante.dashboard');
});

