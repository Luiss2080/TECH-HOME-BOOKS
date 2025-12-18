@extends('layouts.admin')

@section('title', 'Detalle de Materia')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/materias/show.css') }}">
@endsection

@section('content')
<div class="show-materia-container">
    <!-- Header -->
    <div class="panel-header">
        <div class="header-title">
            <div class="icon-wrapper">
                <i class="fas fa-book-open"></i>
            </div>
            <div class="title-content">
                <h2>Detalles de la Materia</h2>
                <p class="subtitle">{{ $materia->nombre }}</p>
            </div>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.materias.index') }}" class="btn-secondary-action">
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
                        <i class="fas fa-chalkboard"></i>
                        Curso
                    </h3>
                </div>
                
                <div style="padding: 1rem 0; text-align: center;">
                    <h4 style="color: white; margin: 0; font-size: 1.25rem;">{{ $materia->curso ? $materia->curso->nombre : 'Sin Asignar' }}</h4>
                    <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 0.5rem;">
                        {{ $materia->curso ? $materia->curso->nivel : '' }}
                    </p>
                </div>

                <!-- Quick Stats -->
                <div class="info-list">
                    <div class="info-item">
                        <span class="info-label">Horas Semanales</span>
                        <span class="info-value">{{ $materia->horas_semanales }}</span>
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
                        Información Académica
                    </h3>
                    <p>Detalles</p>
                </div>

                <div class="form-grid">
                    <div class="form-group span-2">
                        <label>Nombre de la Materia</label>
                        <div class="input-wrapper">
                            <i class="fas fa-book"></i>
                            <input type="text" class="form-input" value="{{ $materia->nombre }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Código</label>
                        <div class="input-wrapper">
                            <i class="fas fa-barcode"></i>
                            <input type="text" class="form-input" value="{{ $materia->codigo }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-4">
                        <label>Descripción</label>
                        <textarea class="form-textarea" disabled>{{ $materia->descripcion }}</textarea>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.materias.edit', $materia->id) }}" class="btn-edit-action">
                        <i class="fas fa-edit"></i>
                        <span>Editar Materia</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/admin/materias/show.js') }}"></script>
@endsection