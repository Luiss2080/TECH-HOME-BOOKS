@extends('layouts.admin')

@section('title', 'Nuevo Estudiante')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/estudiantes/create.css') }}">
@endsection

@section('content')
<div class="create-estudiante-container">
    <!-- Header -->
    <div class="panel-header">
        <div class="header-title">
            <div class="icon-wrapper">
                <i class="fas fa-user-graduate"></i>
            </div>
            <div class="title-content">
                <h2>Nuevo Estudiante</h2>
                <p class="subtitle">Registre un nuevo estudiante en el sistema</p>
            </div>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.estudiantes.index') }}" class="btn-secondary-action">
                <i class="fas fa-arrow-left"></i>
                <span>Volver a la lista</span>
            </a>
        </div>
    </div>

    <!-- Main Form -->
    <form action="{{ route('admin.estudiantes.store') }}" method="POST" enctype="multipart/form-data" id="createEstudianteForm">
        @csrf
        <div class="form-content">
            <!-- Left Column: Profile & Info -->
            <div class="left-column">
                <div class="form-card profile-card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-camera"></i>
                            Foto de Perfil
                        </h3>
                        <p>Foto actualizada del estudiante</p>
                    </div>
                    
                    <div class="profile-upload-section">
                        <div class="avatar-preview" id="avatarPreview">
                            <div class="avatar-placeholder">
                                <i class="fas fa-user-circle"></i>
                                <span>Sin imagen</span>
                            </div>
                        </div>
                        
                        <div class="file-input-wrapper">
                            <div class="btn-upload">
                                <i class="fas fa-upload"></i>
                                <span>Seleccionar Foto</span>
                            </div>
                            <input type="file" name="avatar" id="avatar" accept="image/*">
                        </div>
                        <p class="upload-hint">Formatos: JPG, PNG. Máx: 2MB</p>
                    </div>
                </div>

                <!-- Help/Status Cards -->
                <div class="help-section-container">
                    <div class="help-cards-list">
                        <div class="help-card-item">
                            <div class="help-icon">
                                <i class="fas fa-id-badge"></i>
                            </div>
                            <div class="help-text">
                                <h4>Código RUDE</h4>
                                <p>Es importante para el registro oficial.</p>
                            </div>
                        </div>
                        <div class="help-card-item">
                            <div class="help-icon">
                                <i class="fas fa-user-friends"></i>
                            </div>
                            <div class="help-text">
                                <h4>Tutores</h4>
                                <p>Registre al menos un contacto de emergencia.</p>
                            </div>
                        </div>
                        <div class="help-card-item">
                            <div class="help-icon">
                                <i class="fas fa-school"></i>
                            </div>
                            <div class="help-text">
                                <h4>Inscripción</h4>
                                <p>Verifique la fecha de asignación al curso.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Form Sections -->
            <div class="right-column">
                
                <!-- Card 1: Personal Data -->
                <div class="form-card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-user"></i>
                            Datos Personales
                        </h3>
                        <p>Información del estudiante</p>
                    </div>

                    <div class="form-grid">
                        <div class="form-group span-2">
                            <label for="nombre">Nombre Completo <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-user"></i>
                                <input type="text" id="nombre" name="name" class="form-input" placeholder="Ej: Ana" required>
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="apellido">Apellidos <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-user"></i>
                                <input type="text" id="apellido" name="apellido" class="form-input" placeholder="Ej: Lopez" required>
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="ci">Cédula de Identidad (CI)</label>
                            <div class="input-wrapper">
                                <i class="fas fa-id-card"></i>
                                <input type="text" id="ci" name="ci" class="form-input" placeholder="Ej: 1234567">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                            <div class="input-wrapper">
                                <i class="fas fa-calendar-alt"></i>
                                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-input">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="genero">Género</label>
                            <div class="input-wrapper">
                                <i class="fas fa-venus-mars"></i>
                                <select id="genero" name="genero" class="form-select">
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                    <option value="O">Otro</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="nacionalidad">Nacionalidad</label>
                            <div class="input-wrapper">
                                <i class="fas fa-globe-americas"></i>
                                <input type="text" id="nacionalidad" name="nacionalidad" class="form-input" value="Boliviana">
                            </div>
                        </div>

                        <div class="form-group span-4">
                            <label for="direccion">Dirección Domiciliaria</label>
                            <div class="input-wrapper">
                                <i class="fas fa-map-marker-alt"></i>
                                <input type="text" id="direccion" name="direccion" class="form-input" placeholder="Ej: Calle 6 #45, Zona Sur">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Academic Info -->
                <div class="form-card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-graduation-cap"></i>
                            Información Académica
                        </h3>
                        <p>Datos escolares e inscripción</p>
                    </div>

                    <div class="form-grid">
                         <div class="form-group span-2">
                            <label for="codigo_estudiante">Código RUDE / Matrícula</label>
                            <div class="input-wrapper">
                                <i class="fas fa-barcode"></i>
                                <input type="text" id="codigo_estudiante" name="codigo_estudiante" class="form-input" placeholder="Automático si vacío">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="fecha_inscripcion">Fecha Inscripción</label>
                            <div class="input-wrapper">
                                <i class="fas fa-calendar-check"></i>
                                <input type="date" id="fecha_inscripcion" name="fecha_inscripcion" class="form-input" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>

                         <div class="form-group span-2">
                            <label for="estado_academico">Estado Académico</label>
                            <div class="input-wrapper">
                                <i class="fas fa-toggle-on"></i>
                                <select id="estado_academico" name="estado_academico" class="form-select">
                                    <option value="activo">Activo</option>
                                    <option value="suspendido">Suspendido</option>
                                    <option value="retirado">Retirado</option>
                                    <option value="graduado">Graduado</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="curso_id">Curso Asignado</label>
                            <div class="input-wrapper">
                                <i class="fas fa-chalkboard"></i>
                                <select id="curso_id" name="curso_id" class="form-select">
                                    <option value="" disabled selected>Seleccione Curso...</option>
                                    <!-- Populate dynamically in backend -->
                                    <option value="1">1ro Secundaria</option>
                                    <option value="2">2do Secundaria</option>
                                    <option value="3">3ro Secundaria</option>
                                    <option value="4">4to Secundaria</option>
                                    <option value="5">5to Secundaria</option>
                                    <option value="6">6to Secundaria</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Tutor Info -->
                <div class="form-card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-user-shield"></i>
                            Datos del Tutor / Padre
                        </h3>
                        <p>Contacto de emergencia</p>
                    </div>

                    <div class="form-grid">
                        <div class="form-group span-4">
                            <label for="tutor_nombre">Nombre del Tutor</label>
                            <div class="input-wrapper">
                                <i class="fas fa-user-friends"></i>
                                <input type="text" id="tutor_nombre" name="tutor_nombre" class="form-input" placeholder="Nombre completo del padre o tutor">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="tutor_telefono">Teléfono Tutor</label>
                            <div class="input-wrapper">
                                <i class="fas fa-phone"></i>
                                <input type="tel" id="tutor_telefono" name="tutor_telefono" class="form-input" placeholder="+591 ...">
                            </div>
                        </div>

                         <div class="form-group span-2">
                            <label for="tutor_email">Email Tutor (Opcional)</label>
                            <div class="input-wrapper">
                                <i class="fas fa-envelope"></i>
                                <input type="email" id="tutor_email" name="tutor_email" class="form-input" placeholder="padre@ejemplo.com">
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="form-status-badge">
                            <i class="fas fa-check-circle"></i>
                            <span>Registro Nuevo</span>
                        </div>
                        <div class="action-buttons">
                            <a href="{{ route('admin.estudiantes.index') }}" class="btn-cancel">Cancelar</a>
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-save"></i>
                                <span>Guardar Estudiante</span>
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
<script src="{{ asset('js/admin/estudiantes/create.js') }}"></script>
@endsection