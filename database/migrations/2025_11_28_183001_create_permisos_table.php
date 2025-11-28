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
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique(); // ej: 'crear_tareas', 'ver_calificaciones'
            $table->text('descripcion')->nullable();
            $table->string('modulo'); // 'tareas', 'calificaciones', 'usuarios', etc.
            $table->string('accion'); // 'crear', 'leer', 'actualizar', 'eliminar', 'gestionar'
            $table->string('recurso')->nullable(); // recurso específico si aplica
            $table->boolean('activo')->default(true);
            $table->timestamps();
            
            // Índices
            $table->index('nombre');
            $table->index(['modulo', 'accion']);
            $table->index('activo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permisos');
    }
};