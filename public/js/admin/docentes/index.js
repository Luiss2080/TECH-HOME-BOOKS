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
    Swal.fire({
        title: "¿Estás seguro?",
        text: "No podrás revertir esta acción de eliminar al docente",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ff4b4b",
        cancelButtonColor: "#1e1e24",
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar",
        background: "#1e1e24",
        color: "#fff",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(`delete-form-${docenteId}`).submit();
        }
    });
};
