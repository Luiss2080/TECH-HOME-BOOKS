document.addEventListener("DOMContentLoaded", function () {
    // Avatar Preview
    const avatarInput = document.getElementById("avatar");
    const avatarPreview = document.getElementById("avatarPreview");

    if (avatarInput && avatarPreview) {
        avatarInput.addEventListener("change", function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    // Create or update image
                    let img = avatarPreview.querySelector("img");
                    if (!img) {
                        img = document.createElement("img");
                        avatarPreview.appendChild(img);
                        // Hide placeholder
                        const placeholder = avatarPreview.querySelector(
                            ".avatar-placeholder"
                        );
                        if (placeholder) placeholder.style.display = "none";
                    }
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Form Validation (Simple)
    const form = document.getElementById("createDocenteForm");
    if (form) {
        form.addEventListener("submit", function (e) {
            // Optional: Client-side validation could go here
            console.log("Form submitting...");
        });
    }
});
