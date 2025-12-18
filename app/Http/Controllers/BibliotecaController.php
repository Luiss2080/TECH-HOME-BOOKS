<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BibliotecaController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Libro::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('titulo', 'like', "%{$search}%")
                  ->orWhere('autor', 'like', "%{$search}%")
                  ->orWhere('isbn', 'like', "%{$search}%")
                  ->orWhere('editorial', 'like', "%{$search}%");
            });
        }

        if ($request->has('categoria') && $request->categoria != '') {
            $query->where('categoria', $request->categoria);
        }

        $perPage = $request->input('per_page', 10);
        $libros = $query->paginate($perPage);

        return view('docente.biblioteca.index', compact('libros'));
    }

    public function create()
    {
        return view('docente.biblioteca.create');
    }

    public function show($id)
    {
        $libro = \App\Models\Libro::findOrFail($id);
        return view('docente.biblioteca.show', compact('libro'));
    }

    public function edit($id)
    {
        $libro = \App\Models\Libro::findOrFail($id);
        return view('docente.biblioteca.edit', compact('libro'));
    }

    public function buscar(Request $request)
    {
        //
    }

    public function categoria($categoria)
    {
        //
    }

    public function recomendaciones()
    {
        //
    }
}