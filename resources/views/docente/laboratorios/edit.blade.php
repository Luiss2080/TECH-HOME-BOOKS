@extends('layouts.admin')

@section('title', 'Editar Laboratorio')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/docente/laboratorios/edit.css') }}">
@endsection

@section('content')
<div class="edit-laboratorio-container">
    <!-- Header -->
    <div class="panel-header">
        <div class="header-title">
            <div class="icon-wrapper">
                <i class="fas fa-edit"></i>
            </div>
            <div class="title-content">
                <h2>Editar Laboratorio</h2>
                <p class="subtitle">Actualizar información del espacio</p>
            </div>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.laboratorios.index') }}" class="btn-secondary-action">
                <i class="fas fa-arrow-left"></i>
                <span>Volver a Lista</span>
            </a>
        </div>
    </div>

    <!-- Main Form -->
    <form action="{{ route('admin.laboratorios.update', $laboratorio->id) }}" method="POST" enctype="multipart/form-data" id="editLaboratorioForm">
        @csrf
        @method('PUT')
        
        <div class="form-content">
            <!-- Left Column: Image & Help -->
            <div class="left-column">
                <!-- Image Upload Card -->
                <div class="form-card profile-card">
                    <div class="photo-preview-container">
                         @if($laboratorio->imagen)
                            <img src="{{ asset('storage/' . $laboratorio->imagen) }}" alt="Vista previa" class="photo-preview">
                        @else
                            <div class="photo-placeholder" style="{{ $laboratorio->imagen ? 'display: none;' : '' }}">
                                <i class="fas fa-flask"></i>
                            </div>
                            <img src="" alt="Vista previa" class="photo-preview" style="display: none;">
                        @endif
                    </div>
                    
                    <div class="photo-upload-btn-wrapper">
                        <button type="button" class="btn-upload-photo">
                            <i class="fas fa-camera"></i>
                            Cambiar Imagen
                        </button>
                        <input type="file" name="imagen" id="imagen" class="file-input" accept="image/*">
                    </div>
                    <p class="photo-help-text">Deje vacío para mantener la actual.</p>
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
                                <p>{{ ucfirst($laboratorio->estado ?? 'disponible') }}</p>
                            </div>
                        </div>
                        <div class="help-card-item">
                            <div class="help-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="help-text">
                                <h4>Capacidad</h4>
                                <p>{{ $laboratorio->capacidad }} Estudiantes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Form Sections -->
            <div class="right-column">
                
                <!-- Card 1: Main Info -->
                <div class="form-card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-info-circle"></i>
                            Información del Laboratorio
                        </h3>
                        <p>Datos principales y localización</p>
                    </div>

                    <div class="form-grid">
                        <div class="form-group span-4">
                            <label for="nombre">Nombre del Laboratorio <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-heading"></i>
                                <input type="text" id="nombre" name="nombre" class="form-input" placeholder="Ej: Laboratorio de Química 1" required value="{{ old('nombre', $laboratorio->nombre) }}">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="ubicacion">Ubicación <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-map-marked-alt"></i>
                                <input type="text" id="ubicacion" name="ubicacion" class="form-input" placeholder="Ej: Edificio C, Aula 102" required value="{{ old('ubicacion', $laboratorio->ubicacion) }}">
                            </div>
                        </div>

                         <div class="form-group span-2">
                            <label for="capacidad">Capacidad (Estudiantes) <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-users"></i>
                                <input type="number" id="capacidad" name="capacidad" class="form-input" placeholder="30" min="1" required value="{{ old('capacidad', $laboratorio->capacidad) }}">
                            </div>
                        </div>

                         <div class="form-group span-2">
                            <label for="encargado">Encargado / Responsable</label>
                            <div class="input-wrapper">
                                <i class="fas fa-user-tie"></i>
                                <input type="text" id="encargado" name="encargado" class="form-input" placeholder="Nombre del docente o técnico" value="{{ old('encargado', $laboratorio->encargado) }}">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="estado">Estado</label>
                            <div class="input-wrapper">
                                <i class="fas fa-toggle-on"></i>
                                <select id="estado" name="estado" class="form-select">
                                    <option value="disponible" {{ old('estado', $laboratorio->estado) == 'disponible' ? 'selected' : '' }}>Disponible</option>
                                    <option value="mantenimiento" {{ old('estado', $laboratorio->estado) == 'mantenimiento' ? 'selected' : '' }}>En Mantenimiento</option>
                                    <option value="ocupado" {{ old('estado', $laboratorio->estado) == 'ocupado' ? 'selected' : '' }}>Ocupado</option>
                                     <option value="clausurado" {{ old('estado', $laboratorio->estado) == 'clausurado' ? 'selected' : '' }}>Clausurado</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group span-4">
                            <label for="descripcion">Descripción / Equipamiento</label>
                            <div class="input-wrapper">
                                <i class="fas fa-align-left"></i>
                                <textarea id="descripcion" name="descripcion" class="form-textarea" placeholder="Describa el equipo disponible...">{{ old('descripcion', $laboratorio->descripcion) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="form-status-badge">
                            <i class="fas fa-edit"></i>
                            <span>Modo Edición</span>
                        </div>
                        <div class="action-buttons">
                            <a href="{{ route('admin.laboratorios.index') }}" class="btn-cancel">Cancelar</a>
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-save"></i>
                                <span>Actualizar Laboratorio</span>
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
<script src="{{ asset('js/docente/laboratorios/edit.js') }}"></script>
@endsection
