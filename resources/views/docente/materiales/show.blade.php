@extends('layouts.admin')

@section('title', 'Detalle de Material')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/docente/materiales/show.css') }}">
@endsection

@section('content')
<div class="show-material-container">
    <!-- Header -->
    <div class="panel-header">
        <div class="header-title">
            <div class="icon-wrapper">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="title-content">
                <h2>Detalles del Recurso</h2>
                <p class="subtitle">{{ $material->titulo }}</p>
            </div>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.materiales.index') }}" class="btn-secondary-action">
                <i class="fas fa-arrow-left"></i>
                <span>Volver a Lista</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="form-content">
        <!-- Left Column: File Info & Quick Stats -->
        <div class="left-column">
            <div class="form-card profile-card">
                 <div class="photo-preview-container">
                    <div class="file-icon-preview">
                        @if($material->archivo)
                            @if(Str::endsWith($material->archivo, '.pdf'))
                                <i class="fas fa-file-pdf"></i>
                            @elseif(Str::endsWith($material->archivo, ['.doc', '.docx']))
                                <i class="fas fa-file-word"></i>
                            @elseif(Str::endsWith($material->archivo, ['.jpg', '.png', '.jpeg']))
                                <i class="fas fa-file-image"></i>
                            @elseif(Str::endsWith($material->archivo, ['.mp4', '.avi']))
                                    <i class="fas fa-file-video"></i>
                            @else
                                <i class="fas fa-file"></i>
                            @endif
                        @else
                            <i class="fas fa-file-excel"></i>
                        @endif
                    </div>
                </div>
                
                @if($material->archivo)
                    <a href="{{ asset('storage/' . $material->archivo) }}" target="_blank" class="btn-download">
                        <i class="fas fa-download"></i>
                        Descargar Archivo
                    </a>
                @else
                    <button disabled class="btn-download" style="opacity: 0.5; cursor: not-allowed;">
                        <i class="fas fa-ban"></i>
                        Sin Archivo
                    </button>
                @endif

                <!-- Quick Stats -->
                <div class="info-list">
                    <div class="info-item">
                        <span class="info-label">Estado</span>
                        <span class="info-value" style="color: {{ $material->estado == 'publicado' ? '#4ade80' : '#f87171' }};">
                            {{ ucfirst($material->estado ?? 'borrador') }}
                        </span>
                    </div>
                     <div class="info-item">
                        <span class="info-label">Tipo</span>
                        <span class="info-value">{{ $material->tipo }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Data -->
        <div class="right-column">
            
            <!-- Card 1: Details -->
            <div class="form-card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-info-circle"></i>
                        Información Detallada
                    </h3>
                </div>

                <div class="form-grid">
                    <div class="form-group span-4">
                        <label>Título del Material</label>
                        <div class="input-wrapper">
                            <i class="fas fa-heading"></i>
                            <input type="text" class="form-input" value="{{ $material->titulo }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Publicado El</label>
                        <div class="input-wrapper">
                            <i class="fas fa-calendar-alt"></i>
                            <input type="text" class="form-input" value="{{ $material->fecha_publicacion ? $material->fecha_publicacion->format('d/m/Y') : 'Pendiente' }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Etiquetas</label>
                        <div class="input-wrapper">
                            <i class="fas fa-tags"></i>
                            <input type="text" class="form-input" value="{{ is_array($material->etiquetas) ? implode(', ', $material->etiquetas) : $material->etiquetas }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-4">
                        <label>Descripción</label>
                        <div class="input-wrapper">
                            <i class="fas fa-align-left" style="top: 1rem;"></i>
                            <textarea class="form-textarea" readonly>{{ $material->descripcion }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Card 2: Assignment Info -->
            <div class="form-card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-users"></i>
                        Asignación Académica
                    </h3>
                </div>

                <div class="form-grid">
                    <div class="form-group span-2">
                        <label>Materia</label>
                        <div class="input-wrapper">
                            <i class="fas fa-book"></i>
                            <input type="text" class="form-input" value="{{ $material->materia->nombre ?? 'Sin Materia' }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Curso Destinatario</label>
                        <div class="input-wrapper">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <input type="text" class="form-input" value="{{ optional($material->curso)->nombre . ' - ' . optional($material->curso)->nivel ?? 'Sin Curso' }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.materiales.edit', $material->id) }}" class="btn-edit-action">
                        <i class="fas fa-edit"></i>
                        <span>Editar Material</span>
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/docente/materiales/show.js') }}"></script>
@endsection
