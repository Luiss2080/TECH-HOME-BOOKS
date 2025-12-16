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
        $stats = [
            'users' => User::count(),
            'students' => \App\Models\Estudiante::count(), // Assuming Estudiante model exists or using Role check
            'teachers' => \App\Models\Docente::count(),    // Assuming Docente model exists
            'courses' => Curso::count(),
        ];

        return view('components.admin', compact('stats'));
    }
}