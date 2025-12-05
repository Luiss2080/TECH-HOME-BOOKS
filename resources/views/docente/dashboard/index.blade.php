@extends('layouts.docente')

@section('title', 'Dashboard - Docente')

@section('css')
<link rel="stylesheet" href="{{ asset('css/docente/dashboard.css') }}">
@endsection

@section('content')
<div class="dashboard-container">
    <!-- Estadísticas del docente -->
    <div class="stats-grid">
        <!-- Estadísticas aquí -->
    </div>
    
    <!-- Tareas pendientes de calificar -->
    <div class="pending-tasks">
        <h3>Tareas Pendientes de Calificar</h3>
        <!-- Lista de tareas aquí -->
    </div>
    
    <!-- Próximos exámenes -->
    <div class="upcoming-exams">
        <h3>Próximos Exámenes</h3>
        <!-- Lista de exámenes aquí -->
    </div>
    
    <!-- Calendario de la semana -->
    <div class="weekly-calendar">
        <h3>Esta Semana</h3>
        <!-- Calendario aquí -->
    </div>
</div>
@endsection

@section('js')

@endsection