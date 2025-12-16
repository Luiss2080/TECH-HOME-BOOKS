<div class="settings-card">
    <div class="config-header-compact">
        <div class="header-left">
            <i class="fas fa-database text-red"></i>
            <span>Copias de Seguridad</span>
        </div>
         <div class="header-right">
            <span class="stat-pill-mini bg-green-900 text-green-400">Último: Hoy 03:00 AM</span>
        </div>
    </div>
    
    <div class="form-grid">
        <div class="form-group full-width">
            <div class="setting-row">
                <div class="setting-info">
                    <span class="setting-label">Respaldo Automático</span>
                    <span class="setting-desc">Realizar copia de seguridad diaria a las 00:00.</span>
                </div>
                <label class="switch">
                    <input type="checkbox" name="auto_backup" checked>
                    <span class="slider"></span>
                </label>
            </div>
        </div>
        
        <div class="form-group mt-4">
            <label class="form-label"><i class="fas fa-history"></i> Retención (Días)</label>
            <select class="form-input">
                <option>7 Días</option>
                <option>15 Días</option>
                <option>30 Días</option>
            </select>
        </div>

        <div class="form-group mt-4">
            <label class="form-label"><i class="fas fa-folder"></i> Destino</label>
            <select class="form-input">
                <option>Local (Servidor)</option>
                <option>Google Drive</option>
                <option>AWS S3</option>
            </select>
        </div>
    </div>

    <div class="form-actions">
        <button class="btn-submit mr-auto" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2);"><i class="fas fa-download"></i> Descargar Todo</button>
        <button class="btn-submit"><i class="fas fa-sync"></i> Realizar Backup Ahora</button>
    </div>
</div>
