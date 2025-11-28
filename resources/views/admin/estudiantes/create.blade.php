@extends('layouts.admin')

@section('title', 'Crear Estudiante')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/estudiantes/create.css') }}">
@endsection

@section('content')
<div class="create-estudiante-container">
    <div class="form-header">
        <h2>Crear Nuevo Estudiante</h2>
        <a href="{{ route('admin.estudiantes.index') }}" class="btn btn-secondary">
            Volver
        </a>
    </div>
    
    <form id="createEstudianteForm" class="form-section">
        <!-- Campos del formulario aquí -->
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/estudiantes/create.js') }}"></script>
@endsection