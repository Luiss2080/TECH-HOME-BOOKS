@extends('layouts.admin')

@section('title', 'Recursos Educativos')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/recursos/index.css') }}">
@endsection

@section('content')
<div class="recursos-container">
    <div class="page-header">
        <h2>Recursos Educativos</h2>
        <div class="actions">
            <a href="{{ route('admin.recursos.create') }}" class="btn btn-primary">
                Nuevo Recurso
            </a>
            <a href="{{ route('admin.recursos.prestamos') }}" class="btn btn-info">
                Gestionar Préstamos
            </a>
        </div>
    </div>
    
    <!-- Filtros y búsqueda -->
    <div class="filters-section">
        <!-- Filtros aquí -->
    </div>
    
    <!-- Tabla de recursos -->
    <div class="table-section">
        <!-- Tabla aquí -->
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/recursos/index.js') }}"></script>
@endsection