@extends('layouts.admin')

@section('title', 'Gestión de Materias')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/materias/index.css') }}">
@endsection

@section('content')
<div class="materias-container">
    <div class="page-header">
        <h2>Gestión de Materias</h2>
        <div class="actions">
            <a href="{{ route('admin.materias.create') }}" class="btn btn-primary">
                Nueva Materia
            </a>
        </div>
    </div>
    
    <div class="filters-section">
        <!-- Filtros aquí -->
    </div>
    
    <div class="table-section">
        <!-- Tabla aquí -->
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/materias/index.js') }}"></script>
@endsection