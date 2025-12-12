/**
 * Profile Page Interactivity
 */

document.addEventListener("DOMContentLoaded", function () {
    // 1. Password Visibility Toggle
    const toggleButtons = document.querySelectorAll(".toggle-password");

    toggleButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const input = this.previousElementSibling;
            const icon = this.querySelector("i");

            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        });
    });

    // 2. Avatar Preview
    const avatarInput = document.getElementById("avatarInput");
    const avatarPreview = document.querySelector(".profile-avatar");

    if (avatarInput && avatarPreview) {
        avatarInput.addEventListener("change", function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    avatarPreview.src = e.target.result;
                    // Optional: Submit form automatically or show save button
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // 3. Form Animations
    const cards = document.querySelectorAll(".settings-card");
    cards.forEach((card, index) => {
        card.style.opacity = "0";
        card.style.transform = "translateY(20px)";
        setTimeout(() => {
            card.style.transition = "opacity 0.5s ease, transform 0.5s ease";
            card.style.opacity = "1";
            card.style.transform = "translateY(0)";
        }, 100 * (index + 1));
    });
});
