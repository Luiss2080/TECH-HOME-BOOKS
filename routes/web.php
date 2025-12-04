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

// Alias para dashboard
Route::get('/dashboard', function() {
    return redirect()->route('admin.dashboard');
})->name('dashboard');

// Rutas de placeholder para los layouts
Route::get('/reportes', function() { return view('components.admin'); })->name('reportes.index');
Route::get('/contact', function() { return view('components.admin'); })->name('contact');
Route::get('/configuraciones', function() { return view('components.admin'); })->name('configuraciones.index');
Route::get('/conductores', function() { return view('components.admin'); })->name('conductores.index');
Route::get('/usuarios', function() { return view('components.admin'); })->name('usuarios.index');
Route::get('/vehiculos', function() { return view('components.admin'); })->name('vehiculos.index');
Route::get('/viajes', function() { return view('components.admin'); })->name('viajes.index');
Route::get('/clientes', function() { return view('components.admin'); })->name('clientes.index');
Route::get('/tarifas', function() { return view('components.admin'); })->name('tarifas.index');
Route::get('/pagos', function() { return view('components.admin'); })->name('pagos.index');
Route::get('/permisos', function() { return view('components.admin'); })->name('permisos.index');
Route::get('/reportes/conductores', function() { return view('components.admin'); })->name('reportes.conductores');
Route::get('/reportes/viajes', function() { return view('components.admin'); })->name('reportes.viajes');
Route::get('/reportes/ingresos', function() { return view('components.admin'); })->name('reportes.ingresos');

