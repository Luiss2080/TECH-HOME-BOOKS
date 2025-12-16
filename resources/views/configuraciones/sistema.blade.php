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
