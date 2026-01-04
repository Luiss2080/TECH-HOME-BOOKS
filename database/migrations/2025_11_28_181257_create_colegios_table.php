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
            $table->string('nombre_colegio', 300);
            $table->text('direccion')->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('departamento', 100);
            $table->string('nacionalidad', 100)->default('Bolivia');
            $table->boolean('activo')->default(true);
            $table->timestamp('fecha_registro')->useCurrent();
            $table->unsignedBigInteger('usuario_registro')->nullable();
            
            // Índices
            $table->index('nombre_colegio');
            $table->index('departamento');
            $table->index('nacionalidad');
            $table->index('activo');
            $table->index('usuario_registro');
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
