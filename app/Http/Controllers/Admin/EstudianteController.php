<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\User;

class EstudianteController extends Controller
{
    public function index(Request $request)
    {
        $query = Estudiante::with(['user', 'curso']);

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('codigo_estudiante', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%")
                        ->orWhere('apellido', 'like', "%{$search}%")
                        ->orWhere('ci', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                  });
            });
        }

        $perPage = $request->input('per_page', 10);
        $estudiantes = $query->paginate($perPage);

        return view('admin.estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
        return view('admin.estudiantes.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $estudiante = Estudiante::with('user')->findOrFail($id);
        return view('admin.estudiantes.show', compact('estudiante'));
    }

    public function edit($id)
    {
        $estudiante = Estudiante::with('user')->findOrFail($id);
        return view('admin.estudiantes.edit', compact('estudiante'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}