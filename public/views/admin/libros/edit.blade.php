@extends('layouts.admin')

@section('title', 'Editar Libro')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/libros/edit.css') }}">
@endsection

@section('content')
<div class="edit-libro-container">
    <div class="form-header">
        <h2>Editar Libro</h2>
        <div class="actions">
            <a href="{{ route('admin.libros.show', $libro->id) }}" class="btn btn-info">
                Ver Libro
            </a>
            <a href="{{ route('admin.libros.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
    
    <form id="editLibroForm" class="form-section" enctype="multipart/form-data">
        <!-- Campos del formulario aquí -->
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/libros/edit.js') }}"></script>
@endsection