<?php

namespace App\Http\Controllers\Docente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Verificar que el usuario esté autenticado y tenga rol docente
        if (!Auth::check() || Auth::user()->rol !== 'docente') {
            return redirect()->route('login');
        }
        
        return view('components.docente');
    }
}