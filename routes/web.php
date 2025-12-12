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
// Rutas de recuperación de contraseña
Route::get('/password/reset', function () {
    return redirect()->route('recuperar');
})->name('password.request');

Route::get('/recuperar', function () {
    return view('auth.recuperar', ['step' => 'email']);
})->name('recuperar');

// Rutas de registro
Route::get('/registro', [App\Http\Controllers\Auth\AuthController::class, 'showRegistrationForm'])->name('register.show');
Route::post('/registro', [App\Http\Controllers\Auth\AuthController::class, 'register'])->name('register.submit');
Route::post('/registro/verify', function() {
    return redirect()->route('login')->with('success', 'Cuenta verificada correctamente.');
})->name('register.verify');

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
    Route::resource('usuarios', App\Http\Controllers\Admin\UsuarioController::class)->names('admin.usuarios');
    
    // Docentes
    Route::resource('docentes', App\Http\Controllers\Admin\DocenteController::class)->names('admin.docentes');

    // Estudiantes
    Route::resource('estudiantes', App\Http\Controllers\Admin\EstudianteController::class)->names('admin.estudiantes');
    Route::get('/colegios', function() { return view('components.admin'); })->name('colegios.index');
    // Cursos & Materias
    Route::resource('cursos', App\Http\Controllers\Admin\CursoController::class)->names('admin.cursos');
    Route::get('/materias', function() { return view('components.admin'); })->name('materias.index');
    Route::get('/libros', function() { return view('components.admin'); })->name('libros.index');
    Route::get('/configuraciones', function() { return view('components.admin'); })->name('configuraciones.index');
    Route::get('/permisos', function() { return view('components.admin'); })->name('permisos.index');
    Route::get('/calificaciones', function() { return view('components.admin'); })->name('calificaciones.index');
    
    // Reportes
    Route::get('/reportes', function() { return view('components.admin'); })->name('reportes.index');
    Route::get('/reportes/estudiantes', function() { return view('components.admin'); })->name('reportes.estudiantes');
    Route::get('/reportes/docentes', function() { return view('components.admin'); })->name('reportes.docentes');
    Route::get('/reportes/materias', function() { return view('components.admin'); })->name('reportes.materias');
    Route::get('/reportes/calificaciones', function() { return view('components.admin'); })->name('reportes.calificaciones');
});

