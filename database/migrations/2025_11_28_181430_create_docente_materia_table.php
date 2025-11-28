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
        Schema::create('docente_materia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('docente_id')->constrained('docentes')->onDelete('cascade');
            $table->foreignId('materia_id')->constrained('materias')->onDelete('cascade');
            $table->year('ano_lectivo');
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();
            
            // Índices únicos
            $table->unique(['docente_id', 'materia_id', 'ano_lectivo']);
            $table->index(['materia_id', 'estado']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docente_materia');
    }
};
