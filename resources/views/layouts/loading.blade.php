<div id="loadingOverlay" class="loading-overlay">
    <div class="loading-content">
        <div class="loading-title">
            <span class="title-line">SISTEMA</span>
            <span class="highlight-wrapper">
                <span class="highlight">TECH HOME</span>
            </span>
            <span class="title-line">BOOKS</span>
        </div>

        <div class="progress-container">
            <div id="loadingProgressBar" class="progress-bar"></div>
        </div>

        <div class="loading-info">
            <span id="loadingPercentage" class="percentage">0%</span>
        </div>

        <div id="loadingStatus" class="loading-status">Iniciando...</div>

        <div class="loading-dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fallback to ensure loading screen is hidden if loading.js doesn't do it
        setTimeout(function() {
            const loader = document.getElementById('loadingOverlay');
            if (loader && !loader.classList.contains('active')) {
                // If not active (meaning loading.js didn't start it or finished), ensure it's hidden
                // But wait a bit to see if loading.js starts it
            }
            
            // Safety timeout: force hide after 5 seconds if still visible
            setTimeout(() => {
                if (loader && loader.classList.contains('active')) {
                    console.warn('Forcing loading screen hide');
                    loader.classList.remove('active');
                    loader.style.opacity = '0';
                    setTimeout(() => {
                        loader.style.display = 'none';
                    }, 500);
                }
            }, 5000);
        }, 100);
    });
</script>
