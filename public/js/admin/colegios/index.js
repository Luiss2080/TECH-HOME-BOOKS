// JavaScript para listado de colegios
document.addEventListener('DOMContentLoaded', function() {
    initDataTable();
    initFilters();
    initBulkActions();
});

function initDataTable() {
    const table = document.querySelector('.data-table');
    if (!table) return;
    
    // Inicializar DataTable si está disponible
    if (typeof $ !== 'undefined' && $.fn.DataTable) {
        $('.data-table').DataTable({
            responsive: true,
            pageLength: 25,
            order: [[1, 'asc']], // Ordenar por nombre
            columnDefs: [
                { orderable: false, targets: [0, -1] } // Checkbox y acciones no ordenables
            ],
            language: {
                url: '/js/datatables/es.json'
            },
            dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                 '<"row"<"col-sm-12"tr>>' +
                 '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>'
        });
    }
    
    // Eventos para acciones de la tabla
    table.addEventListener('click', function(e) {
        const target = e.target;
        
        // Manejar botón de eliminar
        if (target.classList.contains('btn-delete')) {
            e.preventDefault();
            handleDelete(target);
        }
        
        // Manejar cambio de estado
        if (target.classList.contains('status-toggle')) {
            e.preventDefault();
            handleStatusToggle(target);
        }
    });
}

function initFilters() {
    const filterForm = document.querySelector('.filters-form');
    if (!filterForm) return;
    
    const filterInputs = filterForm.querySelectorAll('input, select');
    
    // Aplicar filtros en tiempo real
    filterInputs.forEach(input => {
        input.addEventListener('change', function() {
            applyFilters();
        });
        
        // Para inputs de texto, aplicar con delay
        if (input.type === 'text' || input.type === 'search') {
            let timeout;
            input.addEventListener('input', function() {
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    applyFilters();
                }, 500);
            });
        }
    });
    
    // Botón limpiar filtros
    const clearFiltersBtn = document.querySelector('.clear-filters');
    if (clearFiltersBtn) {
        clearFiltersBtn.addEventListener('click', function() {
            filterInputs.forEach(input => {
                if (input.type === 'checkbox' || input.type === 'radio') {
                    input.checked = false;
                } else {
                    input.value = '';
                }
            });
            applyFilters();
        });
    }
}

function initBulkActions() {
    const selectAllCheckbox = document.querySelector('#selectAll');
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');
    const bulkActionsContainer = document.querySelector('.bulk-actions');
    
    if (!selectAllCheckbox) return;
    
    // Seleccionar/deseleccionar todos
    selectAllCheckbox.addEventListener('change', function() {
        const isChecked = this.checked;
        rowCheckboxes.forEach(checkbox => {
            checkbox.checked = isChecked;
        });
        updateBulkActions();
    });
    
    // Manejar checkboxes individuales
    rowCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            updateSelectAllState();
            updateBulkActions();
        });
    });
    
    // Botones de acciones masivas
    const bulkDeleteBtn = document.querySelector('.bulk-delete');
    const bulkStatusBtn = document.querySelector('.bulk-status');
    
    if (bulkDeleteBtn) {
        bulkDeleteBtn.addEventListener('click', function() {
            handleBulkDelete();
        });
    }
    
    if (bulkStatusBtn) {
        bulkStatusBtn.addEventListener('click', function() {
            handleBulkStatusChange();
        });
    }
}

function applyFilters() {
    const filterData = new FormData(document.querySelector('.filters-form'));
    const params = new URLSearchParams(filterData);
    
    // Mostrar loading
    showTableLoading();
    
    // Hacer petición AJAX
    fetch(`${window.location.pathname}?${params.toString()}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.text())
    .then(html => {
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        const newTableContainer = doc.querySelector('.table-section');
        
        if (newTableContainer) {
            document.querySelector('.table-section').innerHTML = newTableContainer.innerHTML;
            initDataTable(); // Reinicializar eventos de la tabla
        }
        
        hideTableLoading();
    })
    .catch(error => {
        console.error('Error applying filters:', error);
        hideTableLoading();
        AdminUtils.showToast('Error al aplicar filtros', 'error');
    });
}

function handleDelete(button) {
    const colegioId = button.dataset.id;
    const colegioNombre = button.dataset.nombre;
    
    AdminUtils.confirmAction(
        `¿Está seguro de eliminar el colegio "${colegioNombre}"?\n\nEsta acción no se puede deshacer.`,
        function() {
            AdminUtils.showButtonLoading(button, 'Eliminando...');
            
            fetch(`/admin/colegios/${colegioId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    AdminUtils.showToast('Colegio eliminado exitosamente', 'success');
                    // Remover fila de la tabla
                    const row = button.closest('tr');
                    row.style.transition = 'opacity 0.3s';
                    row.style.opacity = '0';
                    setTimeout(() => {
                        row.remove();
                    }, 300);
                } else {
                    AdminUtils.showToast(data.message || 'Error al eliminar', 'error');
                    AdminUtils.hideButtonLoading(button);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                AdminUtils.showToast('Error al eliminar el colegio', 'error');
                AdminUtils.hideButtonLoading(button);
            });
        }
    );
}

