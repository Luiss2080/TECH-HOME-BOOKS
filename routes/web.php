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

// Dashboards protegidos con middleware de autenticación
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware(['web', 'auth.check', 'admin.check'])->name('admin.dashboard');
Route::get('/docente/dashboard', [App\Http\Controllers\Docente\DashboardController::class, 'index'])->middleware(['web', 'auth.check'])->name('docente.dashboard');
Route::get('/estudiante/dashboard', [App\Http\Controllers\Estudiante\DashboardController::class, 'index'])->middleware(['web', 'auth.check'])->name('estudiante.dashboard');

// Alias para dashboard
Route::get('/dashboard', function() {
    // Redirigir según el rol del usuario
    $userRole = session('user_role');
    return match($userRole) {
        'admin' => redirect()->route('admin.dashboard'),
        'docente' => redirect()->route('docente.dashboard'),
        'estudiante' => redirect()->route('estudiante.dashboard'),
        default => redirect()->route('login')
    };
})->name('dashboard');

// Rutas administrativas protegidas (solo administradores)
Route::middleware(['web', 'auth.check', 'admin.check'])->group(function () {
    // Módulos principales
    Route::resource('usuarios', App\Http\Controllers\Admin\UsuarioController::class)->names('admin.usuarios');
    
    // Docentes
    Route::resource('docentes', App\Http\Controllers\Admin\DocenteController::class)->names('admin.docentes');

    // Estudiantes
    Route::resource('estudiantes', App\Http\Controllers\Admin\EstudianteController::class)->names('admin.estudiantes');
    // Colegios
    Route::resource('colegios', App\Http\Controllers\Admin\ColegioController::class)->names('admin.colegios');
    // Estudiantes
    // Cursos & Materias
    Route::resource('cursos', App\Http\Controllers\Admin\CursoController::class)->names('admin.cursos');
    // Roles
    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class)->names('admin.roles');
    // Materias
    Route::resource('materias', App\Http\Controllers\Admin\MateriaController::class)->names('admin.materias');
    Route::resource('permisos', App\Http\Controllers\Admin\PermisosController::class)->names('admin.permisos');
    // Biblioteca
    Route::resource('libros', App\Http\Controllers\BibliotecaController::class);
    // Materiales
    Route::resource('materiales', App\Http\Controllers\Docente\MaterialController::class)->names('admin.materiales');
    // Laboratorios
    Route::resource('laboratorios', App\Http\Controllers\Docente\LaboratorioController::class)->names('admin.laboratorios');
    
    Route::get('/configuraciones', function() { return view('configuraciones.index'); })->name('configuraciones.index');

    Route::get('/calificaciones', function() { return view('components.admin'); })->name('calificaciones.index');
    
    // Perfil
    Route::get('/perfil', [App\Http\Controllers\PerfilController::class, 'index'])->name('perfil.index');
    Route::get('/perfil/editar', [App\Http\Controllers\PerfilController::class, 'edit'])->name('perfil.edit');
    Route::put('/perfil/update', [App\Http\Controllers\PerfilController::class, 'update'])->name('perfil.update');
    Route::get('/perfil/seguridad', [App\Http\Controllers\PerfilController::class, 'cambiarPassword'])->name('perfil.security');
    Route::put('/perfil/password', [App\Http\Controllers\PerfilController::class, 'actualizarPassword'])->name('perfil.update-password');
    Route::post('/perfil/avatar', [App\Http\Controllers\PerfilController::class, 'subirAvatar'])->name('perfil.avatar');
    
    // Reportes
    Route::get('/reportes', [App\Http\Controllers\Admin\ReportesController::class, 'index'])->name('reportes.index');
    Route::get('/reportes/estudiantes', [App\Http\Controllers\Admin\ReportesController::class, 'estudiantes'])->name('reportes.estudiantes');
    Route::get('/reportes/docentes', [App\Http\Controllers\Admin\ReportesController::class, 'docentes'])->name('reportes.docentes');
    Route::get('/reportes/materias', [App\Http\Controllers\Admin\ReportesController::class, 'materias'])->name('reportes.materias');
    Route::get('/reportes/calificaciones', [App\Http\Controllers\Admin\ReportesController::class, 'calificaciones'])->name('reportes.calificaciones');

    // Calendario
    Route::get('/calendario', [App\Http\Controllers\Admin\CalendarioController::class, 'index'])->name('admin.calendario.index');
});

// Rutas para Docentes
Route::middleware(['web', 'auth.check'])->prefix('docente')->group(function () {
    // Materias del docente
    Route::get('/materias', function() {
        return view('components.docente'); // Placeholder - crear vista específica después
    })->name('docente.materias.index');
    
    // Calificaciones
    Route::get('/calificaciones', function() {
        return view('components.docente');
    })->name('docente.calificaciones.index');
    
    // Asistencias
    Route::get('/asistencias', function() {
        return view('components.docente');
    })->name('docente.asistencias.index');
    
    // Materiales
    Route::resource('materiales', App\Http\Controllers\Docente\MaterialController::class)->names('docente.materiales');
    
    // Laboratorios
    Route::resource('laboratorios', App\Http\Controllers\Docente\LaboratorioController::class)->names('docente.laboratorios');
});

// Rutas para Estudiantes
Route::middleware(['web', 'auth.check'])->prefix('estudiante')->group(function () {
    // Materias
    Route::get('/materias', function() {
        return view('components.estudiante'); // Placeholder
    })->name('estudiante.materias.index');
    
    // Calificaciones
    Route::get('/calificaciones', function() {
        return view('components.estudiante');
    })->name('estudiante.calificaciones.index');
    
    // Tareas
    Route::get('/tareas', function() {
        return view('components.estudiante');
    })->name('estudiante.tareas.index');
    
    // Horario
    Route::get('/horario', function() {
        return view('components.estudiante');
    })->name('estudiante.horario.index');
    
    // Materiales
    Route::get('/materiales', [App\Http\Controllers\Estudiante\MaterialController::class, 'index'])->name('estudiante.materiales.index');
});

