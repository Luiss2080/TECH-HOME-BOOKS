@extends('layouts.admin')

@section('title', 'Editar Curso')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/cursos/edit.css') }}">
@endsection

@section('content')
<div class="edit-curso-container">
    <div class="form-header">
        <h2>Editar Curso</h2>
        <div class="actions">
            <a href="{{ route('admin.cursos.show', $curso->id) }}" class="btn btn-info">
                Ver Detalles
            </a>
            <a href="{{ route('admin.cursos.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
    
    <form id="editCursoForm" class="form-section">
        <!-- Campos del formulario aquí -->
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/cursos/edit.js') }}"></script>
@endsection