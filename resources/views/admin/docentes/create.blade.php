@extends('layouts.admin')

@section('title', 'Crear Docente')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/docentes/create.css') }}">
@endsection

@section('content')
<div class="create-docente-container">
    <div class="form-header">
        <h2>Crear Nuevo Docente</h2>
        <a href="{{ route('admin.docentes.index') }}" class="btn btn-secondary">
            Volver
        </a>
    </div>
    
    <form id="createDocenteForm" class="form-section">
        <!-- Campos del formulario aquí -->
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/docentes/create.js') }}"></script>
@endsection