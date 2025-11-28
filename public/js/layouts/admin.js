// JavaScript principal para el layout de administrador
document.addEventListener('DOMContentLoaded', function() {
    // Inicialización del sidebar
    initSidebar();
    
    // Inicialización de tooltips
    initTooltips();
    
    // Inicialización de alertas automáticas
    initAutoAlerts();
    
    // Inicialización del tema
    initTheme();
});

function initSidebar() {
    const sidebar = document.querySelector('.sidebar');
    const toggleBtn = document.querySelector('.sidebar-toggle');
    const mainContent = document.querySelector('.main-content');
    
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function() {
            sidebar.classList.toggle('active');
            mainContent.classList.toggle('sidebar-open');
        });
    }
    
    // Cerrar sidebar en móvil al hacer click fuera
    document.addEventListener('click', function(e) {
        if (window.innerWidth <= 768) {
            if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
                sidebar.classList.remove('active');
                mainContent.classList.remove('sidebar-open');
            }
        }
    });
    
    // Manejar resize de ventana
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            sidebar.classList.remove('active');
            mainContent.classList.remove('sidebar-open');
        }
    });
}

function initTooltips() {
    // Inicializar tooltips de Bootstrap o biblioteca similar
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
}

function initAutoAlerts() {
    // Auto-ocultar alertas después de 5 segundos
    const alerts = document.querySelectorAll('.alert.auto-dismiss');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.remove();
            }, 500);
        }, 5000);
    });
}

function initTheme() {
    // Inicializar tema claro/oscuro
    const themeToggle = document.querySelector('.theme-toggle');
    const currentTheme = localStorage.getItem('theme') || 'light';
    
    document.documentElement.setAttribute('data-theme', currentTheme);
    
    if (themeToggle) {
        themeToggle.addEventListener('click', function() {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            
            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
        });
    }
}

// Funciones utilitarias globales
window.AdminUtils = {
    // Mostrar loading en botón
    showButtonLoading: function(button, text = 'Cargando...') {
        const originalText = button.textContent;
        button.disabled = true;
        button.innerHTML = `<span class="loading-spinner"></span> ${text}`;
        button.dataset.originalText = originalText;
    },
    
    // Ocultar loading en botón
    hideButtonLoading: function(button) {
        button.disabled = false;
        button.innerHTML = button.dataset.originalText || button.textContent;
    },
    
    // Mostrar toast notification
    showToast: function(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `toast toast-${type}`;
        toast.textContent = message;
        
        document.body.appendChild(toast);
        
        // Mostrar toast
        setTimeout(() => {
            toast.classList.add('show');
        }, 100);
        
        // Ocultar toast
        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => {
                document.body.removeChild(toast);
            }, 300);
        }, 3000);
    },
    
    // Confirmar acción
    confirmAction: function(message, callback) {
        if (confirm(message)) {
            callback();
        }
    },
    
    // Formatear fecha
    formatDate: function(date) {
        return new Date(date).toLocaleDateString('es-ES', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
    },
    
    // Formatear número
    formatNumber: function(num) {
        return new Intl.NumberFormat('es-ES').format(num);
    }
};