@extends('layouts.admin')

@section('title', 'Gestión de Préstamos')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/recursos/prestamos.css') }}">
@endsection

@section('content')
<div class="prestamos-container">
    <div class="page-header">
        <h2>Gestión de Préstamos</h2>
        <div class="actions">
            <a href="{{ route('admin.recursos.index') }}" class="btn btn-secondary">
                Volver a Recursos
            </a>
        </div>
    </div>
    
    <!-- Tabs -->
    <div class="tabs-section">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#activos">Préstamos Activos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#historial">Historial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#vencidos">Vencidos</a>
            </li>
        </ul>
    </div>
    
    <!-- Contenido de tabs -->
    <div class="tab-content">
        <!-- Contenido aquí -->
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/recursos/prestamos.js') }}"></script>
@endsection