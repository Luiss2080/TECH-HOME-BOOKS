@extends('layouts.admin')

@section('title', 'Gestión de Laboratorios')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/docente/laboratorios/index.css') }}">
@endsection

@section('content')
<div class="laboratorios-container">
    <!-- Control Panel Section -->
    <div class="control-panel">
        <div class="panel-header">
            <div class="header-title">
                <div class="icon-wrapper">
                    <i class="fas fa-flask"></i>
                </div>
                <div class="title-content">
                    <h2>Laboratorios</h2>
                    <p class="subtitle">Administración de espacios y recursos experimentales</p>
                </div>
            </div>
            <div class="header-actions">
                <a href="{{ route('admin.laboratorios.create') }}" class="btn-primary-action">
                    <i class="fas fa-plus"></i>
                    <span>Nuevo Laboratorio</span>
                </a>
            </div>
        </div>

        <div class="panel-content">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Buscar por nombre, ubicación o encargado..." value="{{ request('search') }}">
            </div>
            
            <div class="filter-group">
                <div class="select-wrapper">
                    <i class="fas fa-filter"></i>
                    <select id="statusSelect">
                        <option value="">Todos los Estados</option>
                        <option value="disponible" {{ request('estado') == 'disponible' ? 'selected' : '' }}>Disponible</option>
                        <option value="ocupado" {{ request('estado') == 'ocupado' ? 'selected' : '' }}>Ocupado</option>
                        <option value="mantenimiento" {{ request('estado') == 'mantenimiento' ? 'selected' : '' }}>En Mantenimiento</option>
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
                        <th style="width: 80px;">Imagen</th>
                        <th>Laboratorio</th>
                        <th>Ubicación / Capacidad</th>
                        <th>Encargado</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($laboratorios as $lab)
                        <tr>
                            <td>
                                <div class="lab-image">
                                    @if($lab->imagen)
                                        <img src="{{ asset('storage/' . $lab->imagen) }}" alt="Lab">
                                    @else
                                        <div class="no-image">
                                            <i class="fas fa-microscope"></i>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="lab-details">
                                    <span class="name">{{ $lab->nombre }}</span>
                                    <span class="description">{{ Str::limit($lab->descripcion, 40) }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="location-info">
                                    <span class="location"><i class="fas fa-map-marker-alt"></i> {{ $lab->ubicacion ?? 'N/A' }}</span>
                                    <span class="capacity"><i class="fas fa-users"></i> {{ $lab->capacidad }} personas</span>
                                </div>
                            </td>
                            <td>
                                <span class="primary-text">{{ $lab->encargado ?? 'Sin asignar' }}</span>
                            </td>
                            <td>
                                <span class="badge status {{ $lab->estado }}">
                                    @switch($lab->estado)
                                        @case('disponible')
                                            <i class="fas fa-check-circle"></i> Disponible
                                            @break
                                        @case('ocupado')
                                            <i class="fas fa-user-clock"></i> Ocupado
                                            @break
                                        @case('mantenimiento')
                                            <i class="fas fa-tools"></i> Mantenimiento
                                            @break
                                        @default
                                            {{ ucfirst($lab->estado) }}
                                    @endswitch
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.laboratorios.show', $lab->id) }}" class="btn-icon view" title="Ver Detalles">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.laboratorios.edit', $lab->id) }}" class="btn-icon edit" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn-icon delete" onclick="confirmDelete({{ $lab->id }})" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <form id="delete-form-{{ $lab->id }}" action="{{ route('admin.laboratorios.destroy', $lab->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center" style="padding: 3rem; color: var(--text-muted);">
                                No se encontraron laboratorios registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="pagination-wrapper">
            {{ $laboratorios->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/docente/laboratorios/index.js') }}"></script>
    <script>
        const swalTheme = {
            confirmButtonColor: '#e11d48',
            cancelButtonColor: '#64748b',
            background: '#ffffff',
            color: '#1e293b'
        };
    </script>
@endsection
