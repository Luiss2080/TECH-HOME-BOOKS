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
        Schema::create('examenes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materia_id')->constrained('materias')->onDelete('cascade');
            $table->foreignId('docente_id')->constrained('docentes')->onDelete('cascade');
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->text('instrucciones')->nullable();
            $table->enum('tipo', ['teorico', 'practico', 'virtual', 'oral'])->default('teorico');
            $table->datetime('fecha_examen');
            $table->integer('duracion_minutos')->default(60);
            $table->decimal('puntuacion_total', 5, 2)->default(100.00);
            $table->enum('modalidad', ['presencial', 'virtual', 'mixta'])->default('presencial');
            $table->string('aula')->nullable();
            $table->text('materiales_permitidos')->nullable();
            $table->boolean('tiene_banco_preguntas')->default(false);
            $table->boolean('calificacion_automatica')->default(false);
            $table->enum('estado', ['programado', 'en_curso', 'finalizado', 'cancelado'])->default('programado');
            $table->json('configuracion_adicional')->nullable();
            $table->timestamps();
            
            // Índices
            $table->index(['materia_id', 'estado']);
            $table->index(['docente_id', 'fecha_examen']);
            $table->index('fecha_examen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examenes');
    }
};
