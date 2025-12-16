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
                                            <th class="ps-3"><i class="fas fa-user me-2 text-danger"></i>Usuario</th>
                                            <th class="text-center"><i class="fas fa-user-tag me-2 text-danger"></i>Rol</th>
                                            <th class="text-center"><i class="fas fa-clock me-2 text-danger"></i>Sesión</th>
                                            <th class="text-center"><i class="fas fa-toggle-on me-2 text-danger"></i>Estado</th>
                                            <th class="text-center" style="width: 140px; white-space: nowrap;">ACTIONS <i class="fas fa-cog text-danger ms-1"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        @forelse($recentUsers as $user)
                                            <tr class="hover-scale">
                                                <td class="ps-3">
                                                    <div class="user-info-compact">
                                                        <div class="user-avatar-xs {{ $user->rol === 'admin' ? 'pulse-red' : '' }}">{{ substr($user->name, 0, 1) }}</div>
                                                        <div class="d-flex align-items-center">
                                                            <span class="user-name-styled">{{ $user->name }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge-modern-red">
                                                        @if($user->rol == 'admin') <i class="fas fa-crown"></i>
                                                        @elseif($user->rol == 'docente') <i class="fas fa-chalkboard-teacher"></i>
                                                        @else <i class="fas fa-user-graduate"></i>
                                                        @endif
                                                        {{ ucfirst($user->rol) }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="session-time">
                                                        <i class="fas fa-history text-danger me-1"></i> Hace {{ rand(1, 59) }} min
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge-modern-status online">
                                                        <span class="status-dot-pulse"></span> Activo
                                                    </span>
                                                </td>
                                                <td class="text-center" style="white-space: nowrap;">
                                                    <div class="d-flex justify-content-center gap-2 align-items-center flex-nowrap">
                                                        <button class="btn-icon-modern red" title="Editar">
                                                            <i class="fas fa-pen"></i>
                                                        </button>
                                                        <button class="btn-icon-modern red" title="Ver Perfil">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="5" class="text-center py-4">
                                                <div class="empty-state">
                                                    <i class="fas fa-users-slash mb-2 text-danger" style="font-size: 2rem; opacity: 0.5;"></i>
                                                    <p>No hay usuarios recientes</p>
                                                </div>
                                            </td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Right: User Distribution Chart -->
                    <div class="dashboard-card glow-effect h-100 d-flex flex-column">
                        <div class="card-header border-0 pb-0 flex-shrink-0">
                            <h3 class="card-title">Distribución</h3>
                            <span class="badge-modern-red px-2 py-1" style="font-size: 0.7rem;">TOTAL: {{ array_sum($roleDistribution ?? []) }}</span>
                        </div>
                        <div class="card-body d-flex flex-column align-items-center justify-content-between pt-2 pb-4 flex-grow-1">
                            <!-- Maximized Chart Area -->
                            <div style="width: 100%; flex-grow: 1; min-height: 200px; position: relative; display: flex; align-items: center; justify-content: center;">
                                <canvas id="userRolesChart" style="max-height: 100%; max-width: 100%;"></canvas>
                            </div>
                            <!-- Custom Modern Legend -->
                            <div class="chart-legend-modern mt-3 flex-shrink-0">
                                <div class="legend-item">
                                    <span class="legend-dot" style="background: #3b82f6;"></span>
                                    <span class="legend-label">Admin</span>
                                    <span class="badge-modern-pill blue">{{ $roleDistribution['admin'] ?? 0 }}</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-dot" style="background: #a855f7;"></span>
                                    <span class="legend-label">Docente</span>
                                    <span class="badge-modern-pill purple">{{ $roleDistribution['docente'] ?? 0 }}</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-dot" style="background: #10b981;"></span>
                                    <span class="legend-label">Estudiante</span>
                                    <span class="badge-modern-pill green">{{ $roleDistribution['estudiante'] ?? 0 }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECTION: Modules Grid (3 Cols) -->
                <div class="dashboard-modules-row" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem; margin-top: 2rem;">
                    
                    <!-- Card: Gestión Académica -->
                    <div class="dashboard-card h-100">
                        <div class="card-header border-0 pb-2">
                            <h3 class="card-title">Gestión Académica</h3>
                            <i class="fas fa-graduation-cap text-danger" style="opacity: 0.8;"></i>
                        </div>
                        <div class="card-body pt-0">
                            <div class="modules-list-compact">
                                <a href="{{ route('admin.estudiantes.index') }}" class="module-row-item">
                                    <div class="icon-box green"><i class="fas fa-user-graduate"></i></div>
                                    <span class="flex-grow-1 ms-2 font-weight-bold text-white" style="font-size: 0.9rem;">Estudiantes</span>
                                    <span class="badge-modern-pill green me-2">{{ $stats['students'] }}</span>
                                    <div class="btn-icon-modern outline sm" style="width: 24px; height: 24px;"><i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i></div>
                                </a>
                                <a href="{{ route('admin.docentes.index') }}" class="module-row-item">
                                    <div class="icon-box purple"><i class="fas fa-chalkboard-teacher"></i></div>
                                    <span class="flex-grow-1 ms-2 font-weight-bold text-white" style="font-size: 0.9rem;">Docentes</span>
                                    <span class="badge-modern-pill purple me-2">{{ $stats['teachers'] }}</span>
                                    <div class="btn-icon-modern outline sm" style="width: 24px; height: 24px;"><i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i></div>
                                </a>
                                <a href="{{ route('admin.cursos.index') }}" class="module-row-item">
                                    <div class="icon-box blue"><i class="fas fa-layer-group"></i></div>
                                    <span class="flex-grow-1 ms-2 font-weight-bold text-white" style="font-size: 0.9rem;">Cursos</span>
                                    <span class="badge-modern-pill blue me-2">{{ $stats['courses'] }}</span>
                                    <div class="btn-icon-modern outline sm" style="width: 24px; height: 24px;"><i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i></div>
                                </a>
                                <a href="{{ route('admin.materias.index') }}" class="module-row-item">
                                    <div class="icon-box orange"><i class="fas fa-book-open"></i></div>
                                    <span class="flex-grow-1 ms-2 font-weight-bold text-white" style="font-size: 0.9rem;">Materias</span>
                                    <span class="badge-modern-pill orange me-2">{{ $stats['materias'] }}</span>
                                    <div class="btn-icon-modern outline sm" style="width: 24px; height: 24px;"><i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i></div>
                                </a>
                                <a href="{{ route('admin.colegios.index') }}" class="module-row-item">
                                    <div class="icon-box red"><i class="fas fa-school"></i></div>
                                    <span class="flex-grow-1 ms-2 font-weight-bold text-white" style="font-size: 0.9rem;">Colegios</span>
                                    <span class="badge-modern-pill red me-2">{{ $stats['colegios'] }}</span>
                                    <div class="btn-icon-modern outline sm" style="width: 24px; height: 24px;"><i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Card: Recursos y Laboratorios -->
                    <div class="dashboard-card h-100">
                        <div class="card-header border-0 pb-2">
                            <h3 class="card-title">Recursos</h3>
                            <i class="fas fa-flask text-danger" style="opacity: 0.8;"></i>
                        </div>
                        <div class="card-body pt-0">
                            <div class="modules-list-compact">
                                <a href="{{ route('libros.index') }}" class="module-row-item">
                                    <div class="icon-box red"><i class="fas fa-book"></i></div>
                                    <span class="flex-grow-1 ms-2 font-weight-bold text-white" style="font-size: 0.9rem;">Biblioteca</span>
                                    <span class="badge-modern-pill red me-2">{{ $stats['libros'] }}</span>
                                    <div class="btn-icon-modern outline sm" style="width: 24px; height: 24px;"><i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i></div>
                                </a>
                                <a href="{{ route('admin.materiales.index') }}" class="module-row-item">
                                    <div class="icon-box orange"><i class="fas fa-folder-open"></i></div>
                                    <span class="flex-grow-1 ms-2 font-weight-bold text-white" style="font-size: 0.9rem;">Materiales</span>
                                    <span class="badge-modern-pill orange me-2">{{ $stats['materiales'] }}</span>
                                    <div class="btn-icon-modern outline sm" style="width: 24px; height: 24px;"><i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i></div>
                                </a>
                                <a href="{{ route('admin.laboratorios.index') }}" class="module-row-item">
                                    <div class="icon-box blue"><i class="fas fa-desktop"></i></div>
                                    <span class="flex-grow-1 ms-2 font-weight-bold text-white" style="font-size: 0.9rem;">Laboratorios</span>
                                    <span class="badge-modern-pill blue me-2">{{ $stats['laboratorios'] }}</span>
                                    <div class="btn-icon-modern outline sm" style="width: 24px; height: 24px;"><i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Card: Administración -->
                    <div class="dashboard-card h-100">
                        <div class="card-header border-0 pb-2">
                            <h3 class="card-title">Administración</h3>
                            <i class="fas fa-cogs text-danger" style="opacity: 0.8;"></i>
                        </div>
                        <div class="card-body pt-0">
                            <div class="modules-list-compact">
                                <a href="{{ route('admin.usuarios.index') }}" class="module-row-item">
                                    <div class="icon-box gray"><i class="fas fa-users"></i></div>
                                    <span class="flex-grow-1 ms-2 font-weight-bold text-white" style="font-size: 0.9rem;">Usuarios</span>
                                    <span class="badge-modern-pill gray me-2">{{ $stats['users'] }}</span>
                                    <div class="btn-icon-modern outline sm" style="width: 24px; height: 24px;"><i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i></div>
                                </a>
                                <a href="{{ route('admin.roles.index') }}" class="module-row-item">
                                    <div class="icon-box purple"><i class="fas fa-user-tag"></i></div>
                                    <span class="flex-grow-1 ms-2 font-weight-bold text-white" style="font-size: 0.9rem;">Roles</span>
                                    <span class="badge-modern-pill purple me-2">{{ count($roleDistribution) ?? 0 }}</span>
                                    <div class="btn-icon-modern outline sm" style="width: 24px; height: 24px;"><i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i></div>
                                </a>
                                <div class="module-row-item">
                                    <div class="icon-box gray"><i class="fas fa-key"></i></div>
                                    <span class="flex-grow-1 ms-2 font-weight-bold text-white" style="font-size: 0.9rem;">Permisos</span>
                                    <span class="badge-modern-pill gray me-2">40</span>
                                    <div class="btn-icon-modern outline sm" style="width: 24px; height: 24px;"><i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i></div>
                                </div>
                                <div class="module-row-item">
                                    <div class="icon-box blue"><i class="fas fa-chart-line"></i></div>
                                    <span class="flex-grow-1 ms-2 font-weight-bold text-white" style="font-size: 0.9rem;">Reportes</span>
                                    <div class="btn-icon-modern outline sm ms-auto" style="width: 24px; height: 24px;"><i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i></div>
                                </div>
                                <div class="module-row-item">
                                    <div class="icon-box gray"><i class="fas fa-sliders-h"></i></div>
                                    <span class="flex-grow-1 ms-2 font-weight-bold text-white" style="font-size: 0.9rem;">Configuración</span>
                                    <div class="btn-icon-modern outline sm ms-auto" style="width: 24px; height: 24px;"><i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i></div>
                                </div>
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
