<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Verificar que el usuario esté autenticado y tenga rol admin
        if (!Auth::check() || Auth::user()->rol !== 'admin') {
            return redirect()->route('login');
        }
        
        return view('components.admin');
    }
}