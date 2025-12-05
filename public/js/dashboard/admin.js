/**
 * TECH HOME - Dashboard Script
 * Modernized & Optimized for the new Red Theme Interface
 */

document.addEventListener("DOMContentLoaded", () => {
    initDashboard();
});

function initDashboard() {
    setupEntranceAnimations();
    setupCourseInteractions();
    setupLabStatusChecks();
    console.log("🚀 Dashboard initialized successfully");
}

/**
 * 1. Entrance Animations
 * Adds a staggered fade-in effect to cards
 */
function setupEntranceAnimations() {
    const cards = document.querySelectorAll(".course-card, .lab-card");

    cards.forEach((card, index) => {
        card.style.opacity = "0";
        card.style.transform = "translateY(20px)";
        card.style.transition = "opacity 0.5s ease, transform 0.5s ease";

        setTimeout(() => {
            card.style.opacity = "1";
            card.style.transform = "translateY(0)";
        }, 100 * index); // Staggered delay
    });
}

/**
 * 2. Course Card Interactions
 * Adds simple feedback when clicking buttons
 */
function setupCourseInteractions() {
    const buttons = document.querySelectorAll(".course-btn");

    buttons.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            const card = btn.closest(".course-card");
            const title = card.querySelector(".course-title").innerText;

            // Simulate button loading state
            const originalContent = btn.innerHTML;
            btn.innerHTML = '<span class="spinner"></span> Procesando...';
            btn.style.opacity = "0.8";

            setTimeout(() => {
                btn.innerHTML = originalContent;
                btn.style.opacity = "1";
                showToast(`Redirigiendo a: ${title}`, "success");
            }, 800);
        });
    });
}

/**
 * 3. Laboratory Status Checks
 * Simulates real-time status updates for labs
 */
function setupLabStatusChecks() {
    const statuses = document.querySelectorAll(".lab-status");

    // Randomly "check" status every 30-60 seconds
    setInterval(() => {
        const randomIdx = Math.floor(Math.random() * statuses.length);
        const statusBadge = statuses[randomIdx];

        if (statusBadge.classList.contains("maintenance")) return; // Don't flip maintenance

        // Flash effect
        statusBadge.style.opacity = "0.5";
        setTimeout(() => {
            statusBadge.style.opacity = "1";
        }, 300);
    }, 10000);
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
