@extends('layouts.admin')

@section('title', 'Gestión de Docentes')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/docentes/index.css') }}">
@endsection

@section('content')
<div class="docentes-container">
    <div class="page-header">
        <h2>Gestión de Docentes</h2>
        <div class="actions">
            <a href="{{ route('admin.docentes.create') }}" class="btn btn-primary">
                Nuevo Docente
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
<script src="{{ asset('js/admin/docentes/index.js') }}"></script>
@endsection