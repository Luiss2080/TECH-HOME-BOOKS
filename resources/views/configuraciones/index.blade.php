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
            <!-- Quick Actions -->
            <div class="header-actions">
               <div class="stats-toolbar">
                    <div class="toolbar-item">
                        <i class="fas fa-code-branch text-red"></i>
                        <span class="toolbar-val">v2.5.0</span>
                    </div>
                    <div class="toolbar-divider"></div>
                    <div class="toolbar-item">
                        <i class="fab fa-php text-blue"></i>
                        <span class="toolbar-val">{{ phpversion() }}</span>
                    </div>
                    <div class="toolbar-divider"></div>
                     <div class="toolbar-item">
                        <i class="fas fa-database text-yellow"></i>
                        <span class="toolbar-val">MySQL</span>
                    </div>
                    <div class="toolbar-divider"></div>
                    <div class="toolbar-item">
                        <i class="fas fa-circle text-green" style="font-size: 0.6rem;"></i>
                        <span class="toolbar-val">Online</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-content" style="padding-top: 0;">
            <!-- Navigation Tabs (Full Width now that stats are in header) -->
            <div class="stats-group config-tabs-container" style="width: 100%; overflow-x: auto; justify-content: start; gap: 1rem;">
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
        <div class="profile-container"> 
            
            <!-- LEFT COLUMN (Sidebar) -->
            <div class="left-column-stack sticky-sidebar" style="display: flex; flex-direction: column; gap: 2rem;">
                
                <!-- CARD 1: Help Center -->
                <div class="profile-card">
                    <div class="profile-avatar-wrapper" style="width: 80px; height: 80px; margin-bottom: 20px;">
                    <div style="width: 100%; height: 100%; border-radius: 50%; background: #1f2937; display: flex; align-items: center; justify-content: center; font-size: 2rem; color: #ef4444; border: 2px solid #ef4444; box-shadow: 0 0 15px rgba(239, 68, 68, 0.3);">
                        <i class="fas fa-question"></i>
                    </div>
                    </div>
                    
                    <h2 class="profile-name" style="font-size: 1.2rem; margin-bottom: 0.5rem;">Centro de Ayuda</h2>
                    <span class="profile-role" style="margin-bottom: 2rem;">Soporte Admin</span>

                    <div class="help-tips">
                        <div class="tip-card" style="background: rgba(255,255,255,0.03); padding: 1rem; border-radius: 12px; border-left: 3px solid #ef4444;">
                            <h4 style="color: white; font-size: 0.9rem; margin-bottom: 0.5rem;"><i class="fas fa-lightbulb text-warning mr-2"></i> Tips Rápidos</h4>
                            <p style="font-size: 0.8rem; color: #9ca3af; line-height: 1.4;">
                                Usa los interruptores para activar o desactivar funciones en tiempo real.
                            </p>
                        </div>
                    </div>

                    <div class="mt-4 w-100">
                        <a href="#" class="btn-primary-action w-full justify-center" style="width: 100%;">Contactar Soporte</a>
                    </div>
                </div>

                <!-- CARD 2: Server Resources (New Space Filler) -->
                <div class="profile-card">
                     <div class="card-header" style="margin-bottom: 1rem; padding-bottom: 0.5rem; border-bottom: 1px solid rgba(255,255,255,0.1); width: 100%; display: flex; justify-content: space-between; align-items: center;">
                        <h3 style="font-size: 1rem; color: white; display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-microchip text-red"></i> Recursos
                        </h3>
                         <span class="stat-pill-mini" style="font-size: 0.7rem; padding: 2px 8px; background: rgba(16, 185, 129, 0.2); color: #10b981; border-radius: 10px;">Stable</span>
                    </div>
                    
                    <div style="width: 100%; display: flex; flex-direction: column; gap: 1rem;">
                        <div class="resource-bar">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 0.3rem;">
                                <span style="font-size: 0.8rem; color: #9ca3af;">CPU Load</span>
                                <span style="font-size: 0.8rem; color: white;">12%</span>
                            </div>
                            <div style="width: 100%; height: 6px; background: #374151; border-radius: 3px; overflow: hidden;">
                                <div style="width: 12%; height: 100%; background: #ef4444; box-shadow: 0 0 10px rgba(239, 68, 68, 0.5);"></div>
                            </div>
                        </div>

                        <div class="resource-bar">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 0.3rem;">
                                <span style="font-size: 0.8rem; color: #9ca3af;">Memory</span>
                                <span style="font-size: 0.8rem; color: white;">45%</span>
                            </div>
                            <div style="width: 100%; height: 6px; background: #374151; border-radius: 3px; overflow: hidden;">
                                <div style="width: 45%; height: 100%; background: #3b82f6;"></div>
                            </div>
                        </div>
                         
                         <div class="resource-bar">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 0.3rem;">
                                <span style="font-size: 0.8rem; color: #9ca3af;">Disk Space</span>
                                <span style="font-size: 0.8rem; color: white;">28%</span>
                            </div>
                            <div style="width: 100%; height: 6px; background: #374151; border-radius: 3px; overflow: hidden;">
                                <div style="width: 28%; height: 100%; background: #10b981;"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- RIGHT COLUMN (Settings Content) -->
            <div class="profile-content">
                
                <!-- GENERAL -->
                <div id="general" class="config-section active">
                    <div class="settings-card">
                        <div class="config-header-compact">
                            <div class="header-left">
                                <i class="fas fa-globe text-red"></i>
                                <span>Información General</span>
                            </div>
                            <div class="header-right">
                                <button class="icon-btn" title="Reset"><i class="fas fa-undo"></i></button>
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
                                        <span class="setting-desc">Restringir acceso a usuarios no administradores.</span>
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
                    
                    <div class="settings-card mt-4">
                        <div class="config-header-compact">
                            <div class="header-left">
                                <i class="fas fa-university text-red"></i>
                                <span>Gestión Académica</span>
                            </div>
                        </div>
                        
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-calendar-alt"></i> Periodo Actual</label>
                                <select class="form-input">
                                    <option>2025 - Gestión I</option>
                                    <option>2025 - Gestión II</option>
                                    <option>Verano</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-users"></i> Capacidad Cursos</label>
                                <input type="number" class="form-input" value="40">
                            </div>

                             <div class="form-group full-width">
                                <div class="setting-row">
                                    <div class="setting-info">
                                        <span class="setting-label">Registro Público</span>
                                        <span class="setting-desc">Nuevos estudiantes pueden registrarse libremente.</span>
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

                <!-- SECURITY -->
                <div id="security" class="config-section">
                     <div class="settings-card">
                        <div class="config-header-compact">
                            <div class="header-left">
                                <i class="fas fa-shield-alt text-red"></i>
                                <span>Seguridad y Accesos</span>
                            </div>
                        </div>
                        
                        <div class="form-grid">
                            <div class="form-group full-width">
                                <div class="setting-row">
                                    <div class="setting-info">
                                        <span class="setting-label">Autenticación 2FA</span>
                                        <span class="setting-desc">Requerido para administradores.</span>
                                    </div>
                                    <label class="switch">
                                        <input type="checkbox" name="force_2fa">
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-stopwatch"></i> Timeout Sesión (min)</label>
                                <input type="number" class="form-input" value="120">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- APPEARANCE -->
                <div id="appearance" class="config-section">
                     <div class="settings-card">
                        <div class="config-header-compact">
                            <div class="header-left">
                                <i class="fas fa-palette text-red"></i>
                                <span>Apariencia</span>
                            </div>
                        </div>
                        
                        <div class="form-grid">
                             <div class="form-group full-width">
                                <div class="setting-row">
                                    <div class="setting-info">
                                        <span class="setting-label">Modo Oscuro</span>
                                        <span class="setting-desc">Tech Home Neon Theme.</span>
                                    </div>
                                    <label class="switch">
                                        <input type="checkbox" name="dark_mode" checked disabled>
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- SYSTEM -->
                <div id="system" class="config-section">
                     <div class="settings-card">
                        <div class="config-header-compact">
                            <div class="header-left">
                                <i class="fas fa-server text-red"></i>
                                <span>Diagnóstico del Sistema</span>
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
            const cards = document.querySelectorAll('.settings-card, .profile-card'); // Animate sidebars too
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
