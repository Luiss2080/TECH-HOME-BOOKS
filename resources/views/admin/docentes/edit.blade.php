@extends('layouts.admin')

@section('title', 'Editar Docente')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/docentes/edit.css') }}">
@endsection

@section('content')
<div class="edit-docente-container">
    <div class="form-header">
        <h2>Editar Docente</h2>
        <div class="actions">
            <a href="{{ route('admin.docentes.show', $docente->id) }}" class="btn btn-info">
                Ver Perfil
            </a>
            <a href="{{ route('admin.docentes.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
    
    <form id="editDocenteForm" class="form-section">
        <!-- Campos del formulario aquí -->
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/docentes/edit.js') }}"></script>
@endsection