<div id="successModal" class="modal-overlay">
    <div class="modal-content success">
        <button type="button" class="modal-close" onclick="closeSuccessModal()">
            <i class="fas fa-times"></i>
        </button>
        
        <div class="modal-header">
            <div class="modal-icon-wrapper">
                <div class="modal-icon success pulse-animation-success">
                    <i class="fas fa-check"></i>
                </div>
            </div>
            <h3>¡Operación Exitosa!</h3>
        </div>

        <div class="modal-body">
            <!-- Tech Message Box -->
            <div class="target-card success-card">
                <div class="target-icon success-icon-bg">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="target-details">
                    <span class="target-label">Estado del Sistema:</span>
                    <h4 id="successMessage">Acción completada</h4>
                </div>
            </div>
        </div>

        <div class="modal-footer" style="justify-content: center;">
            <button type="button" class="btn-delete-confirm success-btn" onclick="closeSuccessModal()">
                <span>Entendido</span>
            </button>
        </div>
    </div>
</div>
