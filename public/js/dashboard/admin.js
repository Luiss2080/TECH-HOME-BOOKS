/**
 * TECH HOME - Dashboard Script
 * Simplified & Optimized
 */

document.addEventListener("DOMContentLoaded", () => {
    console.log("🚀 Dashboard initialized successfully");

    // Initialize Dashboard Charts if data exists
    if (window.appConfig && window.appConfig.chartData) {
        initDashboardCharts(window.appConfig.chartData);
    }
});

function initDashboardCharts(data) {
    // 1. Activity Chart (Line)
    const ctxActivity = document.getElementById("activityChart");
    if (ctxActivity) {
        new Chart(ctxActivity, {
            type: "line",
            data: {
                labels: [
                    "Ene",
                    "Feb",
                    "Mar",
                    "Abr",
                    "May",
                    "Jun",
                    "Jul",
                    "Ago",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dic",
                ],
                datasets: [
                    {
                        label: "Actividad",
                        data: data.activity || [],
                        borderColor: "#e11d48", // Primary Red
                        backgroundColor: (context) => {
                            const ctx = context.chart.ctx;
                            const gradient = ctx.createLinearGradient(
                                0,
                                0,
                                0,
                                200
                            );
                            gradient.addColorStop(0, "rgba(225, 29, 72, 0.2)");
                            gradient.addColorStop(1, "rgba(225, 29, 72, 0)");
                            return gradient;
                        },
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true,
                        pointRadius: 0,
                        pointHoverRadius: 6,
                        pointBackgroundColor: "#e11d48",
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: { mode: "index", intersect: false },
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { color: "#64748b", font: { size: 11 } },
                    },
                    y: { display: false, min: 0 },
                },
                interaction: { intersect: false, mode: "nearest" },
            },
        });
    }

    // 2. Health Chart (Doughnut as Radial Gauge)
    const ctxHealth = document.getElementById("healthChart");
    if (ctxHealth) {
        new Chart(ctxHealth, {
            type: "doughnut",
            data: {
                labels: ["Salud", "Restante"],
                datasets: [
                    {
                        data: [data.system_health, 100 - data.system_health],
                        backgroundColor: ["#10b981", "rgba(255,255,255,0.05)"], // Green & Transparent
                        borderWidth: 0,
                        borderRadius: 20,
                        cutout: "85%",
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: { enabled: false },
                },
                rotation: -90,
                circumference: 360,
            },
        });
    }

    // 3. Registrations Chart (Bar)
    const ctxReg = document.getElementById("registrationsChart");
    if (ctxReg) {
        new Chart(ctxReg, {
            type: "bar",
            data: {
                labels: ["L", "M", "X", "J", "V", "S", "D"],
                datasets: [
                    {
                        label: "Registros",
                        data: data.registrations || [],
                        backgroundColor: "#3b82f6", // Blue
                        borderRadius: 4,
                        barThickness: 10,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { color: "#64748b", font: { size: 10 } },
                    },
                    y: { display: false },
                },
            },
        });
    }

    // 4. User Roles Chart (Doughnut)
    const rolesCtx = document.getElementById("userRolesChart");
    if (rolesCtx) {
        new Chart(rolesCtx, {
            type: "doughnut",
            data: {
                labels: ["Administradores", "Docentes", "Estudiantes"],
                datasets: [
                    {
                        data: Object.values(
                            window.appConfig.roleDistribution || {
                                admin: 1,
                                docente: 5,
                                estudiante: 20,
                            }
                        ),
                        backgroundColor: ["#3b82f6", "#a855f7", "#10b981"],
                        borderWidth: 0,
                        hoverOffset: 4,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: "70%",
                plugins: {
                    legend: {
                        display: false, // Hide default legend
                    },
                },
            },
        });
    }

    // --- NEW ANALYTICS SECTION CHARTS ---

    // 5. Asistencia Mensual (Stacked Bar)
    const ctxAttendance = document.getElementById("attendanceChart");
    if (ctxAttendance) {
        new Chart(ctxAttendance, {
            type: "bar",
            data: {
                labels: ["Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"],
                datasets: [
                    {
                        label: "Presente",
                        data: [150, 170, 100, 140, 100, 120, 80],
                        backgroundColor: "#10b981", // Green
                        barThickness: 20,
                        borderRadius: 4,
                    },
                    {
                        label: "Tarde",
                        data: [50, 60, 70, 80, 80, 90, 110],
                        backgroundColor: "#3b82f6", // Blue
                        barThickness: 20,
                        borderRadius: 4,
                    },
                    {
                        label: "Ausente",
                        data: [20, 30, 20, 15, 30, 15, 10],
                        backgroundColor: "#f43f5e", // Pink/Red
                        barThickness: 20,
                        borderRadius: 4,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: "bottom",
                        labels: {
                            color: "#94a3b8",
                            usePointStyle: true,
                            boxWidth: 8,
                        },
                    },
                },
                scales: {
                    x: {
                        stacked: true,
                        grid: { display: false },
                        ticks: { color: "#94a3b8" },
                    },
                    y: {
                        stacked: true,
                        grid: { color: "rgba(255,255,255,0.05)" },
                        ticks: { display: true, color: "#94a3b8" },
                        border: { display: false },
                    },
                },
            },
        });
    }

    // 6. Actividad Global (Line - Bottom)
    const ctxActivityGlobal = document.getElementById("activityGlobalChart");
    if (ctxActivityGlobal) {
        new Chart(ctxActivityGlobal, {
            type: "line",
            data: {
                labels: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                ],
                datasets: [
                    {
                        label: "Actividad",
                        data: [
                            500, 2400, 1800, 3200, 4500, 3000, 4200, 3800, 4100,
                        ],
                        borderColor: "#3b82f6", // Blue
                        borderWidth: 2,
                        tension: 0.4,
                        pointRadius: 0,
                        fill: {
                            target: "origin",
                            above: (context) => {
                                const ctx = context.chart.ctx;
                                const gradient = ctx.createLinearGradient(
                                    0,
                                    0,
                                    0,
                                    300
                                );
                                gradient.addColorStop(
                                    0,
                                    "rgba(59, 130, 246, 0.2)"
                                );
                                gradient.addColorStop(
                                    1,
                                    "rgba(59, 130, 246, 0)"
                                );
                                return gradient;
                            },
                        },
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { color: "#94a3b8" },
                    },
                    y: {
                        grid: { color: "rgba(255,255,255,0.05)" },
                        ticks: { beginAtZero: true, color: "#94a3b8" },
                    },
                },
            },
        });
    }

    // 7. Promedios (Horizontal Bar)
    const ctxGrades = document.getElementById("gradesBarChart");
    if (ctxGrades) {
        new Chart(ctxGrades, {
            type: "bar",
            indexAxis: "y",
            data: {
                labels: [
                    "Matemáticas",
                    "Ciencias",
                    "Historia",
                    "Arte",
                    "Física",
                ],
                datasets: [
                    {
                        label: "Promedio",
                        data: [95, 88, 75, 92, 85],
                        backgroundColor: [
                            "#1e3a8a",
                            "#1e40af",
                            "#1d4ed8",
                            "#2563eb",
                            "#3b82f6",
                        ],
                        borderRadius: 4,
                        barThickness: 15,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: { display: false },
                    y: {
                        grid: { display: false },
                        ticks: {
                            color: "#ffffff",
                            font: { weight: "600", size: 11 },
                        },
                        border: { display: false },
                    },
                },
            },
        });
    }

    // 8. Recursos (Horizontal Bar Rounded)
    const ctxResources = document.getElementById("resourcesBarChart");
    if (ctxResources) {
        new Chart(ctxResources, {
            type: "bar",
            indexAxis: "y",
            data: {
                labels: [
                    "Libros",
                    "Tablets",
                    "Proyectores",
                    "Aulas",
                    "Laboratorios",
                ],
                datasets: [
                    {
                        data: [12, 8, 6, 5, 2],
                        backgroundColor: [
                            "#fda4af",
                            "#fb7185",
                            "#f43f5e",
                            "#e11d48",
                            "#be123c",
                        ],
                        borderRadius: 10,
                        barThickness: 12,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: { display: false },
                    y: {
                        grid: { display: false },
                        ticks: {
                            color: "#ffffff",
                            font: { weight: "600", size: 11 },
                        },
                        border: { display: false },
                    },
                },
            },
        });
    }
}

/**
 * Utility: Toast Notification
 * Simple toast system for feedback
 */
function showToast(message, type = "info") {
    // Check if toast container exists, else create it
    let container = document.querySelector(".toast-container");
    if (!container) {
        container = document.createElement("div");
        container.className = "toast-container";
        document.body.appendChild(container);

        // Add basic styles dynamically if not in CSS
        container.style.position = "fixed";
        container.style.bottom = "20px";
        container.style.right = "20px";
        container.style.zIndex = "9999";
        container.style.display = "flex";
        container.style.flexDirection = "column";
        container.style.gap = "10px";
    }

    const toast = document.createElement("div");
    toast.className = `toast toast-${type}`;
    toast.innerText = message;

    // Toast Styles
    toast.style.background = "white";
    toast.style.color = "#1e293b";
    toast.style.padding = "12px 24px";
    toast.style.borderRadius = "12px";
    toast.style.boxShadow = "0 10px 15px -3px rgba(0, 0, 0, 0.1)";
    toast.style.borderLeft = "4px solid #e11d48"; // Red accent
    toast.style.minWidth = "250px";
    toast.style.transform = "translateX(100%)";
    toast.style.transition = "transform 0.3s cubic-bezier(0.4, 0, 0.2, 1)";

    container.appendChild(toast);

    // Animate in
    requestAnimationFrame(() => {
        toast.style.transform = "translateX(0)";
    });

    // Remove after 3s
    setTimeout(() => {
        toast.style.transform = "translateX(120%)";
        setTimeout(() => {
            toast.remove();
        }, 300);
    }, 3000);
}
