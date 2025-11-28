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
        Schema::create('mantenimiento_recursos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recurso_educativo_id')->constrained('recursos_educativos')->onDelete('cascade');
            $table->foreignId('reportado_por')->constrained('users')->onDelete('cascade');
            $table->foreignId('asignado_a')->nullable()->constrained('users')->onDelete('set null');
            $table->enum('tipo_mantenimiento', ['preventivo', 'correctivo', 'emergencia', 'actualizacion'])->default('correctivo');
            $table->text('descripcion_problema');
            $table->text('solucion')->nullable();
            $table->date('fecha_reporte');
            $table->date('fecha_inicio_mantenimiento')->nullable();
            $table->date('fecha_fin_mantenimiento')->nullable();
            $table->decimal('costo', 10, 2)->nullable();
            $table->enum('prioridad', ['baja', 'media', 'alta', 'critica'])->default('media');
            $table->enum('estado', ['reportado', 'en_proceso', 'completado', 'cancelado'])->default('reportado');
            $table->text('observaciones')->nullable();
            $table->timestamps();
            
            // Índices
            $table->index(['recurso_educativo_id', 'estado']);
            $table->index(['asignado_a', 'prioridad']);
            $table->index('fecha_reporte');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimiento_recursos');
    }
};
