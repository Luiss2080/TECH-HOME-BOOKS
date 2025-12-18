@extends('layouts.admin')

@section('title', 'Editar Curso')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/cursos/edit.css') }}">
@endsection

@section('content')
<div class="edit-curso-container">
    <!-- Header -->
    <div class="panel-header">
        <div class="header-title">
            <div class="icon-wrapper">
                <i class="fas fa-edit"></i>
            </div>
            <div class="title-content">
                <h2>Editar Curso</h2>
                <p class="subtitle">Actualice los datos del curso</p>
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
    <form action="{{ route('admin.cursos.update', $curso->id) }}" method="POST" id="editCursoForm">
        @csrf
        @method('PUT')
        
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
                                <option value="" disabled>Elija una opción...</option>
                                @foreach($colegios as $colegio)
                                    <option value="{{ $colegio->id }}" {{ old('colegio_id', $curso->colegio_id) == $colegio->id ? 'selected' : '' }}>
                                        {{ $colegio->nombre }}
                                    </option>
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
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <div class="help-text">
                                <h4>Edición</h4>
                                <p>Modifique los datos necesarios.</p>
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
                                <input type="text" id="nombre" name="nombre" class="form-input" placeholder="Ej: 1ro de Secundaria A" required value="{{ old('nombre', $curso->nombre) }}">
                            </div>
                        </div>

                         <div class="form-group span-2">
                            <label for="aula">Aula / Ambiente</label>
                            <div class="input-wrapper">
                                <i class="fas fa-door-open"></i>
                                <input type="text" id="aula" name="aula" class="form-input" placeholder="Ej: Bloque B - 101" value="{{ old('aula', $curso->aula) }}">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="nivel">Nivel Educativo <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-graduation-cap"></i>
                                <select id="nivel" name="nivel" class="form-select" required>
                                    <option value="" disabled>Seleccione...</option>
                                    <option value="Inicial" {{ old('nivel', $curso->nivel) == 'Inicial' ? 'selected' : '' }}>Inicial</option>
                                    <option value="Primaria" {{ old('nivel', $curso->nivel) == 'Primaria' ? 'selected' : '' }}>Primaria</option>
                                    <option value="Secundaria" {{ old('nivel', $curso->nivel) == 'Secundaria' ? 'selected' : '' }}>Secundaria</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="grado">Grado Escolar <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-sort-numeric-up"></i>
                                <select id="grado" name="grado" class="form-select" required>
                                    <option value="" disabled>Seleccione...</option>
                                    <option value="1" {{ old('grado', $curso->grado) == '1' ? 'selected' : '' }}>1ro</option>
                                    <option value="2" {{ old('grado', $curso->grado) == '2' ? 'selected' : '' }}>2do</option>
                                    <option value="3" {{ old('grado', $curso->grado) == '3' ? 'selected' : '' }}>3ro</option>
                                    <option value="4" {{ old('grado', $curso->grado) == '4' ? 'selected' : '' }}>4to</option>
                                    <option value="5" {{ old('grado', $curso->grado) == '5' ? 'selected' : '' }}>5to</option>
                                    <option value="6" {{ old('grado', $curso->grado) == '6' ? 'selected' : '' }}>6to</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="seccion">Paralelo / Sección</label>
                            <div class="input-wrapper">
                                <i class="fas fa-columns"></i>
                                <input type="text" id="seccion" name="seccion" class="form-input" placeholder="Ej: A, B, Azul, Rojo" value="{{ old('seccion', $curso->seccion) }}">
                            </div>
                        </div>

                         <div class="form-group span-2">
                            <label for="turno">Turno</label>
                            <div class="input-wrapper">
                                <i class="fas fa-sun"></i>
                                <select id="turno" name="turno" class="form-select">
                                    <option value="Mañana" {{ old('turno', $curso->turno) == 'Mañana' ? 'selected' : '' }}>Mañana</option>
                                    <option value="Tarde" {{ old('turno', $curso->turno) == 'Tarde' ? 'selected' : '' }}>Tarde</option>
                                    <option value="Noche" {{ old('turno', $curso->turno) == 'Noche' ? 'selected' : '' }}>Noche</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="año_lectivo">Gestión (Año)</label>
                            <div class="input-wrapper">
                                <i class="fas fa-calendar"></i>
                                <input type="number" id="año_lectivo" name="año_lectivo" class="form-input" value="{{ old('año_lectivo', $curso->año_lectivo) }}" min="2000">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="cupo_maximo">Cupo Máximo</label>
                            <div class="input-wrapper">
                                <i class="fas fa-users"></i>
                                <input type="number" id="cupo_maximo" name="cupo_maximo" class="form-input" value="{{ old('cupo_maximo', $curso->cupo_maximo) }}" min="1">
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="form-status-badge">
                            <i class="fas fa-edit"></i>
                            <span>Modo Edición</span>
                        </div>
                        <div class="action-buttons">
                            <a href="{{ route('admin.cursos.index') }}" class="btn-cancel">Cancelar</a>
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-save"></i>
                                <span>Actualizar Curso</span>
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
<script src="{{ asset('js/admin/cursos/edit.js') }}"></script>
@endsection