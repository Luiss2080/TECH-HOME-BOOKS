@extends('layouts.admin')

@section('title', 'Detalles del Recurso')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/recursos/show.css') }}">
@endsection

@section('content')
<div class="show-recurso-container">
    <div class="details-header">
        <h2>Detalles del Recurso</h2>
        <div class="actions">
            <a href="{{ route('admin.recursos.edit', $recurso->id) }}" class="btn btn-warning">
                Editar
            </a>
            <a href="{{ route('admin.recursos.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
    
    <!-- Información del recurso -->
    <div class="info-section">
        <!-- Detalles aquí -->
    </div>
    
    <!-- Historial de préstamos -->
    <div class="prestamos-section">
        <h3>Historial de Préstamos</h3>
        <!-- Lista de préstamos aquí -->
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/recursos/show.js') }}"></script>
@endsection