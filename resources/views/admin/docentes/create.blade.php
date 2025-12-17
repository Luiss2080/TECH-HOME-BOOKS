@extends('layouts.admin')

@section('title', 'Nuevo Docente')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/docentes/create.css') }}">
@endsection

@section('content')
<div class="create-container">
    <!-- Header -->
    <div class="panel-header">
        <div class="header-title">
            <div class="icon-wrapper">
                <i class="fas fa-user-plus"></i>
            </div>
            <div class="title-content">
                <h2>Nuevo Docente</h2>
                <p class="subtitle">Complete el formulario para registrar un nuevo docente</p>
            </div>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.docentes.index') }}" class="btn-secondary-action">
                <i class="fas fa-arrow-left"></i>
                <span>Volver a la lista</span>
            </a>
        </div>
    </div>

    <!-- Main Form -->
    <form action="{{ route('admin.docentes.store') }}" method="POST" enctype="multipart/form-data" id="createDocenteForm">
        @csrf
        <div class="form-content">
            <!-- Left Column: Profile Image & Help -->
            <div class="left-column" style="display: flex; flex-direction: column; gap: 2rem;">
                <div class="form-card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-camera"></i>
                            Foto de Perfil
                        </h3>
                        <p>Suba una foto profesional para el docente (opcional)</p>
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

                <!-- Help Section Moved Here -->
                <div class="help-section">
                    <h3 class="help-title">Guía Rápida</h3>
                    <div class="help-cards-grid">
                        <div class="help-card">
                            <div class="help-icon">
                                <i class="fas fa-camera-retro"></i>
                            </div>
                            <div class="help-content">
                                <h4>Foto de Perfil</h4>
                                <p>Fondo neutro y vestimenta formal.</p>
                            </div>
                        </div>
                        <div class="help-card">
                            <div class="help-icon">
                                <i class="fas fa-file-signature"></i>
                            </div>
                            <div class="help-content">
                                <h4>Contratos</h4>
                                <p>Verifique carga horaria.</p>
                            </div>
                        </div>
                        <div class="help-card">
                            <div class="help-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="help-content">
                                <h4>Validación</h4>
                                <p>Campos (*) son obligatorios.</p>
                            </div>
                        </div>
                        <div class="help-card action-card">
                            <div class="help-icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div class="help-content">
                                <h4>¿Ayuda?</h4>
                                <p>Soporte técnico disponible.</p>
                                <button type="button" class="btn-help-action">Contactar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Personal & Academic Info -->
            <div class="form-card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-user-tie"></i>
                        Información General
                    </h3>
                    <p>Datos personales y académicos del docente</p>
                </div>

                <div class="form-grid">
                    <!-- Personal Info -->
                    <div class="section-divider" style="margin-top: 0; border-top: none;">
                        <span class="section-title">
                            <i class="fas fa-id-card"></i> Datos Personales
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="nombre">Nombre Completo <span>*</span></label>
                        <div class="input-wrapper">
                            <i class="fas fa-user"></i>
                            <input type="text" id="nombre" name="nombre" class="form-input" placeholder="Ej: Juan Pérez" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="apellido">Apellidos <span>*</span></label>
                        <div class="input-wrapper">
                            <i class="fas fa-user"></i>
                            <input type="text" id="apellido" name="apellido" class="form-input" placeholder="Ej: García López" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ci">Documento de Identidad (CI) <span>*</span></label>
                        <div class="input-wrapper">
                            <i class="fas fa-id-card-alt"></i>
                            <input type="text" id="ci" name="ci" class="form-input" placeholder="Ej: 1234567" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <div class="input-wrapper">
                            <i class="fas fa-calendar-alt"></i>
                            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Correo Electrónico <span>*</span></label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="email" name="email" class="form-input" placeholder="ejemplo@tech-home.com" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono / Celular</label>
                        <div class="input-wrapper">
                            <i class="fas fa-phone"></i>
                            <input type="tel" id="telefono" name="telefono" class="form-input" placeholder="Ej: +591 70000000">
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="direccion">Dirección Domiciliaria</label>
                        <div class="input-wrapper">
                            <i class="fas fa-map-marker-alt"></i>
                            <input type="text" id="direccion" name="direccion" class="form-input" placeholder="Ej: Av. Principal #123">
                        </div>
                    </div>

                    <!-- Academic/Contract Info -->
                    <div class="section-divider">
                        <span class="section-title">
                            <i class="fas fa-graduation-cap"></i> Datos Académicos y Contrato
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="codigo_docente">Código de Docente</label>
                        <div class="input-wrapper">
                            <i class="fas fa-barcode"></i>
                            <input type="text" id="codigo_docente" name="codigo_docente" class="form-input" placeholder="Generado autom. si vacío">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="especialidad">Especialidad Principal <span>*</span></label>
                        <div class="input-wrapper">
                            <i class="fas fa-book-reader"></i>
                            <select id="especialidad" name="especialidad" class="form-select" required>
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="Matemáticas y Física">Matemáticas y Física</option>
                                <option value="Historia y Literatura">Historia y Literatura</option>
                                <option value="Química y Biología">Química y Biología</option>
                                <option value="Física y Matemáticas">Física y Matemáticas</option>
                                <option value="Literatura e Inglés">Literatura e Inglés</option>
                                <option value="Informática">Informática</option>
                                <option value="Robótica">Robótica</option>
                                <option value="Otra">Otra</option>
                            </select>
                            <i class="fas fa-chevron-down" style="left: auto; right: 1rem;"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="titulo_academico">Título Académico</label>
                        <div class="input-wrapper">
                            <i class="fas fa-certificate"></i>
                            <input type="text" id="titulo_academico" name="titulo_academico" class="form-input" placeholder="Ej: Licenciado en Educación">
                        </div>
                   </div>

                   <div class="form-group">
                       <label for="institucion_egreso">Institución de Egreso</label>
                       <div class="input-wrapper">
                           <i class="fas fa-university"></i>
                           <input type="text" id="institucion_egreso" name="institucion_egreso" class="form-input" placeholder="Ej: Universidad Mayor de San Andrés">
                       </div>
                   </div>

                   <div class="form-group">
                        <label for="nivel_estudio">Nivel de Estudio</label>
                        <div class="input-wrapper">
                            <i class="fas fa-layer-group"></i>
                            <select id="nivel_estudio" name="nivel_estudio" class="form-select">
                                <option value="Licenciatura">Licenciatura</option>
                                <option value="Diplomado">Diplomado</option>
                                <option value="Maestría">Maestría</option>
                                <option value="Doctorado">Doctorado</option>
                            </select>
                            <i class="fas fa-chevron-down" style="left: auto; right: 1rem;"></i>
                        </div>
                   </div>

                   <div class="form-group">
                       <label for="anos_experiencia">Años de Experiencia</label>
                       <div class="input-wrapper">
                           <i class="fas fa-history"></i>
                           <input type="number" id="anos_experiencia" name="anos_experiencia" class="form-input" placeholder="Ej: 5" min="0">
                       </div>
                   </div>

                    <div class="form-group">
                        <label for="tipo_contrato">Tipo de Contrato <span>*</span></label>
                        <div class="input-wrapper">
                            <i class="fas fa-file-contract"></i>
                            <select id="tipo_contrato" name="tipo_contrato" class="form-select" required>
                                <option value="tiempo_completo">Tiempo Completo</option>
                                <option value="medio_tiempo">Medio Tiempo</option>
                                <option value="por_horas">Por Horas</option>
                            </select>
                            <i class="fas fa-chevron-down" style="left: auto; right: 1rem;"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="genero">Género</label>
                        <div class="input-wrapper">
                            <i class="fas fa-venus-mars"></i>
                            <select id="genero" name="genero" class="form-select">
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="O">Otro</option>
                            </select>
                            <i class="fas fa-chevron-down" style="left: auto; right: 1rem;"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nacionalidad">Nacionalidad</label>
                        <div class="input-wrapper">
                            <i class="fas fa-globe-americas"></i>
                            <input type="text" id="nacionalidad" name="nacionalidad" class="form-input" placeholder="Ej: Boliviana" value="Boliviana">
                        </div>
                    </div>

                </div> <!-- Close form-grid -->

                <div class="form-actions">
                    <a href="{{ route('admin.docentes.index') }}" class="btn-cancel">Cancelar</a>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save"></i>
                        <span>Guardar Docente</span>
                    </button>
                </div>

            </div> <!-- Close form-card -->
        </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/admin/docentes/create.js') }}"></script>
@endsection