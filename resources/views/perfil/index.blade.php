@extends('layouts.admin')

@section('title', 'Mi Perfil')

@section('content')
<div class="dashboard-section">
    <div class="section-header-centered">
        <div class="section-icon">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
        </div>
        <h2 class="section-title-large">Mi Perfil</h2>
        <p class="section-subtitle">Gestiona tu información personal y preferencias</p>
    </div>

    <div class="card" style="padding: 2rem; text-align: center; color: var(--text-muted);">
        <p>Próximamente: Vista completa de perfil de usuario.</p>
    </div>
</div>
@endsection
