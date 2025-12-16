<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Curso;
// Add other models as needed

class DashboardController extends Controller
{
    public function index()
    {
        // Stats Counts - Expanded
        $stats = [
            'users' => User::count(),
            'students' => \App\Models\Estudiante::count(),
            'teachers' => \App\Models\Docente::count(),
            'courses' => Curso::count(),
            'materias' => \App\Models\Materia::count(),
            'colegios' => \App\Models\Colegio::count(),
            'libros' => \App\Models\Libro::count(),
            'materiales' => \App\Models\Material::count(),
            'laboratorios' => \App\Models\Laboratorio::count(),
            'roles' => \App\Models\Role::count(),
            'permisos' => \App\Models\Permiso::count(),
            // 'reportes' => \App\Models\Reporte::count(), // Optional if Reporte model works
        ];

        // Recent Users (for Table)
        $recentUsers = User::latest()->take(5)->get();

        // Role Distribution (for Chart)
        $roleDistribution = [
            'admin' => User::where('rol', 'admin')->count(),
            'docente' => User::where('rol', 'docente')->count(),
            'estudiante' => User::where('rol', 'estudiante')->count(),
        ];

        return view('components.admin', compact('stats', 'recentUsers', 'roleDistribution'));
    }
}