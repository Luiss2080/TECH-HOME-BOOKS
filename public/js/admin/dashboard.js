// JavaScript para el dashboard del administrador
document.addEventListener('DOMContentLoaded', function() {
    initDashboardStats();
    initCharts();
    initRecentActivity();
    startRealTimeUpdates();
});

function initDashboardStats() {
    // Animar contadores estadísticos
    const statNumbers = document.querySelectorAll('.stat-number');
    
    statNumbers.forEach(stat => {
        const finalValue = parseInt(stat.textContent.replace(/[^\d]/g, ''));
        const duration = 2000; // 2 segundos
        const steps = 60;
        const increment = finalValue / steps;
        let currentValue = 0;
        
        const timer = setInterval(() => {
            currentValue += increment;
            if (currentValue >= finalValue) {
                stat.textContent = AdminUtils.formatNumber(finalValue);
                clearInterval(timer);
            } else {
                stat.textContent = AdminUtils.formatNumber(Math.floor(currentValue));
            }
        }, duration / steps);
    });
}

function initCharts() {
    // Gráfico de estudiantes por mes
    const studentsChartCanvas = document.getElementById('studentsChart');
    if (studentsChartCanvas) {
        const ctx = studentsChartCanvas.getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                datasets: [{
                    label: 'Estudiantes Registrados',
                    data: [12, 19, 15, 25, 22, 30, 35, 42, 38, 45, 48, 52],
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    }
    
    // Gráfico de distribución por colegios
    const collegesChartCanvas = document.getElementById('collegesChart');
    if (collegesChartCanvas) {
        const ctx = collegesChartCanvas.getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Colegio A', 'Colegio B', 'Colegio C', 'Colegio D', 'Otros'],
                datasets: [{
                    data: [30, 25, 20, 15, 10],
                    backgroundColor: [
                        '#3b82f6',
                        '#10b981',
                        '#f59e0b',
                        '#ef4444',
                        '#6b7280'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true
                        }
                    }
                }
            }
        });
    }
}

function initRecentActivity() {
    const activityContainer = document.querySelector('.recent-activity-list');
    if (!activityContainer) return;
    
    // Simular carga de actividades recientes
    loadRecentActivities();
}

function loadRecentActivities() {
    // Simulación de datos de actividades
    const activities = [
        {
            type: 'user-add',
            message: 'Nuevo estudiante registrado: Juan Pérez',
            time: '2 minutos ago',
            icon: 'user-plus',
            color: '#10b981'
        },
        {
            type: 'book-add',
            message: 'Libro agregado: Matemáticas Básicas',
            time: '5 minutos ago',
            icon: 'book',
            color: '#3b82f6'
        },
        {
            type: 'task-complete',
            message: 'Tarea calificada por Prof. García',
            time: '10 minutos ago',
            icon: 'check-circle',
            color: '#f59e0b'
        }
    ];
    
    const activityList = document.querySelector('.recent-activity-list');
    if (activityList) {
        activityList.innerHTML = activities.map(activity => `
            <div class="activity-item">
                <div class="activity-icon" style="background: ${activity.color}20; color: ${activity.color}">
                    <i class="fas fa-${activity.icon}"></i>
                </div>
                <div class="activity-content">
                    <p class="activity-text">${activity.message}</p>
                    <p class="activity-time">${activity.time}</p>
                </div>
            </div>
        `).join('');
    }
}

function startRealTimeUpdates() {
    // Actualizar estadísticas cada 30 segundos
    setInterval(() => {
        updateDashboardStats();
    }, 30000);
    
    // Actualizar actividades cada 60 segundos
    setInterval(() => {
        loadRecentActivities();
    }, 60000);
}

function updateDashboardStats() {
    // Simular actualización de estadísticas
    fetch('/api/admin/dashboard/stats')
        .then(response => response.json())
        .then(data => {
            updateStatCard('total-students', data.totalStudents);
            updateStatCard('total-teachers', data.totalTeachers);
            updateStatCard('total-courses', data.totalCourses);
            updateStatCard('total-books', data.totalBooks);
        })
        .catch(error => {
            console.error('Error updating stats:', error);
        });
}

function updateStatCard(cardId, newValue) {
    const statCard = document.getElementById(cardId);
    if (statCard) {
        const statNumber = statCard.querySelector('.stat-number');
        if (statNumber && statNumber.textContent !== AdminUtils.formatNumber(newValue)) {
            statNumber.style.transform = 'scale(1.1)';
            statNumber.textContent = AdminUtils.formatNumber(newValue);
            
            setTimeout(() => {
                statNumber.style.transform = 'scale(1)';
            }, 200);
        }
    }
}

// Exportar funciones para uso global
window.DashboardAdmin = {
    refreshStats: updateDashboardStats,
    refreshActivity: loadRecentActivities
};