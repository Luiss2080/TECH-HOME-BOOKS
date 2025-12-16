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
               <!-- Search Bar -->
               <div class="config-search">
                   <i class="fas fa-search"></i>
                   <input type="text" placeholder="Buscar configuración...">
               </div>

               <!-- Stats Toolbar -->
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

                <!-- Notification Bell -->
                <button class="icon-btn-large relative" title="Notificaciones">
                    <i class="fas fa-bell text-yellow"></i>
                    <span class="badge-dot"></span>
                </button>
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
                
                <button class="stat-pill tab-trigger" data-target="notifications">
                    <i class="fas fa-bell"></i>
                    <div class="info">
                        <span class="label">CONFIGURACIÓN</span>
                        <span class="value">Notificaciones</span>
                    </div>
                </button>

                <button class="stat-pill tab-trigger" data-target="backups">
                    <i class="fas fa-database"></i>
                    <div class="info">
                        <span class="label">CONFIGURACIÓN</span>
                        <span class="value">Respaldos</span>
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
                    @include('configuraciones.general')
                </div>

                <!-- SECURITY -->
                <div id="security" class="config-section">
                    @include('configuraciones.seguridad')
                </div>

                <!-- APPEARANCE -->
                <div id="appearance" class="config-section">
                    @include('configuraciones.apariencia')
                </div>
                
                <!-- SYSTEM -->
                <div id="system" class="config-section">
                    @include('configuraciones.sistema')
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
