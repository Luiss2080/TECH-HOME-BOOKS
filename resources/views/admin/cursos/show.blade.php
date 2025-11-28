@extends('layouts.admin')

@section('title', 'Detalles del Curso')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/cursos/show.css') }}">
@endsection

@section('content')
<div class="show-curso-container">
    <div class="details-header">
        <h2>Detalles del Curso</h2>
        <div class="actions">
            <a href="{{ route('admin.cursos.edit', $curso->id) }}" class="btn btn-warning">
                Editar
            </a>
            <a href="{{ route('admin.cursos.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
    
    <!-- Información del curso -->
    <div class="info-section">
        <!-- Detalles aquí -->
    </div>
    
    <!-- Materias relacionadas -->
    <div class="related-section">
        <h3>Materias del Curso</h3>
        <!-- Lista de materias aquí -->
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/cursos/show.js') }}"></script>
@endsection