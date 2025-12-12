<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        // Recuperar usuario desde la sesión manual
        $userId = session('user_id');
        $user = \App\Models\User::find($userId);
        
        if (!$user) {
            return redirect()->route('login')->with('error', 'Sesión no válida.');
        }

        return view('perfil.index', compact('user'));
    }

    public function show()
    {
        //
    }

    public function edit()
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function cambiarPassword()
    {
        //
    }

    public function actualizarPassword(Request $request)
    {
        //
    }

    public function subirAvatar(Request $request)
    {
        //
    }
}