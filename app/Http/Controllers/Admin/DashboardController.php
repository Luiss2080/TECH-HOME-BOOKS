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
        // Stats Counts
        $stats = [
            'users' => User::count(),
            'students' => \App\Models\Estudiante::count(),
            'teachers' => \App\Models\Docente::count(),
            'courses' => Curso::count(),
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