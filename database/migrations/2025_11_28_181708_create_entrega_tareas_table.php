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
        Schema::create('entrega_tareas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tarea_id')->constrained('tareas')->onDelete('cascade');
            $table->foreignId('estudiante_id')->nullable()->constrained('estudiantes')->onDelete('cascade');
            $table->foreignId('trabajo_grupal_id')->nullable()->constrained('trabajos_grupales')->onDelete('cascade');
            $table->text('comentario_estudiante')->nullable();
            $table->json('archivos_adjuntos')->nullable(); // rutas de archivos
            $table->datetime('fecha_entrega');
            $table->boolean('entrega_tardia')->default(false);
            $table->decimal('calificacion', 5, 2)->nullable();
            $table->text('feedback_docente')->nullable();
            $table->enum('estado', ['entregada', 'revisada', 'calificada', 'rechazada'])->default('entregada');
            $table->datetime('fecha_calificacion')->nullable();
            $table->timestamps();
            
            // Índices y restricciones
            $table->index(['tarea_id', 'estado']);
            $table->index(['estudiante_id', 'fecha_entrega']);
            $table->unique(['tarea_id', 'estudiante_id', 'trabajo_grupal_id']);
            // Asegurar que la entrega pertenezca a un estudiante O a un trabajo grupal
            $table->check('(estudiante_id IS NOT NULL AND trabajo_grupal_id IS NULL) OR (estudiante_id IS NULL AND trabajo_grupal_id IS NOT NULL)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrega_tareas');
    }
};
