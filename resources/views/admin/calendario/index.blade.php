@extends('layouts.admin')

@section('title', 'Calendario Académico')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/calendario/index.css') }}">
@endsection

@section('content')
<div class="calendario-container">
    <div class="page-header">
        <h2>Calendario Académico</h2>
        <div class="actions">
            <a href="{{ route('admin.calendario.create') }}" class="btn btn-primary">
                Nuevo Evento
            </a>
        </div>
    </div>
    
    <!-- Vista de calendario -->
    <div class="calendar-section">
        <div id="calendar"></div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/calendario/index.js') }}"></script>
@endsection