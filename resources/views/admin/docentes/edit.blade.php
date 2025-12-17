@extends('layouts.admin')

@section('title', 'Editar Docente')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/docentes/edit.css') }}">
@endsection

@section('content')
<div class="edit-container">
    <!-- Header -->
    <div class="panel-header">
        <div class="header-title">
            <div class="icon-wrapper">
                <i class="fas fa-user-edit"></i>
            </div>
            <div class="title-content">
                <h2>Editar Docente</h2>
                <p class="subtitle">Actualice la información del docente</p>
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
    <form action="{{ route('admin.docentes.update', $docente->id) }}" method="POST" enctype="multipart/form-data" id="editDocenteForm">
        @csrf
        @method('PUT')
        
        <div class="form-content">
            <!-- Left Column: Profile Image & Help -->
            <div class="left-column">
                <div class="form-card profile-card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-camera"></i>
                            Foto de Perfil
                        </h3>
                        <p>Actualizar foto profesional</p>
                    </div>
                    
                    <div class="profile-upload-section">
                        <div class="avatar-preview" id="avatarPreview">
                            @if($docente->avatar)
                                <img src="{{ asset('storage/' . $docente->avatar) }}" alt="Foto de Perfil">
                            @else
                                <div class="avatar-placeholder">
                                    <i class="fas fa-user-circle"></i>
                                    <span>Sin imagen</span>
                                </div>
                            @endif
                        </div>
                        
                        <div class="file-input-wrapper">
                            <div class="btn-upload">
                                <i class="fas fa-upload"></i>
                                <span>Cambiar Foto</span>
                            </div>
                            <input type="file" name="avatar" id="avatar" accept="image/*">
                        </div>
                        <p class="upload-hint">Formatos: JPG, PNG. Máx: 2MB</p>
                    </div>
                </div>

                <!-- Help Section -->
                <div class="help-section-container">
                    <div class="help-cards-list">
                        <div class="help-card-item">
                            <div class="help-icon">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <div class="help-text">
                                <h4>Edición</h4>
                                <p>Modifique los datos necesarios y guarde los cambios.</p>
                            </div>
                            <i class="fas fa-chevron-right help-action-icon"></i>
                        </div>
                        <!-- Reusing help items for consistency -->
                        <div class="help-card-item">
                            <div class="help-icon">
                                <i class="fas fa-check-double"></i>
                            </div>
                            <div class="help-text">
                                <h4>Validación</h4>
                                <p>Los campos marcados con (*) son obligatorios.</p>
                            </div>
                            <i class="fas fa-chevron-right help-action-icon"></i>
                        </div>
                        <div class="help-card-item">
                            <div class="help-icon">
                                <i class="fas fa-history"></i>
                            </div>
                            <div class="help-text">
                                <h4>Historial</h4>
                                <p>Los cambios quedarán registrados en el sistema.</p>
                            </div>
                            <i class="fas fa-chevron-right help-action-icon"></i>
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
                        <p>Información básica del docente</p>
                    </div>

                    <div class="form-grid">
                        <div class="form-group span-2">
                            <label for="nombre">Nombre Completo <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-user"></i>
                                <input type="text" id="nombre" name="name" class="form-input" placeholder="Ej: Juan" required value="{{ old('name', $docente->user->name) }}">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="apellido">Apellidos <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-user"></i>
                                <input type="text" id="apellido" name="apellido" class="form-input" placeholder="Ej: Pérez García" required value="{{ old('apellido', $docente->user->apellido) }}">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="ci">Documento de Identidad (CI) <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-id-card"></i>
                                <input type="text" id="ci" name="ci" class="form-input" placeholder="Ej: 1234567" required value="{{ old('ci', $docente->user->ci) }}">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                            <div class="input-wrapper">
                                <i class="fas fa-calendar-alt"></i>
                                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-input" value="{{ old('fecha_nacimiento', optional($docente->user->fecha_nacimiento)->format('Y-m-d')) }}">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="genero">Género</label>
                            <div class="input-wrapper">
                                <i class="fas fa-venus-mars"></i>
                                <select id="genero" name="genero" class="form-select">
                                    <option value="M" {{ old('genero', $docente->user->genero) == 'M' ? 'selected' : '' }}>Masculino</option>
                                    <option value="F" {{ old('genero', $docente->user->genero) == 'F' ? 'selected' : '' }}>Femenino</option>
                                    <option value="O" {{ old('genero', $docente->user->genero) == 'O' ? 'selected' : '' }}>Otro</option>
                                </select>
                                <i class="fas fa-chevron-down" style="left: auto; right: 1rem;"></i>
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="nacionalidad">Nacionalidad</label>
                            <div class="input-wrapper">
                                <i class="fas fa-globe-americas"></i>
                                <input type="text" id="nacionalidad" name="nacionalidad" class="form-input" placeholder="Ej: Boliviana" value="Boliviana" readonly>
                            </div>
                        </div>

                        <div class="form-group span-3">
                            <label for="email">Correo Electrónico <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-envelope"></i>
                                <input type="email" id="email" name="email" class="form-input" placeholder="ejemplo@tech-home.com" required value="{{ old('email', $docente->user->email) }}">
                            </div>
                        </div>

                        <div class="form-group span-3">
                            <label for="telefono">Tel./Celular</label>
                            <div class="input-wrapper">
                                <i class="fas fa-phone"></i>
                                <input type="tel" id="telefono" name="telefono" class="form-input" placeholder="+591 ..." value="{{ old('telefono', $docente->user->telefono) }}">
                            </div>
                        </div>

                        <div class="form-group full-width">
                            <label for="direccion">Dirección Domiciliaria</label>
                            <div class="input-wrapper">
                                <i class="fas fa-map-marker-alt"></i>
                                <input type="text" id="direccion" name="direccion" class="form-input" placeholder="Ej: Av. Principal #123" value="{{ old('direccion', $docente->user->direccion) }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Academic & Contract -->
                <div class="form-card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-graduation-cap"></i>
                            Datos Académicos y Contrato
                        </h3>
                        <p>Información profesional y laboral</p>
                    </div>

                    <div class="form-grid">
                        <div class="form-group span-2">
                            <label for="codigo_docente">Código</label>
                            <div class="input-wrapper">
                                <i class="fas fa-barcode"></i>
                                <input type="text" id="codigo_docente" name="codigo_docente" class="form-input" placeholder="Automático" value="{{ old('codigo_docente', $docente->codigo_docente) }}">
                            </div>
                        </div>

                        <div class="form-group span-4">
                            <label for="especialidad">Especialidad Principal <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-book-reader"></i>
                                <select id="especialidad" name="especialidad" class="form-select" required>
                                    <option value="" disabled>Seleccione una opción</option>
                                    @php
                                        $especialidades = ['Matemáticas y Física', 'Historia y Literatura', 'Química y Biología', 'Física y Matemáticas', 'Literatura e Inglés', 'Informática', 'Robótica', 'Otra'];
                                    @endphp
                                    @foreach($especialidades as $esp)
                                        <option value="{{ $esp }}" {{ old('especialidad', $docente->especialidad) == $esp ? 'selected' : '' }}>{{ $esp }}</option>
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down" style="left: auto; right: 1rem;"></i>
                            </div>
                        </div>

                        <div class="form-group span-3">
                            <label for="institucion_egreso">Institución de Egreso</label>
                            <div class="input-wrapper">
                                <i class="fas fa-university"></i>
                                <input type="text" id="institucion_egreso" name="institucion_egreso" class="form-input" placeholder="Ej: UMSA" value="{{ old('institucion_egreso', $docente->institucion_egreso) }}">
                            </div>
                        </div>

                        <div class="form-group span-3">
                            <label for="titulo_profesional">Título Académico</label>
                            <div class="input-wrapper">
                                <i class="fas fa-certificate"></i>
                                <input type="text" id="titulo_profesional" name="titulo_profesional" class="form-input" placeholder="Ej: Licenciado" value="{{ old('titulo_profesional', $docente->titulo_profesional) }}">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="nivel_estudio">Nivel de Estudio</label>
                            <div class="input-wrapper">
                                <i class="fas fa-layer-group"></i>
                                <select id="nivel_estudio" name="nivel_estudio" class="form-select">
                                    @php
                                        $niveles = ['Licenciatura', 'Diplomado', 'Maestría', 'Doctorado'];
                                    @endphp
                                    @foreach($niveles as $nivel)
                                        <option value="{{ $nivel }}" {{ old('nivel_estudio') == $nivel ? 'selected' : '' }}>{{ $nivel }}</option>
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down" style="left: auto; right: 1rem;"></i>
                            </div>
                        </div>

                        <div class="form-group span-2">
                           <label for="experiencia">Años Exp.</label>
                           <div class="input-wrapper">
                               <i class="fas fa-history"></i>
                               <input type="number" id="experiencia" name="experiencia" class="form-input" placeholder="0" min="0" value="{{ old('experiencia', $docente->experiencia) }}">
                           </div>
                       </div>

                        <div class="form-group span-2">
                            <label for="tipo_contrato">Tipo de Contrato <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-file-contract"></i>
                                <select id="tipo_contrato" name="tipo_contrato" class="form-select" required>
                                    @php
                                        $contratos = [
                                            'tiempo_completo' => 'Tiempo Completo',
                                            'medio_tiempo' => 'Medio Tiempo',
                                            'por_horas' => 'Por Horas'
                                        ];
                                    @endphp
                                    @foreach($contratos as $value => $label)
                                        <option value="{{ $value }}" {{ old('tipo_contrato', $docente->tipo_contrato) == $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down" style="left: auto; right: 1rem;"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="form-status-badge">
                            <i class="fas fa-shield-alt"></i>
                            <span>Información Segura</span>
                        </div>
                        <div class="action-buttons">
                            <a href="{{ route('admin.docentes.index') }}" class="btn-cancel">Cancelar</a>
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-save"></i>
                                <span>Actualizar Docente</span>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/admin/docentes/edit.js') }}"></script>
@endsection