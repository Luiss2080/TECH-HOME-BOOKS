<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Docente - TECH HOME BOOKS</title>
    <link rel="icon" type="image/png" href="{{ asset('images/LogoAsociacion.png') }}">
    
    <!-- Precargar fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Meta tags -->
    <meta name="description" content="Dashboard para docentes de TECH HOME BOOKS.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- CSS del Dashboard -->
    <link rel="stylesheet" href="{{ asset('css/dashboard/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/loading.css') }}">
</head>

<body>
    
    <!-- Loading Screen -->
    @include('layouts.loading')
    
    <!-- Layout del Dashboard -->
    <div class="dashboard-layout">
        
        <!-- Sidebar Component -->
        @include('layouts.sidebar')
        
        <!-- Main Content -->
        <div class="main-content">
            
            <!-- Header Component -->
            @include('layouts.header', ['header_title' => 'Dashboard Docente'])
            
            <!-- Contenido principal -->
            <div class="dashboard-content">
                
                <!-- Dashboard Docente -->
                <div class="docente-dashboard" style="padding: 20px;">
                    
                    <div class="welcome-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 15px; padding: 25px; color: white; margin-bottom: 30px;">
                        <h2 style="margin-bottom: 10px; font-size: 1.8rem;">Bienvenido/a, Docente</h2>
                        <p>Panel de control para docentes - TECH HOME BOOKS</p>
                    </div>
                    
                    <div class="stats-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 30px;">
                        <div class="stats-card" style="background: white; border-radius: 15px; padding: 25px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); text-align: center;">
                            <div class="icon" style="font-size: 2.5rem; margin-bottom: 15px;">📚</div>
                            <div class="number" style="font-size: 2rem; font-weight: bold; color: #333; margin-bottom: 10px;">5</div>
                            <div class="label" style="color: #666; font-size: 1.1rem;">Materias Asignadas</div>
                        </div>
                        
                        <div class="stats-card" style="background: white; border-radius: 15px; padding: 25px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); text-align: center;">
                            <div class="icon" style="font-size: 2.5rem; margin-bottom: 15px;">👥</div>
                            <div class="number" style="font-size: 2rem; font-weight: bold; color: #333; margin-bottom: 10px;">85</div>
                            <div class="label" style="color: #666; font-size: 1.1rem;">Estudiantes</div>
                        </div>
                        
                        <div class="stats-card" style="background: white; border-radius: 15px; padding: 25px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); text-align: center;">
                            <div class="icon" style="font-size: 2.5rem; margin-bottom: 15px;">📝</div>
                            <div class="number" style="font-size: 2rem; font-weight: bold; color: #333; margin-bottom: 10px;">12</div>
                            <div class="label" style="color: #666; font-size: 1.1rem;">Tareas Pendientes</div>
                        </div>
                        
                        <div class="stats-card" style="background: white; border-radius: 15px; padding: 25px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); text-align: center;">
                            <div class="icon" style="font-size: 2.5rem; margin-bottom: 15px;">📊</div>
                            <div class="number" style="font-size: 2rem; font-weight: bold; color: #333; margin-bottom: 10px;">23</div>
                            <div class="label" style="color: #666; font-size: 1.1rem;">Calificaciones</div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            
            <!-- Footer Component -->
            @include('layouts.footer')
            
        </div>
    </div>
    
    <!-- Configuración global -->
    <script>
        window.appConfig = {
            csrfToken: '{{ csrf_token() }}',
            baseUrl: '{{ url("/") }}',
            user: {
                id: '{{ session("user_id") }}',
                name: '{{ session("user_name") }}',
                role: '{{ session("user_role") }}'
            }
        };
    </script>
    
    <!-- JavaScript del Dashboard -->
    <script src="{{ asset('js/layouts/loading.js') }}"></script>
    <script src="{{ asset('js/layouts/sidebar.js') }}"></script>
    <script src="{{ asset('js/layouts/header.js') }}"></script>
    <script src="{{ asset('js/layouts/footer.js') }}"></script>
    <script src="{{ asset('js/dashboard/admin.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof DashboardManager !== 'undefined') {
                new DashboardManager();
            }
        });
    </script>
    
</body>
</html>