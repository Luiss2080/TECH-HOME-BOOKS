@extends('layouts.admin')

@section('title', 'Gestión de Docentes')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/docentes/index.css') }}">
@endsection

@section('content')
<div class="docentes-container">
    <!-- Control Panel Section -->
    <div class="control-panel">
        <div class="panel-header">
            <div class="header-title">
                <div class="icon-wrapper">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="title-content">
                    <h2>Gestión de Docentes</h2>
                    <p class="subtitle">Administra el personal académico, asignaciones y evaluaciones</p>
                </div>
            </div>
            <div class="header-actions">
                <a href="{{ route('admin.docentes.create') }}" class="btn-primary-action">
                    <i class="fas fa-plus"></i>
                    <span>Nuevo Docente</span>
                </a>
            </div>
        </div>

        <div class="panel-content">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Buscar por nombre, documento o especialidad..." value="{{ request('search') }}">
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
    
    <!-- Tabla -->
    <div class="table-section">
        <div class="table-responsive">
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>Docente</th>
                        <th>Documento</th>
                        <th>Especialidad</th>
                        <th>Estado</th>
                        <th>Contrato</th>
                        <th>Ranking</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($docentes as $docente)
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="avatar-circle">
                                        {{ strtoupper(substr($docente->user->name ?? '?', 0, 1) . substr($docente->user->apellido ?? '?', 0, 1)) }}
                                    </div>
                                    <div class="details">
                                        <span class="name">{{ $docente->user->name ?? 'N/A' }} {{ $docente->user->apellido ?? '' }}</span>
                                        <span class="role">{{ $docente->user->email ?? 'Sin email' }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="id-info">
                                    <span class="primary-text">{{ $docente->user->ci ?? 'N/A' }}</span>
                                    <span class="sub-text">{{ $docente->codigo_docente }}</span>
                                </div>
                            </td>
                            <td>
                                 <span class="badge specialty">
                                    {{ $docente->especialidad }}
                                 </span>
                            </td>
                            <td>
                                <span class="badge {{ $docente->estado_laboral == 'activo' ? 'active' : 'inactive' }}">
                                    {{ ucfirst($docente->estado_laboral) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge contract">
                                    {{ ucfirst(str_replace('_', ' ', $docente->tipo_contrato)) }}
                                </span>
                            </td>
                            <td>
                                <div class="rating-badge">
                                    <i class="fas fa-star"></i>
                                    <span>5.0</span>
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.docentes.show', $docente->id) }}" class="btn-icon view" title="Ver Detalles">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.docentes.edit', $docente->id) }}" class="btn-icon edit" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn-icon delete" onclick="confirmDelete({{ $docente->id }})" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <form id="delete-form-{{ $docente->id }}" action="{{ route('admin.docentes.destroy', $docente->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center" style="padding: 3rem; color: var(--text-muted);">
                                No se encontraron docentes registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="pagination-wrapper">
            {{ $docentes->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/admin/docentes/index.js') }}"></script>
    <script>
        // Update styling of SweetAlert to match theme
        const swalTheme = {
            confirmButtonColor: '#e11d48',
            cancelButtonColor: '#64748b',
            background: '#ffffff',
            color: '#1e293b'
        };
    </script>
@endsection
