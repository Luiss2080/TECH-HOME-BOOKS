@extends('layouts.app')

@section('title', 'Notificaciones')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shared/notificaciones/index.css') }}">
@endsection

@section('content')
<div class="notificaciones-container">
    <div class="page-header">
        <h2>Notificaciones</h2>
        <div class="header-actions">
            <button id="marcarTodasLeidas" class="btn btn-secondary">
                Marcar todas como leídas
            </button>
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="todas">Todas</button>
                <button class="filter-btn" data-filter="no-leidas">No leídas</button>
                <button class="filter-btn" data-filter="importantes">Importantes</button>
            </div>
        </div>
    </div>
    
    <!-- Lista de notificaciones -->
    <div class="notifications-list">
        <div class="notification-item unread important">
            <div class="notification-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="notification-content">
                <h4>Nueva Tarea Asignada</h4>
                <p>Se ha asignado una nueva tarea en Matemáticas</p>
                <small class="notification-time">Hace 5 minutos</small>
            </div>
            <div class="notification-actions">
                <button class="btn-mark-read">Marcar leída</button>
                <button class="btn-delete">Eliminar</button>
            </div>
        </div>
        
        <!-- Más notificaciones aquí -->
    </div>
    
    <!-- Paginación -->
    <div class="pagination-container">
        <!-- Paginación aquí -->
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/shared/notificaciones/index.js') }}"></script>
@endsection