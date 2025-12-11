/**
 * HEADER MANAGER (Refactored)
 * Maneja la lógica de interactividad del nuevo header.
 */

class HeaderManager {
    constructor() {
        this.dropdowns = {
            quickActions: {
                toggle: document.getElementById("quickActionsToggle"),
                menu: document.getElementById("quickActionsDropdown"),
            },
            notifications: {
                toggle: document.getElementById("notificationToggle"),
                menu: document.getElementById("notificationDropdown"),
            },
            profile: {
                toggle: document.getElementById("profileDropdownToggle"),
                menu: document.getElementById("profileDropdown"),
            },
        };

        this.init();
    }

    init() {
        this.bindEvents();
        console.log("✨ Header Refactorizado Inicializado");
    }

    bindEvents() {
        // Dropdown Toggling Logic
        Object.values(this.dropdowns).forEach(({ toggle, menu }) => {
            if (toggle && menu) {
                toggle.addEventListener("click", (e) => {
                    e.stopPropagation();
                    this.toggleDropdown(menu, toggle);
                });
            }
        });

        // Close when clicking outside
        document.addEventListener("click", (e) => {
            this.closeAllDropdowns();
        });

        // Prevent closing when clicking inside menu
        Object.values(this.dropdowns).forEach(({ menu }) => {
            if (menu) {
                menu.addEventListener("click", (e) => e.stopPropagation());
            }
        });

        // Escape key to close all
        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape") this.closeAllDropdowns();
        });
    }

    toggleDropdown(targetMenu, targetToggle) {
        const isAlreadyOpen = targetMenu.classList.contains("show");

        // Close all others first
        this.closeAllDropdowns();

        if (!isAlreadyOpen) {
            targetMenu.classList.add("show");
            targetToggle.classList.add("active");
            targetToggle.setAttribute("aria-expanded", "true");
        }
    }

    closeAllDropdowns() {
        Object.values(this.dropdowns).forEach(({ toggle, menu }) => {
            if (menu && toggle) {
                menu.classList.remove("show");
                toggle.classList.remove("active");
                toggle.setAttribute("aria-expanded", "false");
            }
        });
    }
}

// Attach to window just in case
window.HeaderManager = HeaderManager;
