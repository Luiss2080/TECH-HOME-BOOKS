/**
 * TECH HOME - Dashboard Script
 * Simplified & Optimized
 */

document.addEventListener("DOMContentLoaded", () => {
    console.log("🚀 Dashboard initialized successfully");
});

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
