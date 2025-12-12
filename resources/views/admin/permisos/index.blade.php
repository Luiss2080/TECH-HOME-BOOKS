@extends('layouts.admin')

@section('title', 'Gestión de Permisos')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/permisos/index.css') }}">
@endsection

@section('content')
<div class="permisos-container">
    <!-- Control Panel Section -->
    <div class="control-panel">
        <div class="panel-header">
            <div class="header-title">
                <div class="icon-wrapper">
                    <i class="fas fa-key"></i>
                </div>
                <div class="title-content">
                    <h2>Permisos</h2>
                    <p class="subtitle">Gestión de permisos y accesos del sistema</p>
                </div>
            </div>
        </div>

        <div class="panel-content">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Buscar por nombre o descripción..." value="{{ request('search') }}">
            </div>
            
            <div class="filter-group">
                <div class="select-wrapper">
                    <i class="fas fa-filter"></i>
                    <select id="moduleSelect">
                        <option value="">Todos los Módulos</option>
                        @foreach($modulos as $modulo)
                            <option value="{{ $modulo }}" {{ request('modulo') == $modulo ? 'selected' : '' }}>
                                {{ ucfirst($modulo) }}
                            </option>
                        @endforeach
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

                <a href="#" class="btn-primary-action">
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
                        <th>Módulo</th>
                        <th>Permiso</th>
                        <th>Descripción</th>
                        <th>Roles Asignados</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($permisos as $permiso)
                        <tr>
                            <td>
                                <span class="badge-modulo">
                                    {{ ucfirst($permiso->modulo) }}
                                </span>
                            </td>
                            <td>
                                <div class="permiso-info">
                                    <span class="name">{{ $permiso->nombre }}</span>
                                    <span class="description">{{ $permiso->guard_name ?? 'web' }}</span>
                                </div>
                            </td>
                            <td>
                                <span style="color: var(--text-muted); font-size: 0.9rem;">
                                    {{ $permiso->descripcion }}
                                </span>
                            </td>
                            <td>
                                <div class="roles-assigned">
                                    <i class="fas fa-user-shield"></i>
                                    <span>{{ $permiso->roles_count }} Roles</span>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center" style="padding: 3rem; color: var(--text-muted);">
                                No se encontraron permisos registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="pagination-wrapper">
            {{ $permisos->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/admin/permisos/index.js') }}"></script>
@endsection
