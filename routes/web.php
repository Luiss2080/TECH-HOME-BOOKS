<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    // Forzar logout y limpiar sesión al acceder a la raíz
    if (Auth::check()) {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
    }
    // Ir siempre al login como punto de entrada
    return redirect()->route('login');
});

// Rutas de autenticación (sin middleware guest por ahora para debugging)
Route::get('/login', [App\Http\Controllers\Auth\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login']);

Route::get('/registro', [App\Http\Controllers\Auth\AuthController::class, 'showRegistrationForm'])->name('register.show');
Route::post('/registro', [App\Http\Controllers\Auth\AuthController::class, 'register'])->name('register.submit');
Route::post('/registro/verificar', [App\Http\Controllers\Auth\AuthController::class, 'register'])->name('register.verify');

Route::get('/password/reset', function () {
    return view('auth.recuperar');
})->name('password.request');

Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Ruta para limpiar sesión completamente (útil para debugging)
Route::get('/clear-session', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login')->with('message', 'Sesión limpiada correctamente');
});

// Ruta de prueba para login directo
Route::get('/test-login', function () {
    $user = \App\Models\User::where('email', 'admin@tech-home.com')->first();
    if ($user) {
        Auth::login($user);
        return redirect()->route('admin.dashboard');
    }
    return 'Usuario no encontrado';
});

// Dashboard Routes - Requieren autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        if (!$user || !$user->rol) {
            Auth::logout();
            return redirect()->route('login')->withErrors(['error' => 'Sesión inválida.']);
        }
        
        switch ($user->rol) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'docente':
                return redirect()->route('docente.dashboard');
            case 'estudiante':
                return redirect()->route('estudiante.dashboard');
            default:
                Auth::logout();
                return redirect()->route('login')->withErrors(['error' => 'Rol no reconocido.']);
        }
    })->name('dashboard');

    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/docente/dashboard', [App\Http\Controllers\Docente\DashboardController::class, 'index'])->name('docente.dashboard');
    Route::get('/estudiante/dashboard', [App\Http\Controllers\Estudiante\DashboardController::class, 'index'])->name('estudiante.dashboard');
});

