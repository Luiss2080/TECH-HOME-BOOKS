@extends('layouts.admin')

@section('title', 'Gestión de Materias')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/materias/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/paginacion.css') }}">
@endsection

@section('content')
<div class="materias-container">
    <!-- Control Panel Section -->
    <div class="control-panel">
        <div class="panel-header">
            <div class="header-title">
                <div class="icon-wrapper">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="title-content">
                    <h2>Materias</h2>
                    <p class="subtitle">Administración del plan de estudios y asignaturas</p>
                </div>
            </div>
            <div class="header-actions">
                <a href="{{ route('admin.materias.create') }}" class="btn-primary-action">
                    <i class="fas fa-plus"></i>
                    <span>Nueva Materia</span>
                </a>
            </div>
        </div>

        <div class="panel-content">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Buscar por nombre o código..." value="{{ request('search') }}">
            </div>
            
            <div class="filter-group">
                <div class="select-wrapper">
                    <i class="fas fa-filter"></i>
                    <select id="gradeSelect">
                        <option value="">Todos los Niveles</option>
                        <option value="Primaria" {{ request('grado') == 'Primaria' ? 'selected' : '' }}>Primaria</option>
                        <option value="Secundaria" {{ request('grado') == 'Secundaria' ? 'selected' : '' }}>Secundaria</option>
                        <option value="Bachillerato" {{ request('grado') == 'Bachillerato' ? 'selected' : '' }}>Bachillerato</option>
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
                
                <a href="#" class="btn-primary-action" title="Exportar" style="padding: 0.75rem 1.5rem; border-radius: 12px;">
                    <i class="fas fa-file-export"></i>
                    <span>Exportar</span>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Tabla -->
    <div class="table-section">
        <div class="table-responsive">
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Materia</th>
                        <th>Curso / Nivel</th>
                        <th>Intensidad Horaria</th>
                        <th>Docentes</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($materias as $materia)
                        <tr>
                            <td>
                                <span class="code-badge">{{ $materia->codigo }}</span>
                            </td>
                            <td>
                                <div class="subject-details">
                                    <span class="name">{{ $materia->nombre }}</span>
                                    <span class="description">{{ Str::limit($materia->descripcion, 50) }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="course-info">
                                    <span class="course-name">{{ $materia->curso->nombre }}</span>
                                    <span class="badge level {{ strtolower($materia->curso->nivel) }}">{{ $materia->curso->nivel }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="hours-info">
                                    <i class="far fa-clock"></i> {{ $materia->horas_semanales }} Horas/Semana
                                </div>
                            </td>
                            <td>
                                <div class="teachers-list">
                                    @if($materia->docentes->count() > 0)
                                        <div class="avatars-group">
                                            @foreach($materia->docentes->take(3) as $docente)
                                                <div class="avatar-sm" title="{{ $docente->nombre }}">
                                                    <span>{{ substr($docente->nombre, 0, 1) }}</span>
                                                </div>
                                            @endforeach
                                            @if($materia->docentes->count() > 3)
                                                <div class="avatar-sm more">
                                                    <span>+{{ $materia->docentes->count() - 3 }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-muted small">Sin asignar</span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.materias.show', $materia->id) }}" class="btn-icon view" title="Ver Detalles">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.materias.edit', $materia->id) }}" class="btn-icon edit" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn-icon delete" onclick="confirmDelete({{ $materia->id }})" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <form id="delete-form-{{ $materia->id }}" action="{{ route('admin.materias.destroy', $materia->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center" style="padding: 3rem; color: var(--text-muted);">
                                No se encontraron materias registradas
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="pagination-wrapper">
        {{ $materias->appends(request()->query())->links('pages.materias') }}
    </div>
</div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/admin/materias/index.js') }}"></script>
    <script>
        const swalTheme = {
            confirmButtonColor: '#e11d48',
            cancelButtonColor: '#64748b',
            background: '#ffffff',
            color: '#1e293b'
        };
    </script>
@endsection