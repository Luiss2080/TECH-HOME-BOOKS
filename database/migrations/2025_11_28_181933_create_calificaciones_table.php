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
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiante_id')->constrained('estudiantes')->onDelete('cascade');
            $table->foreignId('materia_id')->constrained('materias')->onDelete('cascade');
            $table->foreignId('docente_id')->constrained('docentes')->onDelete('cascade');
            // Referencia polimórfica para diferentes tipos de evaluación
            $table->morphs('evaluacion'); // evaluacion_type, evaluacion_id
            $table->string('tipo_evaluacion'); // 'tarea', 'examen', 'proyecto', 'participacion', 'conducta'
            $table->decimal('nota', 5, 2);
            $table->decimal('nota_maxima', 5, 2)->default(100.00);
            $table->decimal('porcentaje_nota', 5, 2)->nullable(); // qué % representa del total de la materia
            $table->string('periodo_academico'); // 'bimestre_1', 'trimestre_2', etc.
            $table->date('fecha_evaluacion');
            $table->text('observaciones_docente')->nullable();
            $table->boolean('es_recuperacion')->default(false);
            $table->foreignId('calificacion_original_id')->nullable()->constrained('calificaciones')->onDelete('set null');
            $table->enum('estado', ['borrador', 'definitiva', 'anulada'])->default('definitiva');
            $table->timestamps();
            
            // Índices (morphs ya crea automáticamente el índice para evaluacion_type, evaluacion_id)
            $table->index(['estudiante_id', 'materia_id', 'periodo_academico']);
            $table->index(['docente_id', 'fecha_evaluacion']);
            $table->index('tipo_evaluacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calificaciones');
    }
};
