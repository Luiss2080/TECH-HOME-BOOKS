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
    // Close on Escape key
    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") {
            if (modal.classList.contains("active")) closeDeleteModal();
            const successModal = document.getElementById("successModal");
            if (successModal && successModal.classList.contains("active"))
                closeSuccessModal();
            const errorModal = document.getElementById("errorModal");
            if (errorModal && errorModal.classList.contains("active"))
                closeErrorModal();
        }
    });
});

/* --- Success Modal Logic --- */
function openSuccessModal(message) {
    const modal = document.getElementById("successModal");
    const msgEl = document.getElementById("successMessage");
    if (msgEl && message) msgEl.textContent = message;

    modal.style.display = "flex";
    modal.offsetHeight;
    modal.classList.add("active");
}
function closeSuccessModal() {
    const modal = document.getElementById("successModal");
    modal.classList.remove("active");
    setTimeout(() => {
        modal.style.display = "none";
    }, 300);
}

/* --- Error Modal Logic --- */
function openErrorModal(message) {
    const modal = document.getElementById("errorModal");
    const msgEl = document.getElementById("errorMessage");
    if (msgEl && message) msgEl.textContent = message;

    modal.style.display = "flex";
    modal.offsetHeight;
    modal.classList.add("active");
}
function closeErrorModal() {
    const modal = document.getElementById("errorModal");
    modal.classList.remove("active");
    setTimeout(() => {
        modal.style.display = "none";
    }, 300);
}
