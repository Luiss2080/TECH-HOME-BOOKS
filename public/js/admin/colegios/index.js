document.addEventListener("DOMContentLoaded", function () {
    // --- SEARCH FUNCTIONALITY ---
    const searchInput = document.getElementById("searchInput");
    let timeout = null;

    if (searchInput) {
        searchInput.addEventListener("input", function () {
            clearTimeout(timeout);
            timeout = setTimeout(function () {
                const query = searchInput.value;
                const entries =
                    document.getElementById("entriesSelect")?.value || 10;
                const status =
                    document.getElementById("statusSelect")?.value || "";

                // Redirect to search
                const url = new URL(window.location.href);
                url.searchParams.set("search", query);
                url.searchParams.set("page", 1);
                url.searchParams.set("per_page", entries);
                if (status) url.searchParams.set("estado", status);
                else url.searchParams.delete("estado");

                window.location.href = url.toString();
            }, 600);
        });

        searchInput.addEventListener("focus", function () {
            const wrapper = this.closest(".search-wrapper");
            if (wrapper) wrapper.classList.add("focused");
        });

        searchInput.addEventListener("blur", function () {
            const wrapper = this.closest(".search-wrapper");
            if (wrapper) wrapper.classList.remove("focused");
        });
    }

    // --- ENTRIES PER PAGE ---
    const entriesSelect = document.getElementById("entriesSelect");
    if (entriesSelect) {
        entriesSelect.addEventListener("change", function () {
            const entries = this.value;
            const url = new URL(window.location.href);
            url.searchParams.set("per_page", entries);
            url.searchParams.set("page", 1);
            window.location.href = url.toString();
        });
    }

    // --- STATUS FILTER ---
    const statusSelect = document.getElementById("statusSelect");
    if (statusSelect) {
        statusSelect.addEventListener("change", function () {
            const status = this.value;
            const url = new URL(window.location.href);
            if (status) url.searchParams.set("estado", status);
            else url.searchParams.delete("estado");
            url.searchParams.set("page", 1);
            window.location.href = url.toString();
        });
    }
});

// --- SWEETALERT DELETE CONFIRMATION ---
function confirmDelete(id) {
    const confirmColor =
        typeof swalTheme !== "undefined"
            ? swalTheme.confirmButtonColor
            : "#e11d48";
    const cancelColor =
        typeof swalTheme !== "undefined"
            ? swalTheme.cancelButtonColor
            : "#64748b";
    const bg =
        typeof swalTheme !== "undefined" ? swalTheme.background : "#ffffff";
    const text = typeof swalTheme !== "undefined" ? swalTheme.color : "#1e293b";

    Swal.fire({
        title: "¿Estás seguro?",
        text: " Esta acción no se puede deshacer. Se eliminará el colegio del sistema.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: confirmColor,
        cancelButtonColor: cancelColor,
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar",
        background: bg,
        color: text,
        iconColor: confirmColor,
        reverseButtons: true,
        focusCancel: true,
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("delete-form-" + id).submit();
        }
    });
}
