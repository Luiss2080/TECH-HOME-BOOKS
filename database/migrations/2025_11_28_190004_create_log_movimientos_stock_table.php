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
        Schema::create('log_movimientos_stock', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_operacion', ['ENTRADA', 'VENTA', 'AJUSTE', 'CORRECCION']);
            $table->unsignedBigInteger('referencia_id');
            $table->string('referencia_tabla', 50);
            $table->foreignId('libro_id')->constrained('libros')->onDelete('restrict');
            $table->string('libro_codigo', 20)->nullable();
            $table->string('libro_titulo', 200)->nullable();
            $table->integer('cantidad_anterior');
            $table->integer('cantidad_movimiento');
            $table->integer('cantidad_nueva');
            $table->decimal('precio_unitario', 10, 2)->nullable();
            $table->decimal('total_operacion', 10, 2)->nullable();
            $table->string('motivo', 200)->nullable();
            $table->foreignId('usuario_id')->constrained('users')->onDelete('restrict');
            $table->string('usuario_nombre', 100)->nullable();
            $table->timestamp('fecha_log')->useCurrent();
            
            // Índices
            $table->index('tipo_operacion');
            $table->index(['referencia_tabla', 'referencia_id']);
            $table->index(['libro_id', 'tipo_operacion']);
            $table->index('fecha_log');
            $table->index(['usuario_id', 'fecha_log']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_movimientos_stock');
    }
};
