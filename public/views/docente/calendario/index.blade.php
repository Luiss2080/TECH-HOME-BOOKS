@extends('layouts.docente')

@section('title', 'Mi Calendario')

@section('css')
<link rel="stylesheet" href="{{ asset('css/docente/calendario/index.css') }}">
@endsection

@section('content')
<div class="calendario-docente-container">
    <div class="page-header">
        <h2>Mi Calendario</h2>
        <div class="actions">
            <a href="{{ route('docente.calendario.create') }}" class="btn btn-primary">
                Nuevo Evento
            </a>
        </div>
    </div>
    
    <!-- Vista de calendario -->
    <div class="calendar-section">
        <div id="calendar"></div>
    </div>
    
    <!-- Próximos eventos -->
    <div class="upcoming-events">
        <h3>Próximos Eventos</h3>
        <!-- Lista de eventos aquí -->
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/docente/calendario/index.js') }}"></script>
@endsection