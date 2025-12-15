<aside class="dashboard-sidebar" id="systemSidebar">
    <!-- Header del Sidebar -->
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="logo-container" style="text-decoration: none;">
            <div class="logo-icon">
                <img src="{{ asset('images/faviconTH.png') }}" alt="TECH HOME" class="sidebar-logo">
            </div>
            <div class="logo-text">
                <h1 class="brand-name">TECH HOME</h1>
                <span class="brand-subtitle">Instituto de Robótica</span>
            </div>
        </a>
    </div>

    <!-- Contenedor de Navegación con Scroll -->
    <div class="sidebar-scroll-content">
        <!-- Sección: Gestión Académica -->
        <div class="nav-section">
            <h3 class="section-title">GESTIÓN ACADÉMICA</h3>
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="{{ route('admin.docentes.index') }}" class="nav-link {{ request()->routeIs('admin.docentes.*') ? 'active' : '' }}">
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
                    <a href="{{ route('admin.estudiantes.index') }}" class="nav-link {{ request()->routeIs('admin.estudiantes.*') ? 'active' : '' }}">
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
                    <a href="{{ route('admin.colegios.index') }}" class="nav-link {{ request()->routeIs('admin.colegios.*') ? 'active' : '' }}">
                        <span class="nav-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 21h18M5 21V7l8-4 8 4v14M8 21v-4h8v4"></path>
                            </svg>
                        </span>
                        <span class="nav-text">Colegios</span>
                        <span class="nav-badge">2</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.cursos.index') }}" class="nav-link {{ request()->routeIs('admin.cursos.*') ? 'active' : '' }}">
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
                    <a href="{{ route('admin.materias.index') }}" class="nav-link {{ request()->routeIs('admin.materias.*') ? 'active' : '' }}">
                        <span class="nav-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                            </svg>
                        </span>
                        <span class="nav-text">Materias</span>
                        <span class="nav-badge">12</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.usuarios.index') }}" class="nav-link {{ request()->routeIs('admin.usuarios.*') ? 'active' : '' }}">
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
                    <a href="{{ route('admin.materiales.index') }}" class="nav-link {{ request()->routeIs('admin.materiales.*') ? 'active' : '' }}">
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
                    <a href="{{ route('admin.laboratorios.index') }}" class="nav-link {{ request()->routeIs('admin.laboratorios.*') ? 'active' : '' }}">
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

        <!-- Sección: Administración -->
        <div class="nav-section">
            <h3 class="section-title">ADMINISTRACIÓN</h3>
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="{{ route('admin.roles.index') }}" class="nav-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                        <span class="nav-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                        </span>
                        <span class="nav-text">Roles</span>
                        <span class="nav-badge">4</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.permisos.index') }}" class="nav-link {{ request()->routeIs('admin.permisos.*') ? 'active' : '' }}">
                        <span class="nav-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                            </svg>
                        </span>
                        <span class="nav-text">Permisos</span>
                        <span class="nav-badge">{{ \App\Models\Permiso::count() }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('reportes.index') }}" class="nav-link {{ request()->routeIs('reportes.*') ? 'active' : '' }}">
                        <span class="nav-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                        </span>
                        <span class="nav-text">Reportes</span>
                        <span class="nav-badge">8</span>
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