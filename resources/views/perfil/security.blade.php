@extends('layouts.admin')

@section('title', 'Seguridad de Cuenta')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/perfil/index.css') }}">
@endsection

@section('content')
<div class="dashboard-section">
    <div class="section-header-centered">
        <div class="section-icon">
            <i class="fas fa-shield-alt fa-2x"></i>
        </div>
        <h2 class="section-title-large">Seguridad</h2>
        <p class="section-subtitle">Gestiona tu contraseña y accesos</p>
    </div>

    <div class="profile-container single-column">
        <div class="settings-card">
            <div class="card-header">
                <div class="card-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="card-title">
                    <h3>Cambiar Contraseña</h3>
                    <p>Asegura tu cuenta con una contraseña fuerte</p>
                </div>
            </div>

            <form action="{{ route('perfil.update-password') }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label class="form-label"><i class="fas fa-key"></i> Contraseña Actual</label>
                        <div class="password-group">
                            <input type="password" name="current_password" class="form-input" required>
                            <button type="button" class="toggle-password"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label"><i class="fas fa-lock"></i> Nueva Contraseña</label>
                        <div class="password-group">
                            <input type="password" name="new_password" class="form-input" required>
                            <button type="button" class="toggle-password"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label"><i class="fas fa-check-circle"></i> Confirmar Contraseña</label>
                        <div class="password-group">
                            <input type="password" name="new_password_confirmation" class="form-input" required>
                            <button type="button" class="toggle-password"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('perfil.index') }}" class="btn-cancel" style="margin-right: 1rem; padding: 1rem 2rem; color: var(--text-dark); text-decoration: none;">Cancelar</a>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-shield-alt"></i> Actualizar Contraseña
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/perfil/index.js') }}"></script>
@endsection
