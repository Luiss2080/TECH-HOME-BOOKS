@extends('layouts.admin')

@section('title', 'Detalles del Libro')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/libros/show.css') }}">
@endsection

@section('content')
<div class="show-libro-container">
    <div class="book-header">
        <h2>{{ $libro->titulo }}</h2>
        <div class="actions">
            <a href="{{ route('admin.libros.edit', $libro->id) }}" class="btn btn-warning">
                Editar
            </a>
            <a href="{{ route('admin.libros.preview', $libro->id) }}" class="btn btn-info" target="_blank">
                Vista Previa
            </a>
            <a href="{{ route('admin.libros.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
    
    <div class="book-content">
        <div class="book-cover">
            <!-- Portada del libro -->
        </div>
        
        <div class="book-details">
            <!-- Detalles del libro -->
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/libros/show.js') }}"></script>
@endsection