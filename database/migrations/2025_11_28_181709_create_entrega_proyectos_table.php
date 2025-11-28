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
        Schema::create('entrega_proyectos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyecto_id')->constrained('proyectos')->onDelete('cascade');
            $table->foreignId('estudiante_id')->nullable()->constrained('estudiantes')->onDelete('cascade');
            $table->foreignId('trabajo_grupal_id')->nullable()->constrained('trabajos_grupales')->onDelete('cascade');
            $table->string('titulo_entrega');
            $table->text('descripcion_entrega');
            $table->json('archivos_adjuntos')->nullable();
            $table->text('presentacion_url')->nullable(); // URL de presentación online
            $table->datetime('fecha_entrega');
            $table->decimal('calificacion', 5, 2)->nullable();
            $table->json('calificacion_por_criterios')->nullable(); // calificación detallada según rúbrica
            $table->text('feedback_docente')->nullable();
            $table->enum('estado', ['entregado', 'en_revision', 'presentado', 'calificado'])->default('entregado');
            $table->datetime('fecha_presentacion')->nullable();
            $table->decimal('nota_presentacion', 5, 2)->nullable();
            $table->timestamps();
            
            // Índices y restricciones
            $table->index(['proyecto_id', 'estado']);
            $table->index('fecha_entrega');
            $table->unique(['proyecto_id', 'estudiante_id', 'trabajo_grupal_id']);
            $table->check('(estudiante_id IS NOT NULL AND trabajo_grupal_id IS NULL) OR (estudiante_id IS NULL AND trabajo_grupal_id IS NOT NULL)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrega_proyectos');
    }
};
