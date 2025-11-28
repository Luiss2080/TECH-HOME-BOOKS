// JavaScript para crear colegio
document.addEventListener('DOMContentLoaded', function() {
    initFormValidation();
    initFileUpload();
    initFormSubmission();
});

function initFormValidation() {
    const form = document.getElementById('createColegioForm');
    if (!form) return;
    
    // Validación en tiempo real
    const inputs = form.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            validateField(this);
        });
        
        input.addEventListener('input', function() {
            clearFieldError(this);
        });
    });
    
    // Validación de teléfono
    const phoneInput = document.getElementById('telefono');
    if (phoneInput) {
        phoneInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9+()-\s]/g, '');
        });
    }
    
    // Validación de email
    const emailInput = document.getElementById('email');
    if (emailInput) {
        emailInput.addEventListener('blur', function() {
            validateEmail(this);
        });
    }
}

function initFileUpload() {
    const fileUploadArea = document.querySelector('.file-upload-area');
    const fileInput = document.getElementById('logo');
    const filePreview = document.querySelector('.file-preview');
    
    if (!fileUploadArea || !fileInput) return;
    
    // Click para seleccionar archivo
    fileUploadArea.addEventListener('click', function() {
        fileInput.click();
    });
    
    // Drag & Drop
    fileUploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('dragover');
    });
    
    fileUploadArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.classList.remove('dragover');
    });
    
    fileUploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        this.classList.remove('dragover');
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            handleFileSelect(files[0]);
        }
    });
    
    // Selección de archivo
    fileInput.addEventListener('change', function() {
        if (this.files.length > 0) {
            handleFileSelect(this.files[0]);
        }
    });
}

function handleFileSelect(file) {
    // Validar tipo de archivo
    const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    if (!allowedTypes.includes(file.type)) {
        AdminUtils.showToast('Solo se permiten archivos de imagen (JPEG, PNG, GIF, WebP)', 'error');
        return;
    }
    
    // Validar tamaño (max 2MB)
    const maxSize = 2 * 1024 * 1024; // 2MB
    if (file.size > maxSize) {
        AdminUtils.showToast('El archivo debe ser menor a 2MB', 'error');
        return;
    }
    
    // Mostrar preview
    const reader = new FileReader();
    reader.onload = function(e) {
        showFilePreview(file.name, e.target.result);
    };
    reader.readAsDataURL(file);
}

function showFilePreview(fileName, dataUrl) {
    const filePreview = document.querySelector('.file-preview');
    if (!filePreview) return;
    
    filePreview.innerHTML = `
        <img src="${dataUrl}" alt="Preview">
        <div class="file-info">
            <span class="file-name">${fileName}</span>
            <button type="button" class="btn-remove-file" onclick="removeFilePreview()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    filePreview.style.display = 'flex';
}

function removeFilePreview() {
    const filePreview = document.querySelector('.file-preview');
    const fileInput = document.getElementById('logo');
    
    if (filePreview) {
        filePreview.style.display = 'none';
        filePreview.innerHTML = '';
    }
    
    if (fileInput) {
        fileInput.value = '';
    }
}

function initFormSubmission() {
    const form = document.getElementById('createColegioForm');
    if (!form) return;
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (validateForm()) {
            submitForm();
        }
    });
}

function validateForm() {
    const form = document.getElementById('createColegioForm');
    const requiredFields = form.querySelectorAll('[required]');
    let isValid = true;
    
    // Limpiar errores anteriores
    clearAllErrors();
    
    // Validar campos requeridos
    requiredFields.forEach(field => {
        if (!validateField(field)) {
            isValid = false;
        }
    });
    
    // Validaciones específicas
    const emailField = document.getElementById('email');
    if (emailField && emailField.value && !validateEmail(emailField)) {
        isValid = false;
    }
    
    return isValid;
}

function validateField(field) {
    const value = field.value.trim();
    let isValid = true;
    let errorMessage = '';
    
    // Campo requerido
    if (field.hasAttribute('required') && !value) {
        isValid = false;
        errorMessage = 'Este campo es requerido';
    }
    
    // Validaciones específicas por tipo
    switch (field.type) {
        case 'email':
            if (value && !isValidEmail(value)) {
                isValid = false;
                errorMessage = 'Ingrese un email válido';
            }
            break;
            
        case 'tel':
            if (value && value.length < 7) {
                isValid = false;
                errorMessage = 'Ingrese un teléfono válido';
            }
            break;
    }
    
    // Validaciones por campo específico
    switch (field.id) {
        case 'nombre':
            if (value && value.length < 3) {
                isValid = false;
                errorMessage = 'El nombre debe tener al menos 3 caracteres';
            }
            break;
            
        case 'director':
            if (value && value.length < 5) {
                isValid = false;
                errorMessage = 'El nombre del director debe tener al menos 5 caracteres';
            }
            break;
    }
    
    if (!isValid) {
        showFieldError(field, errorMessage);
    } else {
        clearFieldError(field);
    }
    
    return isValid;
}

function validateEmail(field) {
    const email = field.value.trim();
    if (email && !isValidEmail(email)) {
        showFieldError(field, 'Ingrese un email válido');
        return false;
    }
    clearFieldError(field);
    return true;
}

function isValidEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

function showFieldError(field, message) {
    field.classList.add('is-invalid');
    
    // Remover error anterior
    const existingError = field.parentNode.querySelector('.invalid-feedback');
    if (existingError) {
        existingError.remove();
    }
    
    // Agregar nuevo error
    const errorElement = document.createElement('div');
    errorElement.className = 'invalid-feedback';
    errorElement.textContent = message;
    field.parentNode.appendChild(errorElement);
}

function clearFieldError(field) {
    field.classList.remove('is-invalid');
    const errorElement = field.parentNode.querySelector('.invalid-feedback');
    if (errorElement) {
        errorElement.remove();
    }
}

function clearAllErrors() {
    const form = document.getElementById('createColegioForm');
    const invalidFields = form.querySelectorAll('.is-invalid');
    const errorMessages = form.querySelectorAll('.invalid-feedback');
    
    invalidFields.forEach(field => field.classList.remove('is-invalid'));
    errorMessages.forEach(message => message.remove());
}

function submitForm() {
    const form = document.getElementById('createColegioForm');
    const submitBtn = form.querySelector('button[type="submit"]');
    const formData = new FormData(form);
    
    AdminUtils.showButtonLoading(submitBtn, 'Guardando...');
    
    fetch('/admin/colegios', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            AdminUtils.showToast('Colegio creado exitosamente', 'success');
            // Redirigir después de un breve delay
            setTimeout(() => {
                window.location.href = data.redirect || '/admin/colegios';
            }, 1500);
        } else {
            // Mostrar errores de validación
            if (data.errors) {
                showValidationErrors(data.errors);
            } else {
                AdminUtils.showToast(data.message || 'Error al crear el colegio', 'error');
            }
            AdminUtils.hideButtonLoading(submitBtn);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        AdminUtils.showToast('Error al crear el colegio', 'error');
        AdminUtils.hideButtonLoading(submitBtn);
    });
}

function showValidationErrors(errors) {
    Object.keys(errors).forEach(fieldName => {
        const field = document.getElementById(fieldName) || document.querySelector(`[name="${fieldName}"]`);
        if (field && errors[fieldName].length > 0) {
            showFieldError(field, errors[fieldName][0]);
        }
    });
    
    // Scroll al primer error
    const firstError = document.querySelector('.is-invalid');
    if (firstError) {
        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
        firstError.focus();
    }
}