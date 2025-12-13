document.addEventListener("DOMContentLoaded", function () {
    const overlay = document.getElementById("loadingOverlay");
    const progressBar = document.getElementById("loadingProgressBar");
    const percentageText = document.getElementById("loadingPercentage");
    const statusText = document.getElementById("loadingStatus");

    if (!overlay) return;

    let progress = 0;
    const duration = 2000; // Minimum load time simulation (ms)
    const interval = 50;
    const steps = duration / interval;
    const increment = 100 / steps;

    const messages = [
        "Iniciando sistema...",
        "Cargando configuraciones...",
        "Verificando credenciales...",
        "Estableciendo conexión segura...",
        "Preparando interfaz...",
    ];

    let messageIndex = 0;

    // Status message cycler
    const messageInterval = setInterval(() => {
        messageIndex = (messageIndex + 1) % messages.length;
        statusText.style.opacity = "0";
        setTimeout(() => {
            statusText.textContent = messages[messageIndex];
            statusText.style.opacity = "1";
        }, 200);
    }, 800);

    // Progress simulation
    const loadingInterval = setInterval(() => {
        // Randomize increment slightly for realism
        const randomIncrement = increment * (0.5 + Math.random());
        progress += randomIncrement;

        if (progress >= 100) {
            progress = 100;
            clearInterval(loadingInterval);
            clearInterval(messageInterval);
            finishLoading();
        }

        updateUI(progress);
    }, interval);

    // Ensure we handle window load event too
    window.addEventListener("load", () => {
        // If window loads faster than simulation (rare with this logic but possible),
        // we could speed up to 100, but let's let the simulation finish for effect
        // unless it's genuinely stuck.
        // For now, relies on the interval finishing.
    });

    function updateUI(value) {
        const rounded = Math.floor(value);
        progressBar.style.width = `${value}%`;
        percentageText.textContent = `${rounded}%`;
    }

    function finishLoading() {
        statusText.textContent = "¡Listo!";
        progressBar.style.width = "100%";
        percentageText.textContent = "100%";

        setTimeout(() => {
            overlay.classList.add("hidden");
            // Optional: Remove from DOM after transition
            setTimeout(() => {
                overlay.style.display = "none";
            }, 500);
        }, 500);
    }
});
