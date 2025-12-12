@extends('layouts.admin')

@section('title', 'Gestión de Docentes')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/docentes/index.css') }}">
@endsection

@section('content')
<div class="docentes-container">
    <div class="page-header">
        <h2>Gestión de Docentes</h2>
        <div class="actions">
            <a href="{{ route('admin.docentes.create') }}" class="btn-neon">
                + Nuevo Docente
            </a>
        </div>
    </div>
    
    <div class="filters-section">
        <div class="search-wrapper">
            <i class="fas fa-search"></i>
            <input type="text" id="searchInput" placeholder="Buscar por nombre, apellido, ci, especialidad..." value="{{ request('search') }}">
        </div>
        <div class="filter-controls">
            <div class="show-entries">
                <label>Mostrar:</label>
                <select id="entriesSelect">
                    <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                    <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                </select>
            </div>
            <button class="btn-filter">
                <i class="fas fa-filter"></i> FILTROS
            </button>
            <button class="btn-export">
                <i class="fas fa-download"></i> EXPORTAR
            </button>
        </div>
    </div>
    
    <div class="table-section">
        <table class="neon-table">
            <thead>
                <tr>
                    <th>DOCENTE</th>
                    <th>ID / CODIGO</th>
                    <th>ESPECIALIDAD</th>
                    <th>ESTADO</th>
                    <th>CONTRATO</th>
                    <th>CALIFICACIÓN</th>
                    <th>ACCIONES</th>
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
                                    <span class="role">Docente</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="id-info">
                                <span class="primary-text">{{ $docente->user->ci ?? 'N/A' }}</span>
                                <span class="sub-text">COD: {{ $docente->codigo_docente }}</span>
                            </div>
                        </td>
                        <td>
                             <div class="specialty-badge">
                                {{ $docente->especialidad }}
                             </div>
                        </td>
                        <td>
                            <span class="status-badge {{ $docente->estado_laboral }}">
                                {{ ucfirst($docente->estado_laboral) }}
                            </span>
                        </td>
                        <td>
                            <span class="contract-badge {{ $docente->tipo_contrato }}">
                                {{ ucfirst(str_replace('_', ' ', $docente->tipo_contrato)) }}
                            </span>
                        </td>
                        <td>
                            <div class="rating">
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
                        <td colspan="7" class="text-center">No se encontraron docentes registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <div class="pagination-wrapper">
            {{ $docentes->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/admin/docentes/index.js') }}"></script>
@endsection