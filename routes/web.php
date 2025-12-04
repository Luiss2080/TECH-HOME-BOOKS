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

// Dashboard protegido con middleware de autenticación y administrador
Route::get('/admin/dashboard', function() {
    return view('components.admin');
})->middleware(['web', 'auth.check', 'admin.check'])->name('admin.dashboard');

// Alias para dashboard
Route::get('/dashboard', function() {
    return redirect()->route('admin.dashboard');
})->name('dashboard');

// Rutas administrativas protegidas (solo administradores)
Route::middleware(['web', 'auth.check', 'admin.check'])->group(function () {
    // Módulos principales
    Route::get('/usuarios', function() { return view('components.admin'); })->name('usuarios.index');
    Route::get('/docentes', function() { return view('components.admin'); })->name('docentes.index');
    Route::get('/estudiantes', function() { return view('components.admin'); })->name('estudiantes.index');
    Route::get('/colegios', function() { return view('components.admin'); })->name('colegios.index');
    Route::get('/materias', function() { return view('components.admin'); })->name('materias.index');
    Route::get('/cursos', function() { return view('components.admin'); })->name('cursos.index');
    Route::get('/libros', function() { return view('components.admin'); })->name('libros.index');
    Route::get('/configuraciones', function() { return view('components.admin'); })->name('configuraciones.index');
    Route::get('/permisos', function() { return view('components.admin'); })->name('permisos.index');
    
    // Reportes
    Route::get('/reportes', function() { return view('components.admin'); })->name('reportes.index');
    Route::get('/reportes/estudiantes', function() { return view('components.admin'); })->name('reportes.estudiantes');
    Route::get('/reportes/docentes', function() { return view('components.admin'); })->name('reportes.docentes');
    Route::get('/reportes/calificaciones', function() { return view('components.admin'); })->name('reportes.calificaciones');
});

