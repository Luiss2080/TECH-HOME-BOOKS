<div id="loadingOverlay" class="loading-screen">
    <div class="loader">
        <div class="loader-spinner"></div>
        <div class="loader-text" id="loadingStatus">Cargando...</div>
        <div id="loadingProgressBar" style="display:none;"></div>
        <div id="loadingPercentage" style="display:none;"></div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fallback to ensure loading screen is hidden if loading.js doesn't do it
        setTimeout(function() {
            const loader = document.getElementById('loadingOverlay');
            if (loader) {
                loader.classList.add('hidden');
                loader.style.opacity = '0';
                setTimeout(() => {
                    loader.style.display = 'none';
                }, 500);
            }
        }, 1000);
    });
</script>
