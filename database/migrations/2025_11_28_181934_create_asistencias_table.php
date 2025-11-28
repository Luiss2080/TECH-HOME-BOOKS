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
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiante_id')->constrained('estudiantes')->onDelete('cascade');
            $table->foreignId('materia_id')->constrained('materias')->onDelete('cascade');
            $table->foreignId('docente_id')->constrained('docentes')->onDelete('cascade');
            $table->date('fecha');
            $table->time('hora_registro')->nullable();
            $table->enum('estado', ['presente', 'ausente', 'tardanza', 'justificado', 'falta_medica'])->default('presente');
            $table->integer('minutos_tardanza')->default(0);
            $table->text('justificacion')->nullable();
            $table->string('archivo_justificacion')->nullable(); // archivo adjunto de justificación
            $table->boolean('justificacion_aprobada')->default(false);
            $table->text('observaciones')->nullable();
            $table->string('periodo_academico'); // 'bimestre_1', 'trimestre_2', etc.
            $table->timestamps();
            
            // Índices únicos
            $table->unique(['estudiante_id', 'materia_id', 'fecha']);
            $table->index(['materia_id', 'fecha']);
            $table->index(['docente_id', 'fecha']);
            $table->index(['estado', 'fecha']);
            $table->index('periodo_academico');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencias');
    }
};
