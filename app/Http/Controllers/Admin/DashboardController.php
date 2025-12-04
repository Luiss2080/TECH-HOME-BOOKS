<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        // Verificar que el usuario esté autenticado y tenga rol admin
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['error' => 'Debes iniciar sesión.']);
        }
        
        $user = Auth::user();
        if ($user->rol !== 'admin') {
            return redirect()->route('login')->withErrors(['error' => 'No tienes permisos para acceder a esta área.']);
        }
        
        // Log para debugging
        Log::info('Admin dashboard accedido', ['user_id' => $user->id]);
        
        return view('components.admin');
    }
}