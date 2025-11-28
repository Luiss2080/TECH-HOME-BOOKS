@extends('layouts.admin')

@section('title', 'Crear Curso')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/cursos/create.css') }}">
@endsection

@section('content')
<div class="create-curso-container">
    <div class="form-header">
        <h2>Crear Nuevo Curso</h2>
        <a href="{{ route('admin.cursos.index') }}" class="btn btn-secondary">
            Volver
        </a>
    </div>
    
    <form id="createCursoForm" class="form-section">
        <!-- Campos del formulario aquí -->
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/cursos/create.js') }}"></script>
@endsection