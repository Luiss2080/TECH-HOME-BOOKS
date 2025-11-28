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
        Schema::create('calendario_eventos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('colegio_id')->constrained('colegios')->onDelete('cascade');
            $table->foreignId('curso_id')->nullable()->constrained('cursos')->onDelete('cascade');
            $table->foreignId('materia_id')->nullable()->constrained('materias')->onDelete('cascade');
            $table->foreignId('creado_por')->constrained('users')->onDelete('cascade');
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->enum('tipo', ['examen', 'tarea', 'proyecto', 'reunion', 'feriado', 'vacaciones', 'evento_especial', 'capacitacion'])->default('evento_especial');
            $table->datetime('fecha_inicio');
            $table->datetime('fecha_fin')->nullable();
            $table->boolean('todo_el_dia')->default(false);
            $table->string('ubicacion')->nullable();
            $table->string('color', 7)->default('#007bff'); // color en hexadecimal
            $table->enum('visibilidad', ['publico', 'colegio', 'curso', 'materia', 'privado'])->default('publico');
            $table->boolean('recordatorio')->default(false);
            $table->integer('minutos_antes_recordatorio')->default(15);
            $table->boolean('se_repite')->default(false);
            $table->enum('tipo_repeticion', ['diario', 'semanal', 'mensual', 'anual'])->nullable();
            $table->date('repetir_hasta')->nullable();
            $table->timestamps();
            
            // Índices
            $table->index(['colegio_id', 'fecha_inicio']);
            $table->index(['curso_id', 'materia_id']);
            $table->index(['tipo', 'fecha_inicio']);
            $table->index('visibilidad');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendario_eventos');
    }
};
