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
                    <div class="stat-card rich-stat">
                        <div class="stat-left">
                            <div class="stat-icon-wrapper">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-info">
                                <h3 class="stat-value">{{ $stats['users'] ?? 0 }}</h3>
                                <p class="stat-label">Usuarios</p>
                            </div>
                        </div>
                        <div class="stat-right">
                            <div class="stat-mini-row success">
                                <span>Nuevos</span>
                                <strong>+{{ $stats['recent_users_count'] ?? $stats['new_users_count'] ?? 0 }}</strong>
                            </div>
                            <div class="stat-mini-row">
                                <span>Total</span>
                                <strong>{{ $stats['users'] ?? 0 }}</strong>
                            </div>
                        </div>
                        <div class="stat-decoration">
                            <i class="fas fa-chart-area"></i>
                        </div>
                    </div>

                    <!-- Students Card -->
                    <div class="stat-card rich-stat">
                        <div class="stat-left">
                            <div class="stat-icon-wrapper">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            <div class="stat-info">
                                <h3 class="stat-value">{{ $stats['students'] ?? 0 }}</h3>
                                <p class="stat-label">Estudiantes</p>
                            </div>
                        </div>
                        <div class="stat-right">
                            <div class="stat-mini-row success">
                                <span>Activos</span>
                                <i class="fas fa-check-circle" style="font-size: 0.8rem;"></i>
                            </div>
                            <div class="stat-mini-row">
                                <span>Total</span>
                                <strong>{{ $stats['students'] ?? 0 }}</strong>
                            </div>
                        </div>
                        <div class="stat-decoration">
                            <i class="fas fa-certificate"></i>
                        </div>
                    </div>

                    <!-- Teachers Card -->
                    <div class="stat-card rich-stat">
                        <div class="stat-left">
                            <div class="stat-icon-wrapper">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <div class="stat-info">
                                <h3 class="stat-value">{{ $stats['teachers'] ?? 0 }}</h3>
                                <p class="stat-label">Docentes</p>
                            </div>
                        </div>
                        <div class="stat-right">
                            <div class="stat-mini-row">
                                <span>Activos</span>
                                <strong>{{ $stats['teachers'] ?? 0 }}</strong>
                            </div>
                            <div class="stat-mini-row accent">
                                <span>Académicos</span>
                                <i class="fas fa-laptop" style="font-size: 0.8rem;"></i>
                            </div>
                        </div>
                        <div class="stat-decoration">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>

                    <!-- Courses Card -->
                    <div class="stat-card rich-stat">
                        <div class="stat-left">
                            <div class="stat-icon-wrapper">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="stat-info">
                                <h3 class="stat-value">{{ $stats['courses'] ?? 0 }}</h3>
                                <p class="stat-label">Cursos Activos</p>
                            </div>
                        </div>
                        <div class="stat-right">
                            <div class="stat-mini-row success">
                                <span>Recientes</span>
                                <strong>+{{ $stats['recent_courses_count'] ?? 0 }}</strong>
                            </div>
                            <div class="stat-mini-row">
                                <span>Total</span>
                                <strong>{{ $stats['courses'] ?? 0 }}</strong>
                            </div>
                        </div>
                        <div class="stat-decoration">
                            <i class="fas fa-layer-group"></i>
                        </div>
                    </div>
                </div>


                <!-- NEW ANALYTICS SECTION -->
                <div class="analytics-grid">
                    <!-- 1. Activity Curve (Line Chart) -->
                    <div class="chart-panel wide-panel glow-effect">
                        <div class="panel-header">
                            <div>
                                <h3 class="panel-title">Resumen de Actividad</h3>
                                <p class="panel-subtitle">Tráfico del sistema anual</p>
                            </div>
                            <div class="panel-actions">
                                <span class="badge-pill">2024</span>
                            </div>
                        </div>
                        <div class="panel-body">
                            <canvas id="activityChart"></canvas>
                        </div>
                    </div>

                    <!-- 2. System Health (Radial) -->
                    <div class="chart-panel square-panel glow-effect">
                        <div class="panel-header">
                            <h3 class="panel-title">Estado del Sistema</h3>
                        </div>
                        <div class="panel-body flex-center">
                            <div class="health-gauge-wrapper">
                                <canvas id="healthChart"></canvas>
                                <div class="health-label">
                                    <span class="health-percent">{{ $chartData['system_health'] }}%</span>
                                    <span class="health-text">Óptimo</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 3. Resource Usage (Progress) -->
                    <div class="chart-panel square-panel glow-effect">
                        <div class="panel-header">
                            <h3 class="panel-title">Uso de Recursos</h3>
                        </div>
                        <div class="panel-body">
                            <div class="resource-stack">
                                <div class="resource-row">
                                    <div class="res-info">
                                        <span>Almacenamiento</span>
                                        <span class="res-val">{{ $chartData['resources'][0] }}%</span>
                                    </div>
                                    <div class="progress-track">
                                        <div class="progress-fill red" style="width: {{ $chartData['resources'][0] }}%"></div>
                                    </div>
                                </div>
                                <div class="resource-row">
                                    <div class="res-info">
                                        <span>Memoria RAM</span>
                                        <span class="res-val">{{ $chartData['resources'][1] }}%</span>
                                    </div>
                                    <div class="progress-track">
                                        <div class="progress-fill purple" style="width: {{ $chartData['resources'][1] }}%"></div>
                                    </div>
                                </div>
                                <div class="resource-row">
                                    <div class="res-info">
                                        <span>CPU</span>
                                        <span class="res-val">{{ $chartData['resources'][2] }}%</span>
                                    </div>
                                    <div class="progress-track">
                                        <div class="progress-fill blue" style="width: {{ $chartData['resources'][2] }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 4. Monthly Registrations (Bar) -->
                    <div class="chart-panel wide-panel glow-effect">
                         <div class="panel-header">
                            <div>
                                <h3 class="panel-title">Nuevos Registros</h3>
                                <p class="panel-subtitle">Usuarios por mes</p>
                            </div>
                        </div>
                        <div class="panel-body">
                            <canvas id="registrationsChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- SECTION: Middle Split (Table + Chart) -->
                <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; margin-top: 2rem;" class="dashboard-split-layout">
                    
                    <!-- Left: Recent Users Table (More space) -->
                    <div class="dashboard-card h-100">
                        <div class="card-header">
                            <h3 class="card-title">Usuarios Recientes</h3>
                            <a href="{{ route('admin.usuarios.index') }}" class="card-action-link">Ver todos</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive-compact">
                                <table class="dashboard-table">
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

                    <!-- Right: User Distribution Chart -->
                    <div class="dashboard-card glow-effect h-100">
                        <div class="card-header">
                            <h3 class="card-title">Distribución</h3>
                            <button class="card-action"><i class="fas fa-chart-pie"></i></button>
                        </div>
                        <div class="card-body flex-center" style="min-height: 250px;">
                            <canvas id="userRolesChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- SECTION: Modules Grid (3 Cols) -->
                <div class="dashboard-modules-row" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem; margin-top: 2rem;">
                    
                    <!-- Card: Gestión Académica -->
                    <div class="dashboard-card h-100">
                        <div class="card-header">
                            <h3 class="card-title">Gestión Académica</h3>
                            <i class="fas fa-graduation-cap text-muted"></i>
                        </div>
                        <div class="card-body">
                            <div class="modules-list-compact">
                                <a href="{{ route('admin.estudiantes.index') }}" class="module-row-item">
                                    <div class="icon-box green"><i class="fas fa-user-graduate"></i></div>
                                    <span>Estudiantes</span>
                                    <small class="ms-auto text-muted">{{ $stats['students'] }}</small>
                                </a>
                                <a href="{{ route('admin.docentes.index') }}" class="module-row-item">
                                    <div class="icon-box purple"><i class="fas fa-chalkboard-teacher"></i></div>
                                    <span>Docentes</span>
                                    <small class="ms-auto text-muted">{{ $stats['teachers'] }}</small>
                                </a>
                                <a href="{{ route('admin.cursos.index') }}" class="module-row-item">
                                    <div class="icon-box blue"><i class="fas fa-layer-group"></i></div>
                                    <span>Cursos</span>
                                    <small class="ms-auto text-muted">{{ $stats['courses'] }}</small>
                                </a>
                                <a href="{{ route('admin.materias.index') }}" class="module-row-item">
                                    <div class="icon-box orange"><i class="fas fa-book-open"></i></div>
                                    <span>Materias</span>
                                    <small class="ms-auto text-muted">{{ $stats['materias'] }}</small>
                                </a>
                                <a href="{{ route('admin.colegios.index') }}" class="module-row-item">
                                    <div class="icon-box red"><i class="fas fa-school"></i></div>
                                    <span>Colegios</span>
                                    <small class="ms-auto text-muted">{{ $stats['colegios'] }}</small>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Card: Recursos y Laboratorios -->
                    <div class="dashboard-card h-100">
                        <div class="card-header">
                            <h3 class="card-title">Recursos</h3>
                            <i class="fas fa-flask text-muted"></i>
                        </div>
                        <div class="card-body">
                            <div class="modules-list-compact">
                                <a href="{{ route('libros.index') }}" class="module-row-item">
                                    <div class="icon-box red"><i class="fas fa-book"></i></div>
                                    <span>Biblioteca</span>
                                    <small class="ms-auto text-muted">{{ $stats['libros'] }}</small>
                                </a>
                                <a href="{{ route('admin.materiales.index') }}" class="module-row-item">
                                    <div class="icon-box orange"><i class="fas fa-folder-open"></i></div>
                                    <span>Materiales</span>
                                    <small class="ms-auto text-muted">{{ $stats['materiales'] }}</small>
                                </a>
                                <a href="{{ route('admin.laboratorios.index') }}" class="module-row-item">
                                    <div class="icon-box blue"><i class="fas fa-desktop"></i></div>
                                    <span>Laboratorios</span>
                                    <small class="ms-auto text-muted">{{ $stats['laboratorios'] }}</small>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Card: Administración -->
                    <div class="dashboard-card h-100">
                        <div class="card-header">
                            <h3 class="card-title">Administración</h3>
                            <i class="fas fa-cogs text-muted"></i>
                        </div>
                        <div class="card-body">
                            <div class="modules-list-compact">
                                <a href="{{ route('admin.usuarios.index') }}" class="module-row-item">
                                    <div class="icon-box gray"><i class="fas fa-users-cog"></i></div>
                                    <span>Usuarios</span>
                                    <small class="ms-auto text-muted">{{ $stats['users'] }}</small>
                                </a>
                                <a href="{{ route('admin.roles.index') }}" class="module-row-item">
                                    <div class="icon-box purple"><i class="fas fa-user-tag"></i></div>
                                    <span>Roles</span>
                                    <small class="ms-auto text-muted">{{ $stats['roles'] }}</small>
                                </a>
                                <a href="{{ route('admin.permisos.index') }}" class="module-row-item">
                                    <div class="icon-box gray"><i class="fas fa-key"></i></div>
                                    <span>Permisos</span>
                                    <small class="ms-auto text-muted">{{ $stats['permisos'] }}</small>
                                </a>
                                <a href="{{ route('reportes.index') }}" class="module-row-item">
                                    <div class="icon-box blue"><i class="fas fa-chart-line"></i></div>
                                    <span>Reportes</span>
                                </a>
                                <a href="{{ route('configuraciones.index') }}" class="module-row-item">
                                    <div class="icon-box gray"><i class="fas fa-sliders-h"></i></div>
                                    <span>Configuración</span>
                                </a>
                            </div>
                        </div>
                    </div>

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
            },
            chartData: @json($chartData ?? [])
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
