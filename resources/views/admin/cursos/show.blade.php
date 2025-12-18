@extends('layouts.admin')

@section('title', 'Detalle del Curso')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/cursos/show.css') }}">
@endsection

@section('content')
<div class="show-curso-container">
    <!-- Header -->
    <div class="panel-header">
        <div class="header-title">
            <div class="icon-wrapper">
                <i class="fas fa-chalkboard"></i>
            </div>
            <div class="title-content">
                <h2>Detalles del Curso</h2>
                <p class="subtitle">{{ $curso->nombre }}</p>
            </div>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.cursos.index') }}" class="btn-secondary-action">
                <i class="fas fa-arrow-left"></i>
                <span>Volver a la lista</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="form-content">
        <!-- Left Column: Institution -->
        <div class="left-column">
            <div class="form-card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-school"></i>
                        Institución
                    </h3>
                </div>
                
                <div style="padding: 1rem 0; text-align: center;">
                    <h4 style="color: white; margin: 0; font-size: 1.25rem;">{{ $curso->colegio ? $curso->colegio->nombre : 'Sin Asignar' }}</h4>
                    <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 0.5rem;">Colegio Asignado</p>
                </div>

                <!-- Quick Stats -->
                <div class="info-list">
                    <div class="info-item">
                        <span class="info-label">Gestión</span>
                        <span class="info-value">{{ $curso->año_lectivo }}</span>
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
                        Información del Curso
                    </h3>
                    <p>Datos académicos</p>
                </div>

                <div class="form-grid">
                    <div class="form-group span-2">
                        <label>Nombre del Curso</label>
                        <div class="input-wrapper">
                            <i class="fas fa-tag"></i>
                            <input type="text" class="form-input" value="{{ $curso->nombre }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Aula</label>
                        <div class="input-wrapper">
                            <i class="fas fa-door-open"></i>
                            <input type="text" class="form-input" value="{{ $curso->aula }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Nivel</label>
                        <div class="input-wrapper">
                            <i class="fas fa-graduation-cap"></i>
                            <input type="text" class="form-input" value="{{ $curso->nivel }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Grado</label>
                        <div class="input-wrapper">
                            <i class="fas fa-sort-numeric-up"></i>
                            <input type="text" class="form-input" value="{{ $curso->grado }}º" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Turno</label>
                        <div class="input-wrapper">
                            <i class="fas fa-sun"></i>
                            <input type="text" class="form-input" value="{{ $curso->turno }}" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group span-2">
                        <label>Cupo Máximo</label>
                        <div class="input-wrapper">
                            <i class="fas fa-users"></i>
                            <input type="text" class="form-input" value="{{ $curso->cupo_maximo }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.cursos.edit', $curso->id) }}" class="btn-edit-action">
                        <i class="fas fa-edit"></i>
                        <span>Editar Curso</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/admin/cursos/show.js') }}"></script>
@endsection