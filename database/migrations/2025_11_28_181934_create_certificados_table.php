<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('certificados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiante_id')->constrained('estudiantes')->onDelete('cascade');
            $table->foreignId('colegio_id')->constrained('colegios')->onDelete('cascade');
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade');
            $table->string('codigo_certificado')->unique(); // código único de verificación
            $table->enum('tipo', ['aprobacion', 'participacion', 'mencion_honorifica', 'mejor_estudiante', 'asistencia_perfecta', 'graduacion'])->default('aprobacion');
            $table->string('titulo');
            $table->text('descripcion');
            $table->year('ano_lectivo');
            $table->string('periodo_academico')->nullable(); // si es de un período específico
            $table->decimal('nota_promedio', 5, 2)->nullable();
            $table->json('materias_incluidas')->nullable(); // materias que incluye el certificado
            $table->date('fecha_emision');
            $table->string('archivo_pdf'); // ruta del certificado generado
            $table->string('firma_digital')->nullable(); // hash de verificación
            $table->foreignId('emitido_por')->constrained('users')->onDelete('cascade'); // quien emitíó el certificado
            $table->boolean('es_oficial')->default(true);
            $table->enum('estado', ['activo', 'anulado', 'reemplazado'])->default('activo');
            $table->text('observaciones')->nullable();
            $table->timestamps();
            
            // Índices
            $table->index(['estudiante_id', 'ano_lectivo']);
            $table->index(['colegio_id', 'curso_id']);
            $table->index('codigo_certificado');
            $table->index(['tipo', 'fecha_emision']);
            $table->index('estado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificados');
    }
};
