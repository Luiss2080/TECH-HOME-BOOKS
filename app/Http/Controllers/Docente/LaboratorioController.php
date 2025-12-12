<?php

namespace App\Http\Controllers\Docente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laboratorio;

class LaboratorioController extends Controller
{
    public function index(Request $request)
    {
        $query = Laboratorio::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                  ->orWhere('ubicacion', 'like', "%{$search}%")
                  ->orWhere('encargado', 'like', "%{$search}%");
            });
        }

        if ($request->has('estado') && $request->estado != '') {
            $query->where('estado', $request->estado);
        }

        $perPage = $request->input('per_page', 10);
        $laboratorios = $query->latest()->paginate($perPage);

        return view('docente.laboratorios.index', compact('laboratorios'));
    }

    public function create()
    {
        return view('docente.laboratorios.create');
    }

    public function store(Request $request)
    {
        // Validation and creation
    }

    public function show($id)
    {
        $laboratorio = Laboratorio::findOrFail($id);
        return view('docente.laboratorios.show', compact('laboratorio'));
    }

    public function edit($id)
    {
        $laboratorio = Laboratorio::findOrFail($id);
        return view('docente.laboratorios.edit', compact('laboratorio'));
    }

    public function update(Request $request, $id)
    {
        // Update logic
    }

    public function destroy($id)
    {
        // Delete logic
    }
}
