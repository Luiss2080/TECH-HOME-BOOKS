@extends('layouts.admin')

@section('title', 'Editar Libro')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/docente/biblioteca/edit.css') }}">
@endsection

@section('content')
<div class="edit-libro-container">
    <!-- Header -->
    <div class="panel-header">
        <div class="header-title">
            <div class="icon-wrapper">
                <i class="fas fa-edit"></i>
            </div>
            <div class="title-content">
                <h2>Editar Libro</h2>
                <p class="subtitle">Actualizar información de la biblioteca</p>
            </div>
        </div>
        <div class="header-actions">
            <a href="{{ route('libros.index') }}" class="btn-secondary-action">
                <i class="fas fa-arrow-left"></i>
                <span>Volver a la Biblioteca</span>
            </a>
        </div>
    </div>

    <!-- Main Form -->
    <form action="{{ route('libros.update', $libro->id) }}" method="POST" enctype="multipart/form-data" id="editLibroForm">
        @csrf
        @method('PUT')
        
        <div class="form-content">
            <!-- Left Column: Portada & Help -->
            <div class="left-column">
                <!-- Portada Card -->
                <div class="form-card profile-card">
                    <div class="photo-preview-container">
                        @if($libro->portada)
                            <img src="{{ asset('storage/' . $libro->portada) }}" alt="Portada" class="photo-preview">
                        @else
                            <div class="photo-placeholder" style="{{ $libro->portada ? 'display: none;' : '' }}">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <img src="" alt="Portada" class="photo-preview" style="display: none;">
                        @endif
                    </div>
                    
                    <div class="photo-upload-btn-wrapper">
                        <button type="button" class="btn-upload-photo">
                            <i class="fas fa-camera"></i>
                            Cambiar Portada
                        </button>
                        <input type="file" name="portada" id="portada" class="file-input" accept="image/*">
                    </div>
                    <p class="photo-help-text">Deje vacío para mantener la actual.</p>
                </div>

                <!-- Help/Status Cards -->
                <div class="help-section-container">
                    <div class="help-cards-list">
                        <div class="help-card-item">
                            <div class="help-icon">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <div class="help-text">
                                <h4>Estado Actual</h4>
                                <p>{{ ucfirst($libro->estado ?? 'disponible') }}</p>
                            </div>
                        </div>
                        <div class="help-card-item">
                            <div class="help-icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            <div class="help-text">
                                <h4>Archivo</h4>
                                <p>{{ $libro->archivo_pdf ? 'PDF Disponible' : 'Sin PDF' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Form Sections -->
            <div class="right-column">
                
                <!-- Card 1: Book Info -->
                <div class="form-card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-book"></i>
                            Información del Libro
                        </h3>
                        <p>Detalles principales de la obra</p>
                    </div>

                    <div class="form-grid">
                        <div class="form-group span-4">
                            <label for="titulo">Título de la Obra <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-heading"></i>
                                <input type="text" id="titulo" name="titulo" class="form-input" placeholder="Ej: Don Quijote de la Mancha" required value="{{ old('titulo', $libro->titulo) }}">
                            </div>
                        </div>

                         <div class="form-group span-2">
                            <label for="autor">Autor(es) <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-pen-nib"></i>
                                <input type="text" id="autor" name="autor" class="form-input" placeholder="Ej: Miguel de Cervantes" required value="{{ old('autor', $libro->autor) }}">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="editorial">Editorial</label>
                            <div class="input-wrapper">
                                <i class="fas fa-building"></i>
                                <input type="text" id="editorial" name="editorial" class="form-input" placeholder="Ej: Alfaguara" value="{{ old('editorial', $libro->editorial) }}">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="isbn">ISBN / Código</label>
                            <div class="input-wrapper">
                                <i class="fas fa-barcode"></i>
                                <input type="text" id="isbn" name="isbn" class="form-input" placeholder="978-3-16-148410-0" value="{{ old('isbn', $libro->isbn) }}">
                            </div>
                        </div>
                        
                        <div class="form-group span-2">
                            <label for="categoria">Categoría</label>
                            <div class="input-wrapper">
                                <i class="fas fa-bookmark"></i>
                                <select id="categoria" name="categoria" class="form-select">
                                    <option value="" disabled>Seleccione...</option>
                                    <option value="Literatura" {{ old('categoria', $libro->categoria) == 'Literatura' ? 'selected' : '' }}>Literatura</option>
                                    <option value="Ciencias" {{ old('categoria', $libro->categoria) == 'Ciencias' ? 'selected' : '' }}>Ciencias</option>
                                    <option value="Historia" {{ old('categoria', $libro->categoria) == 'Historia' ? 'selected' : '' }}>Historia</option>
                                    <option value="Tecnología" {{ old('categoria', $libro->categoria) == 'Tecnología' ? 'selected' : '' }}>Tecnología</option>
                                    <option value="Arte" {{ old('categoria', $libro->categoria) == 'Arte' ? 'selected' : '' }}>Arte</option>
                                    <option value="Idiomas" {{ old('categoria', $libro->categoria) == 'Idiomas' ? 'selected' : '' }}>Idiomas</option>
                                    <option value="Matemáticas" {{ old('categoria', $libro->categoria) == 'Matemáticas' ? 'selected' : '' }}>Matemáticas</option>
                                     <option value="Otros" {{ old('categoria', $libro->categoria) == 'Otros' ? 'selected' : '' }}>Otros</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="nivel_educativo">Nivel Educativo</label>
                            <div class="input-wrapper">
                                <i class="fas fa-graduation-cap"></i>
                                <select id="nivel_educativo" name="nivel_educativo" class="form-select">
                                    <option value="" disabled>Seleccione...</option>
                                    <option value="Primaria" {{ old('nivel_educativo', $libro->nivel_educativo) == 'Primaria' ? 'selected' : '' }}>Primaria</option>
                                    <option value="Secundaria" {{ old('nivel_educativo', $libro->nivel_educativo) == 'Secundaria' ? 'selected' : '' }}>Secundaria</option>
                                    <option value="General" {{ old('nivel_educativo', $libro->nivel_educativo) == 'General' ? 'selected' : '' }}>General</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="fecha_publicacion">Fecha de Publicación</label>
                            <div class="input-wrapper">
                                <i class="fas fa-calendar-alt"></i>
                                <input type="date" id="fecha_publicacion" name="fecha_publicacion" class="form-input" value="{{ old('fecha_publicacion', $libro->fecha_publicacion ? $libro->fecha_publicacion->format('Y-m-d') : '') }}">
                            </div>
                        </div>
                        
                        <div class="form-group span-4">
                            <label for="descripcion">Descripción / Resumen</label>
                            <div class="input-wrapper">
                                <i class="fas fa-align-left"></i>
                                <textarea id="descripcion" name="descripcion" class="form-textarea" placeholder="Reseña breve del libro...">{{ old('descripcion', $libro->descripcion) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Card 2: Inventory & Files -->
                <div class="form-card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-boxes"></i>
                            Inventario y Archivos
                        </h3>
                        <p>Gestión de ejemplares y formatos</p>
                    </div>

                    <div class="form-grid">
                        <div class="form-group span-2">
                            <label for="disponibilidad">Cantidad (Stock) <span>*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-layer-group"></i>
                                <input type="number" id="disponibilidad" name="disponibilidad" class="form-input" placeholder="0" min="0" required value="{{ old('disponibilidad', $libro->disponibilidad) }}">
                            </div>
                        </div>

                        <div class="form-group span-2">
                            <label for="estado">Estado</label>
                            <div class="input-wrapper">
                                <i class="fas fa-toggle-on"></i>
                                <select id="estado" name="estado" class="form-select">
                                    <option value="disponible" {{ old('estado', $libro->estado) == 'disponible' ? 'selected' : '' }}>Disponible</option>
                                    <option value="agotado" {{ old('estado', $libro->estado) == 'agotado' ? 'selected' : '' }}>Agotado</option>
                                    <option value="mantenimiento" {{ old('estado', $libro->estado) == 'mantenimiento' ? 'selected' : '' }}>En Mantenimiento</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group span-4">
                            <label for="archivo_pdf">Archivo Digital (PDF)</label>
                            <div class="input-wrapper">
                                <i class="fas fa-file-upload"></i>
                                <input type="file" id="archivo_pdf" name="archivo_pdf" class="form-input" accept="application/pdf">
                            </div>
                            @if($libro->archivo_pdf)
                                <small style="color: var(--primary-red); margin-top: 5px; display: block;">
                                    <i class="fas fa-check-circle"></i> Archivo actual: {{ basename($libro->archivo_pdf) }}
                                </small>
                            @endif
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="form-status-badge">
                            <i class="fas fa-edit"></i>
                            <span>Modo Edición</span>
                        </div>
                        <div class="action-buttons">
                            <a href="{{ route('libros.index') }}" class="btn-cancel">Cancelar</a>
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-save"></i>
                                <span>Actualizar Libro</span>
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
<script src="{{ asset('js/docente/biblioteca/edit.js') }}"></script>
@endsection
