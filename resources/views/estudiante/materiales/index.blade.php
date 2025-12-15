@extends('layouts.admin')

@section('title', 'Materiales de Estudio')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/estudiante/materiales/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/paginacion.css') }}">
@endsection

@section('content')
<div class="materiales-container">
    <!-- Control Panel Section -->
    <div class="control-panel">
        <div class="panel-header">
            <div class="header-title">
                <div class="icon-wrapper">
                    <i class="fas fa-folder-open"></i>
                </div>
                <div class="title-content">
                    <h2>Materiales de Estudio</h2>
                    <p class="subtitle">Recursos educativos y guías asignadas a tus cursos</p>
                </div>
            </div>
            {{-- No 'New Resource' button for students --}}
        </div>

        <div class="panel-content">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Buscar por título, materia o descripción..." value="{{ request('search') }}">
            </div>
            
            <div class="filter-group">
                <div class="select-wrapper">
                    <i class="fas fa-filter"></i>
                    <select id="typeSelect">
                        <option value="">Todos los Tipos</option>
                        <option value="documento" {{ request('tipo') == 'documento' ? 'selected' : '' }}>Documentos (PDF/Word)</option>
                        <option value="video" {{ request('tipo') == 'video' ? 'selected' : '' }}>Videos</option>
                        <option value="presentacion" {{ request('tipo') == 'presentacion' ? 'selected' : '' }}>Presentaciones</option>
                        <option value="enlace" {{ request('tipo') == 'enlace' ? 'selected' : '' }}>Enlaces Web</option>
                        <option value="otro" {{ request('tipo') == 'otro' ? 'selected' : '' }}>Otros</option>
                    </select>
                </div>

                <div class="select-wrapper">
                    <i class="fas fa-list-ol"></i>
                    <select id="entriesSelect">
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10 por pág.</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25 por pág.</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50 por pág.</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Tabla -->
    <div class="table-section">
        <div class="table-responsive">
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th style="width: 60px;">Tipo</th>
                        <th>Recurso</th>
                        <th>Asignatura</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($materiales as $material)
                        <tr>
                            <td>
                                <div class="file-icon {{ strtolower($material->tipo) }}">
                                    @switch(strtolower($material->tipo))
                                        @case('documento')
                                        @case('pdf')
                                            <i class="fas fa-file-pdf"></i>
                                            @break
                                        @case('video')
                                            <i class="fas fa-file-video"></i>
                                            @break
                                        @case('presentacion')
                                            <i class="fas fa-file-powerpoint"></i>
                                            @break
                                        @case('enlace')
                                            <i class="fas fa-link"></i>
                                            @break
                                        @default
                                            <i class="fas fa-file-alt"></i>
                                    @endswitch
                                </div>
                            </td>
                            <td>
                                <div class="resource-details">
                                    <span class="title">{{ $material->titulo }}</span>
                                    <span class="meta">Publicado: {{ $material->fecha_publicacion ? $material->fecha_publicacion->format('d/m/Y') : 'N/A' }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="subject-info">
                                    <span class="subject-name">{{ $material->materia->nombre ?? 'General' }}</span>
                                    <span class="teacher-name">{{ $material->docente->user->nombre_completo ?? 'Docente' }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="badge status {{ $material->estado == 'publicado' ? 'published' : 'draft' }}">
                                    {{ ucfirst($material->estado) }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    @if(Route::has('estudiante.materiales.show'))
                                    <a href="{{ route('estudiante.materiales.show', $material->id) }}" class="btn-icon view" title="Ver Detalles">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @else
                                    <button class="btn-icon view" title="Ver Detalles (No implementado)">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    @endif
                                    {{-- Edit/Delete removed for students --}}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center" style="padding: 3rem; color: var(--text-muted);">
                                No se encontraron materiales disponibles
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="pagination-wrapper">
        {{ $materiales->appends(request()->query())->links('pages.materiales') }}
    </div>
</div>
@endsection

@section('js')
    <script>
        // Simple script for handling filters change
        document.getElementById('typeSelect').addEventListener('change', function() {
            let url = new URL(window.location.href);
            url.searchParams.set('tipo', this.value);
            url.searchParams.set('page', 1);
            window.location.href = url.toString();
        });

        document.getElementById('entriesSelect').addEventListener('change', function() {
            let url = new URL(window.location.href);
            url.searchParams.set('per_page', this.value);
            url.searchParams.set('page', 1);
            window.location.href = url.toString();
        });
        
        // Search functionality
        let timeout = null;
        document.getElementById('searchInput').addEventListener('keyup', function() {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                let url = new URL(window.location.href);
                url.searchParams.set('search', this.value);
                url.searchParams.set('page', 1);
                window.location.href = url.toString();
            }, 800);
        });
    </script>
@endsection
