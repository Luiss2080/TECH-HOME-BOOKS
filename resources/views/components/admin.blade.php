<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrador - TECH HOME BOOKS</title>
    <link rel="icon" type="image/png" href="{{ asset('images/LogoAsociacion.png') }}">
    
    <!-- Precargar fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Meta tags -->
    <meta name="description" content="Dashboard administrativo de TECH HOME BOOKS.">
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
                        
                        <!-- Gestionar Usuarios -->
                        <div class="action-card">
                            <div class="action-icon">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                                </svg>
                            </div>
                            <h3 class="action-title">Gestionar Usuarios</h3>
                            <p class="action-description">Administrar docentes, estudiantes y administrativos</p>
                            <a href="#" class="action-btn">
                                Ver Usuarios
                            </a>
                        </div>
                        
                        <!-- Cursos y Materias -->
                        <div class="action-card">
                            <div class="action-icon">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm16-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-1 9H9V9h10v2zm-4 4H9v-2h6v2zm4-8H9V5h10v2z"/>
                                </svg>
                            </div>
                            <h3 class="action-title">Académico</h3>
                            <p class="action-description">Gestión de cursos, materias y horarios</p>
                            <a href="#" class="action-btn">
                                Gestión Académica
                            </a>
                        </div>
                        
                        <!-- Biblioteca -->
                        <div class="action-card">
                            <div class="action-icon">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"/>
                                </svg>
                            </div>
                            <h3 class="action-title">Biblioteca</h3>
                            <p class="action-description">Administrar libros y material educativo</p>
                            <a href="#" class="action-btn">
                                Ver Biblioteca
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
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrador - TECH HOME BOOKS</title>
    <link rel="icon" type="image/png" href="{{ asset('images/LogoAsociacion.png') }}">
    
    <!-- Precargar fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Meta tags -->
    <meta name="description" content="Dashboard administrativo de TECH HOME BOOKS.">
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
                        
                        <!-- Gestionar Usuarios -->
                        <div class="action-card">
                            <div class="action-icon">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                                </svg>
                            </div>
                            <h3 class="action-title">Gestionar Usuarios</h3>
                            <p class="action-description">Administrar docentes, estudiantes y administrativos</p>
                            <a href="#" class="action-btn">
                                Ver Usuarios
                            </a>
                        </div>
                        
                        <!-- Cursos y Materias -->
                        <div class="action-card">
                            <div class="action-icon">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm16-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-1 9H9V9h10v2zm-4 4H9v-2h6v2zm4-8H9V5h10v2z"/>
                                </svg>
                            </div>
                            <h3 class="action-title">Académico</h3>
                            <p class="action-description">Gestión de cursos, materias y horarios</p>
                            <a href="#" class="action-btn">
                                Gestión Académica
                            </a>
                        </div>
                        
                        <!-- Biblioteca -->
                        <div class="action-card">
                            <div class="action-icon">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"/>
                                </svg>
                            </div>
                            <h3 class="action-title">Biblioteca</h3>
                            <p class="action-description">Administrar libros y material educativo</p>
                            <a href="#" class="action-btn">
                                Ver Biblioteca
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
    <script src="{{ asset('js/dashboard/admin.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            new DashboardManager();
        });
    </script>
    
    @stack('scripts')
</body>
</html>