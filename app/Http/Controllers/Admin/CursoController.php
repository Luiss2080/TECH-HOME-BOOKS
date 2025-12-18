<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    public function index(Request $request)
    {
        $query = Curso::withCount('estudiantes');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                  ->orWhere('nivel', 'like', "%{$search}%")
                  ->orWhere('seccion', 'like', "%{$search}%")
                  ->orWhere('aula', 'like', "%{$search}%");
            });
        }

        if ($request->has('nivel') && $request->nivel != '') {
            $query->where('nivel', $request->nivel);
        }

        $perPage = $request->input('per_page', 10);
        $cursos = $query->paginate($perPage);

        return view('admin.cursos.index', compact('cursos'));
    }

    public function create()
    {
        $colegios = \App\Models\Colegio::where('estado', 'activo')->get();
        return view('admin.cursos.create', compact('colegios'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $curso = Curso::with('colegio')->findOrFail($id);
        return view('admin.cursos.show', compact('curso'));
    }

    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        $colegios = \App\Models\Colegio::where('estado', 'activo')->get();
        return view('admin.cursos.edit', compact('curso', 'colegios'));
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