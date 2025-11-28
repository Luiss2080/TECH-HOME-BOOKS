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
        Schema::create('entrega_hitos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hito_proyecto_id')->constrained('hitos_proyectos')->onDelete('cascade');
            $table->foreignId('estudiante_id')->nullable()->constrained('estudiantes')->onDelete('cascade');
            $table->foreignId('trabajo_grupal_id')->nullable()->constrained('trabajos_grupales')->onDelete('cascade');
            $table->text('descripcion_avance');
            $table->json('archivos_adjuntos')->nullable();
            $table->datetime('fecha_entrega');
            $table->decimal('calificacion', 5, 2)->nullable();
            $table->text('feedback_docente')->nullable();
            $table->enum('estado', ['entregado', 'aprobado', 'rechazado', 'requiere_revision'])->default('entregado');
            $table->integer('porcentaje_completado')->default(0); // del 0 al 100
            $table->text('observaciones')->nullable();
            $table->timestamps();
            
            // Índices y restricciones
            $table->index(['hito_proyecto_id', 'estado']);
            $table->index('fecha_entrega');
            $table->unique(['hito_proyecto_id', 'estudiante_id', 'trabajo_grupal_id']);
            $table->check('(estudiante_id IS NOT NULL AND trabajo_grupal_id IS NULL) OR (estudiante_id IS NULL AND trabajo_grupal_id IS NOT NULL)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrega_hitos');
    }
};
