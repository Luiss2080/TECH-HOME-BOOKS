@extends('layouts.admin')

@section('title', 'Crear Colegio')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/colegios/create.css') }}">
@endsection

@section('content')
<div class="create-colegio-container">
    <div class="form-header">
        <h2>Crear Nuevo Colegio</h2>
        <a href="{{ route('admin.colegios.index') }}" class="btn btn-secondary">
            Volver
        </a>
    </div>
    
    <form id="createColegioForm" class="form-section">
        <!-- Campos del formulario aquí -->
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/colegios/create.js') }}"></script>
@endsection