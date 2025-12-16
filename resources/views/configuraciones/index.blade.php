@extends('layouts.admin')

@section('title', 'Configuraciones - Tech Home Books')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/configuraciones/configuraciones.css') }}">
@endsection

@section('content')
<div class="config-container">
    <div class="config-header">
        <div>
            <h1 class="config-title">Configuración del Sistema</h1>
            <p class="config-subtitle">Gestiona las preferencias generales, seguridad y personalización de la plataforma.</p>
        </div>
        <div>
            <!-- Header actions if needed -->
        </div>
    </div>

    <!-- Navigation Tabs -->
    <div class="config-tabs">
        <button class="config-tab-btn active" data-target="general">
            <i class="fas fa-sliders-h me-2"></i>General
        </button>
        <button class="config-tab-btn" data-target="security">
            <i class="fas fa-shield-alt me-2"></i>Seguridad
        </button>
        <button class="config-tab-btn" data-target="appearance">
            <i class="fas fa-paint-brush me-2"></i>Apariencia
        </button>
        <button class="config-tab-btn" data-target="notifications">
            <i class="fas fa-bell me-2"></i>Notificaciones
        </button>
        <button class="config-tab-btn" data-target="system">
            <i class="fas fa-server me-2"></i>Sistema
        </button>
    </div>

    <!-- Section: General -->
    <div id="general" class="config-section active">
        <div class="config-grid">
            <!-- Card: Site Info -->
            <div class="config-card">
                <div class="config-card-header">
                    <div class="config-card-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <div>
                        <h3 class="config-card-title">Información del Sitio</h3>
                        <p class="config-card-desc">Detalles básicos de la plataforma</p>
                    </div>
                </div>
                <div class="config-card-body">
                    <div class="config-item">
                        <div class="config-item-info">
                            <label class="config-label">Nombre del Sistema</label>
                            <span class="config-desc">Nombre visible en el título y correos</span>
                        </div>
                        <input type="text" class="config-input" value="Tech Home Books" readonly>
                    </div>
                    <div class="config-item">
                        <div class="config-item-info">
                            <label class="config-label">URL del Sitio</label>
                            <span class="config-desc">Dirección web principal</span>
                        </div>
                        <input type="text" class="config-input" value="{{ url('/') }}" readonly>
                    </div>
                    <div class="config-item">
                        <div class="config-item-info">
                            <label class="config-label">Modo Mantenimiento</label>
                            <span class="config-desc">Desactivar el acceso a usuarios no administradores</span>
                        </div>
                        <label class="switch">
                            <input type="checkbox" name="maintenance_mode">
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Card: Academic Settings -->
            <div class="config-card">
                <div class="config-card-header">
                    <div class="config-card-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div>
                        <h3 class="config-card-title">Académico</h3>
                        <p class="config-card-desc">Configuración de cursos y periodos</p>
                    </div>
                </div>
                <div class="config-card-body">
                    <div class="config-item">
                        <div class="config-item-info">
                            <label class="config-label">Periodo Actual</label>
                            <span class="config-desc">Ciclo académico activo</span>
                        </div>
                        <select class="config-select">
                            <option>2024 - I</option>
                            <option selected>2025 - I</option>
                            <option>2025 - II</option>
                        </select>
                    </div>
                    <div class="config-item">
                        <div class="config-item-info">
                            <label class="config-label">Registro de Estudiantes</label>
                            <span class="config-desc">Permitir nuevos registros públicos</span>
                        </div>
                        <label class="switch">
                            <input type="checkbox" name="student_registration" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    <div class="config-item">
                        <div class="config-item-info">
                            <label class="config-label">Registro de Docentes</label>
                            <span class="config-desc">Requiere aprobación administrativa</span>
                        </div>
                        <label class="switch">
                            <input type="checkbox" name="teacher_registration">
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section: Security -->
    <div id="security" class="config-section">
        <div class="config-grid">
            <div class="config-card">
                <div class="config-card-header">
                    <div class="config-card-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h3 class="config-card-title">Políticas de Acceso</h3>
                        <p class="config-card-desc">Seguridad de cuentas y sesiones</p>
                    </div>
                </div>
                <div class="config-card-body">
                     <div class="config-item">
                        <div class="config-item-info">
                            <label class="config-label">Autenticación de Dos Factores (2FA)</label>
                            <span class="config-desc">Forzar 2FA para roles administrativos</span>
                        </div>
                        <label class="switch">
                            <input type="checkbox" name="force_2fa">
                            <span class="slider"></span>
                        </label>
                    </div>
                    <div class="config-item">
                        <div class="config-item-info">
                            <label class="config-label">Expiración de Sesión</label>
                            <span class="config-desc">Tiempo de inactividad antes de cerrar sesión (minutos)</span>
                        </div>
                        <input type="number" class="config-input" value="120">
                    </div>
                    <div class="config-item">
                        <div class="config-item-info">
                            <label class="config-label">Intentos de Login</label>
                            <span class="config-desc">Máximo intentos fallidos antes de bloqueo</span>
                        </div>
                        <select class="config-select">
                            <option>3 intentos</option>
                            <option selected>5 intentos</option>
                            <option>10 intentos</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section: Appearance -->
    <div id="appearance" class="config-section">
        <div class="config-grid">
            <div class="config-card">
                <div class="config-card-header">
                    <div class="config-card-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <div>
                        <h3 class="config-card-title">Interfaz de Usuario</h3>
                        <p class="config-card-desc">Personaliza la experiencia visual</p>
                    </div>
                </div>
                <div class="config-card-body">
                    <div class="config-item">
                        <div class="config-item-info">
                            <label class="config-label">Tema por Defecto</label>
                            <span class="config-desc">Tema inicial para nuevos usuarios</span>
                        </div>
                        <select class="config-select">
                            <option>Claro</option>
                            <option selected>Oscuro (Neon)</option>
                            <option>Sistema</option>
                        </select>
                    </div>
                    <div class="config-item">
                        <div class="config-item-info">
                            <label class="config-label">Efectos Visuales</label>
                            <span class="config-desc">Habilitar animaciones y desenfoques</span>
                        </div>
                        <label class="switch">
                            <input type="checkbox" name="visual_effects" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    <div class="config-item">
                        <div class="config-item-info">
                            <label class="config-label">Barra Lateral Colapsada</label>
                            <span class="config-desc">Iniciar con el menú minimizado</span>
                        </div>
                        <label class="switch">
                            <input type="checkbox" name="sidebar_collapsed">
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Other sections placeholder -->
    <div id="notifications" class="config-section">
        <div class="alert alert-info" style="background: rgba(59, 130, 246, 0.1); border-color: rgba(59, 130, 246, 0.2); color: #93c5fd;">
            <i class="fas fa-info-circle me-2"></i> Las configuraciones de notificaciones se gestionan por usuario en su perfil personal.
        </div>
    </div>

    <div id="system" class="config-section">
        <div class="config-grid">
            <div class="config-card">
                 <div class="config-card-header">
                    <div class="config-card-icon">
                        <i class="fas fa-microchip"></i>
                    </div>
                    <div>
                        <h3 class="config-card-title">Estado del Servidor</h3>
                        <p class="config-card-desc">Métricas de rendimiento (Demo)</p>
                    </div>
                </div>
                <div class="config-card-body">
                    <div class="config-item">
                        <div class="config-item-info">
                            <label class="config-label">Versión de Laravel</label>
                        </div>
                        <span class="badge bg-danger">{{ app()->version() }}</span>
                    </div>
                    <div class="config-item">
                        <div class="config-item-info">
                            <label class="config-label">PHP Version</label>
                        </div>
                        <span class="badge bg-primary">{{ phpversion() }}</span>
                    </div>
                    <div class="config-item">
                        <div class="config-item-info">
                            <label class="config-label">Debug Mode</label>
                        </div>
                        <span class="badge {{ config('app.debug') ? 'bg-warning' : 'bg-success' }}">
                            {{ config('app.debug') ? 'Activado' : 'Desactivado' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('js')
    <script src="{{ asset('js/configuraciones/configuraciones.js') }}"></script>
    <script>
        // Inline script for specific functionality if needed
    </script>
@endsection
