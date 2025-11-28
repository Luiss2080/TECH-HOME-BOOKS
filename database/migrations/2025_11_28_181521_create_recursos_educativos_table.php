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
        Schema::create('recursos_educativos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('colegio_id')->constrained('colegios')->onDelete('cascade');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->enum('tipo', ['equipo', 'libro_fisico', 'laboratorio', 'aula', 'proyector', 'computadora', 'otro'])->default('equipo');
            $table->string('codigo_inventario')->unique();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('numero_serie')->nullable();
            $table->date('fecha_adquisicion')->nullable();
            $table->decimal('valor', 10, 2)->nullable();
            $table->string('ubicacion');
            $table->enum('estado', ['disponible', 'prestado', 'mantenimiento', 'dañado', 'perdido'])->default('disponible');
            $table->boolean('requiere_mantenimiento')->default(false);
            $table->text('observaciones')->nullable();
            $table->timestamps();
            
            // Índices
            $table->index(['colegio_id', 'tipo', 'estado']);
            $table->index('codigo_inventario');
            $table->index('ubicacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recursos_educativos');
    }
};
