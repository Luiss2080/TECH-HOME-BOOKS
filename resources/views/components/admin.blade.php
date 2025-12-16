<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin - Tech Home Books')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/faviconTH.png') }}">

    
    <!-- Precargar fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Meta tags -->
    <meta name="description" content="Dashboard administrativo de Tech Home Books. Sistema de gestión educativa.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- CSS del Dashboard -->
    <link rel="stylesheet" href="{{ asset('css/dashboard/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/loading.css') }}">
    
    @stack('styles')
</head>

<body>
    
    <!-- Loading Screen -->
    @include('layouts.loading')
    
    <!-- Layout del Dashboard -->
    <div class="dashboard-layout">
        
        <!-- Sidebar Component -->
        @include('layouts.sidebar')
        
        <!-- Main Content -->
        <div class="main-content">
            
            <!-- Header Component -->
            @include('layouts.header', ['header_title' => $header_title ?? 'Dashboard Admin'])
            
            <!-- Contenido principal -->
            <div class="dashboard-content">
                
                <!-- Stats Section -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon users">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-content">
                            <span class="stat-value">{{ $stats['users'] ?? 0 }}</span>
                            <span class="stat-label">Usuarios Totales</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon students">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="stat-content">
                            <span class="stat-value">{{ $stats['students'] ?? 0 }}</span>
                            <span class="stat-label">Estudiantes</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon teachers">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="stat-content">
                            <span class="stat-value">{{ $stats['teachers'] ?? 0 }}</span>
                            <span class="stat-label">Docentes</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon courses">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="stat-content">
                            <span class="stat-value">{{ $stats['courses'] ?? 0 }}</span>
                            <span class="stat-label">Cursos Activos</span>
                        </div>
                    </div>
                </div>

                <!-- SECTION: Analytics & Activity (NEW) -->
                <div class="dashboard-grid-2col">
                    <!-- Charts Card -->
                    <div class="dashboard-card glow-effect">
                        <div class="card-header">
                            <h3 class="card-title">Resumen de Usuarios</h3>
                            <button class="card-action"><i class="fas fa-ellipsis-h"></i></button>
                        </div>
                        <div class="card-body">
                            <canvas id="userRolesChart" height="200"></canvas>
                        </div>
                    </div>

                    <!-- Recent Activity / Users Table -->
                    <div class="dashboard-card">
                        <div class="card-header">
                            <h3 class="card-title">Usuarios Recientes</h3>
                            <a href="{{ route('admin.usuarios.index') }}" class="card-action-link">Ver todos</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive-compact">
                                <table class="compact-table">
                                    <thead>
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Rol</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($recentUsers as $user)
                                            <tr>
                                                <td>
                                                    <div class="user-info-compact">
                                                        <div class="user-avatar-xs">{{ substr($user->name, 0, 1) }}</div>
                                                        <span>{{ $user->name }}</span>
                                                    </div>
                                                </td>
                                                <td><span class="badge badge-{{ $user->rol }}">{{ ucfirst($user->rol) }}</span></td>
                                                <td><span class="status-dot online"></span></td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="3" class="text-center">No hay usuarios recientes</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Módulos de Gestión -->
                <h3 class="modules-section-title">Gestión Académica</h3>
                <div class="modules-grid">
                    <a href="{{ route('admin.estudiantes.index') }}" class="module-card">
                        <div class="module-icon green">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <span class="module-title">Estudiantes</span>
                        <span class="module-desc">Gestión de alumnos y matrículas</span>
                    </a>
                    <a href="{{ route('admin.docentes.index') }}" class="module-card">
                        <div class="module-icon purple">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <span class="module-title">Docentes</span>
                        <span class="module-desc">Profesores y asignaciones</span>
                    </a>
                    <a href="{{ route('admin.cursos.index') }}" class="module-card">
                        <div class="module-icon blue">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <span class="module-title">Cursos</span>
                        <span class="module-desc">Administración de cursos</span>
                    </a>
                    <a href="{{ route('admin.materias.index') }}" class="module-card">
                        <div class="module-icon orange">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <span class="module-title">Materias</span>
                        <span class="module-desc">Plan de estudios</span>
                    </a>
                    <a href="{{ route('admin.colegios.index') }}" class="module-card">
                        <div class="module-icon">
                            <i class="fas fa-school"></i>
                        </div>
                        <span class="module-title">Colegios</span>
                        <span class="module-desc">Instituciones afiliadas</span>
                    </a>
                </div>

                <h3 class="modules-section-title">Recursos y Laboratorios</h3>
                <div class="modules-grid">
                    <a href="{{ route('libros.index') }}" class="module-card">
                        <div class="module-icon red">
                            <i class="fas fa-book"></i>
                        </div>
                        <span class="module-title">Biblioteca</span>
                        <span class="module-desc">Gestión de libros</span>
                    </a>
                    <a href="{{ route('admin.materiales.index') }}" class="module-card">
                        <div class="module-icon orange">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <span class="module-title">Materiales</span>
                        <span class="module-desc">Recursos didácticos</span>
                    </a>
                    <a href="{{ route('admin.laboratorios.index') }}" class="module-card">
                        <div class="module-icon blue">
                            <i class="fas fa-flask"></i>
                        </div>
                        <span class="module-title">Laboratorios</span>
                        <span class="module-desc">Espacios y equipos</span>
                    </a>
                </div>

                <h3 class="modules-section-title">Administración del Sistema</h3>
                <div class="modules-grid">
                    <a href="{{ route('admin.usuarios.index') }}" class="module-card">
                        <div class="module-icon">
                            <i class="fas fa-users-cog"></i>
                        </div>
                        <span class="module-title">Usuarios</span>
                        <span class="module-desc">Control de acceso</span>
                    </a>
                    <a href="{{ route('admin.roles.index') }}" class="module-card">
                        <div class="module-icon purple">
                            <i class="fas fa-user-tag"></i>
                        </div>
                        <span class="module-title">Roles</span>
                        <span class="module-desc">Perfiles y permisos</span>
                    </a>
                    <a href="{{ route('admin.permisos.index') }}" class="module-card">
                        <div class="module-icon">
                            <i class="fas fa-key"></i>
                        </div>
                        <span class="module-title">Permisos</span>
                        <span class="module-desc">Reglas de autorización</span>
                    </a>
                    <a href="{{ route('reportes.index') }}" class="module-card">
                        <div class="module-icon blue">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <span class="module-title">Reportes</span>
                        <span class="module-desc">Estadísticas y datos</span>
                    </a>
                    <a href="{{ route('configuraciones.index') }}" class="module-card">
                        <div class="module-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <span class="module-title">Configuración</span>
                        <span class="module-desc">Ajustes generales</span>
                    </a>
                </div>
                
            </div>
            
            <!-- Footer Component -->
            @include('layouts.footer')
            
        </div>
    </div>
    
    <!-- Configuración global -->
    <script>
        window.appConfig = {
            csrfToken: '{{ csrf_token() }}',
            baseUrl: '{{ url("/") }}',
            user: {
                id: '{{ session("user_id") }}',
                name: '{{ session("user_name") }}',
                role: '{{ session("user_role") }}'
            }
        };
    </script>
    
    <!-- JavaScript del Dashboard -->
    <script src="{{ asset('js/components/loading.js') }}"></script>

    <script src="{{ asset('js/components/sidebar.js') }}"></script>
    <script src="{{ asset('js/components/footer.js') }}"></script>
    
    <!-- JavaScript del Header -->
    {{-- Script moved to header.blade.php --}}
    
    @stack('scripts')
    <script src="{{ asset('js/dashboard/admin.js') }}"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // User Roles Chart
            const ctx = document.getElementById('userRolesChart').getContext('2d');
            const userRolesChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Administradores', 'Docentes', 'Estudiantes'],
                    datasets: [{
                        data: [
                            {{ $roleDistribution['admin'] }}, 
                            {{ $roleDistribution['docente'] }}, 
                            {{ $roleDistribution['estudiante'] }}
                        ],
                        backgroundColor: [
                            '#3b82f6', // Blue for Admin
                            '#a855f7', // Purple for Docente
                            '#16a34a'  // Green for Estudiante
                        ],
                        borderWidth: 0,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                padding: 20,
                                font: {
                                    family: "'Montserrat', sans-serif"
                                }
                            }
                        }
                    },
                    cutout: '75%'
                }
            });
        });
    </script>
</body>
</html>
