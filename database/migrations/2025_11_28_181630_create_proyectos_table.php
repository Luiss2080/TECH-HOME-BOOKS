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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materia_id')->constrained('materias')->onDelete('cascade');
            $table->foreignId('docente_id')->constrained('docentes')->onDelete('cascade');
            $table->string('titulo');
            $table->text('descripcion');
            $table->json('objetivos'); // objetivos del proyecto
            $table->text('recursos_necesarios')->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_entrega');
            $table->decimal('puntuacion_maxima', 5, 2)->default(100.00);
            $table->enum('tipo', ['individual', 'grupal'])->default('individual');
            $table->boolean('requiere_presentacion')->default(false);
            $table->date('fecha_presentacion')->nullable();
            $table->json('rubrica_evaluacion')->nullable();
            $table->boolean('tiene_hitos')->default(false);
            $table->enum('estado', ['planificado', 'en_desarrollo', 'en_revision', 'completado', 'cancelado'])->default('planificado');
            $table->text('observaciones')->nullable();
            $table->timestamps();
            
            // Índices
            $table->index(['materia_id', 'estado']);
            $table->index(['docente_id', 'fecha_inicio']);
            $table->index(['fecha_entrega', 'estado']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
