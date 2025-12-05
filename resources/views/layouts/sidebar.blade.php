<aside class="dashboard-sidebar" id="systemSidebar">
    <!-- Header del Sidebar -->
    <div class="sidebar-header">
        <div class="logo-container">
            <div class="logo-icon">
                <img src="{{ asset('images/logo-tech-home-books.png') }}" alt="Tech Home" class="logo-img">
            </div>
            <div class="logo-text">
                <h1 class="brand-name">TECH HOME</h1>
                <span class="brand-subtitle">Instituto de Robótica</span>
            </div>
        </div>
    </div>

    <!-- Contenedor de Navegación con Scroll -->
    <div class="sidebar-scroll-content">
        <!-- Sección: Gestión Académica -->
        <div class="nav-section">
            <h3 class="section-title">GESTIÓN ACADÉMICA</h3>
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="{{ route('docentes.index') }}" class="nav-link {{ request()->routeIs('docentes.*') ? 'active' : '' }}">
                        <span class="nav-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 7h-9"></path><path d="M14 17H5"></path><circle cx="17" cy="17" r="3"></circle><circle cx="7" cy="7" r="3"></circle>
                            </svg>
                        </span>
                        <span class="nav-text">Docentes</span>
                        <span class="nav-badge">4</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('estudiantes.index') }}" class="nav-link {{ request()->routeIs('estudiantes.*') ? 'active' : '' }}">
                        <span class="nav-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path><path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                            </svg>
                        </span>
                        <span class="nav-text">Estudiantes</span>
                        <span class="nav-badge">6</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <span class="nav-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                            </svg>
                        </span>
                        <span class="nav-text">Cursos</span>
                        <span class="nav-badge">35</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('usuarios.index') }}" class="nav-link {{ request()->routeIs('usuarios.*') ? 'active' : '' }}">
                        <span class="nav-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </span>
                        <span class="nav-text">Usuarios</span>
                        <span class="nav-badge">28</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Sección: Recursos -->
        <div class="nav-section">
            <h3 class="section-title">RECURSOS</h3>
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="{{ route('libros.index') }}" class="nav-link {{ request()->routeIs('libros.*') ? 'active' : '' }}">
                        <span class="nav-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                            </svg>
                        </span>
                        <span class="nav-text">Biblioteca</span>
                        <span class="nav-badge">30</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <span class="nav-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                        </span>
                        <span class="nav-text">Materiales</span>
                        <span class="nav-badge">20</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <span class="nav-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M10 2v7.31"></path><path d="M14 9.3V1.99"></path><path d="M8.5 2h7"></path><path d="M14 9.3a6.5 6.5 0 1 1-4 0"></path><path d="M5.52 16h12.96"></path>
                            </svg>
                        </span>
                        <span class="nav-text">Laboratorios</span>
                        <span class="nav-badge">5</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <span class="nav-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                            </svg>
                        </span>
                        <span class="nav-text">Componentes</span>
                        <span class="nav-badge">43</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Footer del Sidebar -->
    <div class="sidebar-footer">
        <a href="/" target="_blank" class="visit-site-btn">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line>
            </svg>
            <span>Visitar Sitio Web</span>
        </a>

        <div class="theme-toggle-card">
            <div class="theme-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle><path d="M12 2a7 7 0 1 0 10 10"></path>
                </svg>
            </div>
            <span class="theme-text">Oscuro</span>
            <label class="switch">
                <input type="checkbox" id="themeSwitch">
                <span class="slider round">
                    <svg class="sun-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                </span>
            </label>
        </div>
    </div>
