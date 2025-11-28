@extends('layouts.admin')

@section('title', 'Editar Materia')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/materias/edit.css') }}">
@endsection

@section('content')
<div class="edit-materia-container">
    <div class="form-header">
        <h2>Editar Materia</h2>
        <div class="actions">
            <a href="{{ route('admin.materias.show', $materia->id) }}" class="btn btn-info">
                Ver Detalles
            </a>
            <a href="{{ route('admin.materias.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
    
    <form id="editMateriaForm" class="form-section">
        <!-- Campos del formulario aquí -->
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/materias/edit.js') }}"></script>
@endsection