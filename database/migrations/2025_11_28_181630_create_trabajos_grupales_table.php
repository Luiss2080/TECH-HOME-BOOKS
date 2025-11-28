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
        Schema::create('trabajos_grupales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tarea_id')->nullable()->constrained('tareas')->onDelete('cascade');
            $table->foreignId('proyecto_id')->nullable()->constrained('proyectos')->onDelete('cascade');
            $table->string('nombre_grupo');
            $table->foreignId('lider_grupo_id')->constrained('estudiantes')->onDelete('cascade');
            $table->json('integrantes'); // array de IDs de estudiantes
            $table->text('descripcion_trabajo')->nullable();
            $table->enum('estado', ['formado', 'en_desarrollo', 'entregado', 'calificado'])->default('formado');
            $table->decimal('calificacion_grupal', 5, 2)->nullable();
            $table->json('calificaciones_individuales')->nullable();
            $table->text('observaciones_docente')->nullable();
            $table->timestamps();
            
            // Índices y restricciones
            $table->index(['tarea_id', 'estado']);
            $table->index(['proyecto_id', 'estado']);
            $table->index('lider_grupo_id');
            // Asegurar que el trabajo grupal pertenezca a una tarea O a un proyecto
            $table->check('(tarea_id IS NOT NULL AND proyecto_id IS NULL) OR (tarea_id IS NULL AND proyecto_id IS NOT NULL)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajos_grupales');
    }
};
