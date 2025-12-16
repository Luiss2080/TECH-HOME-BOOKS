<div class="settings-card">
    <div class="config-header-compact">
        <div class="header-left">
            <i class="fas fa-bell text-red"></i>
            <span>Notificaciones del Sistema</span>
        </div>
    </div>
    
    <div class="form-grid">
        <div class="form-group full-width">
            <div class="setting-row">
                <div class="setting-info">
                    <span class="setting-label">Alertas por Correo</span>
                    <span class="setting-desc">Recibir correos sobre actividades críticas.</span>
                </div>
                <label class="switch">
                    <input type="checkbox" name="email_alerts" checked>
                    <span class="slider"></span>
                </label>
            </div>
        </div>

        <div class="form-group full-width mt-4">
             <div class="setting-row">
                <div class="setting-info">
                    <span class="setting-label">Notificaciones Push</span>
                    <span class="setting-desc">Habilitar notificaciones en el navegador.</span>
                </div>
                <label class="switch">
                    <input type="checkbox" name="push_notif">
                    <span class="slider"></span>
                </label>
            </div>
        </div>

         <div class="form-group mt-4">
            <label class="form-label"><i class="fas fa-envelope-open-text"></i> Email de Alertas</label>
            <input type="email" class="form-input" value="admin@tech-home.edu.bo">
        </div>
    </div>
    
    <div class="form-actions">
        <button class="btn-submit"><i class="fas fa-save"></i> Guardar Preferencias</button>
    </div>
</div>
