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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('colegio_id')->constrained('colegios')->onDelete('cascade');
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade');
            $table->string('codigo_estudiante')->unique();
            $table->string('tutor_nombre')->nullable();
            $table->string('tutor_telefono')->nullable();
            $table->string('tutor_email')->nullable();
            $table->enum('estado_academico', ['activo', 'retirado', 'egresado', 'transferido'])->default('activo');
            $table->date('fecha_inscripcion');
            $table->text('observaciones')->nullable();
            $table->json('historial_academico')->nullable();
            $table->timestamps();
            
            // Índices
            $table->index(['colegio_id', 'curso_id']);
            $table->index('codigo_estudiante');
            $table->index('estado_academico');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
