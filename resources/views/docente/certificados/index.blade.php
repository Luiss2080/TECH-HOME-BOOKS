@extends('layouts.docente')

@section('title', 'Gestión de Certificados')

@section('css')
<link rel="stylesheet" href="{{ asset('css/docente/certificados/index.css') }}">
@endsection

@section('content')
<div class="certificados-docente-container">
    <div class="page-header">
        <h2>Gestión de Certificados</h2>
        <div class="actions">
            <a href="{{ route('docente.certificados.generar') }}" class="btn btn-primary">
                Generar Certificado
            </a>
        </div>
    </div>
    
    <!-- Filtros -->
    <div class="filters-section">
        <!-- Filtros por curso, estudiante, tipo -->
    </div>
    
    <!-- Lista de certificados -->
    <div class="certificados-list">
        <!-- Lista aquí -->
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/docente/certificados/index.js') }}"></script>
@endsection