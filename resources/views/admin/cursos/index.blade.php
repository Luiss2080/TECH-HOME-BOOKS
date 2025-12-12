@extends('layouts.admin')

@section('title', 'Gestión de Cursos')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/cursos/index.css') }}">
@endsection

@section('content')
<div class="cursos-container">
    <!-- Control Panel Section -->
    <div class="control-panel">
        <div class="panel-header">
            <div class="header-title">
                <div class="icon-wrapper">
                    <i class="fas fa-layer-group"></i>
                </div>
                <div class="title-content">
                    <h2>Gestión de Cursos</h2>
                    <p class="subtitle">Administra los niveles, grados y secciones académicas</p>
                </div>
            </div>
            <div class="header-actions">
                <a href="{{ route('admin.cursos.create') }}" class="btn-primary-action">
                    <i class="fas fa-plus"></i>
                    <span>Nuevo Curso</span>
                </a>
            </div>
        </div>

        <div class="panel-content">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Buscar por nombre, nivel o aula..." value="{{ request('search') }}">
            </div>
            
            <div class="filter-group">
                <div class="select-wrapper">
                    <i class="fas fa-graduation-cap"></i>
                    <select id="levelSelect">
                        <option value="">Todos los Niveles</option>
                        <option value="inicial" {{ request('nivel') == 'inicial' ? 'selected' : '' }}>Nivel Inicial</option>
                        <option value="primaria" {{ request('nivel') == 'primaria' ? 'selected' : '' }}>Primaria</option>
                        <option value="secundaria" {{ request('nivel') == 'secundaria' ? 'selected' : '' }}>Secundaria</option>
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
                        <th>Curso</th>
                        <th>Nivel</th>
                        <th>Sección</th>
                        <th>Turno / Aula</th>
                        <th>Estudiantes</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cursos as $curso)
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="avatar-circle" style="background: #fdf4ff; color: #a21caf;">
                                        {{ substr($curso->grado ?? 'C', 0, 1) }}{{ substr($curso->seccion ?? '?', 0, 1) }}
                                    </div>
                                    <div class="details">
                                        <span class="name">{{ $curso->nombre }}</span>
                                        <span class="role">Año: {{ $curso->año_lectivo ?? date('Y') }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                 <span class="badge level {{ strtolower($curso->nivel) }}">
                                    {{ ucfirst($curso->nivel) }}
                                 </span>
                            </td>
                            <td>
                                <span class="primary-text">{{ $curso->seccion ?? '-' }}</span>
                            </td>
                            <td>
                                <div class="id-info">
                                    <span class="primary-text">{{ ucfirst($curso->turno) }}</span>
                                    <span class="sub-text">Aula {{ $curso->aula ?? 'N/A' }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="badge students">
                                    <i class="fas fa-users" style="font-size: 0.7rem; margin-right: 4px;"></i>
                                    {{ $curso->estudiantes_count }} / {{ $curso->cupo_maximo }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.cursos.show', $curso->id) }}" class="btn-icon view" title="Ver Detalles">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.cursos.edit', $curso->id) }}" class="btn-icon edit" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn-icon delete" onclick="confirmDelete({{ $curso->id }})" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <form id="delete-form-{{ $curso->id }}" action="{{ route('admin.cursos.destroy', $curso->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center" style="padding: 3rem; color: var(--text-muted);">
                                No se encontraron cursos registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="pagination-wrapper">
            {{ $cursos->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/admin/cursos/index.js') }}"></script>
    <script>
        const swalTheme = {
            confirmButtonColor: '#e11d48',
            cancelButtonColor: '#64748b',
            background: '#ffffff',
            color: '#1e293b'
        };
    </script>
@endsection