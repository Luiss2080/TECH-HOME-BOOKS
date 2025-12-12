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

        $docentes = $query->paginate(10);

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