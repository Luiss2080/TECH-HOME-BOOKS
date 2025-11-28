@extends('layouts.admin')

@section('title', 'Detalles del Colegio')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/colegios/show.css') }}">
@endsection

@section('content')
<div class="show-colegio-container">
    <div class="details-header">
        <h2>Detalles del Colegio</h2>
        <div class="actions">
            <a href="{{ route('admin.colegios.edit', $colegio->id) }}" class="btn btn-warning">
                Editar
            </a>
            <a href="{{ route('admin.colegios.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
    
    <!-- Información del colegio -->
    <div class="info-section">
        <!-- Detalles aquí -->
    </div>
    
    <!-- Cursos relacionados -->
    <div class="related-section">
        <h3>Cursos Asociados</h3>
        <!-- Lista de cursos aquí -->
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/colegios/show.js') }}"></script>
@endsection