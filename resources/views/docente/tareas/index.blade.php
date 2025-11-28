@extends('layouts.docente')

@section('title', 'Mis Tareas')

@section('css')
<link rel="stylesheet" href="{{ asset('css/docente/tareas/index.css') }}">
@endsection

@section('content')
<div class="tareas-container">
    <div class="page-header">
        <h2>Mis Tareas</h2>
        <div class="actions">
            <a href="{{ route('docente.tareas.create') }}" class="btn btn-primary">
                Nueva Tarea
            </a>
        </div>
    </div>
    
    <div class="filters-section">
        <!-- Filtros aquí -->
    </div>
    
    <div class="tareas-grid">
        <!-- Grid de tareas aquí -->
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/docente/tareas/index.js') }}"></script>
@endsection