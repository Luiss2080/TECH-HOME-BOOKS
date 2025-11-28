@extends('layouts.estudiante')

@section('title', 'Mi Calendario')

@section('css')
<link rel="stylesheet" href="{{ asset('css/estudiante/calendario/index.css') }}">
@endsection

@section('content')
<div class="calendario-estudiante-container">
    <div class="page-header">
        <h2>Mi Calendario Académico</h2>
        <div class="calendar-controls">
            <select id="vistaCalendario" class="form-control">
                <option value="mes">Vista Mensual</option>
                <option value="semana">Vista Semanal</option>
                <option value="dia">Vista Diaria</option>
            </select>
            <button id="hoyBtn" class="btn btn-secondary">Hoy</button>
        </div>
    </div>
    
    <!-- Navegación de fechas -->
    <div class="calendar-navigation">
        <button id="anteriorBtn" class="nav-btn">&lt;</button>
        <h3 id="fechaActual">Enero 2024</h3>
        <button id="siguienteBtn" class="nav-btn">&gt;</button>
    </div>
    
    <!-- Filtros de eventos -->
    <div class="event-filters">
        <div class="filter-group">
            <label><input type="checkbox" checked> Clases</label>
            <label><input type="checkbox" checked> Tareas</label>
            <label><input type="checkbox" checked> Exámenes</label>
            <label><input type="checkbox" checked> Proyectos</label>
            <label><input type="checkbox" checked> Eventos</label>
        </div>
    </div>
    
    <!-- Calendario principal -->
    <div class="calendar-container">
        <div id="calendarioEstudiante" class="calendar-grid">
            <!-- El calendario se generará aquí dinámicamente -->
        </div>
    </div>
    
    <!-- Panel lateral de eventos -->
    <div class="events-sidebar">
        <h4>Próximos Eventos</h4>
        <div id="proximosEventos" class="events-list">
            <!-- Lista de próximos eventos -->
        </div>
    </div>
</div>

<!-- Modal para detalles de evento -->
<div id="eventoModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="eventoDetalles">
            <!-- Detalles del evento seleccionado -->
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/estudiante/calendario/index.js') }}"></script>
@endsection