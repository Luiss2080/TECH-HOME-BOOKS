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
            // Extra Data for Cards
            'new_users_count' => User::where('created_at', '>=', now()->subDays(7))->count(),
            'recent_courses_count' => Curso::where('created_at', '>=', now()->subDays(30))->count(),
            // 'active_students' => \App\Models\Estudiante::where('estado', 'activo')->count(), // Example if 'estado' exists
        ];

        // Recent Users (for Table)
        $recentUsers = User::latest()->take(5)->get();

        // Chart Data (Mocked for Visuals)
        $chartData = [
            'activity' => [15, 25, 45, 30, 60, 75, 50, 65, 55, 70, 80, 95], // Monthly Activity
            'system_health' => 92, // % Health (Radial)
            'resources' => [65, 42, 28], // Storage, RAM, CPU
            'registrations' => [5, 12, 19, 8, 22, 18, 30] // Last 7 months/weeks
        ];

        return view('components.admin', compact('stats', 'recentUsers', 'roleDistribution', 'chartData'));
    }
}