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
