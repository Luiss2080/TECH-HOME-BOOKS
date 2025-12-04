<aside class="dashboard-sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <img src="{{ asset('images/LogoAsociacion.png') }}" alt="Logo">
            <span>TECH HOME</span>
        </div>
    </div>
    
    <nav class="sidebar-nav">
        <ul>
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <span class="icon">🏠</span>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="">
                    <span class="icon">👥</span>
                    <span class="text">Usuarios</span>
                </a>
            </li>
            <li>
                <a href="#" class="">
                    <span class="icon">🎓</span>
                    <span class="text">Cursos</span>
                </a>
            </li>
            <li>
                <a href="#" class="">
                    <span class="icon">📚</span>
                    <span class="text">Materias</span>
                </a>
            </li>
            <li>
                <a href="#" class="">
                    <span class="icon">📖</span>
                    <span class="text">Biblioteca</span>
                </a>
            </li>
        </ul>
    </nav>
    
    <div class="sidebar-footer">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                <span class="icon">🚪</span>
                <span class="text">Cerrar Sesión</span>
            </button>
        </form>
    </div>
</aside>
