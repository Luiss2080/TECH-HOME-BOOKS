@extends('layouts.admin')

@section('title', 'Detalle de Libro')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/docente/biblioteca/show.css') }}">
@endsection

@section('content')
<div class="show-libro-container">
    <!-- Header -->
    <div class="panel-header">
        <div class="header-title">
            <div class="icon-wrapper">
                <i class="fas fa-book"></i>
            </div>
            <div class="title-content">
                <h2>Detalles del Libro</h2>
                <p class="subtitle">{{ $libro->titulo }}</p>
            </div>
        </div>
        <div class="header-actions">
            <a href="{{ route('libros.index') }}" class="btn-secondary-action">
                <i class="fas fa-arrow-left"></i>
                <span>Volver a la Biblioteca</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="form-content">
        <!-- Left Column: Portada & Quick Stats -->
        <div class="left-column">
            <div class="form-card profile-card">
                 <div class="photo-preview-container">
                    @if($libro->portada)
                        <img src="{{ asset('storage/' . $libro->portada) }}" alt="Portada" class="photo-preview">
                    @else
                        <div class="photo-placeholder">
                            <i class="fas fa-book-open"></i>
                        </div>
                    @endif
                </div>
                
                <h3 style="color: white; margin-top: 1rem; text-align: center;">{{ $libro->categoria ?? 'Sin Categoría' }}</h3>
                <span style="color: var(--text-muted); text-align: center;">{{ $libro->isbn ?? 'Sin ISBN' }}</span>
                
                @if($libro->archivo_pdf)
                    <a href="{{ asset('storage/' . $libro->archivo_pdf) }}" target="_blank" class="btn-download">
                        <i class="fas fa-file-pdf"></i>
                        Descargar PDF
                    </a>
                @endif

                <!-- Quick Stats -->
                <div class="info-list">
                    <div class="info-item">
                        <span class="info-label">Estado</span>
                        <span class="info-value" style="color: {{ $libro->estado == 'disponible' ? '#4ade80' : '#f87171' }};">
                            {{ ucfirst($libro->estado ?? 'disponible') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Data -->
        <div class="right-column">
            
            <!-- Card 1: Book Info -->
            <div class="form-card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-info-circle"></i>
                        Información Detallada
                    </h3>
                </div>

                <div class="form-grid">
                    <div class="form-group span-4">
                        <label>Título de la Obra</label>
                        <div class="input-wrapper">
                            <i class="fas fa-heading"></i>
                            <input type="text" class="form-input" value="{{ $libro->titulo }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Autor(es)</label>
                        <div class="input-wrapper">
                            <i class="fas fa-pen-nib"></i>
                            <input type="text" class="form-input" value="{{ $libro->autor }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Editorial</label>
                        <div class="input-wrapper">
                            <i class="fas fa-building"></i>
                            <input type="text" class="form-input" value="{{ $libro->editorial ?? '-' }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Nivel Educativo</label>
                        <div class="input-wrapper">
                            <i class="fas fa-graduation-cap"></i>
                            <input type="text" class="form-input" value="{{ $libro->nivel_educativo ?? '-' }}" readonly>
                        </div>
                    </div>

                     <div class="form-group span-2">
                        <label>Fecha de Publicación</label>
                        <div class="input-wrapper">
                            <i class="fas fa-calendar-alt"></i>
                            <input type="text" class="form-input" value="{{ $libro->fecha_publicacion ? $libro->fecha_publicacion->format('d/m/Y') : '-' }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-4">
                        <label>Descripción</label>
                        <div class="input-wrapper">
                            <i class="fas fa-align-left" style="top: 1rem;"></i>
                            <textarea class="form-textarea" readonly>{{ $libro->descripcion }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Card 2: Inventory Info -->
            <div class="form-card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-boxes"></i>
                        Inventario
                    </h3>
                </div>

                <div class="form-grid">
                    <div class="form-group span-2">
                        <label>Stock Disponible</label>
                        <div class="input-wrapper">
                            <i class="fas fa-layer-group"></i>
                            <input type="text" class="form-input" value="{{ $libro->disponibilidad ?? 0 }} Unidades" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Categoría</label>
                        <div class="input-wrapper">
                            <i class="fas fa-bookmark"></i>
                            <input type="text" class="form-input" value="{{ $libro->categoria ?? '-' }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('libros.edit', $libro->id) }}" class="btn-edit-action">
                        <i class="fas fa-edit"></i>
                        <span>Editar Libro</span>
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/docente/biblioteca/show.js') }}"></script>
@endsection
