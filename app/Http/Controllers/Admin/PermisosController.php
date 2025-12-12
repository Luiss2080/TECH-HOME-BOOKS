<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermisosController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Permiso::withCount('roles');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                  ->orWhere('descripcion', 'like', "%{$search}%");
            });
        }

        if ($request->has('modulo') && $request->modulo != '') {
            $query->where('modulo', $request->modulo);
        }

        $perPage = $request->input('per_page', 10);
        $permisos = $query->orderBy('modulo')->paginate($perPage);

        // Get unique modules for filter
        $modulos = \App\Models\Permiso::select('modulo')->distinct()->pluck('modulo');

        return view('admin.permisos.index', compact('permisos', 'modulos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
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