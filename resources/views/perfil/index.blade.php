@extends('layouts.admin')

@section('title', 'Mi Perfil')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/perfil/index.css') }}">
@endsection

@section('content')
<div class="dashboard-section">
    <!-- Header Centrado -->
    <div class="section-header-centered">
        <div class="section-icon">
            <i class="fas fa-user-circle fa-2x"></i>
        </div>
        <h2 class="section-title-large">Mi Perfil</h2>
        <p class="section-subtitle">Gestiona tu información personal y seguridad de cuenta</p>
    </div>

    <!-- Contenedor Principal Perfil -->
    <div class="profile-container">
        
        <!-- Izquierda: Tarjeta de Perfil -->
        <div class="profile-card">
            <div class="profile-avatar-wrapper">
                <img src="{{ $user->avatar && file_exists(public_path('images/avatars/'.$user->avatar)) ? asset('images/avatars/'.$user->avatar) : asset('images/default-avatar.png') }}" alt="Avatar" class="profile-avatar">
                <label for="avatarInput" class="avatar-edit-btn" title="Cambiar foto">
                    <i class="fas fa-camera"></i>
                </label>
                <input type="file" id="avatarInput" hidden accept="image/*">
            </div>
            
            <h2 class="profile-name">{{ $user->name }} {{ $user->apellido }}</h2>
            <span class="profile-role">{{ $user->rol ?? 'Usuario' }}</span>
            <p style="color: var(--text-muted); margin-bottom: 0.5rem;">{{ $user->email }}</p>

            <div class="profile-stats">
                <div class="stat-item">
                    <span class="stat-value">24</span>
                    <span class="stat-label">Accesos</span>
                </div>
                <div class="stat-item">
                    <span class="stat-value text-success">Activo</span>
                    <span class="stat-label">Estado</span>
                </div>
            </div>
        </div>

        <!-- Derecha: Dashboard de Acciones y Resumen -->
        <div class="profile-content">
            
            <!-- Resumen de Datos -->
            <div class="settings-card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <div class="card-title">
                        <h3>Información Personal</h3>
                        <p>Resumen de tus datos registrados</p>
                    </div>
                </div>

                <div class="info-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem;">
                    <div class="info-item">
                        <label style="display:block; color:var(--text-muted); font-size:0.8rem; margin-bottom:0.2rem;">CI / Documento</label>
                        <span style="font-weight:600; font-size:1.1rem; color:var(--text-dark);">{{ $user->ci ?? 'No registrado' }}</span>
                    </div>
                    <div class="info-item">
                        <label style="display:block; color:var(--text-muted); font-size:0.8rem; margin-bottom:0.2rem;">Teléfono</label>
                        <span style="font-weight:600; font-size:1.1rem; color:var(--text-dark);">{{ $user->telefono ?? 'No registrado' }}</span>
                    </div>
                    <div class="info-item">
                        <label style="display:block; color:var(--text-muted); font-size:0.8rem; margin-bottom:0.2rem;">Dirección</label>
                        <span style="font-weight:600; font-size:1.1rem; color:var(--text-dark);">{{ $user->direccion ?? 'No registrado' }}</span>
                    </div>
                    <div class="info-item">
                        <label style="display:block; color:var(--text-muted); font-size:0.8rem; margin-bottom:0.2rem;">Fecha Nacimiento</label>
                        <span style="font-weight:600; font-size:1.1rem; color:var(--text-dark);">{{ $user->fecha_nacimiento ?? 'No registrado' }}</span>
                    </div>
                    <div class="info-item full-width" style="grid-column: span 2;">
                        <label style="display:block; color:var(--text-muted); font-size:0.8rem; margin-bottom:0.2rem;">Biografía</label>
                        <p style="color:var(--text-dark); line-height:1.6;">{{ $user->biografia ?? 'Sin biografía.' }}</p>
                    </div>
                </div>
            </div>

            <!-- Botones de Acción -->
            <div class="actions-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem;">
                <a href="{{ route('perfil.edit') }}" class="action-card" style="text-decoration:none; background:var(--bg-surface); padding:2rem; border-radius:16px; border:1px solid var(--border-color); display:flex; flex-direction:column; align-items:center; text-align:center; transition:var(--transition); box-shadow:var(--shadow-sm);">
                    <div class="action-icon" style="width:60px; height:60px; background:rgba(225,29,72,0.1); color:var(--primary-red); border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:1.5rem; margin-bottom:1rem;">
                        <i class="fas fa-user-edit"></i>
                    </div>
                    <h3 style="color:var(--text-dark); margin-bottom:0.5rem;">Editar Perfil</h3>
                    <p style="color:var(--text-muted); font-size:0.9rem;">Actualiza tus datos personales y contacto</p>
                </a>

                <a href="{{ route('perfil.security') }}" class="action-card" style="text-decoration:none; background:var(--bg-surface); padding:2rem; border-radius:16px; border:1px solid var(--border-color); display:flex; flex-direction:column; align-items:center; text-align:center; transition:var(--transition); box-shadow:var(--shadow-sm);">
                    <div class="action-icon" style="width:60px; height:60px; background:rgba(225,29,72,0.1); color:var(--primary-red); border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:1.5rem; margin-bottom:1rem;">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 style="color:var(--text-dark); margin-bottom:0.5rem;">Seguridad</h3>
                    <p style="color:var(--text-muted); font-size:0.9rem;">Cambia tu contraseña y accesos</p>
                </a>
            </div>

        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/perfil/index.js') }}"></script>
@endsection
