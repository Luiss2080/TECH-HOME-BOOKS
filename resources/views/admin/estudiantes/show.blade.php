@extends('layouts.admin')

@section('title', 'Detalle del Estudiante')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/estudiantes/show.css') }}">
@endsection

@section('content')
<div class="show-estudiante-container">
    <!-- Header -->
    <div class="panel-header">
        <div class="header-title">
            <div class="icon-wrapper">
                <i class="fas fa-user-graduate"></i>
            </div>
            <div class="title-content">
                <h2>Detalles del Estudiante</h2>
                <p class="subtitle">Información completa de {{ $estudiante->user->name }}</p>
            </div>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.estudiantes.index') }}" class="btn-secondary-action">
                <i class="fas fa-arrow-left"></i>
                <span>Volver a la lista</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="form-content">
        <!-- Left Column: Profile -->
        <div class="left-column">
            <div class="form-card profile-card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-camera"></i>
                        Foto de Perfil
                    </h3>
                </div>
                
                <div class="profile-upload-section">
                    <div class="avatar-preview">
                        @if($estudiante->user->avatar)
                            <img src="{{ asset('storage/' . $estudiante->user->avatar) }}" alt="Foto de Perfil">
                        @else
                            <div class="avatar-placeholder">
                                <i class="fas fa-user-circle"></i>
                                <span>Sin imagen</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Quick Stats / Info -->
                <div class="info-list">
                    <div class="info-item">
                        <span class="info-label">Código RUDE</span>
                        <span class="info-value">{{ $estudiante->codigo_estudiante ?? 'No registrado' }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Estado</span>
                        <span class="info-value" style="color: {{ $estudiante->estado_academico == 'activo' ? '#22c55e' : '#9ca3af' }}">
                            {{ ucfirst($estudiante->estado_academico) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Data -->
        <div class="right-column">
            
            <!-- Card 1: Personal Data -->
            <div class="form-card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-user"></i>
                        Datos Personales
                    </h3>
                    <p>Información básica del estudiante</p>
                </div>

                <div class="form-grid">
                    <div class="form-group span-2">
                        <label>Nombre Completo</label>
                        <div class="input-wrapper">
                            <i class="fas fa-user"></i>
                            <input type="text" class="form-input" value="{{ $estudiante->user->name }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Apellidos</label>
                        <div class="input-wrapper">
                            <i class="fas fa-user"></i>
                            <input type="text" class="form-input" value="{{ $estudiante->user->apellido }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Documento de Identidad (CI)</label>
                        <div class="input-wrapper">
                            <i class="fas fa-id-card"></i>
                            <input type="text" class="form-input" value="{{ $estudiante->user->ci }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Fecha de Nacimiento</label>
                        <div class="input-wrapper">
                            <i class="fas fa-calendar-alt"></i>
                            <input type="text" class="form-input" value="{{ optional($estudiante->user->fecha_nacimiento)->format('d/m/Y') }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Género</label>
                        <div class="input-wrapper">
                            <i class="fas fa-venus-mars"></i>
                            <input type="text" class="form-input" value="{{ $estudiante->user->genero == 'M' ? 'Masculino' : ($estudiante->user->genero == 'F' ? 'Femenino' : 'Otro') }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Nacionalidad</label>
                        <div class="input-wrapper">
                            <i class="fas fa-globe-americas"></i>
                            <input type="text" class="form-input" value="{{ $estudiante->nacionalidad }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-4">
                        <label>Dirección Domiciliaria</label>
                        <div class="input-wrapper">
                            <i class="fas fa-map-marker-alt"></i>
                            <input type="text" class="form-input" value="{{ $estudiante->user->direccion }}" readonly>
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
                            <label>Código RUDE</label>
                            <div class="input-wrapper">
                                <i class="fas fa-barcode"></i>
                                <input type="text" class="form-input" value="{{ $estudiante->codigo_estudiante }}" readonly>
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label>Fecha Inscripción</label>
                            <div class="input-wrapper">
                                <i class="fas fa-calendar-check"></i>
                                <input type="text" class="form-input" value="{{ optional($estudiante->fecha_inscripcion)->format('d/m/Y') }}" readonly>
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label>Estado Académico</label>
                            <div class="input-wrapper">
                                <i class="fas fa-toggle-on"></i>
                                <input type="text" class="form-input" value="{{ ucfirst($estudiante->estado_academico) }}" readonly>
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label>Curso Asignado</label>
                            <div class="input-wrapper">
                                <i class="fas fa-chalkboard"></i>
                                <input type="text" class="form-input" value="{{ $estudiante->curso ? $estudiante->curso->nombre : 'Sin Asignar' }}" readonly>
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
                            <label>Nombre del Tutor</label>
                            <div class="input-wrapper">
                                <i class="fas fa-user-friends"></i>
                                <input type="text" class="form-input" value="{{ $estudiante->tutor_nombre }}" readonly>
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label>Teléfono Tutor</label>
                            <div class="input-wrapper">
                                <i class="fas fa-phone"></i>
                                <input type="text" class="form-input" value="{{ $estudiante->tutor_telefono }}" readonly>
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label>Email Tutor</label>
                            <div class="input-wrapper">
                                <i class="fas fa-envelope"></i>
                                <input type="text" class="form-input" value="{{ $estudiante->tutor_email }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('admin.estudiantes.edit', $estudiante->id) }}" class="btn-edit-action">
                            <i class="fas fa-edit"></i>
                            <span>Editar Estudiante</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/admin/estudiantes/show.js') }}"></script>
@endsection