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
