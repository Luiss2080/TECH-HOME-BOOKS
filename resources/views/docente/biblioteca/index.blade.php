@extends('layouts.admin')

@section('title', 'Biblioteca General')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/docente/biblioteca/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/paginacion.css') }}">
@endsection

@section('content')
<div class="biblioteca-container">
    <!-- Control Panel Section -->
    <div class="control-panel">
        <div class="panel-header">
            <div class="header-title">
                <div class="icon-wrapper">
                    <i class="fas fa-book"></i>
                </div>
                <div class="title-content">
                    <h2>Biblioteca General</h2>
                    <p class="subtitle">Gestiona el catálogo de libros, préstamos y disponibilidad</p>
                </div>
            </div>
            <div class="header-actions">
                <a href="{{ route('libros.create') }}" class="btn-primary-action">
                    <i class="fas fa-plus"></i>
                    <span>Nuevo Libro</span>
                </a>
            </div>
        </div>

        <div class="panel-content">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Buscar por título, autor o ISBN..." value="{{ request('search') }}">
            </div>
            
            <div class="filter-group">
                <div class="select-wrapper">
                    <i class="fas fa-bookmark"></i>
                    <select id="categorySelect">
                        <option value="">Todas las Categorías</option>
                        <option value="Literatura" {{ request('categoria') == 'Literatura' ? 'selected' : '' }}>Literatura</option>
                        <option value="Ciencias" {{ request('categoria') == 'Ciencias' ? 'selected' : '' }}>Ciencias</option>
                        <option value="Historía" {{ request('categoria') == 'Historía' ? 'selected' : '' }}>Historía</option>
                        <option value="Tecnología" {{ request('categoria') == 'Tecnología' ? 'selected' : '' }}>Tecnología</option>
                        <option value="Matemáticas" {{ request('categoria') == 'Matemáticas' ? 'selected' : '' }}>Matemáticas</option>
                        <option value="Idiomas" {{ request('categoria') == 'Idiomas' ? 'selected' : '' }}>Idiomas</option>
                        <option value="Arte" {{ request('categoria') == 'Arte' ? 'selected' : '' }}>Arte</option>
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
                        <th style="width: 80px;">Portada</th>
                        <th>Título</th>
                        <th>Autor / Editorial</th>
                        <th>Categoría</th>
                        <th>Estado</th>
                        <th>Stock</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($libros as $libro)
                        <tr>
                            <td>
                                <div class="book-cover">
                                    @if($libro->portada)
                                        <img src="{{ asset('storage/' . $libro->portada) }}" alt="Portada">
                                    @else
                                        <div class="no-cover">
                                            <i class="fas fa-book-open"></i>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="book-details">
                                    <span class="title">{{ $libro->titulo }}</span>
                                    <span class="isbn">ISBN: {{ $libro->isbn ?? 'N/A' }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="author-info">
                                    <span class="author">{{ $libro->autor }}</span>
                                    <span class="editorial">{{ $libro->editorial ?? '' }}</span>
                                </div>
                            </td>
                            <td>
                                 <span class="badge category">
                                    {{ $libro->categoria ?? 'General' }}
                                 </span>
                            </td>
                            <td>
                                <span class="badge status {{ $libro->disponibilidad > 0 ? 'available' : 'unavailable' }}">
                                    {{ $libro->disponibilidad > 0 ? 'Disponible' : 'Agotado' }}
                                </span>
                            </td>
                             <td>
                                <span class="stock-count {{ $libro->disponibilidad < 5 ? 'low' : '' }}">
                                    {{ $libro->disponibilidad }} u.
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('libros.show', $libro->id) }}" class="btn-icon view" title="Ver Detalles">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('libros.edit', $libro->id) }}" class="btn-icon edit" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn-icon delete" onclick="confirmDelete({{ $libro->id }})" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <form id="delete-form-{{ $libro->id }}" action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center" style="padding: 3rem; color: var(--text-muted);">
                                No se encontraron libros en la biblioteca
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="pagination-wrapper">
        {{ $libros->appends(request()->query())->links('pages.biblioteca') }}
    </div>
</div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/docente/biblioteca/index.js') }}"></script>
    <script>
        const swalTheme = {
            confirmButtonColor: '#e11d48',
            cancelButtonColor: '#64748b',
            background: '#ffffff',
            color: '#1e293b'
        };
    </script>
@endsection
