@extends('layouts.estudiante')

@section('title', 'Editar Trabajo Grupal')

@section('css')
<link rel="stylesheet" href="{{ asset('css/estudiante/trabajos-grupales/edit.css') }}">
@endsection

@section('content')
<div class="edit-trabajo-grupal-container">
    <div class="page-header">
        <h2>Editar Trabajo Grupal</h2>
        <div class="header-actions">
            <a href="{{ route('estudiante.trabajos-grupales.show', $trabajoGrupal->id) }}" class="btn-back">
                Ver Trabajo
            </a>
            <a href="{{ route('estudiante.trabajos-grupales.index') }}" class="btn-back">
                Volver a la lista
            </a>
        </div>
    </div>
    
    <div class="form-container">
        <form id="editTrabajoGrupalForm" method="POST" action="{{ route('estudiante.trabajos-grupales.update', $trabajoGrupal->id) }}">
            @csrf
            @method('PUT')
            
            <!-- Información del trabajo -->
            <div class="form-section">
                <h3>Información del Trabajo</h3>
                <!-- Campos pre-rellenados aquí -->
            </div>
            
            <!-- Integrantes del grupo -->
            <div class="form-section">
                <h3>Integrantes del Grupo</h3>
                <!-- Gestión de integrantes aquí -->
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Actualizar Trabajo</button>
                <a href="{{ route('estudiante.trabajos-grupales.show', $trabajoGrupal->id) }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/estudiante/trabajos-grupales/edit.js') }}"></script>
@endsection