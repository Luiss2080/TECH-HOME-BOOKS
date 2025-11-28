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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materia_id')->constrained('materias')->onDelete('cascade');
            $table->foreignId('docente_id')->constrained('docentes')->onDelete('cascade');
            $table->string('titulo');
            $table->text('descripcion');
            $table->text('instrucciones')->nullable();
            $table->string('archivo_adjunto')->nullable(); // archivo con instrucciones adicionales
            $table->datetime('fecha_publicacion');
            $table->datetime('fecha_entrega');
            $table->decimal('puntuacion_maxima', 5, 2)->default(100.00);
            $table->enum('tipo', ['individual', 'grupal'])->default('individual');
            $table->boolean('permite_entrega_tardia')->default(false);
            $table->integer('penalizacion_tardia')->default(0); // porcentaje de penalización
            $table->enum('estado', ['borrador', 'publicada', 'finalizada', 'cancelada'])->default('borrador');
            $table->json('criterios_evaluacion')->nullable();
            $table->timestamps();
            
            // Índices
            $table->index(['materia_id', 'estado']);
            $table->index(['docente_id', 'fecha_publicacion']);
            $table->index('fecha_entrega');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
