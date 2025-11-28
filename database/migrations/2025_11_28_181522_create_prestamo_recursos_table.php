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
        Schema::create('prestamo_recursos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recurso_educativo_id')->constrained('recursos_educativos')->onDelete('cascade');
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade'); // puede ser docente o estudiante
            $table->foreignId('autorizado_por')->constrained('users')->onDelete('cascade'); // admin o docente que autoriza
            $table->datetime('fecha_prestamo');
            $table->datetime('fecha_devolucion_esperada');
            $table->datetime('fecha_devolucion_real')->nullable();
            $table->enum('estado', ['activo', 'devuelto', 'vencido', 'perdido'])->default('activo');
            $table->text('observaciones_prestamo')->nullable();
            $table->text('observaciones_devolucion')->nullable();
            $table->text('condiciones_prestamo')->nullable();
            $table->timestamps();
            
            // Índices
            $table->index(['recurso_educativo_id', 'estado']);
            $table->index(['usuario_id', 'fecha_prestamo']);
            $table->index('fecha_devolucion_esperada');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamo_recursos');
    }
};
