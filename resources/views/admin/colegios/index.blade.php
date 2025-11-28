@extends('layouts.admin')

@section('title', 'Gestión de Colegios')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/colegios/index.css') }}">
@endsection

@section('content')
<div class="colegios-container">
    <!-- Header con botones de acción -->
    <div class="page-header">
        <h2>Gestión de Colegios</h2>
        <div class="actions">
            <a href="{{ route('admin.colegios.create') }}" class="btn btn-primary">
                Nuevo Colegio
            </a>
        </div>
    </div>
    
    <!-- Filtros y búsqueda -->
    <div class="filters-section">
        <!-- Filtros aquí -->
    </div>
    
    <!-- Tabla de colegios -->
    <div class="table-section">
        <!-- Tabla aquí -->
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/colegios/index.js') }}"></script>
@endsection