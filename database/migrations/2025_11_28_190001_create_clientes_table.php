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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_cliente', 20);
            $table->string('nombre_completo', 200);
            $table->enum('tipo_cliente', ['PERSONA', 'INSTITUCION'])->default('PERSONA');
            $table->string('ci_nit', 50)->nullable();
            $table->string('telefono', 20);
            $table->string('email', 150);
            $table->text('direccion')->nullable();
            $table->foreignId('colegio_id')->nullable()->constrained('colegios')->onDelete('set null');
            $table->string('nacionalidad', 100)->default('Bolivia');
            $table->string('departamento', 100)->default('Santa Cruz');
            $table->text('observaciones')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamp('fecha_registro')->useCurrent();
            
            // Índices
            $table->unique('codigo_cliente');
            $table->index('tipo_cliente');
            $table->index('nacionalidad');
            $table->index('departamento');
            $table->index('activo');
            $table->index('colegio_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
