@extends('layouts.admin')

@section('title', 'Editar Estudiante')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/estudiantes/edit.css') }}">
@endsection

@section('content')
<div class="edit-estudiante-container">
    <div class="form-header">
        <h2>Editar Estudiante</h2>
        <div class="actions">
            <a href="{{ route('admin.estudiantes.show', $estudiante->id) }}" class="btn btn-info">
                Ver Perfil
            </a>
            <a href="{{ route('admin.estudiantes.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
    
    <form id="editEstudianteForm" class="form-section">
        <!-- Campos del formulario aquí -->
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/estudiantes/edit.js') }}"></script>
@endsection