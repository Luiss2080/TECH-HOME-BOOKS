@extends('layouts.estudiante')

@section('title', 'Detalles del Proyecto')

@section('css')
<link rel="stylesheet" href="{{ asset('css/estudiante/proyectos/show.css') }}">
@endsection

@section('content')
<div class="proyecto-details-container">
    <div class="project-header">
        <h2>{{ $proyecto->titulo ?? 'Proyecto' }}</h2>
        <div class="project-status">
            <span class="status-badge status-{{ $proyecto->estado ?? 'pendiente' }}">
                {{ ucfirst($proyecto->estado ?? 'Pendiente') }}
            </span>
        </div>
    </div>
    
    <!-- Información del proyecto -->
    <div class="project-info">
        <!-- Detalles del proyecto aquí -->
    </div>
    
    <!-- Entregas -->
    <div class="entregas-section">
        <h3>Mis Entregas</h3>
        <!-- Lista de entregas aquí -->
    </div>
    
    <!-- Formulario de entrega -->
    <div class="entrega-form-section">
        <h3>Nueva Entrega</h3>
        <form id="entregaProyectoForm">
            <!-- Formulario de entrega aquí -->
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/estudiante/proyectos/show.js') }}"></script>
@endsection