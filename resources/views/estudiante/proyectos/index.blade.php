@extends('layouts.estudiante')

@section('title', 'Mis Proyectos')

@section('css')
<link rel="stylesheet" href="{{ asset('css/estudiante/proyectos/index.css') }}">
@endsection

@section('content')
<div class="proyectos-estudiante-container">
    <div class="page-header">
        <h2>Mis Proyectos</h2>
    </div>
    
    <!-- Filtros -->
    <div class="filters-section">
        <div class="tabs">
            <button class="tab-btn active" data-tab="todos">Todos</button>
            <button class="tab-btn" data-tab="pendientes">Pendientes</button>
            <button class="tab-btn" data-tab="entregados">Entregados</button>
            <button class="tab-btn" data-tab="calificados">Calificados</button>
        </div>
    </div>
    
    <!-- Lista de proyectos -->
    <div class="proyectos-grid">
        <!-- Tarjetas de proyectos aquí -->
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/estudiante/proyectos/index.js') }}"></script>
@endsection