document.addEventListener("DOMContentLoaded", function () {
    // Hide loading screen when page is fully loaded
    const loadingScreen = document.getElementById("loading-screen");
    if (loadingScreen) {
        setTimeout(() => {
            loadingScreen.classList.add("hidden");
        }, 500);
    }

    // Sidebar toggle functionality
    const menuToggle = document.querySelector(".menu-toggle");
    const sidebar = document.querySelector(".dashboard-sidebar");

    if (menuToggle && sidebar) {
        menuToggle.addEventListener("click", () => {
            sidebar.classList.toggle("active");
        });
    }
});
