@extends('layouts.admin')

@section('title', 'Editar Material')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/docente/materiales/edit.css') }}">
@endsection

@section('content')
<div class="edit-material-container">
    <!-- Header -->
    <div class="panel-header">
        <div class="header-title">
            <div class="icon-wrapper">
                <i class="fas fa-edit"></i>
            </div>
            <div class="title-content">
                <h2>Editar Material</h2>
                <p class="subtitle">Actualizar información del recurso</p>
            </div>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.materiales.index') }}" class="btn-secondary-action">
                <i class="fas fa-arrow-left"></i>
                <span>Volver a Lista</span>
            </a>
        </div>
    </div>

    <!-- Main Form -->
    <form action="{{ route('admin.materiales.update', $material->id) }}" method="POST" enctype="multipart/form-data" id="editMaterialForm">
        @csrf
        @method('PUT')
        
        <div class="form-content">
            <!-- Left Column: File & Help -->
            <div class="left-column">
                <!-- File Upload Card -->
                <div class="form-card profile-card">
                    <div class="photo-preview-container">
                         @if($material->archivo)
                             <div class="file-icon-preview">
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
                            </div>
                        @else
                            <div class="photo-placeholder">
                                <div class="file-icon-preview">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                            </div>
                        @endif
                    </div>
                    
                    <div class="photo-upload-btn-wrapper">
                        <button type="button" class="btn-upload-photo">
                            <i class="fas fa-file-upload"></i>
                            Cambiar Archivo
                        </button>
                        <input type="file" name="archivo" id="archivo" class="file-input">
                    </div>
                    <p class="photo-help-text">Deje vacío para mantener el actual.</p>
                </div>

                <!-- Help/Status Cards -->
                <div class="help-section-container">
                    <div class="help-cards-list">
                         <div class="help-card-item">
                            <div class="help-icon">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <div class="help-text">
                                <h4>Estado Actual</h4>
                                <p>{{ ucfirst($material->estado ?? 'publicado') }}</p>
                            </div>
                        </div>
                        <div class="help-card-item">
                            <div class="help-icon">
                                <i class="fas fa-download"></i>
                            </div>
                            <div class="help-text">
                                <h4>Archivo</h4>
                                <p>{{ $material->archivo ? 'Disponible' : 'Sin archivo' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Form Sections -->
            <div class="right-column">
                
                <!-- Card 1: Material Details -->
                <div class="form-card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-info-circle"></i>
                            Detalles del Recurso
                        </h3>
                        <p>Información básica y clasificación</p>
                    </div>

                    <div class="form-grid">
                        <div class="form-group span-4">
                            <label for="titulo">Título del Material <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-heading"></i>
                                <input type="text" id="titulo" name="titulo" class="form-input" placeholder="Ej: Guía de Ejercicios Matemáticas" required value="{{ old('titulo', $material->titulo) }}">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="tipo">Tipo de Recurso <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-th-list"></i>
                                <select id="tipo" name="tipo" class="form-select" required>
                                    <option value="" disabled>Seleccione...</option>
                                    <option value="Guía" {{ old('tipo', $material->tipo) == 'Guía' ? 'selected' : '' }}>Guía de Estudio</option>
                                    <option value="Diapositivas" {{ old('tipo', $material->tipo) == 'Diapositivas' ? 'selected' : '' }}>Presentación/Diapositivas</option>
                                    <option value="Tarea" {{ old('tipo', $material->tipo) == 'Tarea' ? 'selected' : '' }}>Hoja de Trabajo/Tarea</option>
                                    <option value="Video" {{ old('tipo', $material->tipo) == 'Video' ? 'selected' : '' }}>Video Didáctico</option>
                                    <option value="Referencia" {{ old('tipo', $material->tipo) == 'Referencia' ? 'selected' : '' }}>Material de Referencia</option>
                                     <option value="Otro" {{ old('tipo', $material->tipo) == 'Otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                            </div>
                        </div>

                         <div class="form-group span-2">
                            <label for="etiquetas">Etiquetas (Separadas por coma)</label>
                            <div class="input-wrapper">
                                <i class="fas fa-tags"></i>
                                <input type="text" id="etiquetas" name="etiquetas" class="form-input" placeholder="Ej: examen, unidad 1, repaso" value="{{ old('etiquetas', is_array($material->etiquetas) ? implode(', ', $material->etiquetas) : $material->etiquetas) }}">
                            </div>
                        </div>
                        
                        <div class="form-group span-4">
                            <label for="descripcion">Descripción</label>
                            <div class="input-wrapper">
                                <i class="fas fa-align-left"></i>
                                <textarea id="descripcion" name="descripcion" class="form-textarea" placeholder="Breve descripción del contenido...">{{ old('descripcion', $material->descripcion) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Card 2: Assignment -->
                <div class="form-card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-users-cog"></i>
                            Asignación
                        </h3>
                        <p>¿A quién va dirigido este material?</p>
                    </div>

                    <div class="form-grid">
                        <div class="form-group span-2">
                            <label for="materia_id">Materia <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-book"></i>
                                <select id="materia_id" name="materia_id" class="form-select" required>
                                    <option value="" disabled>Seleccione Materia...</option>
                                    @foreach($materias as $materia)
                                        <option value="{{ $materia->id }}" {{ old('materia_id', $material->materia_id) == $materia->id ? 'selected' : '' }}>{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="curso_destinatario">Curso Destinatario <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-chalkboard-teacher"></i>
                                <select id="curso_destinatario" name="curso_destinatario" class="form-select" required>
                                    <option value="" disabled>Seleccione Curso...</option>
                                    @foreach($cursos as $curso)
                                        <option value="{{ $curso->id }}" {{ old('curso_destinatario', $material->curso_destinatario) == $curso->id ? 'selected' : '' }}>{{ $curso->nombre }} - {{ $curso->nivel }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                         <div class="form-group span-2">
                            <label for="fecha_publicacion">Fecha de Publicación</label>
                            <div class="input-wrapper">
                                <i class="fas fa-calendar-alt"></i>
                                <input type="date" id="fecha_publicacion" name="fecha_publicacion" class="form-input" value="{{ old('fecha_publicacion', $material->fecha_publicacion ? $material->fecha_publicacion->format('Y-m-d') : '') }}">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="estado">Estado</label>
                            <div class="input-wrapper">
                                <i class="fas fa-toggle-on"></i>
                                <select id="estado" name="estado" class="form-select">
                                    <option value="publicado" {{ old('estado', $material->estado) == 'publicado' ? 'selected' : '' }}>Publicado</option>
                                    <option value="borrador" {{ old('estado', $material->estado) == 'borrador' ? 'selected' : '' }}>Borrador</option>
                                    <option value="archivado" {{ old('estado', $material->estado) == 'archivado' ? 'selected' : '' }}>Archivado</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="form-status-badge">
                            <i class="fas fa-edit"></i>
                            <span>Modo Edición</span>
                        </div>
                        <div class="action-buttons">
                            <a href="{{ route('admin.materiales.index') }}" class="btn-cancel">Cancelar</a>
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-save"></i>
                                <span>Actualizar Material</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
@section('js')
<script src="{{ asset('js/docente/materiales/edit.js') }}"></script>
@endsection
