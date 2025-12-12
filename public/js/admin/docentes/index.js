document.addEventListener("DOMContentLoaded", function () {
    // Referencias al DOM
    const searchInput = document.getElementById("searchInput");
    const entriesSelect = document.getElementById("entriesSelect");
    let searchTimeout;

    // Búsqueda con debounce
    searchInput.addEventListener("input", function (e) {
        clearTimeout(searchTimeout);
        const query = e.target.value;

        searchTimeout = setTimeout(() => {
            updateQueryParams("search", query);
        }, 500);
    });

    // Cambio de entradas por página
    entriesSelect.addEventListener("change", function (e) {
        updateQueryParams("per_page", e.target.value);
    });

    // Función para actualizar parámetros URL
    function updateQueryParams(key, value) {
        const url = new URL(window.location.href);
        if (value) {
            url.searchParams.set(key, value);
        } else {
            url.searchParams.delete(key);
        }

        // Reset page on filter change
        if (key !== "page") {
            url.searchParams.delete("page");
        }

        window.location.href = url.toString();
    }
});

// Función global para eliminar (usada en el onclick)
window.confirmDelete = function (docenteId) {
    // Configuración tema (puede venir del backend o global)
    const isDark = document.body.classList.contains("dark-mode");

    Swal.fire({
        title: "¿Estás seguro?",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#e11d48",
        cancelButtonColor: "#64748b",
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar",
        background: isDark ? "#1e293b" : "#ffffff",
        color: isDark ? "#f1f5f9" : "#1e293b",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(`delete-form-${docenteId}`).submit();
        }
    });
};
