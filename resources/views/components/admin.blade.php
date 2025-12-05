<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin - Tech Home Books')</title>

    
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
                
                <!-- Sección: Cursos de Robótica e IA -->
                <div class="dashboard-section">
                    <div class="section-header-centered">
                        <div class="section-icon">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3z"/>
                            </svg>
                        </div>
                        <h2 class="section-title-large">Cursos de Robótica e IA</h2>
                        <p class="section-subtitle">Formación especializada desde nivel básico hasta investigación avanzada</p>
                    </div>

                    <div class="courses-grid">
                        <!-- Robótica Básica -->
                        <div class="course-card">
                            <div class="course-badge basic">BÁSICO</div>
                            <div class="course-icon-wrapper blue">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                            <h3 class="course-title">Robótica Básica</h3>
                            <p class="course-desc">Introducción a la programación de robots</p>
                            <div class="course-meta">
                                <span><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg> 40 horas</span>
                            </div>
                            <a href="#" class="course-btn btn-red">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                                Comenzar
                            </a>
                        </div>

                        <!-- Machine Learning -->
                        <div class="course-card">
                            <div class="course-badge intermediate">INTERMEDIO</div>
                            <div class="course-icon-wrapper purple">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M21 16.5c0 .38-.21.71-.53.88l-7.9 4.44c-.16.12-.36.18-.57.18-.21 0-.41-.06-.57-.18l-7.9-4.44A.991.991 0 0 1 3 16.5c0-.38.21-.71.53-.88l7.9-4.44c.16-.12.36-.18.57-.18.21 0 .41.06.57.18l7.9 4.44c.32.17.53.5.53.88zM12 16l-4-2.25L12 11.5l4 2.25L12 16zm0-2.5l-2.67-1.5L12 10.5l2.67 1.5L12 13.5z"/>
                                </svg>
                            </div>
                            <h3 class="course-title">Machine Learning</h3>
                            <p class="course-desc">Algoritmos de aprendizaje automático aplicado</p>
                            <div class="course-meta">
                                <span><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg> 60 horas</span>
                            </div>
                            <a href="#" class="course-btn btn-red">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                                Inscribirse
                            </a>
                        </div>

                        <!-- Visión Artificial -->
                        <div class="course-card">
                            <div class="course-badge advanced">AVANZADO</div>
                            <div class="course-icon-wrapper red">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                </svg>
                            </div>
                            <h3 class="course-title">Visión Artificial</h3>
                            <p class="course-desc">Procesamiento de imágenes y reconocimiento</p>
                            <div class="course-meta">
                                <span><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg> 80 horas</span>
                            </div>
                            <a href="#" class="course-btn btn-red">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                                Ver Curso
                            </a>
                        </div>

                        <!-- IoT y Automatización -->
                        <div class="course-card">
                            <div class="course-badge intermediate">INTERMEDIO</div>
                            <div class="course-icon-wrapper cyan">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M18 13h-5v5c0 .55-.45 1-1 1s-1-.45-1-1v-5H6c-.55 0-1-.45-1-1s.45-1 1-1h5V6c0-.55.45-1 1-1s1 .45 1 1v5h5c.55 0 1 .45 1 1s-.45 1-1 1z"/>
                                </svg>
                            </div>
                            <h3 class="course-title">IoT y Automatización</h3>
                            <p class="course-desc">Internet de las cosas y sistemas conectados</p>
                            <div class="course-meta">
                                <span><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg> 50 horas</span>
                            </div>
                            <a href="#" class="course-btn btn-red">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/></svg>
                                Explorar
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Sección: Laboratorios Virtuales -->
                <div class="dashboard-section">
                    <div class="section-header-centered">
                        <div class="section-icon">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                            </svg>
                        </div>
                        <h2 class="section-title-large">Laboratorios Virtuales</h2>
                        <p class="section-subtitle">Accede a las herramientas de desarrollo y simulación</p>
                    </div>

                    <div class="labs-grid">
                        <!-- IDE -->
                        <div class="lab-card">
                            <div class="lab-status online">Online</div>
                            <div class="lab-icon red">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z"/>
                                </svg>
                            </div>
                            <h3 class="lab-title">IDE de Programación</h3>
                            <p class="lab-desc">Entorno de desarrollo integrado</p>
                        </div>

                        <!-- Simulador -->
                        <div class="lab-card">
                            <div class="lab-status online">Online</div>
                            <div class="lab-icon red">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M21 16.5c0 .38-.21.71-.53.88l-7.9 4.44c-.16.12-.36.18-.57.18-.21 0-.41-.06-.57-.18l-7.9-4.44A.991.991 0 0 1 3 16.5c0-.38.21-.71.53-.88l7.9-4.44c.16-.12.36-.18.57-.18.21 0 .41.06.57.18l7.9 4.44c.32.17.53.5.53.88zM12 16l-4-2.25L12 11.5l4 2.25L12 16zm0-2.5l-2.67-1.5L12 10.5l2.67 1.5L12 13.5z"/>
                                </svg>
                            </div>
                            <h3 class="lab-title">Simulador 3D</h3>
                            <p class="lab-desc">Pruebas en entornos virtuales</p>
                        </div>

                        <!-- IA Training -->
                        <div class="lab-card">
                            <div class="lab-status maintenance">Mantenimiento</div>
                            <div class="lab-icon red">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"/>
                                </svg>
                            </div>
                            <h3 class="lab-title">IA Training Hub</h3>
                            <p class="lab-desc">Entrenamiento de modelos</p>
                        </div>

                        <!-- IoT Dashboard -->
                        <div class="lab-card">
                            <div class="lab-status online">Online</div>
                            <div class="lab-icon red">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M18 13h-5v5c0 .55-.45 1-1 1s-1-.45-1-1v-5H6c-.55 0-1-.45-1-1s.45-1 1-1h5V6c0-.55.45-1 1-1s1 .45 1 1v5h5c.55 0 1 .45 1 1s-.45 1-1 1z"/>
                                </svg>
                            </div>
                            <h3 class="lab-title">IoT Dashboard</h3>
                            <p class="lab-desc">Monitorización en tiempo real</p>
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

    <script src="{{ asset('js/components/sidebar.js') }}"></script>
    <script src="{{ asset('js/components/footer.js') }}"></script>
    
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
