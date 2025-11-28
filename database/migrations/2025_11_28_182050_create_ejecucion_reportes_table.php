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
        Schema::create('ejecucion_reportes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reporte_id')->constrained('reportes')->onDelete('cascade');
            $table->foreignId('ejecutado_por')->constrained('users')->onDelete('cascade');
            $table->datetime('fecha_ejecucion');
            $table->datetime('fecha_inicio')->nullable();
            $table->datetime('fecha_fin')->nullable();
            $table->enum('estado', ['pendiente', 'procesando', 'completado', 'error', 'cancelado'])->default('pendiente');
            $table->integer('registros_procesados')->default(0);
            $table->string('archivo_generado')->nullable(); // ruta del archivo generado
            $table->bigInteger('tamano_archivo')->nullable(); // tamaño en bytes
            $table->text('mensaje_error')->nullable();
            $table->json('parametros_utilizados')->nullable();
            $table->boolean('enviado_email')->default(false);
            $table->timestamps();
            
            // Índices
            $table->index(['reporte_id', 'fecha_ejecucion']);
            $table->index(['ejecutado_por', 'estado']);
            $table->index('fecha_ejecucion');
            $table->index('estado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejecucion_reportes');
    }
};
