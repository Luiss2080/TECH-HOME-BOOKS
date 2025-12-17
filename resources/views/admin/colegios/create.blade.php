@extends('layouts.admin')

@section('title', 'Nuevo Colegio')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/colegios/create.css') }}">
@endsection

@section('content')
<div class="create-colegio-container">
    <!-- Header -->
    <div class="panel-header">
        <div class="header-title">
            <div class="icon-wrapper">
                <i class="fas fa-school"></i>
            </div>
            <div class="title-content">
                <h2>Nuevo Colegio</h2>
                <p class="subtitle">Registre una nueva institución educativa</p>
            </div>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.colegios.index') }}" class="btn-secondary-action">
                <i class="fas fa-arrow-left"></i>
                <span>Volver a la lista</span>
            </a>
        </div>
    </div>

    <!-- Main Form -->
    <form action="{{ route('admin.colegios.store') }}" method="POST" enctype="multipart/form-data" id="createColegioForm">
        @csrf
        <div class="form-content">
            <!-- Left Column: Logo & Help -->
            <div class="left-column">
                <div class="form-card profile-card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-image"></i>
                            Logo Institucional
                        </h3>
                        <p>Identidad visual del colegio</p>
                    </div>
                    
                    <div class="profile-upload-section">
                        <div class="avatar-preview" id="logoPreview">
                            <div class="avatar-placeholder">
                                <i class="fas fa-building"></i>
                                <span>Sin Logo</span>
                            </div>
                        </div>
                        
                        <div class="file-input-wrapper">
                            <div class="btn-upload">
                                <i class="fas fa-upload"></i>
                                <span>Subir Logo</span>
                            </div>
                            <input type="file" name="logo" id="logo" accept="image/*">
                        </div>
                        <p class="upload-hint">Formatos: PNG, JPG (Transparente recomendado)</p>
                    </div>
                </div>

                <!-- Help/Status Cards -->
                <div class="help-section-container">
                    <div class="help-cards-list">
                        <div class="help-card-item">
                            <div class="help-icon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <div class="help-text">
                                <h4>Ubicación</h4>
                                <p>Ingrese la dirección exacta (Google Maps).</p>
                            </div>
                        </div>
                        <div class="help-card-item">
                            <div class="help-icon">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <div class="help-text">
                                <h4>Director</h4>
                                <p>Nombre completo de la autoridad máxima.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Form Sections -->
            <div class="right-column">
                
                <!-- Card 1: Institution Details -->
                <div class="form-card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-info-circle"></i>
                            Datos Institucionales
                        </h3>
                        <p>Información general del colegio</p>
                    </div>

                    <div class="form-grid">
                        <div class="form-group span-4">
                            <label for="nombre">Nombre de la Institución <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-university"></i>
                                <input type="text" id="nombre" name="nombre" class="form-input" placeholder="Ej: Unidad Educativa Nacional" required>
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="director">Director/Rector</label>
                            <div class="input-wrapper">
                                <i class="fas fa-user-tie"></i>
                                <input type="text" id="director" name="director" class="form-input" placeholder="Nombre completo">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="telefono">Teléfono / Celular</label>
                            <div class="input-wrapper">
                                <i class="fas fa-phone"></i>
                                <input type="tel" id="telefono" name="telefono" class="form-input" placeholder="+591 ...">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="email">Correo Institucional</label>
                            <div class="input-wrapper">
                                <i class="fas fa-envelope"></i>
                                <input type="email" id="email" name="email" class="form-input" placeholder="contacto@colegio.edu.bo">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="sitio_web">Sitio Web (Opcional)</label>
                            <div class="input-wrapper">
                                <i class="fas fa-globe"></i>
                                <input type="url" id="sitio_web" name="sitio_web" class="form-input" placeholder="https://www.colegio.edu.bo">
                            </div>
                        </div>
                        
                         <div class="form-group full-width">
                            <label for="direccion">Dirección</label>
                            <div class="input-wrapper">
                                <i class="fas fa-map-marker-alt"></i>
                                <input type="text" id="direccion" name="direccion" class="form-input" placeholder="Av. Principal, Zona Centro #123">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Configuration & Stats -->
                <div class="form-card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-cogs"></i>
                            Configuración
                        </h3>
                        <p>Características operativas</p>
                    </div>

                    <div class="form-grid">
                         <div class="form-group span-2">
                            <label for="estado">Estado Operativo</label>
                            <div class="input-wrapper">
                                <i class="fas fa-toggle-on"></i>
                                <select id="estado" name="estado" class="form-select">
                                    <option value="activo">Activo</option>
                                    <option value="inactivo">Inactivo</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="año_lectivo_actual">Año Lectivo Actual</label>
                            <div class="input-wrapper">
                                <i class="fas fa-calendar"></i>
                                <input type="number" id="año_lectivo_actual" name="año_lectivo_actual" class="form-input" value="{{ date('Y') }}" min="2000" max="2100">
                            </div>
                        </div>

                        <div class="form-group span-4">
                            <label>Niveles Educativos</label>
                            <div class="input-wrapper" style="display: flex; gap: 1rem; margin-top: 0.5rem;">
                                <!-- Simple checkboxes since custom select might be overkill for multiple fixed options here, or could serve as multiselect later -->
                                <label style="display: flex; align-items: center; gap: 0.5rem; color: white; cursor: pointer;">
                                    <input type="checkbox" name="niveles[]" value="Inicial" checked> Inicial
                                </label>
                                <label style="display: flex; align-items: center; gap: 0.5rem; color: white; cursor: pointer;">
                                    <input type="checkbox" name="niveles[]" value="Primaria" checked> Primaria
                                </label>
                                <label style="display: flex; align-items: center; gap: 0.5rem; color: white; cursor: pointer;">
                                    <input type="checkbox" name="niveles[]" value="Secundaria" checked> Secundaria
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="form-status-badge">
                            <i class="fas fa-plus-circle"></i>
                            <span>Nueva Institución</span>
                        </div>
                        <div class="action-buttons">
                            <a href="{{ route('admin.colegios.index') }}" class="btn-cancel">Cancelar</a>
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-save"></i>
                                <span>Guardar Colegio</span>
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
<script src="{{ asset('js/admin/colegios/create.js') }}"></script>
@endsection