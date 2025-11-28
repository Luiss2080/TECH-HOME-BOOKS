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
        Schema::create('estudiante_materia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiante_id')->constrained('estudiantes')->onDelete('cascade');
            $table->foreignId('materia_id')->constrained('materias')->onDelete('cascade');
            $table->year('ano_lectivo');
            $table->enum('estado', ['inscrito', 'aprobado', 'reprobado', 'retirado'])->default('inscrito');
            $table->decimal('nota_final', 5, 2)->nullable();
            $table->timestamps();
            
            // Índices únicos
            $table->unique(['estudiante_id', 'materia_id', 'ano_lectivo']);
            $table->index(['materia_id', 'estado']);
            $table->index('nota_final');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiante_materia');
    }
};
