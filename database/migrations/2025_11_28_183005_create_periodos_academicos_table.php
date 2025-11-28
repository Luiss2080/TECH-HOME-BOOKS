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
        Schema::create('periodos_academicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('colegio_id')->constrained('colegios')->onDelete('cascade');
            $table->string('nombre'); // 'Primer Bimestre', 'Segundo Trimestre', etc.
            $table->string('codigo')->unique(); // 'B1_2025', 'T2_2025', etc.
            $table->enum('tipo', ['bimestre', 'trimestre', 'semestre', 'anual'])->default('bimestre');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->year('ano_lectivo');
            $table->integer('orden')->default(1); // orden del periodo (1, 2, 3, 4)
            $table->boolean('activo')->default(true);
            $table->boolean('es_actual')->default(false); // período académico actual
            $table->text('descripcion')->nullable();
            $table->timestamps();
            
            // Índices
            $table->index(['colegio_id', 'ano_lectivo', 'orden']);
            $table->index(['es_actual', 'activo']);
            $table->index('codigo');
            $table->index(['fecha_inicio', 'fecha_fin']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodos_academicos');
    }
};