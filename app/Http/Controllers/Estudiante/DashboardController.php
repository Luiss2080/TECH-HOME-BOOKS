<?php

namespace App\Http\Controllers\Estudiante;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Verificar que el usuario esté autenticado y tenga rol estudiante
        if (!Auth::check() || Auth::user()->rol !== 'estudiante') {
            return redirect()->route('login');
        }
        
        return view('components.estudiante');
    }
}