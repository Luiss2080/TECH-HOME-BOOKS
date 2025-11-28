@extends('layouts.admin')

@section('title', 'Gestión de Estudiantes')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/estudiantes/index.css') }}">
@endsection

@section('content')
<div class="estudiantes-container">
    <div class="page-header">
        <h2>Gestión de Estudiantes</h2>
        <div class="actions">
            <a href="{{ route('admin.estudiantes.create') }}" class="btn btn-primary">
                Nuevo Estudiante
            </a>
            <a href="{{ route('admin.estudiantes.import') }}" class="btn btn-success">
                Importar Excel
            </a>
        </div>
    </div>
    
    <div class="filters-section">
        <!-- Filtros aquí -->
    </div>
    
    <div class="table-section">
        <!-- Tabla aquí -->
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/estudiantes/index.js') }}"></script>
@endsection