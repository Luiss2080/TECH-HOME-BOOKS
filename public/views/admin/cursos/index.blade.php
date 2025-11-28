@extends('layouts.admin')

@section('title', 'Gestión de Cursos')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/cursos/index.css') }}">
@endsection

@section('content')
<div class="cursos-container">
    <!-- Header con botones de acción -->
    <div class="page-header">
        <h2>Gestión de Cursos</h2>
        <div class="actions">
            <a href="{{ route('admin.cursos.create') }}" class="btn btn-primary">
                Nuevo Curso
            </a>
        </div>
    </div>
    
    <!-- Filtros y búsqueda -->
    <div class="filters-section">
        <!-- Filtros aquí -->
    </div>
    
    <!-- Tabla de cursos -->
    <div class="table-section">
        <!-- Tabla aquí -->
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/cursos/index.js') }}"></script>
@endsection