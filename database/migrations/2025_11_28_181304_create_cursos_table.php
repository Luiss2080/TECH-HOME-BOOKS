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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('colegio_id')->constrained('colegios')->onDelete('cascade');
            $table->string('nombre'); // ej: "5to de Secundaria - Sección A"
            $table->string('nivel'); // primaria, secundaria
            $table->string('grado'); // 1ro, 2do, 3ro, etc.
            $table->string('seccion')->nullable(); // A, B, C, etc.
            $table->enum('turno', ['mañana', 'tarde', 'noche'])->default('mañana');
            $table->string('aula')->nullable();
            $table->year('ano_lectivo');
            $table->integer('cupo_maximo')->default(30);
            $table->enum('estado', ['activo', 'inactivo', 'finalizado'])->default('activo');
            $table->text('descripcion')->nullable();
            $table->timestamps();
            
            // Índices
            $table->index(['colegio_id', 'estado']);
            $table->index(['nivel', 'grado']);
            $table->index('ano_lectivo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
