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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materia_id')->nullable()->constrained('materias')->onDelete('set null');
            $table->string('titulo');
            $table->string('autor');
            $table->string('editorial')->nullable();
            $table->string('isbn')->unique()->nullable();
            $table->year('ano_publicacion')->nullable();
            $table->string('categoria');
            $table->text('descripcion')->nullable();
            $table->string('portada')->nullable();
            $table->string('archivo_pdf'); // ruta del archivo PDF
            $table->integer('numero_paginas')->nullable();
            $table->string('idioma')->default('es');
            $table->enum('nivel_educativo', ['primaria', 'secundaria', 'superior'])->nullable();
            $table->enum('disponibilidad', ['publico', 'por_curso', 'por_materia', 'restringido'])->default('publico');
            $table->integer('descargas')->default(0);
            $table->boolean('destacado')->default(false);
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();
            
            // Índices
            $table->index(['categoria', 'estado']);
            $table->index(['materia_id', 'disponibilidad']);
            $table->index('isbn');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
