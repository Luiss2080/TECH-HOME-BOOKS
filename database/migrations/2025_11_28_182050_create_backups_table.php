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
        Schema::create('backups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('creado_por')->nullable()->constrained('users')->onDelete('set null');
            $table->string('nombre_archivo');
            $table->string('ruta_archivo');
            $table->enum('tipo', ['completo', 'incremental', 'diferencial'])->default('completo');
            $table->enum('origen', ['manual', 'automatico', 'programado'])->default('manual');
            $table->bigInteger('tamano_archivo'); // tamaño en bytes
            $table->datetime('fecha_backup');
            $table->datetime('fecha_inicio')->nullable();
            $table->datetime('fecha_fin')->nullable();
            $table->enum('estado', ['iniciando', 'procesando', 'completado', 'error', 'cancelado'])->default('iniciando');
            $table->json('tablas_incluidas')->nullable(); // qué tablas se incluyeron
            $table->text('descripcion')->nullable();
            $table->text('mensaje_error')->nullable();
            $table->string('checksum')->nullable(); // verificación de integridad
            $table->boolean('comprimido')->default(true);
            $table->string('ubicacion_almacenamiento')->default('local'); // 'local', 'cloud', 's3', etc.
            $table->date('fecha_expiracion')->nullable();
            $table->boolean('verificado')->default(false);
            $table->timestamps();
            
            // Índices
            $table->index(['fecha_backup', 'tipo']);
            $table->index(['estado', 'origen']);
            $table->index('fecha_expiracion');
            $table->index('checksum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backups');
    }
};
