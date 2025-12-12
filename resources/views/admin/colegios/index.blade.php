@extends('layouts.admin')

@section('title', 'Gestión de Colegios')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/colegios/index.css') }}">
@endsection

@section('content')
<div class="colegios-container">
    <!-- Control Panel Section -->
    <div class="control-panel">
        <div class="panel-header">
            <div class="header-title">
                <div class="icon-wrapper">
                    <i class="fas fa-school"></i>
                </div>
                <div class="title-content">
                    <h2>Colegios</h2>
                    <p class="subtitle">Gestión de instituciones educativas y sus sedes</p>
                </div>
            </div>
            <div class="header-actions">
                <a href="{{ route('colegios.create') }}" class="btn-primary-action">
                    <i class="fas fa-plus"></i>
                    <span>Nuevo Colegio</span>
                </a>
            </div>
        </div>

        <div class="panel-content">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Buscar por nombre, director o email..." value="{{ request('search') }}">
            </div>
            
            <div class="filter-group">
                <div class="select-wrapper">
                    <i class="fas fa-filter"></i>
                    <select id="statusSelect">
                        <option value="">Todos los Estados</option>
                        <option value="activo" {{ request('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="inactivo" {{ request('estado') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                        <option value="suspendido" {{ request('estado') == 'suspendido' ? 'selected' : '' }}>Suspendido</option>
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
                        <th style="width: 80px;">Logo</th>
                        <th>Institución</th>
                        <th>Director / Contacto</th>
                        <th>Población</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($colegios as $colegio)
                        <tr>
                            <td>
                                <div class="school-logo">
                                    @if($colegio->logo)
                                        <img src="{{ asset('storage/' . $colegio->logo) }}" alt="Logo">
                                    @else
                                        <div class="no-logo">
                                            <i class="fas fa-graduation-cap"></i>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="school-details">
                                    <span class="name">{{ $colegio->nombre }}</span>
                                    <span class="meta">{{ $colegio->direccion ?? 'Sin dirección registrada' }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="contact-info">
                                    <span class="director"><i class="fas fa-user-tie"></i> {{ $colegio->director ?? 'N/A' }}</span>
                                    <span class="email"><i class="fas fa-envelope"></i> {{ $colegio->email }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="stats-badges">
                                    <span class="stat-badge students" title="Estudiantes">
                                        <i class="fas fa-user-graduate"></i> {{ $colegio->estudiantes_count }}
                                    </span>
                                    <span class="stat-badge courses" title="Cursos">
                                        <i class="fas fa-chalkboard"></i> {{ $colegio->cursos_count }}
                                    </span>
                                </div>
                            </td>
                            <td>
                                <span class="badge status {{ $colegio->estado }}">
                                    @switch($colegio->estado)
                                        @case('activo')
                                            <i class="fas fa-check-circle"></i> Activo
                                            @break
                                        @case('inactivo')
                                            <i class="fas fa-minus-circle"></i> Inactivo
                                            @break
                                        @default
                                            {{ ucfirst($colegio->estado) }}
                                    @endswitch
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('colegios.show', $colegio->id) }}" class="btn-icon view" title="Ver Detalles">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('colegios.edit', $colegio->id) }}" class="btn-icon edit" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn-icon delete" onclick="confirmDelete({{ $colegio->id }})" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <form id="delete-form-{{ $colegio->id }}" action="{{ route('colegios.destroy', $colegio->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center" style="padding: 3rem; color: var(--text-muted);">
                                No se encontraron colegios registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="pagination-wrapper">
            {{ $colegios->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/admin/colegios/index.js') }}"></script>
    <script>
        const swalTheme = {
            confirmButtonColor: '#e11d48',
            cancelButtonColor: '#64748b',
            background: '#ffffff',
            color: '#1e293b'
        };
    </script>
@endsection