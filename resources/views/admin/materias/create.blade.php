@extends('layouts.admin')

@section('title', 'Nueva Materia')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/materias/create.css') }}">
@endsection

@section('content')
<div class="create-materia-container">
    <!-- Header -->
    <div class="panel-header">
        <div class="header-title">
            <div class="icon-wrapper">
                <i class="fas fa-book-open"></i>
            </div>
            <div class="title-content">
                <h2>Nueva Materia</h2>
                <p class="subtitle">Registre una nueva asignatura curricular</p>
            </div>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.materias.index') }}" class="btn-secondary-action">
                <i class="fas fa-arrow-left"></i>
                <span>Volver a la lista</span>
            </a>
        </div>
    </div>

    <!-- Main Form -->
    <form action="{{ route('admin.materias.store') }}" method="POST" id="createMateriaForm">
        @csrf
        <div class="form-content">
            <!-- Left Column: Assignment & Help -->
            <div class="left-column">
                <!-- Assign Course -->
                <div class="form-card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-chalkboard"></i>
                            Asignación
                        </h3>
                        <p>Curso al que pertenece</p>
                    </div>
                    
                     <div class="form-group">
                        <label for="curso_id">Seleccionar Curso <span>*</span></label>
                        <div class="input-wrapper">
                            <i class="fas fa-graduation-cap"></i>
                            <select id="curso_id" name="curso_id" class="form-select" required>
                                <option value="" disabled selected>Elija una opción...</option>
                                @foreach($cursos as $curso)
                                    <option value="{{ $curso->id }}">{{ $curso->nombre }} ({{ $curso->nivel }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Help/Status Cards -->
                <div class="help-section-container">
                    <div class="help-cards-list">
                        <div class="help-card-item">
                            <div class="help-icon">
                                <i class="fas fa-layer-group"></i>
                            </div>
                            <div class="help-text">
                                <h4>Siglas</h4>
                                <p>Use un código único (ej: FIS-101).</p>
                            </div>
                        </div>
                        <div class="help-card-item">
                            <div class="help-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="help-text">
                                <h4>Carga Horaria</h4>
                                <p>Defina las horas semanales.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Form Sections -->
            <div class="right-column">
                
                <!-- Card 1: Subject Info -->
                <div class="form-card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-info-circle"></i>
                            Información Académica
                        </h3>
                        <p>Detalles de la asignatura</p>
                    </div>

                    <div class="form-grid">
                        <div class="form-group span-2">
                            <label for="nombre">Nombre de la Materia <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-book"></i>
                                <input type="text" id="nombre" name="nombre" class="form-input" placeholder="Ej: Física Fundamental" required>
                            </div>
                        </div>

                         <div class="form-group span-2">
                            <label for="codigo">Código / Sigla <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-barcode"></i>
                                <input type="text" id="codigo" name="codigo" class="form-input" placeholder="FIS-101" required>
                            </div>
                        </div>

                        <div class="form-group span-4">
                            <label for="descripcion">Descripción</label>
                            <textarea id="descripcion" name="descripcion" class="form-textarea" placeholder="Breve descripción de los objetivos de la materia..."></textarea>
                        </div>

                        <div class="form-group span-2">
                            <label for="horas_semanales">Horas Semanales</label>
                            <div class="input-wrapper">
                                <i class="fas fa-hourglass-half"></i>
                                <input type="number" id="horas_semanales" name="horas_semanales" class="form-input" value="4" min="1">
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="form-status-badge">
                            <i class="fas fa-plus-circle"></i>
                            <span>Nueva Materia</span>
                        </div>
                        <div class="action-buttons">
                            <a href="{{ route('admin.materias.index') }}" class="btn-cancel">Cancelar</a>
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-save"></i>
                                <span>Guardar Materia</span>
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
<script src="{{ asset('js/admin/materias/create.js') }}"></script>
@endsection