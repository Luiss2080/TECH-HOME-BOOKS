@extends('layouts.admin')

@section('title', 'Detalle del Docente')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/docentes/show.css') }}">
@endsection

@section('content')
<div class="show-container">
    <!-- Header -->
    <div class="panel-header">
        <div class="header-title">
            <div class="icon-wrapper">
                <i class="fas fa-user-tag"></i>
            </div>
            <div class="title-content">
                <h2>Detalles del Docente</h2>
                <p class="subtitle">Información completa de {{ $docente->user->name }}</p>
            </div>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.docentes.index') }}" class="btn-secondary-action">
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
                        @if($docente->avatar)
                            <img src="{{ asset('storage/' . $docente->avatar) }}" alt="Foto de Perfil">
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
                        <span class="info-label">Código</span>
                        <span class="info-value">{{ $docente->codigo_docente }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Estado</span>
                        <span class="info-value" style="color: {{ $docente->estado_laboral == 'activo' ? '#22c55e' : '#9ca3af' }}">
                            {{ ucfirst($docente->estado_laboral) }}
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
                    <p>Información básica del docente</p>
                </div>

                <div class="form-grid">
                    <div class="form-group span-2">
                        <label>Nombre Completo</label>
                        <div class="input-wrapper">
                            <i class="fas fa-user"></i>
                            <input type="text" class="form-input" value="{{ $docente->user->name }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Apellidos</label>
                        <div class="input-wrapper">
                            <i class="fas fa-user"></i>
                            <input type="text" class="form-input" value="{{ $docente->user->apellido }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Documento de Identidad (CI)</label>
                        <div class="input-wrapper">
                            <i class="fas fa-id-card"></i>
                            <input type="text" class="form-input" value="{{ $docente->user->ci }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Fecha de Nacimiento</label>
                        <div class="input-wrapper">
                            <i class="fas fa-calendar-alt"></i>
                            <input type="text" class="form-input" value="{{ optional($docente->user->fecha_nacimiento)->format('d/m/Y') }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Género</label>
                        <div class="input-wrapper">
                            <i class="fas fa-venus-mars"></i>
                            <input type="text" class="form-input" value="{{ $docente->user->genero == 'M' ? 'Masculino' : ($docente->user->genero == 'F' ? 'Femenino' : 'Otro') }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Nacionalidad</label>
                        <div class="input-wrapper">
                            <i class="fas fa-globe-americas"></i>
                            <input type="text" class="form-input" value="{{ $docente->nacionalidad }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-3">
                        <label>Correo Electrónico</label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope"></i>
                            <input type="text" class="form-input" value="{{ $docente->user->email }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-3">
                        <label>Tel./Celular</label>
                        <div class="input-wrapper">
                            <i class="fas fa-phone"></i>
                            <input type="text" class="form-input" value="{{ $docente->user->telefono }}" readonly>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label>Dirección Domiciliaria</label>
                        <div class="input-wrapper">
                            <i class="fas fa-map-marker-alt"></i>
                            <input type="text" class="form-input" value="{{ $docente->user->direccion }}" readonly>
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
                        <label>Código</label>
                        <div class="input-wrapper">
                            <i class="fas fa-barcode"></i>
                            <input type="text" class="form-input" value="{{ $docente->codigo_docente }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-4">
                        <label>Especialidad Principal</label>
                        <div class="input-wrapper">
                            <i class="fas fa-book-reader"></i>
                            <input type="text" class="form-input" value="{{ $docente->especialidad }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-3">
                        <label>Institución de Egreso</label>
                        <div class="input-wrapper">
                            <i class="fas fa-university"></i>
                            <input type="text" class="form-input" value="{{ $docente->institucion_egreso }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-3">
                        <label>Título Académico</label>
                        <div class="input-wrapper">
                            <i class="fas fa-certificate"></i>
                            <input type="text" class="form-input" value="{{ $docente->titulo_profesional }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Nivel de Estudio</label>
                        <div class="input-wrapper">
                            <i class="fas fa-layer-group"></i>
                            <input type="text" class="form-input" value="{{ $docente->nivel_estudio }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                       <label>Años Exp.</label>
                       <div class="input-wrapper">
                           <i class="fas fa-history"></i>
                           <input type="text" class="form-input" value="{{ $docente->experiencia }} Años" readonly>
                       </div>
                   </div>

                    <div class="form-group span-2">
                        <label>Tipo de Contrato</label>
                        <div class="input-wrapper">
                            <i class="fas fa-file-contract"></i>
                            <input type="text" class="form-input" value="{{ ucfirst(str_replace('_', ' ', $docente->tipo_contrato)) }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.docentes.edit', $docente->id) }}" class="btn-edit-action">
                        <i class="fas fa-edit"></i>
                        <span>Editar Docente</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/admin/docentes/show.js') }}"></script>
@endsection