@extends('layouts.admin')

@section('title', 'Detalles de la Materia')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/materias/show.css') }}">
@endsection

@section('content')
<div class="show-materia-container">
    <div class="details-header">
        <h2>Detalles de la Materia</h2>
        <div class="actions">
            <a href="{{ route('admin.materias.edit', $materia->id) }}" class="btn btn-warning">
                Editar
            </a>
            <a href="{{ route('admin.materias.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
    
    <div class="info-section">
        <!-- Detalles aquí -->
    </div>
    
    <div class="related-section">
        <h3>Docentes Asignados</h3>
        <!-- Lista de docentes aquí -->
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/materias/show.js') }}"></script>
@endsection