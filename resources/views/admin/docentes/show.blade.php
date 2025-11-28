@extends('layouts.admin')

@section('title', 'Perfil del Docente')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/docentes/show.css') }}">
@endsection

@section('content')
<div class="show-docente-container">
    <div class="profile-header">
        <h2>Perfil del Docente</h2>
        <div class="actions">
            <a href="{{ route('admin.docentes.edit', $docente->id) }}" class="btn btn-warning">
                Editar
            </a>
            <a href="{{ route('admin.docentes.materias', $docente->id) }}" class="btn btn-info">
                Ver Materias
            </a>
            <a href="{{ route('admin.docentes.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
    
    <div class="profile-content">
        <div class="teacher-info">
            <!-- Información del docente -->
        </div>
        
        <div class="academic-assignments">
            <!-- Asignaciones académicas -->
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/docentes/show.js') }}"></script>
@endsection