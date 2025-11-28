@extends('layouts.app')

@section('title', 'Detalles de Notificación')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shared/notificaciones/show.css') }}">
@endsection

@section('content')
<div class="notificacion-details-container">
    <div class="page-header">
        <a href="{{ route('notificaciones.index') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Volver a notificaciones
        </a>
        <div class="notification-status">
            @if(!$notificacion->leida)
                <span class="status-badge unread">No leída</span>
            @endif
            @if($notificacion->importante)
                <span class="status-badge important">Importante</span>
            @endif
        </div>
    </div>
    
    <div class="notification-detail">
        <div class="notification-header">
            <div class="notification-icon {{ $notificacion->tipo ?? 'info' }}">
                <i class="fas fa-{{ $notificacion->icon ?? 'info-circle' }}"></i>
            </div>
            <div class="notification-meta">
                <h2>{{ $notificacion->titulo ?? 'Notificación' }}</h2>
                <p class="notification-date">
                    {{ $notificacion->created_at ? $notificacion->created_at->format('d/m/Y H:i') : 'Fecha no disponible' }}
                </p>
            </div>
        </div>
        
        <div class="notification-body">
            <div class="notification-content">
                {!! $notificacion->contenido ?? 'Contenido no disponible' !!}
            </div>
            
            @if($notificacion->enlace)
            <div class="notification-actions">
                <a href="{{ $notificacion->enlace }}" class="btn btn-primary">
                    Ver detalles
                </a>
            </div>
            @endif
        </div>
        
        <!-- Información adicional -->
        @if($notificacion->datos_adicionales)
        <div class="additional-info">
            <h4>Información adicional</h4>
            <div class="info-content">
                {!! $notificacion->datos_adicionales !!}
            </div>
        </div>
        @endif
    </div>
    
    <!-- Acciones -->
    <div class="notification-footer-actions">
        @if(!$notificacion->leida)
        <form method="POST" action="{{ route('notificaciones.marcar-leida', $notificacion->id) }}">
            @csrf
            <button type="submit" class="btn btn-secondary">
                Marcar como leída
            </button>
        </form>
        @endif
        
        <form method="POST" action="{{ route('notificaciones.destroy', $notificacion->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta notificación?')">
                Eliminar
            </button>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/shared/notificaciones/show.js') }}"></script>
@endsection