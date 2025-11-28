@extends('layouts.admin')

@section('title', 'Agregar Libro')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/libros/create.css') }}">
@endsection

@section('content')
<div class="create-libro-container">
    <div class="form-header">
        <h2>Agregar Nuevo Libro</h2>
        <a href="{{ route('admin.libros.index') }}" class="btn btn-secondary">
            Volver
        </a>
    </div>
    
    <form id="createLibroForm" class="form-section" enctype="multipart/form-data">
        <!-- Campos del formulario aquí -->
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/libros/create.js') }}"></script>
@endsection