function openDeleteModal(actionUrl, itemName, itemCI, itemCode) {
    const modal = document.getElementById("deleteModal");
    const form = document.getElementById("deleteForm");
    const nameSpan = document.getElementById("deleteItemName");
    const ciSpan = document.getElementById("deleteItemCI");
    const codeSpan = document.getElementById("deleteItemCode");

    // Set action and data
    form.action = actionUrl;
    nameSpan.textContent = itemName;
    if (ciSpan) ciSpan.textContent = itemCI || "-";
    if (codeSpan) codeSpan.textContent = itemCode || "-";

    // Show modal
    modal.style.display = "flex";
    // Trigger reflow
    modal.offsetHeight;
    modal.classList.add("active");
}

function closeDeleteModal() {
    const modal = document.getElementById("deleteModal");

    modal.classList.remove("active");

    // Wait for transition
    setTimeout(() => {
        modal.style.display = "none";
        document.getElementById("deleteForm").action = "";
    }, 300);
}

// Close on outside click
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("deleteModal");
    modal.addEventListener("click", function (e) {
        if (e.target === modal) {
            closeDeleteModal();
        }
    });

    // Close on Escape key
    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape" && modal.classList.contains("active")) {
            closeDeleteModal();
        }
    });
});
