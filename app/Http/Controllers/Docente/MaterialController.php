<?php

namespace App\Http\Controllers\Docente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Material::with(['materia', 'docente', 'curso']);

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('titulo', 'like', "%{$search}%")
                  ->orWhere('descripcion', 'like', "%{$search}%")
                  ->orWhereHas('materia', function($q) use ($search) {
                      $q->where('nombre', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->has('tipo') && $request->tipo != '') {
            $query->where('tipo', $request->tipo);
        }

        $perPage = $request->input('per_page', 10);
        $materiales = $query->latest()->paginate($perPage);

        return view('docente.materiales.index', compact('materiales'));
    }

    public function create()
    {
        $materias = \App\Models\Materia::orderBy('nombre')->get();
        $cursos = \App\Models\Curso::orderBy('nombre')->get();
        return view('docente.materiales.create', compact('materias', 'cursos'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $material = \App\Models\Material::with(['materia', 'curso', 'docente'])->findOrFail($id);
        return view('docente.materiales.show', compact('material'));
    }

    public function edit($id)
    {
        $material = \App\Models\Material::findOrFail($id);
        $materias = \App\Models\Materia::orderBy('nombre')->get();
        $cursos = \App\Models\Curso::orderBy('nombre')->get();
        return view('docente.materiales.edit', compact('material', 'materias', 'cursos'));
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