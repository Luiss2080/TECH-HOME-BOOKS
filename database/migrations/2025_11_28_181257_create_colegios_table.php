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
        Schema::create('colegios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('logo')->nullable();
            $table->text('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('director')->nullable();
            $table->json('niveles_educativos')->nullable(); // ['primaria', 'secundaria', etc.]
            $table->year('ano_lectivo_actual');
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->json('configuracion_personalizada')->nullable();
            $table->text('descripcion')->nullable();
            $table->timestamps();
            
            // Índices
            $table->index('estado');
            $table->index('ano_lectivo_actual');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colegios');
    }
};
