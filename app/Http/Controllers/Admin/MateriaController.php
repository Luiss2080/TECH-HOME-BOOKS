<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Materia::with(['curso', 'docentes']);

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                  ->orWhere('codigo', 'like', "%{$search}%");
            });
        }

        if ($request->has('grado') && $request->grado != '') {
            $query->whereHas('curso', function($q) use ($request) {
                $q->where('nivel', $request->grado);
            });
        }

        $perPage = $request->input('per_page', 10);
        $materias = $query->latest()->paginate($perPage);

        return view('admin.materias.index', compact('materias'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
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