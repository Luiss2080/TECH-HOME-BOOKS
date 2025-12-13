document.addEventListener("DOMContentLoaded", function () {
    const overlay = document.getElementById("loadingOverlay");
    const progressBar = document.getElementById("loadingProgressBar");
    const percentageText = document.getElementById("loadingPercentage");
    const statusText = document.getElementById("loadingStatus");

    if (!overlay) return;

    let progress = 0;
    let loadingInterval = null;
    let messageInterval = null;

    // Simulation Config
    const duration = 3000; // Increased to 3s as requested
    const interval = 30;
    const steps = duration / interval;
    const increment = 100 / steps;

    const messages = [
        "Procesando solicitud...",
        "Redirigiendo...",
        "Cargando vista...",
        "Espere por favor...",
    ];

    // Initialize: Show loader on first load (already visible via HTML)
    startSimulation();

    // --- Global Navigation Handlers ---

    // 1. Handle Link Clicks
    document.addEventListener("click", function (e) {
        const link = e.target.closest("a");

        if (link) {
            const href = link.getAttribute("href");
            const target = link.getAttribute("target");

            // Validate if we should show loader
            if (
                href &&
                !href.startsWith("#") &&
                !href.startsWith("javascript:") &&
                target !== "_blank" &&
                !e.ctrlKey &&
                !e.metaKey && // Open in new tab modifiers
                !link.dataset.noLoader // Opt-out attribute
            ) {
                showLoader();
            }
        }
    });

    // 2. Handle Form Submissions
    document.addEventListener("submit", function (e) {
        const form = e.target;
        if (!form.dataset.noLoader) {
            showLoader();
        }
    });

    // 3. Handle Back/Forward Cache (BFCache)
    window.addEventListener("pageshow", function (event) {
        if (event.persisted) {
            hideLoaderInstant();
        }
    });

    // --- Loader Functions ---

    function showLoader() {
        if (overlay.classList.contains("hidden")) {
            overlay.style.display = "flex";
            // Force reflow
            void overlay.offsetWidth;
            overlay.classList.remove("hidden");

            // Reset and start
            resetLoader();
            startSimulation();
        }
    }

    function resetLoader() {
        progress = 0;
        progressBar.style.width = "0%";
        percentageText.textContent = "0%";
        statusText.textContent = "Cargando...";
        statusText.style.opacity = "1";
    }

    function startSimulation() {
        // clear existing intervals logic if any
        if (loadingInterval) clearInterval(loadingInterval);
        if (messageInterval) clearInterval(messageInterval);

        let messageIndex = 0;

        messageInterval = setInterval(() => {
            messageIndex = (messageIndex + 1) % messages.length;
            statusText.style.opacity = "0";
            setTimeout(() => {
                statusText.textContent = messages[messageIndex];
                statusText.style.opacity = "1";
            }, 200);
        }, 600);

        loadingInterval = setInterval(() => {
            const randomIncrement = increment * (0.5 + Math.random());
            progress += randomIncrement;

            if (progress >= 100) {
                progress = 100;
                clearInterval(loadingInterval);
                clearInterval(messageInterval);
                // Wait for actual load, but if simulation ends first, keep it at 100
                // For navigation, the page will unload, so this might not even be seen fully
            }
            updateUI(progress);
        }, interval);
    }

    // Hide loader when page strictly finishes loading resources
    window.addEventListener("load", function () {
        progress = 100;
        updateUI(100);
        finishLoading();
    });

    function updateUI(value) {
        if (!progressBar) return;
        const rounded = Math.floor(value);
        progressBar.style.width = `${value}%`;
        percentageText.textContent = `${rounded}%`;
    }

    function finishLoading() {
        if (loadingInterval) clearInterval(loadingInterval);
        if (messageInterval) clearInterval(messageInterval);

        setTimeout(() => {
            overlay.classList.add("hidden");
            setTimeout(() => {
                overlay.style.display = "none";
                resetLoader(); // Ready for next time
            }, 500);
        }, 1000); // Wait 1s before hiding
    }

    function hideLoaderInstant() {
        overlay.classList.add("hidden");
        overlay.style.display = "none";
        resetLoader();
    }
});
