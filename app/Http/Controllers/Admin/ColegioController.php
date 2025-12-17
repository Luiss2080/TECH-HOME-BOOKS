<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ColegioController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Colegio::withCount(['cursos', 'estudiantes']);

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                  ->orWhere('director', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->has('estado') && $request->estado != '') {
            $query->where('estado', $request->estado);
        }

        $perPage = $request->input('per_page', 10);
        $colegios = $query->latest()->paginate($perPage);

        return view('admin.colegios.index', compact('colegios'));
    }

    public function create()
    {
        return view('admin.colegios.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $colegio = \App\Models\Colegio::findOrFail($id);
        return view('admin.colegios.show', compact('colegio'));
    }

    public function edit($id)
    {
        $colegio = \App\Models\Colegio::findOrFail($id);
        return view('admin.colegios.edit', compact('colegio'));
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