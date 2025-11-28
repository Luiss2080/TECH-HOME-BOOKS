@extends('layouts.docente')

@section('title', 'Generar Certificado')

@section('css')
<link rel="stylesheet" href="{{ asset('css/docente/certificados/generar.css') }}">
@endsection

@section('content')
<div class="generar-certificado-container">
    <div class="form-header">
        <h2>Generar Certificado</h2>
        <a href="{{ route('docente.certificados.index') }}" class="btn btn-secondary">
            Volver
        </a>
    </div>
    
    <form id="generarCertificadoForm" class="form-section">
        <!-- Formulario de generación -->
    </form>
    
    <!-- Preview del certificado -->
    <div class="preview-section" style="display: none;">
        <h3>Vista Previa</h3>
        <div id="certificado-preview"></div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/docente/certificados/generar.js') }}"></script>
@endsection