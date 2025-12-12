document.addEventListener("DOMContentLoaded", function () {
    // Search functionality with debounce
    const searchInput = document.getElementById("searchInput");
    let timeoutId;

    if (searchInput) {
        searchInput.addEventListener("input", function (e) {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => {
                updateQueryParam("search", e.target.value);
            }, 500);
        });
    }

    // Filter by Module
    const moduleSelect = document.getElementById("moduleSelect");
    if (moduleSelect) {
        moduleSelect.addEventListener("change", function (e) {
            updateQueryParam("modulo", e.target.value);
        });
    }

    // Per Page Selection
    const entriesSelect = document.getElementById("entriesSelect");
    if (entriesSelect) {
        entriesSelect.addEventListener("change", function (e) {
            updateQueryParam("per_page", e.target.value);
        });
    }

    // Helper function to update URL parameters
    function updateQueryParam(key, value) {
        const url = new URL(window.location.href);
        if (value) {
            url.searchParams.set(key, value);
        } else {
            url.searchParams.delete(key);
        }
        // Reset page to 1 when filtering/searching
        if (key !== "page") {
            url.searchParams.set("page", "1");
        }
        window.location.href = url.toString();
    }
});
