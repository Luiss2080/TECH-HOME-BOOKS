/**
 * HEADER MANAGER (Enhanced for Transparency)
 * Maneja la lógica de interactividad del header moderno.
 */

class HeaderManager {
    constructor() {
        this.header = document.querySelector(".dashboard-header");
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
        console.log("✨ Header Manager Initialized");
    }

    bindEvents() {
        // Dropdown Toggling Logic
        Object.values(this.dropdowns).forEach(({ toggle, menu }) => {
            if (toggle && menu) {
                toggle.addEventListener("click", (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    this.toggleDropdown(menu, toggle);
                });
            }
        });

        // Close when clicking outside
        document.addEventListener("click", (e) => this.closeAllDropdowns(e));

        // Prevent closing when clicking inside menu
        Object.values(this.dropdowns).forEach(({ menu }) => {
            if (menu) {
                menu.addEventListener("click", (e) => e.stopPropagation());
            }
        });

        // Keyboard navigation
        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape") this.closeAllDropdowns();
        });
    }

    handleScroll() {
        if (!this.header) {
            this.header = document.querySelector(".dashboard-header");
            if (!this.header) return;
        }

        // Add scrolled class if we are away from top
        if (window.scrollY > 10) {
            if (!this.header.classList.contains("scrolled")) {
                this.header.classList.add("scrolled");
            }
        } else {
            if (this.header.classList.contains("scrolled")) {
                this.header.classList.remove("scrolled");
            }
        }
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

// Make globally available
window.HeaderManager = HeaderManager;

// Init if not already done by blade script
if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", () => {
        if (!window.headerManagerInstance) {
            window.headerManagerInstance = new HeaderManager();
        }
    });
} else {
    if (!window.headerManagerInstance) {
        window.headerManagerInstance = new HeaderManager();
    }
}
