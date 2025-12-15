<?php

namespace App\Http\Controllers\Estudiante;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{
    public function index(Request $request)
    {
        $query = Material::with(['materia', 'docente', 'curso']);

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

        // Ideally filter by student's course, but for now showing all public or relevant materials
        // $query->where('curso_destinatario', auth()->user()->curso_id); 

        $perPage = $request->input('per_page', 10);
        $materiales = $query->latest()->paginate($perPage);

        return view('estudiante.materiales.index', compact('materiales'));
    }

    public function show($id)
    {
        $material = Material::with(['materia', 'docente', 'curso'])->findOrFail($id);
        return view('estudiante.materiales.show', compact('material'));
    }

    public function descargar($id)
    {
        // Implementation for download if needed
    }
}