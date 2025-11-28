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
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade');
            $table->string('nombre');
            $table->string('codigo')->unique(); // código único de la materia
            $table->text('descripcion')->nullable();
            $table->integer('horas_semanales')->default(4);
            $table->json('objetivos')->nullable(); // objetivos de aprendizaje
            $table->string('color')->default('#007bff'); // color para identificación visual
            $table->enum('estado', ['activa', 'inactiva'])->default('activa');
            $table->timestamps();
            
            // Índices
            $table->index(['curso_id', 'estado']);
            $table->index('codigo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
