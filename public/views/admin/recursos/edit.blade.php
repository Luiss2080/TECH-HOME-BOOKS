@extends('layouts.admin')

@section('title', 'Editar Recurso')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/recursos/edit.css') }}">
@endsection

@section('content')
<div class="edit-recurso-container">
    <div class="form-header">
        <h2>Editar Recurso</h2>
        <div class="actions">
            <a href="{{ route('admin.recursos.show', $recurso->id) }}" class="btn btn-info">
                Ver Detalles
            </a>
            <a href="{{ route('admin.recursos.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
    
    <form id="editRecursoForm" class="form-section">
        <!-- Campos del formulario aquí -->
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/recursos/edit.js') }}"></script>
@endsection