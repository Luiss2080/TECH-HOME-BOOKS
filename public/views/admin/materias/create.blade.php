@extends('layouts.admin')

@section('title', 'Crear Materia')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/materias/create.css') }}">
@endsection

@section('content')
<div class="create-materia-container">
    <div class="form-header">
        <h2>Crear Nueva Materia</h2>
        <a href="{{ route('admin.materias.index') }}" class="btn btn-secondary">
            Volver
        </a>
    </div>
    
    <form id="createMateriaForm" class="form-section">
        <!-- Campos del formulario aquí -->
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/materias/create.js') }}"></script>
@endsection