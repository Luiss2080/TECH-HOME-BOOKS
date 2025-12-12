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
                <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar" class="profile-avatar">
                <label for="avatarInput" class="avatar-edit-btn" title="Cambiar foto">
                    <i class="fas fa-camera"></i>
                </label>
                <input type="file" id="avatarInput" hidden accept="image/*">
            </div>
            
            <h2 class="profile-name">{{ $user->name ?? 'Usuario' }}</h2>
            <span class="profile-role">{{ $user->role->name ?? 'Administrador' }}</span>
            <p style="color: var(--text-muted); margin-bottom: 0.5rem;">{{ $user->email }}</p>

            <div class="profile-stats">
                <div class="stat-item">
                    <span class="stat-value">24</span>
                    <span class="stat-label">Accesos</span>
                </div>
                <!-- Placeholder for future stats -->
                <div class="stat-item">
                    <span class="stat-value">Activo</span>
                    <span class="stat-label">Estado</span>
                </div>
            </div>
        </div>

        <!-- Derecha: Formularios de Edición -->
        <div class="profile-content">
            
            <!-- 1. Información Personal -->
            <div class="settings-card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-id-card"></i>
                    </div>
                    <div class="card-title">
                        <h3>Información Personal</h3>
                        <p>Actualiza tus datos de contacto y nombre</p>
                    </div>
                </div>

                <form action="{{ route('perfil.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Nombre Completo</label>
                            <input type="text" name="name" class="form-input" value="{{ $user->name }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Correo Electrónico</label>
                            <input type="email" name="email" class="form-input" value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Teléfono</label>
                            <input type="tel" name="phone" class="form-input" placeholder="+591 ..." value="{{ $user->telefono ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Dirección</label>
                            <input type="text" name="address" class="form-input" placeholder="Av. Principal #123" value="{{ $user->direccion ?? '' }}">
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-submit">
                            <i class="fas fa-save"></i> Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>

            <!-- 2. Seguridad -->
            <div class="settings-card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="card-title">
                        <h3>Seguridad</h3>
                        <p>Cambia tu contraseña para mantener tu cuenta segura</p>
                    </div>
                </div>

                <form action="#" method="POST">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label class="form-label">Contraseña Actual</label>
                            <div class="password-group">
                                <input type="password" name="current_password" class="form-input" required>
                                <button type="button" class="toggle-password"><i class="fas fa-eye"></i></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nueva Contraseña</label>
                            <div class="password-group">
                                <input type="password" name="new_password" class="form-input" required>
                                <button type="button" class="toggle-password"><i class="fas fa-eye"></i></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirmar Contraseña</label>
                            <div class="password-group">
                                <input type="password" name="new_password_confirmation" class="form-input" required>
                                <button type="button" class="toggle-password"><i class="fas fa-eye"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-submit">
                            <i class="fas fa-lock"></i> Actualizar Contraseña
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/perfil/index.js') }}"></script>
@endsection
