@extends('layouts.estudiante')

@section('title', 'Trabajos Grupales')

@section('css')
<link rel="stylesheet" href="{{ asset('css/estudiante/trabajos-grupales/index.css') }}">
@endsection

@section('content')
<div class="trabajos-grupales-container">
    <div class="page-header">
        <h2>Mis Trabajos Grupales</h2>
        <div class="header-actions">
            <!-- Filtros y búsqueda -->
        </div>
    </div>
    
    <!-- Trabajos activos -->
    <div class="trabajos-activos-section">
        <h3>Trabajos Activos</h3>
        <div class="trabajos-grid">
            <!-- Lista de trabajos grupales activos -->
        </div>
    </div>
    
    <!-- Trabajos completados -->
    <div class="trabajos-completados-section">
        <h3>Trabajos Completados</h3>
        <div class="trabajos-grid">
            <!-- Lista de trabajos grupales completados -->
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/estudiante/trabajos-grupales/index.js') }}"></script>
@endsection