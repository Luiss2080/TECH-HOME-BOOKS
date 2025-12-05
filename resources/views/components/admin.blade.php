<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin - Tech Home Books')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-tech-home-books.png') }}">
    
    <!-- Precargar fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
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
                                +5.2%
                            </div>
                        </div>
                        <div class="stat-number">{{ \App\Models\Estudiante::count() ?? '0' }}</div>
                        <div class="stat-label">Total Estudiantes</div>
                        <div class="stat-subtitle">Registrados en el sistema</div>
                    </div>
                    
                    <div class="stats-card">
                        <div class="stat-header">
                            <div class="stat-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 14q1.25 0 2.125-.875T15 11V5q0-1.25-.875-2.125T12 2q-1.25 0-2.125.875T9 5v6q0 1.25.875 2.125T12 14Zm-8 4v-1.5q0-.75.4-1.4t1.15-.95q1.35-.65 2.725-1.025T12 13.5q1.7 0 3.075.375t2.725 1.025q.75.3 1.15.95t.4 1.4V18H4Z"/>
                                </svg>
                            </div>
                            <div class="stat-trend">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M7 14l5-5 5 5z"/>
                                </svg>
                                +2.1%
                            </div>
                        </div>
                        <div class="stat-number">{{ \App\Models\Docente::count() ?? '0' }}</div>
                        <div class="stat-label">Total Docentes</div>
                        <div class="stat-subtitle">Activos en el sistema</div>
                    </div>
                    
                    <div class="stats-card">
                        <div class="stat-header">
                            <div class="stat-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z"/>
                                </svg>
                            </div>
                            <div class="stat-trend">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M7 14l5-5 5 5z"/>
                                </svg>
                                +1.8%
                            </div>
                        </div>
                        <div class="stat-number">{{ \App\Models\Colegio::count() ?? '0' }}</div>
                        <div class="stat-label">Colegios Registrados</div>
                        <div class="stat-subtitle">En la plataforma</div>
                    </div>
                    
                    <div class="stats-card">
                        <div class="stat-header">
                            <div class="stat-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 2 2h12c1.11 0 2-.9 2-2V4c0-1.1-.89-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"/>
                                </svg>
                            </div>
                            <div class="stat-trend">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M7 14l5-5 5 5z"/>
                                </svg>
                                +7.3%
                            </div>
                        </div>
                        <div class="stat-number">{{ \App\Models\Libro::count() ?? '0' }}</div>
                        <div class="stat-label">Libros Disponibles</div>
                        <div class="stat-subtitle">En la biblioteca digital</div>
                    </div>
                </div>

                <!-- Acciones Rápidas -->
                <div class="quick-actions-section">
                    <h2 class="section-title">Acciones Rápidas</h2>
                    <div class="actions-grid">
                        
                        <!-- Nuevo Estudiante -->
                        <div class="action-card">
                            <div class="action-icon">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                                </svg>
                            </div>
                            <h3 class="action-title">Agregar Estudiante</h3>
                            <p class="action-description">Registra un nuevo estudiante en el sistema</p>
                            <a href="{{ route('estudiantes.index') }}" class="action-btn">
                                Gestionar Estudiantes
                            </a>
                        </div>
                        
                        <!-- Nuevo Docente -->
                        <div class="action-card">
                            <div class="action-icon">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 14q1.25 0 2.125-.875T15 11V5q0-1.25-.875-2.125T12 2q-1.25 0-2.125.875T9 5v6q0 1.25.875 2.125T12 14Z"/>
                                </svg>
                            </div>
                            <h3 class="action-title">Agregar Docente</h3>
                            <p class="action-description">Registra un nuevo docente en la plataforma</p>
                            <a href="{{ route('docentes.index') }}" class="action-btn">
                                Gestionar Docentes
                            </a>
                        </div>
                        
                        <!-- Nuevo Colegio -->
                        <div class="action-card">
                            <div class="action-icon">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z"/>
                                </svg>
                            </div>
                            <h3 class="action-title">Agregar Colegio</h3>
                            <p class="action-description">Registra una nueva institución educativa</p>
                            <a href="{{ route('colegios.index') }}" class="action-btn">
                                Gestionar Colegios
                            </a>
                        </div>
                        
                        <!-- Reportes -->
                        <div class="action-card">
                            <div class="action-icon">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                                </svg>
                            </div>
                            <h3 class="action-title">Ver Reportes</h3>
                            <p class="action-description">Accede a estadísticas y reportes del sistema</p>
                            <a href="{{ route('reportes.index') }}" class="action-btn">
                                Ver Reportes
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Actividad Reciente -->
                <div class="recent-activity-section">
                    <h2 class="section-title">Actividad Reciente</h2>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                </svg>
                            </div>
                            <div class="activity-content">
                                <h4>Nuevo estudiante registrado</h4>
                                <p>Se registró un nuevo estudiante en el sistema</p>
                                <span class="activity-time">Hace 2 horas</span>
                            </div>
                        </div>
                        
                        <div class="activity-item">
                            <div class="activity-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 2 2h12c1.11 0 2-.9 2-2V4c0-1.1-.89-2-2-2z"/>
                                </svg>
                            </div>
                            <div class="activity-content">
                                <h4>Nuevo libro agregado</h4>
                                <p>Se agregó un nuevo libro a la biblioteca digital</p>
                                <span class="activity-time">Hace 4 horas</span>
                            </div>
                        </div>
                        
                        <div class="activity-item">
                            <div class="activity-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 14q1.25 0 2.125-.875T15 11V5q0-1.25-.875-2.125T12 2q-1.25 0-2.125.875T9 5v6q0 1.25.875 2.125T12 14Z"/>
                                </svg>
                            </div>
                            <div class="activity-content">
                                <h4>Docente actualizado</h4>
                                <p>Se actualizó la información de un docente</p>
                                <span class="activity-time">Hace 6 horas</span>
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
            }
        };
    </script>
    
    <!-- JavaScript del Dashboard -->
    <script src="{{ asset('js/components/loading.js') }}"></script>
    <script src="{{ asset('js/dashboard/dashboard.js') }}"></script>
    <script src="{{ asset('js/components/sidebar.js') }}"></script>
    
    <!-- JavaScript del Header -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggle = document.getElementById('profileDropdownToggle');
            const dropdown = document.getElementById('profileDropdown');
            
            if(toggle && dropdown) {
                toggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
                    toggle.setAttribute('aria-expanded', !isExpanded);
                    dropdown.classList.toggle('show');
                });
                
                document.addEventListener('click', function(e) {
                    if (!dropdown.contains(e.target) && !toggle.contains(e.target)) {
                        dropdown.classList.remove('show');
                        toggle.setAttribute('aria-expanded', 'false');
                    }
                });
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>
