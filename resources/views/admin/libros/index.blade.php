@extends('layouts.admin')

@section('title', 'Gestión de Libros')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/libros/index.css') }}">
@endsection

@section('content')
<div class="libros-container">
    <div class="page-header">
        <h2>Gestión de Libros</h2>
        <div class="actions">
            <a href="{{ route('admin.libros.create') }}" class="btn btn-primary">
                Nuevo Libro
            </a>
            <a href="{{ route('admin.libros.categorias') }}" class="btn btn-info">
                Categorías
            </a>
        </div>
    </div>
    
    <div class="filters-section">
        <!-- Filtros aquí -->
    </div>
    
    <div class="books-grid">
        <!-- Grid de libros aquí -->
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/libros/index.js') }}"></script>
@endsection