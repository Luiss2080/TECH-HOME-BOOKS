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
    // Custom Select Implementation
    const initCustomSelects = () => {
        const customSelects = document.querySelectorAll(".form-select");

        customSelects.forEach((select) => {
            // Check if already initialized to avoid duplicates
            if (
                select.nextElementSibling &&
                select.nextElementSibling.classList.contains(
                    "custom-select-wrapper"
                )
            )
                return;

            // Hide original select
            select.style.display = "none";

            // Create Wrapper
            const wrapper = document.createElement("div");
            wrapper.classList.add("custom-select-wrapper");

            // Create Trigger
            const trigger = document.createElement("div");
            trigger.classList.add("custom-select-trigger");
            trigger.innerHTML = `
                <span>${select.options[select.selectedIndex].text}</span>
                <i class="fas fa-chevron-down"></i>
            `;

            // Create Options List
            const customOptions = document.createElement("div");
            customOptions.classList.add("custom-options");

            // Add options
            Array.from(select.options).forEach((option) => {
                if (option.disabled) return; // Skip placeholder if desired, or duplicate style

                const optionEl = document.createElement("div");
                optionEl.classList.add("custom-option");
                optionEl.textContent = option.text;
                optionEl.dataset.value = option.value;

                if (option.selected) {
                    optionEl.classList.add("selected");
                }

                optionEl.addEventListener("click", () => {
                    // Update Select Value
                    select.value = option.value;

                    // Update Trigger text
                    trigger.querySelector("span").textContent = option.text;

                    // Update Selected Class
                    customOptions
                        .querySelectorAll(".custom-option")
                        .forEach((opt) => opt.classList.remove("selected"));
                    optionEl.classList.add("selected");

                    // Close Dropdown
                    wrapper.classList.remove("open");

                    // Trigger change event on original select for any listeners
                    select.dispatchEvent(new Event("change"));
                });

                customOptions.appendChild(optionEl);
            });

            // Toggle Open
            trigger.addEventListener("click", (e) => {
                e.stopPropagation();
                // Close others
                document
                    .querySelectorAll(".custom-select-wrapper.open")
                    .forEach((w) => {
                        if (w !== wrapper) w.classList.remove("open");
                    });
                wrapper.classList.toggle("open");
            });

            wrapper.appendChild(trigger);
            wrapper.appendChild(customOptions);
            select.parentNode.insertBefore(wrapper, select.nextSibling);

            // Handle Icon inside input-wrapper (if exists)
            // The original logic had an icon absolutely positioned.
            // We might need to adjust or ensure the wrapper respects it.
        });

        // Close when clicking outside
        document.addEventListener("click", (e) => {
            if (!e.target.closest(".custom-select-wrapper")) {
                document
                    .querySelectorAll(".custom-select-wrapper.open")
                    .forEach((wrapper) => {
                        wrapper.classList.remove("open");
                    });
            }
        });
    };

    initCustomSelects();

    // Re-init if needed (e.g. dynamic content), but for now just run once.
});
