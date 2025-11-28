@extends('layouts.admin')

@section('title', 'Crear Recurso')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/recursos/create.css') }}">
@endsection

@section('content')
<div class="create-recurso-container">
    <div class="form-header">
        <h2>Crear Nuevo Recurso</h2>
        <a href="{{ route('admin.recursos.index') }}" class="btn btn-secondary">
            Volver
        </a>
    </div>
    
    <form id="createRecursoForm" class="form-section">
        <!-- Campos del formulario aquí -->
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/recursos/create.js') }}"></script>
@endsection