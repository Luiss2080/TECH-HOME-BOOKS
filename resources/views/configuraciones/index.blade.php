@extends('layouts.admin')

@section('title', 'Configuración del Sistema')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/perfil/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/configuraciones/configuraciones.css') }}">
@endsection

@section('content')
    <!-- Control Panel Header -->
    <div class="control-panel">
        <div class="panel-header">
            <div class="header-title">
                <div class="icon-wrapper">
                    <i class="fas fa-cogs"></i>
                </div>
                <div class="title-content">
                    <h2>Configuración del Sistema</h2>
                    <p class="subtitle">Gestiona las preferencias generales, seguridad y personalización de la plataforma.</p>
                </div>
            </div>
        </div>

        <div class="panel-content">
            <!-- Navigation Tabs -->
            <div class="stats-group config-tabs-container" style="overflow-x: auto; justify-content: start; gap: 1rem;">
                <button class="stat-pill tab-trigger active" data-target="general">
                    <i class="fas fa-sliders-h"></i>
                    <div class="info">
                        <span class="label">CONFIGURACIÓN</span>
                        <span class="value">General</span>
                    </div>
                </button>
                
                <button class="stat-pill tab-trigger" data-target="security">
                    <i class="fas fa-shield-alt"></i>
                    <div class="info">
                        <span class="label">CONFIGURACIÓN</span>
                        <span class="value">Seguridad</span>
                    </div>
                </button>

                <button class="stat-pill tab-trigger" data-target="appearance">
                    <i class="fas fa-paint-brush"></i>
                    <div class="info">
                        <span class="label">CONFIGURACIÓN</span>
                        <span class="value">Apariencia</span>
                    </div>
                </button>
                
                <button class="stat-pill tab-trigger" data-target="system">
                    <i class="fas fa-server"></i>
                    <div class="info">
                        <span class="label">CONFIGURACIÓN</span>
                        <span class="value">Sistema</span>
                    </div>
                </button>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="dashboard-section">
        <div class="profile-container"> <!-- Removed .single-column for 2-col layout -->
            
            <!-- SIDEBAR HELP SECTION (Left Column) -->
            <div class="profile-card sticky-sidebar">
                <div class="profile-avatar-wrapper" style="width: 80px; height: 80px; margin-bottom: 20px;">
                   <div style="width: 100%; height: 100%; border-radius: 50%; background: #1f2937; display: flex; align-items: center; justify-content: center; font-size: 2rem; color: #ef4444; border: 2px solid #ef4444; box-shadow: 0 0 15px rgba(239, 68, 68, 0.3);">
                       <i class="fas fa-question"></i>
                   </div>
                </div>
                
                <h2 class="profile-name" style="font-size: 1.2rem; margin-bottom: 0.5rem;">Centro de Ayuda</h2>
                <span class="profile-role" style="margin-bottom: 2rem;">Soporte Admin</span>

                <div class="help-tips" style="text-align: left; width: 100%;">
                    <div class="tip-card" style="background: rgba(255,255,255,0.03); padding: 1rem; border-radius: 12px; margin-bottom: 1rem; border-left: 3px solid #ef4444;">
                        <h4 style="color: white; font-size: 0.9rem; margin-bottom: 0.5rem;"><i class="fas fa-lightbulb text-warning mr-2"></i> ¿Sabías qué?</h4>
                        <p style="font-size: 0.8rem; color: #9ca3af; line-height: 1.4;">
                            Puedes bloquear automáticamente cuentas sospechosas configurando los "Intentos de Login" en la pestaña de Seguridad.
                        </p>
                    </div>

                    <div class="tip-card" style="background: rgba(255,255,255,0.03); padding: 1rem; border-radius: 12px; margin-bottom: 1rem; border-left: 3px solid #3b82f6;">
                        <h4 style="color: white; font-size: 0.9rem; margin-bottom: 0.5rem;"><i class="fas fa-info-circle text-info mr-2"></i> Mantenimiento</h4>
                        <p style="font-size: 0.8rem; color: #9ca3af; line-height: 1.4;">
                            Activa el "Modo Mantenimiento" antes de realizar actualizaciones importantes para evitar errores de usuario.
                        </p>
                    </div>
                </div>

                <div class="profile-stats">
                     <div class="stat-item">
                        <span class="stat-value text-success"><i class="fas fa-check-circle"></i></span>
                        <span class="stat-label" style="font-size: 0.65rem;">Sistema Estable</span>
                    </div>
                     <div class="stat-item">
                        <span class="stat-value text-warning"><i class="fas fa-shield-alt"></i></span>
                        <span class="stat-label" style="font-size: 0.65rem;">Firewall Activo</span>
                    </div>
                </div>
                
                <div class="mt-4 w-100">
                    <a href="#" class="btn-primary-action w-full justify-center" style="width: 100%;">Contactar Soporte</a>
                </div>
            </div>

            <!-- MAIN SETTINGS CONTENT (Right Column) -->
            <div class="profile-content">
                
                <!-- GENERAL SECTION -->
                <div id="general" class="config-section active">
                    <!-- Site Info Card -->
                    <div class="settings-card">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div class="card-title">
                                <h3>Información de la Plataforma</h3>
                                <p>Detalles básicos y SEO</p>
                            </div>
                        </div>
                        
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-signature"></i> Nombre del Sistema</label>
                                <input type="text" class="form-input" value="Tech Home Books">
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-link"></i> URL Principal</label>
                                <input type="text" class="form-input" value="{{ url('/') }}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-envelope"></i> Correo de Soporte</label>
                                <input type="email" class="form-input" value="soporte@tech-home.edu.bo">
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-phone"></i> Teléfono de Contacto</label>
                                <input type="text" class="form-input" value="+591 70000000">
                            </div>
                            
                            <div class="form-group full-width maintenance-mode">
                                <div class="setting-row">
                                    <div class="setting-info">
                                        <span class="setting-label">Modo Mantenimiento</span>
                                        <span class="setting-desc">Si se activa, solo los administradores podrán acceder al sistema.</span>
                                    </div>
                                    <label class="switch">
                                        <input type="checkbox" name="maintenance_mode">
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button class="btn-submit"><i class="fas fa-save"></i> Guardar Cambios</button>
                        </div>
                    </div>
                    
                    <!-- Academic Config Card -->
                    <div class="settings-card mt-4">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-university"></i>
                            </div>
                            <div class="card-title">
                                <h3>Gestión Académica</h3>
                                <p>Control de periodos y registros</p>
                            </div>
                        </div>
                        
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-calendar-alt"></i> Periodo Académico Actual</label>
                                <select class="form-input">
                                    <option>2024 - Gestión I</option>
                                    <option>2024 - Gestión II</option>
                                    <option selected>2025 - Gestión I</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-users"></i> Capacidad Máxima por Curso</label>
                                <input type="number" class="form-input" value="40">
                            </div>

                             <div class="form-group full-width">
                                <div class="setting-row">
                                    <div class="setting-info">
                                        <span class="setting-label">Registro Público de Estudiantes</span>
                                        <span class="setting-desc">Permitir que nuevos estudiantes se registren desde la página de inicio.</span>
                                    </div>
                                    <label class="switch">
                                        <input type="checkbox" name="student_registration" checked>
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                         <div class="form-actions">
                            <button class="btn-submit"><i class="fas fa-save"></i> Guardar Configuración</button>
                        </div>
                    </div>
                </div>

                <!-- SECURITY SECTION -->
                <div id="security" class="config-section">
                    <div class="settings-card">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="card-title">
                                <h3>Seguridad y Accesos</h3>
                                <p>Protección del sistema y usuarios</p>
                            </div>
                        </div>
                        
                        <div class="form-grid">
                            <div class="form-group full-width">
                                <div class="setting-row">
                                    <div class="setting-info">
                                        <span class="setting-label">Autenticación de Dos Factores (2FA)</span>
                                        <span class="setting-desc">Obligatorio para todos los roles administrativos.</span>
                                    </div>
                                    <label class="switch">
                                        <input type="checkbox" name="force_2fa">
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-stopwatch"></i> Tiempo de Sesión (minutos)</label>
                                <input type="number" class="form-input" value="120">
                            </div>
                             <div class="form-group">
                                <label class="form-label"><i class="fas fa-key"></i> Longitud Mínima de Contraseña</label>
                                <input type="number" class="form-input" value="8">
                            </div>

                            <div class="form-group full-width">
                                <label class="form-label"><i class="fas fa-user-shield"></i> Política de Bloqueo</label>
                                <div class="setting-row mt-2">
                                    <div class="setting-info">
                                        <span class="setting-label">Bloquear tras intentos fallidos</span>
                                        <span class="setting-desc">Bloquea la cuenta temporalmente después de X intentos.</span>
                                    </div>
                                    <select class="form-input" style="width: auto;">
                                        <option>3 Intentos</option>
                                        <option selected>5 Intentos</option>
                                        <option>10 Intentos</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- APPEARANCE SECTION -->
                <div id="appearance" class="config-section">
                    <div class="settings-card">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-palette"></i>
                            </div>
                            <div class="card-title">
                                <h3>Personalización Visual</h3>
                                <p>Adaptar la interfaz a la identidad institucional</p>
                            </div>
                        </div>
                        
                        <div class="form-grid">
                             <div class="form-group full-width">
                                <div class="setting-row">
                                    <div class="setting-info">
                                        <span class="setting-label">Modo Oscuro (Neon Theme)</span>
                                        <span class="setting-desc">Tema predeterminado de alto contraste con acentos rojos.</span>
                                    </div>
                                    <label class="switch">
                                        <input type="checkbox" name="dark_mode" checked disabled>
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>

                             <div class="form-group full-width">
                                <div class="setting-row">
                                    <div class="setting-info">
                                        <span class="setting-label">Animaciones de Interfaz</span>
                                        <span class="setting-desc">Efectos de entrada, transiciones suaves y feedback visual.</span>
                                    </div>
                                    <label class="switch">
                                        <input type="checkbox" name="animations" checked>
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                             <div class="form-group full-width">
                                <div class="setting-row">
                                    <div class="setting-info">
                                        <span class="setting-label">Menú Lateral Colapsado</span>
                                        <span class="setting-desc">Iniciar con la barra de navegación minimizada.</span>
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
                
                <!-- SYSTEM SECTION -->
                <div id="system" class="config-section">
                    <div class="settings-card">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-server"></i>
                            </div>
                            <div class="card-title">
                                <h3>Estado del Sistema</h3>
                                <p>Información técnica y diagnósticos</p>
                            </div>
                        </div>
                        
                        <div class="info-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                            <div class="stat-pill" style="background: rgba(255,255,255,0.05); padding: 1rem; border-radius: 12px;">
                                <i class="fab fa-laravel fa-2x"></i>
                                <div class="info">
                                    <span class="label">Laravel</span>
                                    <span class="value">{{ app()->version() }}</span>
                                </div>
                            </div>
                            <div class="stat-pill" style="background: rgba(255,255,255,0.05); padding: 1rem; border-radius: 12px;">
                                <i class="fab fa-php fa-2x"></i>
                                <div class="info">
                                    <span class="label">PHP</span>
                                    <span class="value">{{ phpversion() }}</span>
                                </div>
                            </div>
                             <div class="stat-pill" style="background: rgba(255,255,255,0.05); padding: 1rem; border-radius: 12px;">
                                <i class="fas fa-database fa-2x"></i>
                                <div class="info">
                                    <span class="label">Database</span>
                                    <span class="value">MySQL</span>
                                </div>
                            </div>
                            <div class="stat-pill" style="background: rgba(255,255,255,0.05); padding: 1rem; border-radius: 12px;">
                                <i class="fas fa-bug fa-2x"></i>
                                <div class="info">
                                    <span class="label">Debug Mode</span>
                                    <span class="value" style="color: {{ config('app.debug') ? '#ef4444' : '#10b981' }}">
                                        {{ config('app.debug') ? 'ON' : 'OFF' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-t border-gray-700">
                             <h4 style="color: white; margin-bottom: 1rem;">Acciones de Mantenimiento</h4>
                             <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                                 <button class="btn-submit" style="background: linear-gradient(135deg, #f59e0b, #d97706);"><i class="fas fa-broom"></i> Limpiar Caché</button>
                                 <button class="btn-submit" style="background: linear-gradient(135deg, #3b82f6, #2563eb);"><i class="fas fa-sync"></i> Optimizar</button>
                                 <button class="btn-submit" style="background: linear-gradient(135deg, #10b981, #059669);"><i class="fas fa-database"></i> Backup DB</button>
                             </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            // Animation for cards
            const cards = document.querySelectorAll('.settings-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100 * index);
            });
        });
    </script>
@endsection
