{{-- Header del Sistema - Asociación 1ro de Junio --}}


<header class="dashboard-header">
    <!-- Left: Brand & Search -->
    <div class="header-left">
        <div class="header-brand">
            <h1 class="brand-text">{{ $header_title ?? '1RO DE JUNIO' }}</h1>
        </div>
        <div class="header-search">
            <form action="#" method="GET" class="search-form">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="text" name="q" placeholder="Buscar en el sistema..." class="search-input">
            </form>
        </div>
    </div>

    <!-- Right: Actions & Profile -->
    <div class="header-right">
        
        <!-- Notificaciones -->
        <div class="notification-wrapper">
            <button class="notification-btn" id="notificationToggle" aria-label="Notificaciones">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                </svg>
                <span class="notification-badge">3</span>
            </button>
        </div>

        <!-- Perfil de Usuario -->
        <div class="user-profile-container">
            <button class="profile-trigger" id="profileDropdownToggle" aria-expanded="false">
                <div class="user-avatar">
                    @if(session('user_id'))
                        <span>{{ substr(session('user_name') ?? 'A', 0, 1) }}</span>
                    @else
                        <span>U</span>
                    @endif
                </div>
                <div class="user-info">
                    <span class="user-name">{{ session('user_name') ?? 'Administrador Sistema' }}</span>
                    <span class="user-role-badge">{{ ucfirst(session('user_role') ?? 'Admin') }}</span>
                </div>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div class="profile-dropdown" id="profileDropdown">
                <div class="dropdown-header">
                    <div class="dropdown-user-avatar">
                        @if(session('user_id'))
                            <span>{{ substr(session('user_name') ?? 'A', 0, 1) }}</span>
                        @else
                            <span>U</span>
                        @endif
                    </div>
                    <div class="dropdown-user-details">
                        <span class="dropdown-user-name">{{ session('user_name') ?? 'Administrador Sistema' }}</span>
                        <span class="dropdown-user-email">{{ session('user_email') ?? 'admin@tech-home.com' }}</span>
                    </div>
                </div>
                
                <div class="dropdown-body">
                    <!-- Navigation Items -->
                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item">
                        <div class="item-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </div>
                        <div class="item-content">
                            <span class="item-title">Inicio</span>
                        </div>
                    </a>

                    <a href="{{ route('reportes.index') }}" class="dropdown-item">
                        <div class="item-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                        </div>
                        <div class="item-content">
                            <span class="item-title">Reportes</span>
                        </div>
                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="#" class="dropdown-item">
                        <div class="item-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                        </div>
                        <div class="item-content">
                            <span class="item-title">Mensajes</span>
                        </div>
                    </a>

                    <a href="#" class="dropdown-item">
                        <div class="item-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                <line x1="12" y1="17" x2="12.01" y2="17"></line>
                            </svg>
                        </div>
                        <div class="item-content">
                            <span class="item-title">Ayuda</span>
                        </div>
                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="#" class="dropdown-item">
                        <div class="item-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div class="item-content">
                            <span class="item-title">Mi Perfil</span>
                        </div>
                    </a>
                    
                    <a href="{{ route('configuraciones.index') }}" class="dropdown-item">
                        <div class="item-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                            </svg>
                        </div>
                        <div class="item-content">
                            <span class="item-title">Configuración</span>
                        </div>
                    </a>
                </div>

                <div class="dropdown-footer">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <div class="item-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                            </div>
                            <span class="item-title">Cerrar Sesión</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Profile Dropdown Logic
        const toggle = document.getElementById('profileDropdownToggle');
        const dropdown = document.getElementById('profileDropdown');
        
        if(toggle && dropdown) {
            toggle.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent default button behavior
                e.stopPropagation();
                const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
                toggle.setAttribute('aria-expanded', !isExpanded);
                dropdown.classList.toggle('show');
                console.log('Dropdown toggled:', dropdown.classList.contains('show')); // Debug
            });
            
            document.addEventListener('click', function(e) {
                if (!dropdown.contains(e.target) && !toggle.contains(e.target)) {
                    dropdown.classList.remove('show');
                    toggle.setAttribute('aria-expanded', 'false');
                }
            });
        } else {
            console.error('Dropdown elements not found:', { toggle, dropdown });
        }
    });
</script>