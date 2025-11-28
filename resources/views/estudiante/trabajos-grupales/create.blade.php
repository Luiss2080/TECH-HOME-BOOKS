@extends('layouts.estudiante')

@section('title', 'Crear Trabajo Grupal')

@section('css')
<link rel="stylesheet" href="{{ asset('css/estudiante/trabajos-grupales/create.css') }}">
@endsection

@section('content')
<div class="create-trabajo-grupal-container">
    <div class="page-header">
        <h2>Crear Nuevo Trabajo Grupal</h2>
        <a href="{{ route('estudiante.trabajos-grupales.index') }}" class="btn-back">
            Volver a la lista
        </a>
    </div>
    
    <div class="form-container">
        <form id="createTrabajoGrupalForm" method="POST" action="{{ route('estudiante.trabajos-grupales.store') }}">
            @csrf
            
            <!-- Información básica del trabajo -->
            <div class="form-section">
                <h3>Información del Trabajo</h3>
                <!-- Campos del formulario aquí -->
            </div>
            
            <!-- Selección de integrantes -->
            <div class="form-section">
                <h3>Integrantes del Grupo</h3>
                <!-- Selección de integrantes aquí -->
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Crear Trabajo Grupal</button>
                <button type="reset" class="btn btn-secondary">Limpiar</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/estudiante/trabajos-grupales/create.js') }}"></script>
@endsection