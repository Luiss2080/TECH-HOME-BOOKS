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
                <!-- Stats Section -->
                <div class="stats-grid">
                    <!-- Users Card -->
                    <div class="stat-card rich-stat blue-gradient">
                        <div class="stat-icon-wrapper">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-details">
                            <h3 class="stat-value">{{ $stats['users'] ?? 0 }}</h3>
                            <p class="stat-label">Usuarios Totales</p>
                        </div>
                        <div class="stat-decoration">
                            <i class="fas fa-chart-area"></i>
                        </div>
                    </div>

                    <!-- Students Card -->
                    <div class="stat-card rich-stat green-gradient">
                        <div class="stat-icon-wrapper">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="stat-details">
                            <h3 class="stat-value">{{ $stats['students'] ?? 0 }}</h3>
                            <p class="stat-label">Estudiantes</p>
                        </div>
                        <div class="stat-decoration">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                    </div>

                    <!-- Teachers Card -->
                    <div class="stat-card rich-stat purple-gradient">
                        <div class="stat-icon-wrapper">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="stat-details">
                            <h3 class="stat-value">{{ $stats['teachers'] ?? 0 }}</h3>
                            <p class="stat-label">Docentes</p>
                        </div>
                        <div class="stat-decoration">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>

                    <!-- Courses Card -->
                    <div class="stat-card rich-stat orange-gradient">
                        <div class="stat-icon-wrapper">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="stat-details">
                            <h3 class="stat-value">{{ $stats['courses'] ?? 0 }}</h3>
                            <p class="stat-label">Cursos Activos</p>
                        </div>
                        <div class="stat-decoration">
                            <i class="fas fa-layer-group"></i>
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

                <!-- SECTION: Modules Grid Layout -->
                <div class="dashboard-modules-section">
                    
                    <!-- Card: Gestión Académica -->
                    <div class="dashboard-card h-100">
                        <div class="card-header">
                            <h3 class="card-title">Gestión Académica</h3>
                            <button class="card-action"><i class="fas fa-graduation-cap"></i></button>
                        </div>
                        <div class="card-body">
                            <div class="modules-grid-compact">
                                <a href="{{ route('admin.estudiantes.index') }}" class="module-item rich">
                                    <div class="module-icon-sm green"><i class="fas fa-user-graduate"></i></div>
                                    <div class="module-info">
                                        <span class="module-label">Estudiantes</span>
                                        <span class="module-desc-sm">Gestión de alumnos</span>
                                    </div>
                                    <span class="module-badge">{{ $stats['students'] }}</span>
                                </a>
                                <a href="{{ route('admin.docentes.index') }}" class="module-item rich">
                                    <div class="module-icon-sm purple"><i class="fas fa-chalkboard-teacher"></i></div>
                                    <div class="module-info">
                                        <span class="module-label">Docentes</span>
                                        <span class="module-desc-sm">Profesores activos</span>
                                    </div>
                                    <span class="module-badge">{{ $stats['teachers'] }}</span>
                                </a>
                                <a href="{{ route('admin.cursos.index') }}" class="module-item rich">
                                    <div class="module-icon-sm blue"><i class="fas fa-layer-group"></i></div>
                                    <div class="module-info">
                                        <span class="module-label">Cursos</span>
                                        <span class="module-desc-sm">Cursos ofertados</span>
                                    </div>
                                    <span class="module-badge">{{ $stats['courses'] }}</span>
                                </a>
                                <a href="{{ route('admin.materias.index') }}" class="module-item rich">
                                    <div class="module-icon-sm orange"><i class="fas fa-book-open"></i></div>
                                    <div class="module-info">
                                        <span class="module-label">Materias</span>
                                        <span class="module-desc-sm">Plan de estudios</span>
                                    </div>
                                    <span class="module-badge">{{ $stats['materias'] }}</span>
                                </a>
                                <a href="{{ route('admin.colegios.index') }}" class="module-item rich">
                                    <div class="module-icon-sm"><i class="fas fa-school"></i></div>
                                    <div class="module-info">
                                        <span class="module-label">Colegios</span>
                                        <span class="module-desc-sm">Instituciones</span>
                                    </div>
                                    <span class="module-badge">{{ $stats['colegios'] }}</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Card: Recursos -->
                    <div class="dashboard-card h-100">
                        <div class="card-header">
                            <h3 class="card-title">Recursos y Laboratorios</h3>
                            <button class="card-action"><i class="fas fa-flask"></i></button>
                        </div>
                        <div class="card-body">
                            <div class="modules-grid-compact">
                                <a href="{{ route('libros.index') }}" class="module-item rich">
                                    <div class="module-icon-sm red"><i class="fas fa-book"></i></div>
                                    <div class="module-info">
                                        <span class="module-label">Biblioteca</span>
                                        <span class="module-desc-sm">Libros disponibles</span>
                                    </div>
                                    <span class="module-badge">{{ $stats['libros'] }}</span>
                                </a>
                                <a href="{{ route('admin.materiales.index') }}" class="module-item rich">
                                    <div class="module-icon-sm orange"><i class="fas fa-folder-open"></i></div>
                                    <div class="module-info">
                                        <span class="module-label">Materiales</span>
                                        <span class="module-desc-sm">Recursos didácticos</span>
                                    </div>
                                    <span class="module-badge">{{ $stats['materiales'] }}</span>
                                </a>
                                <a href="{{ route('admin.laboratorios.index') }}" class="module-item rich">
                                    <div class="module-icon-sm blue"><i class="fas fa-desktop"></i></div>
                                    <div class="module-info">
                                        <span class="module-label">Laboratorios</span>
                                        <span class="module-desc-sm">Equipos y salas</span>
                                    </div>
                                    <span class="module-badge">{{ $stats['laboratorios'] }}</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Card: Administración -->
                    <div class="dashboard-card h-100 full-width-mobile">
                        <div class="card-header">
                            <h3 class="card-title">Administración del Sistema</h3>
                            <button class="card-action"><i class="fas fa-cogs"></i></button>
                        </div>
                        <div class="card-body">
                            <div class="modules-grid-compact">
                                <a href="{{ route('admin.usuarios.index') }}" class="module-item rich">
                                    <div class="module-icon-sm"><i class="fas fa-users-cog"></i></div>
                                    <div class="module-info">
                                        <span class="module-label">Usuarios</span>
                                        <span class="module-desc-sm">Control de acceso</span>
                                    </div>
                                    <span class="module-badge">{{ $stats['users'] }}</span>
                                </a>
                                <a href="{{ route('admin.roles.index') }}" class="module-item rich">
                                    <div class="module-icon-sm purple"><i class="fas fa-user-tag"></i></div>
                                    <div class="module-info">
                                        <span class="module-label">Roles</span>
                                        <span class="module-desc-sm">Perfiles del sistema</span>
                                    </div>
                                    <span class="module-badge">{{ $stats['roles'] }}</span>
                                </a>
                                <a href="{{ route('admin.permisos.index') }}" class="module-item rich">
                                    <div class="module-icon-sm"><i class="fas fa-key"></i></div>
                                    <div class="module-info">
                                        <span class="module-label">Permisos</span>
                                        <span class="module-desc-sm">Reglas de autorización</span>
                                    </div>
                                    <span class="module-badge">{{ $stats['permisos'] }}</span>
                                </a>
                                <a href="{{ route('reportes.index') }}" class="module-item rich">
                                    <div class="module-icon-sm blue"><i class="fas fa-chart-line"></i></div>
                                    <div class="module-info">
                                        <span class="module-label">Reportes</span>
                                        <span class="module-desc-sm">Estadísticas</span>
                                    </div>
                                </a>
                                <a href="{{ route('configuraciones.index') }}" class="module-item rich">
                                    <div class="module-icon-sm"><i class="fas fa-sliders-h"></i></div>
                                    <div class="module-info">
                                        <span class="module-label">Configuración</span>
                                        <span class="module-desc-sm">Ajustes generales</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                
                </div> <!-- End dashboard-modules-section -->
                
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
