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
        Schema::create('hitos_proyectos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyecto_id')->constrained('proyectos')->onDelete('cascade');
            $table->string('titulo');
            $table->text('descripcion');
            $table->date('fecha_limite');
            $table->decimal('porcentaje_proyecto', 5, 2)->default(0.00); // qué % del proyecto representa
            $table->integer('orden')->default(1);
            $table->enum('estado', ['pendiente', 'en_desarrollo', 'completado', 'retrasado'])->default('pendiente');
            $table->text('criterios_evaluacion')->nullable();
            $table->boolean('es_obligatorio')->default(true);
            $table->timestamps();
            
            // Índices
            $table->index(['proyecto_id', 'orden']);
            $table->index(['fecha_limite', 'estado']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hitos_proyectos');
    }
};
