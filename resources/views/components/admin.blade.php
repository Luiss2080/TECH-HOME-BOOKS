<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrador - Asociación 1ro de Junio</title>
    <link rel="icon" type="image/png" href="{{ asset('images/LogoAsociacion.png') }}">
    
    <!-- Precargar fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Meta tags -->
    <meta name="description" content="Dashboard administrativo de la Asociación 1ro de Junio. Gestión profesional de mototaxis.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- CSS del Dashboard -->
    <link rel="stylesheet" href="{{ asset('css/dashboard/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/sidebar.css') }}">
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
            @include('layouts.header', ['header_title' => 'Dashboard Admin'])
            
            <!-- Contenido principal -->
            <div class="dashboard-content">
                
                <!-- Tarjetas de Estadísticas -->
                <div class="stats-grid">
                    <div class="stats-card">
                        <div class="stat-header">
                            <div class="stat-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                </svg>
                            </div>
                            <div class="stat-trend">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M7 14l5-5 5 5z"/>
                                </svg>
                                Activos
                            </div>
                        </div>
                        <div class="stat-number">{{ \App\Models\User::count() }}</div>
                        <div class="stat-label">Usuarios Totales</div>
                        <div class="stat-subtitle">Administradores, Docentes y Estudiantes</div>
                    </div>
                    
                    <div class="stats-card">
                        <div class="stat-header">
                            <div class="stat-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72l5 2.73 5-2.73v3.72z"/>
                                </svg>
                            </div>
                            <div class="stat-trend">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M7 14l5-5 5 5z"/>
                                </svg>
                                En curso
                            </div>
                        </div>
                        <div class="stat-number">{{ \App\Models\Curso::count() }}</div>
                        <div class="stat-label">Cursos Habilitados</div>
                        <div class="stat-subtitle">Gestión Académica Actual</div>
                    </div>
                    
                    <div class="stats-card">
                        <div class="stat-header">
                            <div class="stat-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"/>
                                </svg>
                            </div>
                            <div class="stat-trend">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M7 14l5-5 5 5z"/>
                                </svg>
                                Disponibles
                            </div>
                        </div>
                        <div class="stat-number">{{ \App\Models\Libro::count() }}</div>
                        <div class="stat-label">Libros Digitales</div>
                        <div class="stat-subtitle">Biblioteca Virtual</div>
                    </div>
                    
                    <div class="stats-card">
                        <div class="stat-header">
                            <div class="stat-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
                                </svg>
                            </div>
                            <div class="stat-trend">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M7 14l5-5 5 5z"/>
                                </svg>
                                Registradas
                            </div>
                        </div>
                        <div class="stat-number">{{ \App\Models\Materia::count() }}</div>
                        <div class="stat-label">Materias</div>
                        <div class="stat-subtitle">Plan de Estudios</div>
                    </div>
                </div>

                <!-- Acciones Rápidas -->
                <div class="quick-actions-section">
                    <h2 class="section-title">Acciones Rápidas</h2>
                    <div class="actions-grid">
                        
                        <!-- Gestionar Conductores -->
                        <div class="action-card">
                            <div class="action-icon">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm9 7h-6v13h-2v-6h-2v6H9V9H3V7h18v2z"/>
                                </svg>
                            </div>
                            <h3 class="action-title">Gestionar Conductores</h3>
                            <p class="action-description">Administrar conductores y licencias</p>
                            <a href="/conductores" class="action-btn">
                                Ver Conductores
                            </a>
                        </div>
                        
                        <!-- Registrar Vehículo -->
                        <div class="action-card">
                            <div class="action-icon">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.22.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z"/>
                                </svg>
                            </div>
                            <h3 class="action-title">Registrar Vehículo</h3>
                            <p class="action-description">Añade un nuevo vehículo a la flota</p>
                            <a href="/vehiculos/crear" class="action-btn">
                                Agregar Vehículo
                            </a>
                        </div>
                        
                        <!-- Ver Reportes -->
                        <div class="action-card">
                            <div class="action-icon">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                                </svg>
                            </div>
                            <h3 class="action-title">Generar Reportes</h3>
                            <p class="action-description">Consulta estadísticas y reportes del sistema</p>
                            <a href="/reportes" class="action-btn">
                                Ver Reportes
                            </a>
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
            }
        };
    </script>
    
    <!-- JavaScript del Dashboard -->
    <script src="{{ asset('js/components/loading.js') }}"></script>
    <script src="{{ asset('js/dashboard/dashboard.js') }}"></script>
    
    @stack('scripts')
</body>
</html>