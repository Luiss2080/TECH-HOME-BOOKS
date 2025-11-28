@extends('layouts.admin')

@section('title', 'Dashboard - Admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
@endsection

@section('content')
<div class="dashboard-container">
    <!-- Estadísticas principales -->
    <div class="stats-grid">
        <!-- Estadísticas aquí -->
    </div>
    
    <!-- Gráficos y reportes -->
    <div class="charts-section">
        <!-- Gráficos aquí -->
    </div>
    
    <!-- Actividad reciente -->
    <div class="recent-activity">
        <!-- Actividad aquí -->
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/dashboard.js') }}"></script>
@endsection