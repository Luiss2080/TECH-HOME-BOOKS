@extends('layouts.admin')

@section('title', 'Perfil del Estudiante')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/estudiantes/show.css') }}">
@endsection

@section('content')
<div class="show-estudiante-container">
    <div class="profile-header">
        <h2>Perfil del Estudiante</h2>
        <div class="actions">
            <a href="{{ route('admin.estudiantes.edit', $estudiante->id) }}" class="btn btn-warning">
                Editar
            </a>
            <a href="{{ route('admin.estudiantes.calificaciones', $estudiante->id) }}" class="btn btn-info">
                Ver Calificaciones
            </a>
            <a href="{{ route('admin.estudiantes.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
    
    <div class="profile-content">
        <div class="student-info">
            <!-- Información del estudiante -->
        </div>
        
        <div class="academic-info">
            <!-- Información académica -->
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/estudiantes/show.js') }}"></script>
@endsection