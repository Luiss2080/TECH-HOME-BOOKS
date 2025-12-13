@extends('layouts.admin')

@section('title', 'Editar Perfil')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/perfil/edit.css') }}">
@endsection

@section('content')
    <!-- Header Tipo Panel de Control -->
    <div class="control-panel">
        <div class="panel-header">
            <div class="header-title">
                <div class="icon-wrapper">
                    <i class="fas fa-user-edit"></i>
                </div>
                <div class="title-content">
                    <h2>Editar Perfil</h2>
                    <p class="subtitle">Actualiza tu información personal y configuración</p>
                </div>
            </div>
            <div class="header-actions">
                <a href="{{ route('perfil.index') }}" class="btn-primary-action" style="background: var(--bg-surface); color: var(--text-dark); border: 1px solid var(--border-color);">
                    <i class="fas fa-arrow-left"></i>
                    <span>Volver al Perfil</span>
                </a>
            </div>
        </div>

        <div class="panel-content">
            <!-- Barra de Estado - IDÉNTICA al Index pero informativa -->
            <div class="stats-group">
                <div class="stat-pill">
                    <i class="fas fa-id-card"></i>
                    <div class="info">
                        <span class="label">Rol</span>
                        <span class="value">{{ $user->rol ?? 'Usuario' }}</span>
                    </div>
                </div>
                
                <div class="stat-pill">
                    <i class="fas fa-toggle-on"></i>
                    <div class="info">
                        <span class="label">Estado</span>
                        <span class="value" style="color: #10b981;">Activo</span>
                    </div>
                </div>

                <div class="stat-pill">
                    <i class="fas fa-calendar-alt"></i>
                    <div class="info">
                        <span class="label">Miembro Desde</span>
                        <span class="value">{{ $user->created_at ? $user->created_at->format('d/m/Y') : '-' }}</span>
                    </div>
                </div>

                <div class="stat-pill">
                    <i class="fas fa-clock"></i>
                    <div class="info">
                        <span class="label">Último Acceso</span>
                        <span class="value">{{ $user->ultimo_acceso ? \Carbon\Carbon::parse($user->ultimo_acceso)->diffForHumans() : 'Ahora' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenedor Principal (Clone del Index pero con Inputs) -->
    <div class="dashboard-section">
        <div class="profile-container">
        <!-- Izquierda: Wrapper para Múltiples Cards -->
        <div class="profile-sidebar" style="display: flex; flex-direction: column; gap: 1.5rem;">
            
            <!-- Card Principal de Perfil -->
            <div class="profile-card">
                <div class="profile-avatar-wrapper">
                    <img src="{{ $user->avatar && file_exists(public_path('images/avatars/'.$user->avatar)) ? asset('images/avatars/'.$user->avatar) : asset('images/default-avatar.png') }}" alt="Avatar" class="profile-avatar" id="avatarPreview">
                    
                    <button type="button" class="avatar-edit-btn" onclick="document.getElementById('avatarInput').click()" title="Cambiar Foto">
                        <i class="fas fa-camera"></i>
                    </button>
                    <form id="avatarForm" action="{{ route('perfil.avatar') }}" method="POST" enctype="multipart/form-data" style="display: none;">
                        @csrf
                        <input type="file" id="avatarInput" name="avatar" accept="image/*" onchange="document.getElementById('avatarForm').submit()">
                    </form>
                </div>

                <h2 class="profile-name">{{ $user->name }}</h2>
                <span class="profile-role">
                    <i class="fas fa-user-shield"></i> {{ $user->rol ?? 'Administrador' }}
                </span>
                
                <p style="color: var(--text-muted); margin-bottom: 0.5rem; font-size: 0.9rem;">{{ $user->email }}</p>

                <div class="profile-stats">
                    <div class="stat-item">
                        <span class="stat-value">{{ intval(\Carbon\Carbon::parse($user->created_at)->diffInDays()) }}</span>
                        <span class="stat-label">Días</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-value" style="color: #10b981;">Active</span>
                        <span class="stat-label">Estado</span>
                    </div>
                </div>
                
                <div style="margin-top: 2rem; width: 100%; text-align: left;">
                    <h4 style="color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase; margin-bottom: 1rem; font-weight: 700;">Seguridad</h4>
                    <div style="display: flex; flex-direction: column; gap: 0.8rem;">
                        <a href="{{ route('perfil.security') }}" class="btn-secondary-action" style="background: var(--bg-body); color: var(--text-dark); border: 1px solid var(--border-color); justify-content: flex-start; padding-left: 1.5rem; display: flex; align-items: center; gap: 0.8rem; padding: 1rem; border-radius: 12px; text-decoration: none; transition: all 0.2s;">
                            <i class="fas fa-lock" style="color: var(--primary-red);"></i> Cambiar Contraseña
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card Complementario Moderno: Nivel de Perfil -->
            <div class="profile-card" style="border-top: none; padding: 2rem; align-items: flex-start; text-align: left;">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                    <div style="width: 40px; height: 40px; background: rgba(220, 38, 38, 0.1); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: var(--primary-red);">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div>
                        <h3 style="font-size: 1.1rem; margin: 0; color: var(--text-dark);">Nivel de Perfil</h3>
                        <span style="font-size: 0.85rem; color: var(--text-muted);">Estadísticas de cuenta</span>
                    </div>
                </div>

                <div style="width: 100%; margin-bottom: 1.5rem;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem; font-size: 0.9rem;">
                        <span style="color: var(--text-dark); font-weight: 600;">Completado</span>
                        <span style="color: var(--primary-red);">85%</span>
                    </div>
                    <div style="width: 100%; height: 6px; background: var(--bg-body); border-radius: 3px; overflow: hidden;">
                        <div style="width: 85%; height: 100%; background: var(--primary-red); border-radius: 3px;"></div>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; width: 100%;">
                    <div style="background: var(--bg-body); padding: 1rem; border-radius: 12px; text-align: center;">
                        <i class="fas fa-check-circle" style="color: #10b981; font-size: 1.2rem; margin-bottom: 0.5rem;"></i>
                        <span style="display: block; font-size: 0.8rem; color: var(--text-muted);">Email</span>
                        <span style="font-weight: 600; color: var(--text-dark);">Verificado</span>
                    </div>
                    <div style="background: var(--bg-body); padding: 1rem; border-radius: 12px; text-align: center;">
                        <i class="fas fa-shield-alt" style="color: #f59e0b; font-size: 1.2rem; margin-bottom: 0.5rem;"></i>
                        <span style="display: block; font-size: 0.8rem; color: var(--text-muted);">Seguridad</span>
                        <span style="font-weight: 600; color: var(--text-dark);">Alta</span>
                    </div>
                </div>
            </div>

        </div>

            <!-- Derecha: Formulario de Edición -->
            <div class="profile-content">
                <div class="settings-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-user-edit"></i>
                        </div>
                        <div class="card-title">
                            <h3>Información Personal</h3>
                            <p>Actualiza tu información personal y redes sociales</p>
                        </div>
                    </div>

                    <form action="{{ route('perfil.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <h4 style="color: var(--primary-red); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-address-card"></i> Datos Básicos
                        </h4>
                        
                        <div class="form-grid" style="margin-bottom: 2.5rem;">
                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-user"></i> Nombre</label>
                                <input type="text" name="name" class="form-input" value="{{ $user->name }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-user-tag"></i> Apellido</label>
                                <input type="text" name="apellido" class="form-input" value="{{ $user->apellido ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-id-card"></i> Cédula de Identidad</label>
                                <input type="text" name="ci" class="form-input" value="{{ $user->ci ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-birthday-cake"></i> Fecha de Nacimiento</label>
                                <input type="date" name="fecha_nacimiento" class="form-input" value="{{ $user->fecha_nacimiento ? \Carbon\Carbon::parse($user->fecha_nacimiento)->format('Y-m-d') : '' }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-venus-mars"></i> Género</label>
                                <select name="genero" class="form-input">
                                    <option value="">Seleccionar...</option>
                                    <option value="masculino" {{ ($user->genero ?? '') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                    <option value="femenino" {{ ($user->genero ?? '') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                    <option value="otro" {{ ($user->genero ?? '') == 'otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-briefcase"></i> Profesión</label>
                                <input type="text" name="profesion" class="form-input" value="{{ $user->profesion ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-graduation-cap"></i> Nivel de Estudios</label>
                                <input type="text" name="nivel_estudios" class="form-input" value="{{ $user->nivel_estudios ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-envelope"></i> Correo Electrónico</label>
                                <input type="email" name="email" class="form-input" value="{{ $user->email }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-phone"></i> Teléfono</label>
                                <input type="tel" name="phone" class="form-input" placeholder="+591 ..." value="{{ $user->telefono ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-map-marker-alt"></i> Dirección</label>
                                <input type="text" name="address" class="form-input" placeholder="Av. Principal #123" value="{{ $user->direccion ?? '' }}">
                            </div>
                        </div>

                        <div style="border-top: 1px solid var(--border-color); margin: 2rem 0;"></div>

                        <h4 style="color: var(--primary-red); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-share-alt"></i> Redes Sociales
                        </h4>

                        <div class="form-grid" style="margin-bottom: 2rem;">
                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-globe"></i> Website</label>
                                <input type="text" name="website" class="form-input" placeholder="https://" value="{{ $user->website ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fab fa-facebook"></i> Facebook</label>
                                <input type="text" name="facebook" class="form-input" placeholder="Usuario" value="{{ $user->facebook ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fab fa-twitter"></i> Twitter / X</label>
                                <input type="text" name="twitter" class="form-input" placeholder="@usuario" value="{{ $user->twitter ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fab fa-linkedin"></i> LinkedIn</label>
                                <input type="text" name="linkedin" class="form-input" placeholder="Usuario" value="{{ $user->linkedin ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fab fa-instagram"></i> Instagram</label>
                                <input type="text" name="instagram" class="form-input" placeholder="Usuario" value="{{ $user->instagram ?? '' }}">
                            </div>
                            <div class="form-group full-width">
                                <label class="form-label"><i class="fas fa-align-left"></i> Biografía / Sobre mí</label>
                                <textarea name="biografia" class="form-input" rows="3" placeholder="Cuéntanos un poco sobre ti...">{{ $user->biografia ?? '' }}</textarea>
                            </div>
                        </div>

                        <!-- FIX: Use action-btn-red for the submit button -->
                        <div class="form-actions" style="gap: 1.5rem;">
                            <a href="{{ route('perfil.index') }}" class="btn-cancel" style="padding: 1rem 2rem; color: var(--text-dark); text-decoration: none; font-weight: 700; border: 1px solid var(--border-color); border-radius: 12px; transition: all 0.3s;">
                                Cancelar
                            </a>
                            <button type="submit" class="action-btn-red" style="border: none; cursor: pointer; font-size: 1rem; width: auto; padding: 1rem 2.5rem;">
                                <i class="fas fa-save"></i> Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection