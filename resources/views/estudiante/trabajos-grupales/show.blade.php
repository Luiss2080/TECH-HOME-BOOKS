@extends('layouts.estudiante')

@section('title', 'Detalles del Trabajo Grupal')

@section('css')
<link rel="stylesheet" href="{{ asset('css/estudiante/trabajos-grupales/show.css') }}">
@endsection

@section('content')
<div class="trabajo-grupal-details-container">
    <div class="work-header">
        <h2>{{ $trabajoGrupal->titulo ?? 'Trabajo Grupal' }}</h2>
        <div class="work-status">
            <span class="status-badge status-{{ $trabajoGrupal->estado ?? 'activo' }}">
                {{ ucfirst($trabajoGrupal->estado ?? 'Activo') }}
            </span>
        </div>
    </div>
    
    <!-- Información del trabajo -->
    <div class="work-info">
        <div class="info-section">
            <h3>Información del Trabajo</h3>
            <!-- Detalles del trabajo aquí -->
        </div>
        
        <div class="info-section">
            <h3>Integrantes del Grupo</h3>
            <!-- Lista de integrantes aquí -->
        </div>
    </div>
    
    <!-- Tareas del trabajo -->
    <div class="tasks-section">
        <h3>Tareas del Trabajo</h3>
        <!-- Lista de tareas asignadas -->
    </div>
    
    <!-- Entregas y avances -->
    <div class="progress-section">
        <h3>Avance del Trabajo</h3>
        <!-- Progreso y entregas aquí -->
    </div>
    
    <!-- Chat del grupo -->
    <div class="group-chat-section">
        <h3>Chat del Grupo</h3>
        <!-- Sistema de chat simple aquí -->
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/estudiante/trabajos-grupales/show.js') }}"></script>
@endsection