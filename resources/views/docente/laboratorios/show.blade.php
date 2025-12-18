@extends('layouts.admin')

@section('title', 'Detalle de Laboratorio')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/docente/laboratorios/show.css') }}">
@endsection

@section('content')
<div class="show-laboratorio-container">
    <!-- Header -->
    <div class="panel-header">
        <div class="header-title">
            <div class="icon-wrapper">
                <i class="fas fa-flask"></i>
            </div>
            <div class="title-content">
                <h2>Detalles del Laboratorio</h2>
                <p class="subtitle">{{ $laboratorio->nombre }}</p>
            </div>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.laboratorios.index') }}" class="btn-secondary-action">
                <i class="fas fa-arrow-left"></i>
                <span>Volver a Lista</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="form-content">
        <!-- Left Column: Image & Quick Stats -->
        <div class="left-column">
            <div class="form-card profile-card">
                 <div class="photo-preview-container">
                    @if($laboratorio->imagen)
                        <img src="{{ asset('storage/' . $laboratorio->imagen) }}" alt="Imagen del Laboratorio" class="photo-preview">
                    @else
                         <div style="display: flex; justify-content: center; align-items: center; height: 100%; font-size: 3rem; color: #555;">
                            <i class="fas fa-flask"></i>
                         </div>
                    @endif
                </div>

                <!-- Quick Stats -->
                <div class="info-list">
                    <div class="info-item">
                        <span class="info-label">Estado</span>
                        <span class="info-value" style="color: {{ $laboratorio->estado == 'disponible' ? '#4ade80' : '#f87171' }};">
                            {{ ucfirst($laboratorio->estado ?? 'Desconocido') }}
                        </span>
                    </div>
                     <div class="info-item">
                        <span class="info-label">Capacidad</span>
                        <span class="info-value">{{ $laboratorio->capacidad }} Estudiantes</span>
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
                        Información Detallada
                    </h3>
                </div>

                <div class="form-grid">
                    <div class="form-group span-4">
                        <label>Nombre del Laboratorio</label>
                        <div class="input-wrapper">
                            <i class="fas fa-heading"></i>
                            <input type="text" class="form-input" value="{{ $laboratorio->nombre }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Ubicación</label>
                        <div class="input-wrapper">
                            <i class="fas fa-map-marked-alt"></i>
                            <input type="text" class="form-input" value="{{ $laboratorio->ubicacion }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-2">
                        <label>Encargado</label>
                        <div class="input-wrapper">
                            <i class="fas fa-user-tie"></i>
                            <input type="text" class="form-input" value="{{ $laboratorio->encargado ?? 'No asignado' }}" readonly>
                        </div>
                    </div>

                    <div class="form-group span-4">
                        <label>Descripción / Equipamiento</label>
                        <div class="input-wrapper">
                            <i class="fas fa-align-left" style="top: 1rem;"></i>
                            <textarea class="form-textarea" readonly>{{ $laboratorio->descripcion }}</textarea>
                        </div>
                    </div>
                </div>
                
                <div class="form-actions">
                    <a href="{{ route('admin.laboratorios.edit', $laboratorio->id) }}" class="btn-edit-action">
                        <i class="fas fa-edit"></i>
                        <span>Editar Laboratorio</span>
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/docente/laboratorios/show.js') }}"></script>
@endsection
