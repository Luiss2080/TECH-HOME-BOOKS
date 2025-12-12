@extends('layouts.admin')

@section('title', 'Material Didáctico')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/docente/materiales/index.css') }}">
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
                    <h2>Material Didáctico</h2>
                    <p class="subtitle">Repositorio de recursos educativos y guías de estudio</p>
                </div>
            </div>
            <div class="header-actions">
                <a href="{{ route('admin.materiales.create') }}" class="btn-primary-action">
                    <i class="fas fa-plus"></i>
                    <span>Nuevo Recurso</span>
                </a>
            </div>
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
                
                <button class="btn-secondary-action">
                    <i class="fas fa-file-export"></i>
                    <span>Exportar</span>
                </button>
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
                        <th>Destinatario</th>
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
                                    <span class="meta">Publicado: {{ $material->fecha_publicacion ? $material->fecha_publicacion->format('d/m/Y') : 'Borrador' }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="subject-info">
                                    <span class="subject-name">{{ $material->materia->nombre ?? 'General' }}</span>
                                    <span class="teacher-name">{{ $material->docente->user->nombre_completo ?? 'Admin' }}</span>
                                </div>
                            </td>
                            <td>
                                 <span class="badge course">
                                    {{ $material->curso->nombre ?? 'Todos' }}
                                 </span>
                            </td>
                            <td>
                                <span class="badge status {{ $material->estado == 'publicado' ? 'published' : 'draft' }}">
                                    {{ ucfirst($material->estado) }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.materiales.show', $material->id) }}" class="btn-icon view" title="Ver Detalles">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.materiales.edit', $material->id) }}" class="btn-icon edit" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn-icon delete" onclick="confirmDelete({{ $material->id }})" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <form id="delete-form-{{ $material->id }}" action="{{ route('admin.materiales.destroy', $material->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center" style="padding: 3rem; color: var(--text-muted);">
                                No se encontraron materiales didácticos
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="pagination-wrapper">
            {{ $materiales->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/docente/materiales/index.js') }}"></script>
    <script>
        const swalTheme = {
            confirmButtonColor: '#e11d48',
            cancelButtonColor: '#64748b',
            background: '#ffffff',
            color: '#1e293b'
        };
    </script>
@endsection
