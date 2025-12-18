<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index(Request $request)
    {
        $query = Docente::with('user');

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('apellido', 'like', "%{$search}%")
                  ->orWhere('ci', 'like', "%{$search}%");
            })
            ->orWhere('codigo_docente', 'like', "%{$search}%")
            ->orWhere('especialidad', 'like', "%{$search}%");
        }

        $perPage = $request->input('per_page', 10);
        $docentes = $query->paginate($perPage);

        return view('admin.docentes.index', compact('docentes'));
    }

    public function create()
    {
        return view('admin.docentes.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $docente = Docente::with('user')->findOrFail($id);
        return view('admin.docentes.show', compact('docente'));
    }

    public function edit($id)
    {
        $docente = Docente::with('user')->findOrFail($id);
        return view('admin.docentes.edit', compact('docente'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $docente = Docente::findOrFail($id);
        $user = $docente->user;
        
        $docente->delete();
        if ($user) {
            $user->delete();
        }

        return redirect()->route('admin.docentes.index')->with('success', 'Docente eliminado correctamente.');
    }
}