@extends('layouts.admin')

@section('title', 'Gestión de Estudiantes')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/estudiantes/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/paginacion.css') }}">
@endsection

@section('content')
<div class="estudiantes-container">
    <!-- Control Panel Section -->
    <div class="control-panel">
        <div class="panel-header">
            <div class="header-title">
                <div class="icon-wrapper">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="title-content">
                    <h2>Gestión de Estudiantes</h2>
                    <p class="subtitle">Administra la información académica, inscripciones y seguimiento</p>
                </div>
            </div>
            <div class="header-actions">
                <a href="{{ route('admin.estudiantes.create') }}" class="btn-primary-action">
                    <i class="fas fa-plus"></i>
                    <span>Nuevo Estudiante</span>
                </a>
            </div>
        </div>

        <div class="panel-content">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Buscar por nombre, documento o curso..." value="{{ request('search') }}">
            </div>
            
            <div class="filter-group">
                <div class="select-wrapper">
                    <i class="fas fa-list-ol"></i>
                    <select id="entriesSelect">
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10 por pág.</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25 por pág.</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50 por pág.</option>
                    </select>
                </div>
                
                <button class="btn-secondary-action">
                    <i class="fas fa-filter"></i>
                    <span>Filtros</span>
                </button>
                
                <button class="btn-secondary-action">
                    <i class="fas fa-file-export"></i>
                    <span>Exportar</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="table-section">
        <div class="table-responsive">
            <table class="dashboard-table">
                <!-- ... table content ... -->
                <thead>
                    <tr>
                        <th>Estudiante</th>
                        <th>Documento</th>
                        <th>Curso</th>
                        <th>Tutor</th>
                        <th>Estado</th>
                        <th>Fecha Inscripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($estudiantes as $estudiante)
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="avatar-circle">
                                        @if($estudiante->user->avatar)
                                            <img src="{{ asset('storage/' . $estudiante->user->avatar) }}" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover; border-radius: 12px;">
                                        @else
                                            {{ strtoupper(substr($estudiante->user->name ?? '?', 0, 1) . substr($estudiante->user->apellido ?? '?', 0, 1)) }}
                                        @endif
                                    </div>
                                    <div class="details">
                                        <span class="name">{{ $estudiante->user->nombre_completo ?? 'N/A' }}</span>
                                        <span class="role">{{ $estudiante->user->email ?? 'Sin email' }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="id-info">
                                    <span class="primary-text">{{ $estudiante->user->ci ?? '-' }}</span>
                                    <span class="sub-text">{{ $estudiante->codigo_estudiante }}</span>
                                </div>
                            </td>
                            <td>
                                 <span class="badge specialty">
                                    {{ $estudiante->curso->nombre ?? 'Sin Curso' }}
                                 </span>
                            </td>
                            <td>
                                <div class="id-info">
                                    <span class="primary-text">{{ $estudiante->tutor_nombre ?? 'N/A' }}</span>
                                    <span class="sub-text">{{ $estudiante->tutor_telefono ?? '-' }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="badge {{ $estudiante->estado_academico == 'activo' ? 'active' : 'inactive' }}">
                                    {{ ucfirst($estudiante->estado_academico) }}
                                </span>
                            </td>
                            <td>
                                <span class="sub-text" style="font-weight: 600; color: var(--text-dark);">
                                    {{ $estudiante->fecha_inscripcion ? $estudiante->fecha_inscripcion->format('d/m/Y') : '-' }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.estudiantes.show', $estudiante->id) }}" class="btn-icon view" title="Ver Detalles">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.estudiantes.edit', $estudiante->id) }}" class="btn-icon edit" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn-icon delete" onclick="confirmDelete({{ $estudiante->id }})" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <form id="delete-form-{{ $estudiante->id }}" action="{{ route('admin.estudiantes.destroy', $estudiante->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center" style="padding: 3rem; color: var(--text-muted);">
                                No se encontraron estudiantes registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div> <!-- Close table-responsive -->
    </div> <!-- Close table-section -->
    
    <div class="pagination-wrapper">
        {{ $estudiantes->appends(request()->query())->links('pages.estudiantes') }}
    </div>
</div> <!-- Close container -->
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/admin/estudiantes/index.js') }}"></script>
    <script>
        const swalTheme = {
            confirmButtonColor: '#e11d48',
            cancelButtonColor: '#64748b',
            background: '#ffffff',
            color: '#1e293b'
        };
    </script>
@endsection