</aside>
    <!-- Logo del Sidebar -->
    <div class="sidebar-logo">
        <img src="{{ asset('images/logo-tech-home-books.png') }}" alt="Logo Tech Home Books" class="sidebar-logo-image">
        <div class="sidebar-logo-text">
            <span class="sidebar-brand">TECH HOME BOOKS</span>
            <span class="sidebar-tagline">Sistema Educativo</span>
        </div>
    </div>

    <!-- Navegación Principal -->
    <nav class="sidebar-nav">
        <ul class="nav-menu">
            
            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <div class="nav-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                        </svg>
                    </div>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <!-- Sección: Gestión de Personal -->
            <li class="nav-section">
                <span class="section-title">Gestión de Personal</span>
            </li>

            <!-- Estudiantes -->
            <li class="nav-item">
                <a href="{{ route('estudiantes.index') }}" class="nav-link {{ request()->routeIs('estudiantes.*') ? 'active' : '' }}">
                    <div class="nav-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <span class="nav-text">Estudiantes</span>
                    <span class="nav-badge">125</span>
                </a>
            </li>

            <!-- Docentes -->
            <li class="nav-item">
                <a href="{{ route('docentes.index') }}" class="nav-link {{ request()->routeIs('docentes.*') ? 'active' : '' }}">
                    <div class="nav-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 14q1.25 0 2.125-.875T15 11V5q0-1.25-.875-2.125T12 2q-1.25 0-2.125.875T9 5v6q0 1.25.875 2.125T12 14Zm-8 4v-1.5q0-.75.4-1.4t1.15-.95q1.35-.65 2.725-1.025T12 13.5q1.7 0 3.075.375t2.725 1.025q.75.3 1.15.95t.4 1.4V18H4Z"/>
                        </svg>
                    </div>
                    <span class="nav-text">Docentes</span>
                    <span class="nav-badge blue">15</span>
                </a>
            </li>

            <!-- Usuarios del Sistema -->
            <li class="nav-item">
                <a href="{{ route('usuarios.index') }}" class="nav-link {{ request()->routeIs('usuarios.*') ? 'active' : '' }}">
                    <div class="nav-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zM4 18v-4h3v-3h10v3h3v4H4z"/>
                        </svg>
                    </div>
                    <span class="nav-text">Usuarios</span>
                    <span class="nav-badge green">45</span>
                </a>
            </li>

            <!-- Sección: Academia -->
            <li class="nav-section">
                <span class="section-title">Academia</span>
            </li>

            <!-- Colegios -->
            <li class="nav-item">
                <a href="{{ route('colegios.index') }}" class="nav-link {{ request()->routeIs('colegios.*') ? 'active' : '' }}">
                    <div class="nav-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z"/>
                        </svg>
                    </div>
                    <span class="nav-text">Colegios</span>
                </a>
            </li>

            <!-- Materias -->
            <li class="nav-item">
                <a href="{{ route('materias.index') }}" class="nav-link {{ request()->routeIs('materias.*') ? 'active' : '' }}">
                    <div class="nav-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                        </svg>
                    </div>
                    <span class="nav-text">Materias</span>
                    <span class="nav-badge purple">8</span>
                </a>
            </li>

            <!-- Sección: Administración -->
            <li class="nav-section">
                <span class="section-title">Administración</span>
            </li>

            <!-- Estudiantes -->
            <li class="nav-item">
                <a href="{{ route('estudiantes.index') }}" class="nav-link {{ request()->routeIs('estudiantes.*') ? 'active' : '' }}">
                    <div class="nav-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"/>
                        </svg>
                    </div>
                    <span class="nav-text">Estudiantes</span>
                    <span class="nav-badge bg-blue">{{ $totalEstudiantes ?? '0' }}</span>
                </a>
            </li>

            <!-- Libros -->
            <li class="nav-item">
                <a href="{{ route('libros.index') }}" class="nav-link {{ request()->routeIs('libros.*') ? 'active' : '' }}">
                    <div class="nav-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M21 5c-1.11-.35-2.33-.5-3.5-.5-1.95 0-4.05.4-5.5 1.5-1.45-1.1-3.55-1.5-5.5-1.5S2.45 4.9 1 6v14.65c0 .25.25.5.5.5.1 0 .15-.05.25-.05C3.1 20.45 5.05 20 6.5 20c1.95 0 4.05.4 5.5 1.5 1.35-.85 3.8-1.5 5.5-1.5 1.65 0 3.35.3 4.75 1.05.1.05.15.05.25.05.25 0 .5-.25.5-.5V6c-.6-.45-1.25-.75-2-1zm0 13.5c-1.1-.35-2.3-.5-3.5-.5-1.7 0-4.15.65-5.5 1.5V8c1.35-.85 3.8-1.5 5.5-1.5 1.2 0 2.4.15 3.5.5v11.5z"/>
                        </svg>
                    </div>
                    <span class="nav-text">Libros</span>
                    <span class="nav-badge bg-green">{{ $totalLibros ?? '0' }}</span>
                </a>
            </li>

            <!-- Calificaciones -->
            <li class="nav-item">
                <a href="{{ route('calificaciones.index') }}" class="nav-link {{ request()->routeIs('calificaciones.*') ? 'active' : '' }}">
                    <div class="nav-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                    </div>
                    <span class="nav-text">Calificaciones</span>
                    <span class="nav-badge bg-orange">{{ $totalCalificaciones ?? '0' }}</span>
                </a>
            </li>

            <!-- Sección: Reportes y Análisis -->
            <li class="nav-section">
                <span class="section-title">Reportes</span>
            </li>

            <!-- Reportes -->
            <li class="nav-item has-submenu">
                <a href="#" class="nav-link submenu-toggle">
                    <div class="nav-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                        </svg>
                    </div>
                    <span class="nav-text">Reportes</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{ route('reportes.estudiantes') }}" class="submenu-link {{ request()->routeIs('reportes.estudiantes') ? 'active' : '' }}">
                        <div class="nav-icon-mini">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"/>
                            </svg>
                        </div>
                        Estudiantes
                    </a></li>
                    <li><a href="{{ route('reportes.materias') }}" class="submenu-link {{ request()->routeIs('reportes.materias') ? 'active' : '' }}">
                        <div class="nav-icon-mini">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                            </svg>
                        </div>
                        Materias
                    </a></li>
                    <li><a href="{{ route('reportes.calificaciones') }}" class="submenu-link {{ request()->routeIs('reportes.calificaciones') ? 'active' : '' }}">
                        <div class="nav-icon-mini">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        </div>
                        Calificaciones
                    </a></li>
                </ul>
            </li>

            <!-- Sección: Sistema -->
            <li class="nav-section">
                <span class="section-title">Sistema</span>
            </li>

            <!-- Permisos -->
            <li class="nav-item">
                <a href="{{ route('permisos.index') }}" class="nav-link {{ request()->routeIs('permisos.*') ? 'active' : '' }}">
                    <div class="nav-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
                        </svg>
                    </div>
                    <span class="nav-text">Permisos</span>
                </a>
            </li>

            <!-- Configuraciones -->
            <li class="nav-item">
                <a href="{{ route('configuraciones.index') }}" class="nav-link {{ request()->routeIs('configuraciones.*') ? 'active' : '' }}">
                    <div class="nav-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.07-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.74,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.82,11.69,4.82,12s0.02,0.64,0.07,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.44-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.47-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z"/>
                        </svg>
                    </div>
                    <span class="nav-text">Configuración</span>
                </a>
            </li>

        </ul>
    </nav>

    <!-- Footer Action Section -->
    <div class="sidebar-footer">
        <div class="theme-toggle-mini" id="themeToggle">
            <span class="theme-label">Modo Oscuro</span>
            <div class="toggle-switch"></div>
        </div>
    </div>
</aside>