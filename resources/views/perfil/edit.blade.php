@extends('layouts.admin')

@section('title', 'Editar Perfil')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/perfil/index.css') }}">
@endsection

@section('content')
<div class="dashboard-section">
    <div class="section-header-centered">
        <div class="section-icon">
            <i class="fas fa-user-edit fa-2x"></i>
        </div>
        <h2 class="section-title-large">Editar Información</h2>
        <p class="section-subtitle">Actualiza tus datos personales de contacto</p>
    </div>

    <div class="profile-container single-column">
        <div class="settings-card">
            <div class="card-header">
                <div class="card-icon">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="card-title">
                    <h3>Información Personal</h3>
                    <p>Modifica los campos necesarios</p>
                </div>
            </div>

            <form action="{{ route('perfil.update') }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-grid">
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
                        <textarea name="biografia" class="form-input" rows="4" placeholder="Cuéntanos un poco sobre ti...">{{ $user->biografia ?? '' }}</textarea>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('perfil.index') }}" class="btn-cancel" style="margin-right: 1rem; padding: 1rem 2rem; color: var(--text-dark); text-decoration: none;">Cancelar</a>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save"></i> Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection