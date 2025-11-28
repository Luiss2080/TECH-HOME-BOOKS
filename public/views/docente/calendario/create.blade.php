@extends('layouts.docente')

@section('title', 'Crear Evento Personal')

@section('css')
<link rel="stylesheet" href="{{ asset('css/docente/calendario/create.css') }}">
@endsection

@section('content')
<div class="create-evento-docente-container">
    <div class="form-header">
        <h2>Crear Evento Personal</h2>
        <a href="{{ route('docente.calendario.index') }}" class="btn btn-secondary">
            Volver
        </a>
    </div>
    
    <form id="createEventoDocenteForm" class="form-section">
        <!-- Campos del formulario aquí -->
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/docente/calendario/create.js') }}"></script>
@endsection