function handleStatusToggle(button) {
    const colegioId = button.dataset.id;
    const currentStatus = button.dataset.status;
    const newStatus = currentStatus === 'active' ? 'inactive' : 'active';
    
    AdminUtils.showButtonLoading(button);
    
    fetch(`/admin/colegios/${colegioId}/toggle-status`, {
        method: 'PATCH',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ status: newStatus })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Actualizar badge de estado
            const statusBadge = button.closest('tr').querySelector('.status-badge');
            statusBadge.className = `status-badge status-${newStatus}`;
            statusBadge.textContent = newStatus === 'active' ? 'Activo' : 'Inactivo';
            
            button.dataset.status = newStatus;
            AdminUtils.showToast('Estado actualizado exitosamente', 'success');
        } else {
            AdminUtils.showToast(data.message || 'Error al cambiar estado', 'error');
        }
        AdminUtils.hideButtonLoading(button);
    })
    .catch(error => {
        console.error('Error:', error);
        AdminUtils.showToast('Error al cambiar el estado', 'error');
        AdminUtils.hideButtonLoading(button);
    });
}

function updateSelectAllState() {
    const selectAllCheckbox = document.querySelector('#selectAll');
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');
    const checkedCount = Array.from(rowCheckboxes).filter(cb => cb.checked).length;
    
    if (checkedCount === 0) {
        selectAllCheckbox.checked = false;
        selectAllCheckbox.indeterminate = false;
    } else if (checkedCount === rowCheckboxes.length) {
        selectAllCheckbox.checked = true;
        selectAllCheckbox.indeterminate = false;
    } else {
        selectAllCheckbox.checked = false;
        selectAllCheckbox.indeterminate = true;
    }
}

function updateBulkActions() {
    const bulkActionsContainer = document.querySelector('.bulk-actions');
    const checkedCount = document.querySelectorAll('.row-checkbox:checked').length;
    const selectedCountElement = document.querySelector('.selected-count');
    
    if (checkedCount > 0) {
        bulkActionsContainer.style.display = 'flex';
        if (selectedCountElement) {
            selectedCountElement.textContent = checkedCount;
        }
    } else {
        bulkActionsContainer.style.display = 'none';
    }
}

function handleBulkDelete() {
    const selectedIds = Array.from(document.querySelectorAll('.row-checkbox:checked'))
                           .map(cb => cb.value);
    
    if (selectedIds.length === 0) return;
    
    AdminUtils.confirmAction(
        `¿Está seguro de eliminar ${selectedIds.length} colegio(s) seleccionado(s)?\n\nEsta acción no se puede deshacer.`,
        function() {
            const deleteBtn = document.querySelector('.bulk-delete');
            AdminUtils.showButtonLoading(deleteBtn, 'Eliminando...');
            
            fetch('/admin/colegios/bulk-delete', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ ids: selectedIds })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    AdminUtils.showToast(`${data.deleted} colegio(s) eliminado(s) exitosamente`, 'success');
                    // Recargar tabla
                    window.location.reload();
                } else {
                    AdminUtils.showToast(data.message || 'Error en la eliminación masiva', 'error');
                    AdminUtils.hideButtonLoading(deleteBtn);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                AdminUtils.showToast('Error en la eliminación masiva', 'error');
                AdminUtils.hideButtonLoading(deleteBtn);
            });
        }
    );
}

function handleBulkStatusChange() {
    const selectedIds = Array.from(document.querySelectorAll('.row-checkbox:checked'))
                           .map(cb => cb.value);
    
    if (selectedIds.length === 0) return;
    
    const newStatus = prompt('Ingrese el nuevo estado (active/inactive):');
    if (!newStatus || !['active', 'inactive'].includes(newStatus)) {
        AdminUtils.showToast('Estado inválido', 'error');
        return;
    }
    
    const statusBtn = document.querySelector('.bulk-status');
    AdminUtils.showButtonLoading(statusBtn, 'Actualizando...');
    
    fetch('/admin/colegios/bulk-status', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ ids: selectedIds, status: newStatus })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            AdminUtils.showToast(`${data.updated} colegio(s) actualizado(s) exitosamente`, 'success');
            // Recargar tabla
            window.location.reload();
        } else {
            AdminUtils.showToast(data.message || 'Error en la actualización masiva', 'error');
            AdminUtils.hideButtonLoading(statusBtn);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        AdminUtils.showToast('Error en la actualización masiva', 'error');
        AdminUtils.hideButtonLoading(statusBtn);
    });
}

function showTableLoading() {
    const tableContainer = document.querySelector('.table-section');
    tableContainer.style.position = 'relative';
    
    const loadingOverlay = document.createElement('div');
    loadingOverlay.className = 'table-loading-overlay';
    loadingOverlay.innerHTML = '<div class="loading-spinner"></div>';
    
    tableContainer.appendChild(loadingOverlay);
}

function hideTableLoading() {
    const loadingOverlay = document.querySelector('.table-loading-overlay');
    if (loadingOverlay) {
        loadingOverlay.remove();
    }
}