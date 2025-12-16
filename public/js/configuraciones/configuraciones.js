/**
 * Configuration Page Scripts
 */

document.addEventListener("DOMContentLoaded", function () {
    // Tab Switching Logic
    const initTabs = () => {
        const tabs = document.querySelectorAll(".config-tab-btn");
        const sections = document.querySelectorAll(".config-section");

        tabs.forEach((tab) => {
            tab.addEventListener("click", () => {
                // Remove active class from all tabs
                tabs.forEach((t) => t.classList.remove("active"));
                // Add active class to clicked tab
                tab.classList.add("active");

                // Hide all sections
                sections.forEach((section) =>
                    section.classList.remove("active")
                );

                // Show target section
                const targetId = tab.getAttribute("data-target");
                const targetSection = document.getElementById(targetId);
                if (targetSection) {
                    targetSection.classList.add("active");
                }
            });
        });
    };

    // Toggle Switch Logic (Mock functionality for UI demo)
    const initToggles = () => {
        const toggles = document.querySelectorAll(".switch input");

        toggles.forEach((toggle) => {
            toggle.addEventListener("change", function () {
                const settingName = this.getAttribute("name");
                const isChecked = this.checked;

                // Here you would typically send an AJAX request to save the setting
                console.log(`Setting ${settingName} changed to: ${isChecked}`);

                // Optional: Show a quick toast notification
                showToast(`Configuración actualizada`);
            });
        });
    };

    // Simple toast notification helper
    const showToast = (message) => {
        // Check if toast container exists, if not create it
        let container = document.querySelector(".toast-container");
        if (!container) {
            container = document.createElement("div");
            container.className = "toast-container";
            container.style.cssText =
                "position: fixed; bottom: 20px; right: 20px; z-index: 9999;";
            document.body.appendChild(container);
        }

        const toast = document.createElement("div");
        toast.className = "config-toast";
        toast.textContent = message;
        toast.style.cssText = `
            background-color: #1f2937;
            color: #10b981;
            padding: 1rem 1.5rem;
            border-radius: 0.5rem;
            margin-top: 10px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid #374151;
            animation: slideInRight 0.3s ease-out;
            display: flex;
            align-items: center;
        `;

        // Add check icon
        const icon = document.createElement("i");
        icon.className = "fas fa-check-circle";
        icon.style.marginRight = "0.5rem";
        toast.prepend(icon);

        container.appendChild(toast);

        // Remove after 3 seconds
        setTimeout(() => {
            toast.style.animation = "fadeOut 0.3s ease-out forwards";
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    };

    // Initialize all components
    initTabs();
    initToggles();
});
