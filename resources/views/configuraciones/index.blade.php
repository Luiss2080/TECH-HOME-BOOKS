@extends('layouts.admin')

@section('title', 'Configuración del Sistema')

@section('css')
    <!-- Reuse Profile CSS for exact design match -->
    <link rel="stylesheet" href="{{ asset('css/perfil/index.css') }}">
    <!-- Custom config styles for switches and specific behaviors -->
    <link rel="stylesheet" href="{{ asset('css/configuraciones/configuraciones.css') }}">
@endsection

@section('content')
    <!-- Header Control Panel (Matches Profile Header) -->
    <div class="control-panel">
        <div class="panel-header">
            <div class="header-title">
                <div class="icon-wrapper">
                    <i class="fas fa-cogs"></i>
                </div>
                <div class="title-content">
                    <h2>Configuración del Sistema</h2>
                    <p class="subtitle">Gestiona las preferencias generales, seguridad y personalización.</p>
                </div>
            </div>
            <div class="header-actions">
                <!-- Action buttons can go here if needed -->
            </div>
        </div>

        <div class="panel-content">
            <!-- Navigation Tabs using Stats Group Styling -->
            <div class="stats-group config-tabs-container" style="overflow-x: auto; justify-content: start;">
                <div class="stat-pill tab-trigger active" data-target="general" style="cursor: pointer; padding: 0.5rem 1rem; border-radius: 12px; transition: all 0.3s;">
                    <i class="fas fa-sliders-h"></i>
                    <div class="info">
                        <span class="label">Sección</span>
                        <span class="value">General</span>
                    </div>
                </div>
                
                <div class="stat-pill tab-trigger" data-target="security" style="cursor: pointer; padding: 0.5rem 1rem; border-radius: 12px; transition: all 0.3s;">
                    <i class="fas fa-shield-alt"></i>
                    <div class="info">
                        <span class="label">Sección</span>
                        <span class="value">Seguridad</span>
                    </div>
                </div>

                <div class="stat-pill tab-trigger" data-target="appearance" style="cursor: pointer; padding: 0.5rem 1rem; border-radius: 12px; transition: all 0.3s;">
                    <i class="fas fa-paint-brush"></i>
                    <div class="info">
                        <span class="label">Sección</span>
                        <span class="value">Apariencia</span>
                    </div>
                </div>
                
                <div class="stat-pill tab-trigger" data-target="notifications" style="cursor: pointer; padding: 0.5rem 1rem; border-radius: 12px; transition: all 0.3s;">
                    <i class="fas fa-bell"></i>
                    <div class="info">
                        <span class="label">Sección</span>
                        <span class="value">Notificaciones</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="dashboard-section">
        <div class="profile-container single-column">
            
            <!-- General Section -->
            <div id="general" class="config-section active">
                <div class="settings-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <div class="card-title">
                            <h3>Información del Sitio</h3>
                            <p>Detalles básicos de la plataforma</p>
                        </div>
                    </div>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label"><i class="fas fa-signature"></i> Nombre del Sistema</label>
                            <input type="text" class="form-input" value="Tech Home Books" readonly>
                        </div>

                        <div class="form-group">
                            <label class="form-label"><i class="fas fa-link"></i> URL del Sitio</label>
                            <input type="text" class="form-input" value="{{ url('/') }}" readonly>
                        </div>
                        
                        <div class="form-group full-width" style="display: flex; align-items: center; justify-content: space-between; background: rgba(0,0,0,0.2); padding: 1rem; border-radius: 12px;">
                            <div>
                                <label class="form-label" style="margin-bottom: 0;">Modo Mantenimiento</label>
                                <p style="font-size: 0.8rem; color: var(--text-muted); margin: 0;">Desactivar acceso a usuarios</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" name="maintenance_mode">
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="settings-card" style="margin-top: 2rem;">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="card-title">
                            <h3>Configuración Académica</h3>
                            <p>Periodos y registros</p>
                        </div>
                    </div>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label"><i class="fas fa-calendar"></i> Periodo Actual</label>
                            <select class="form-input">
                                <option>2024 - I</option>
                                <option selected>2025 - I</option>
                            </select>
                        </div>
                        
                        <div class="form-group full-width" style="display: flex; align-items: center; justify-content: space-between; background: rgba(0,0,0,0.2); padding: 1rem; border-radius: 12px;">
                            <div>
                                <label class="form-label" style="margin-bottom: 0;">Registro de Estudiantes</label>
                                <p style="font-size: 0.8rem; color: var(--text-muted); margin: 0;">Permitir registro público</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" name="student_registration" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Section -->
            <div id="security" class="config-section">
                <div class="settings-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="card-title">
                            <h3>Políticas de Seguridad</h3>
                            <p>Restricciones de acceso y autenticación</p>
                        </div>
                    </div>
                    
                    <div class="form-grid">
                        <div class="form-group full-width" style="display: flex; align-items: center; justify-content: space-between; background: rgba(0,0,0,0.2); padding: 1rem; border-radius: 12px;">
                             <div>
                                <label class="form-label" style="margin-bottom: 0;">Autenticación 2FA</label>
                                <p style="font-size: 0.8rem; color: var(--text-muted); margin: 0;">Forzar para administradores</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" name="force_2fa">
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="form-label"><i class="fas fa-hourglass-half"></i> Expiración Sesión (min)</label>
                            <input type="number" class="form-input" value="120">
                        </div>

                        <div class="form-group">
                            <label class="form-label"><i class="fas fa-user-lock"></i> Intentos Fallidos</label>
                            <select class="form-input">
                                <option>3 Intentos</option>
                                <option selected>5 Intentos</option>
                                <option>10 Intentos</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Appearance Section -->
            <div id="appearance" class="config-section">
                <div class="settings-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-palette"></i>
                        </div>
                        <div class="card-title">
                            <h3>Personalización Visual</h3>
                            <p>Apariencia del panel de control</p>
                        </div>
                    </div>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label"><i class="fas fa-adjust"></i> Tema Predeterminado</label>
                            <select class="form-input">
                                <option>Claro</option>
                                <option selected>Oscuro (Neon)</option>
                                <option>Sistema</option>
                            </select>
                        </div>
                        
                        <div class="form-group full-width" style="display: flex; align-items: center; justify-content: space-between; background: rgba(0,0,0,0.2); padding: 1rem; border-radius: 12px;">
                             <div>
                                <label class="form-label" style="margin-bottom: 0;">Efectos Visuales</label>
                                <p style="font-size: 0.8rem; color: var(--text-muted); margin: 0;">Animaciones y transiciones</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" name="visual_effects" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Notifications Section -->
            <div id="notifications" class="config-section">
                <div class="settings-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <div class="card-title">
                            <h3>Gestión de Alertas</h3>
                            <p>Configuración globla de notificaciones</p>
                        </div>
                    </div>
                    
                    <div style="text-align: center; padding: 2rem; color: var(--text-muted);">
                        <i class="fas fa-info-circle fa-2x mb-3"></i>
                        <p>Las notificaciones personales se gestionan en el perfil de usuario.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/configuraciones/configuraciones.js') }}"></script>
@endsection
