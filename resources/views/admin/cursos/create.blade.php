@extends('layouts.admin')

@section('title', 'Nuevo Curso')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/cursos/create.css') }}">
@endsection

@section('content')
<div class="create-curso-container">
    <!-- Header -->
    <div class="panel-header">
        <div class="header-title">
            <div class="icon-wrapper">
                <i class="fas fa-chalkboard"></i>
            </div>
            <div class="title-content">
                <h2>Nuevo Curso</h2>
                <p class="subtitle">Registre un nuevo curso o paralelo</p>
            </div>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.cursos.index') }}" class="btn-secondary-action">
                <i class="fas fa-arrow-left"></i>
                <span>Volver a la lista</span>
            </a>
        </div>
    </div>

    <!-- Main Form -->
    <form action="{{ route('admin.cursos.store') }}" method="POST" id="createCursoForm">
        @csrf
        <div class="form-content">
            <!-- Left Column: Assignment & Help -->
            <div class="left-column">
                <!-- Assign College -->
                <div class="form-card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-school"></i>
                            Institución
                        </h3>
                        <p>Colegio al que pertenece</p>
                    </div>
                    
                     <div class="form-group">
                        <label for="colegio_id">Seleccionar Colegio <span>*</span></label>
                        <div class="input-wrapper">
                            <i class="fas fa-building"></i>
                            <select id="colegio_id" name="colegio_id" class="form-select" required>
                                <option value="" disabled selected>Elija una opción...</option>
                                @foreach($colegios as $colegio)
                                    <option value="{{ $colegio->id }}">{{ $colegio->nombre }}</option>
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
                                <h4>Niveles</h4>
                                <p>Asegúrese de seleccionar el nivel correcto.</p>
                            </div>
                        </div>
                        <div class="help-card-item">
                            <div class="help-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="help-text">
                                <h4>Turnos</h4>
                                <p>Defina si es Mañana o Tarde.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Form Sections -->
            <div class="right-column">
                
                <!-- Card 1: Course Info -->
                <div class="form-card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-info-circle"></i>
                            Información del Curso
                        </h3>
                        <p>Datos académicos básicos</p>
                    </div>

                    <div class="form-grid">
                        <div class="form-group span-2">
                            <label for="nombre">Nombre del Curso <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-tag"></i>
                                <input type="text" id="nombre" name="nombre" class="form-input" placeholder="Ej: 1ro de Secundaria A" required>
                            </div>
                        </div>

                         <div class="form-group span-2">
                            <label for="aula">Aula / Ambiente</label>
                            <div class="input-wrapper">
                                <i class="fas fa-door-open"></i>
                                <input type="text" id="aula" name="aula" class="form-input" placeholder="Ej: Bloque B - 101">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="nivel">Nivel Educativo <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-graduation-cap"></i>
                                <select id="nivel" name="nivel" class="form-select" required>
                                    <option value="" disabled selected>Seleccione...</option>
                                    <option value="Inicial">Inicial</option>
                                    <option value="Primaria">Primaria</option>
                                    <option value="Secundaria">Secundaria</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="grado">Grado Escolar <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-sort-numeric-up"></i>
                                <select id="grado" name="grado" class="form-select" required>
                                    <option value="" disabled selected>Seleccione...</option>
                                    <option value="1">1ro</option>
                                    <option value="2">2do</option>
                                    <option value="3">3ro</option>
                                    <option value="4">4to</option>
                                    <option value="5">5to</option>
                                    <option value="6">6to</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="seccion">Paralelo / Sección</label>
                            <div class="input-wrapper">
                                <i class="fas fa-columns"></i>
                                <input type="text" id="seccion" name="seccion" class="form-input" placeholder="Ej: A, B, Azul, Rojo">
                            </div>
                        </div>

                         <div class="form-group span-2">
                            <label for="turno">Turno</label>
                            <div class="input-wrapper">
                                <i class="fas fa-sun"></i>
                                <select id="turno" name="turno" class="form-select">
                                    <option value="Mañana">Mañana</option>
                                    <option value="Tarde">Tarde</option>
                                    <option value="Noche">Noche</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="año_lectivo">Gestión (Año)</label>
                            <div class="input-wrapper">
                                <i class="fas fa-calendar"></i>
                                <input type="number" id="año_lectivo" name="año_lectivo" class="form-input" value="{{ date('Y') }}" min="2000">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="cupo_maximo">Cupo Máximo</label>
                            <div class="input-wrapper">
                                <i class="fas fa-users"></i>
                                <input type="number" id="cupo_maximo" name="cupo_maximo" class="form-input" value="30" min="1">
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="form-status-badge">
                            <i class="fas fa-plus-circle"></i>
                            <span>Nuevo Curso</span>
                        </div>
                        <div class="action-buttons">
                            <a href="{{ route('admin.cursos.index') }}" class="btn-cancel">Cancelar</a>
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-save"></i>
                                <span>Guardar Curso</span>
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
<script src="{{ asset('js/admin/cursos/create.js') }}"></script>
@endsection