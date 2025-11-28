@extends('layouts.admin')

@section('title', 'Editar Colegio')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/colegios/edit.css') }}">
@endsection

@section('content')
<div class="edit-colegio-container">
    <div class="form-header">
        <h2>Editar Colegio</h2>
        <div class="actions">
            <a href="{{ route('admin.colegios.show', $colegio->id) }}" class="btn btn-info">
                Ver Detalles
            </a>
            <a href="{{ route('admin.colegios.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
    
    <form id="editColegioForm" class="form-section">
        <!-- Campos del formulario aquí -->
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/colegios/edit.js') }}"></script>
@endsection