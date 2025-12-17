@extends('layouts.admin')

@section('title', 'Detalle del Colegio')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/colegios/show.css') }}">
@endsection

@section('content')
<div class="show-colegio-container">
    <!-- Header -->
    <div class="panel-header">
        <div class="header-title">
            <div class="icon-wrapper">
                <i class="fas fa-school"></i>
            </div>
            <div class="title-content">
                <h2>Detalles del Colegio</h2>
                <p class="subtitle">{{ $colegio->nombre }}</p>
            </div>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.colegios.index') }}" class="btn-secondary-action">
                <i class="fas fa-arrow-left"></i>
                <span>Volver a la lista</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="form-content">
        <!-- Left Column: Logo -->
        <div class="left-column">
            <div class="form-card profile-card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-image"></i>
                        Logo Institucional
                    </h3>
                </div>
                
                <div class="profile-upload-section">
                    <div class="avatar-preview">
                        @if($colegio->logo)
                            <img src="{{ asset('storage/' . $colegio->logo) }}" alt="Logo">
                        @else
                            <div class="avatar-placeholder">
                                <i class="fas fa-building"></i>
                                <span>Sin Logo</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="info-list">
                    <div class="info-item">
                        <span class="info-label">Año Lectivo</span>
                        <span class="info-value">{{ $colegio->año_lectivo_actual }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Estado</span>
                        <span class="info-value" style="color: {{ $colegio->estado == 'activo' ? '#22c55e' : '#9ca3af' }}">
                            {{ ucfirst($colegio->estado) }}
                        </span>
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
                        Datos Institucionales
                    </h3>
                    <p>Información general</p>
                </div>

                <div class="form-grid">
                    <div class="form-group span-4">
                        <label>Nombre de la Institución</label>
                        <div class="input-wrapper">
                            <i class="fas fa-university"></i>
                            <input type="text" class="form-input" value="{{ $colegio->nombre }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Director/Rector</label>
                        <div class="input-wrapper">
                            <i class="fas fa-user-tie"></i>
                            <input type="text" class="form-input" value="{{ $colegio->director }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Teléfono</label>
                        <div class="input-wrapper">
                            <i class="fas fa-phone"></i>
                            <input type="text" class="form-input" value="{{ $colegio->telefono }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Email</label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope"></i>
                            <input type="text" class="form-input" value="{{ $colegio->email }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Sitio Web</label>
                        <div class="input-wrapper">
                            <i class="fas fa-globe"></i>
                            <input type="text" class="form-input" value="{{ $colegio->sitio_web }}" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group full-width">
                        <label>Dirección</label>
                        <div class="input-wrapper">
                            <i class="fas fa-map-marker-alt"></i>
                            <input type="text" class="form-input" value="{{ $colegio->direccion }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-4">
                         <label>Niveles Educativos</label>
                         <div class="input-wrapper">
                             <input type="text" class="form-input" value="{{ is_array(json_decode($colegio->niveles_educativos)) ? implode(', ', json_decode($colegio->niveles_educativos)) : $colegio->niveles_educativos }}" readonly>
                         </div>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.colegios.edit', $colegio->id) }}" class="btn-edit-action">
                        <i class="fas fa-edit"></i>
                        <span>Editar Colegio</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/admin/colegios/show.js') }}"></script>
@endsection