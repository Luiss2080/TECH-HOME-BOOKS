<header class="dashboard-header">
    <div class="header-left">
        <button class="menu-toggle">
            <span class="icon">☰</span>
        </button>
        <h1 class="header-title">{{ $header_title ?? 'Dashboard' }}</h1>
    </div>
    
    <div class="header-right">
        <div class="user-profile">
            <span class="user-name">{{ session('user_name', 'Usuario') }}</span>
            <div class="user-avatar">
                <span>{{ substr(session('user_name', 'U'), 0, 1) }}</span>
            </div>
        </div>
    </div>
</header>
