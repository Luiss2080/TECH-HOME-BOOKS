<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Estudiante - TECH HOME')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts y Estilos -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/layouts/estudiante.css') }}">
    
    <!-- CSS específicos -->
    @yield('css')
    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-100">
    <div id="app" class="min-h-screen">
        <!-- Sidebar -->
        @include('layouts.estudiante.sidebar')
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Navigation -->
            @include('layouts.estudiante.navbar')
            
            <!-- Page Header -->
            @if(isset($pageTitle))
            <div class="page-header">
                <div class="container-fluid">
                    <h1 class="page-title">{{ $pageTitle }}</h1>
                    @if(isset($breadcrumbs))
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                @foreach($breadcrumbs as $breadcrumb)
                                    @if($loop->last)
                                        <li class="breadcrumb-item active">{{ $breadcrumb['name'] }}</li>
                                    @else
                                        <li class="breadcrumb-item">
                                            <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ol>
                        </nav>
                    @endif
                </div>
            </div>
            @endif
            
            <!-- Page Content -->
            <main class="main-page-content">
                @include('shared.alerts')
                @yield('content')
            </main>
        </div>
    </div>

    <!-- JS específicos -->
    <script src="{{ asset('js/layouts/estudiante.js') }}"></script>
    @yield('js')
    @stack('scripts')
</body>
</html>