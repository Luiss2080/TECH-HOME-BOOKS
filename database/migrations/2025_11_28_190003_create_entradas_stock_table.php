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
        Schema::create('entradas_stock', function (Blueprint $table) {
            $table->id();
            $table->string('numero_entrada', 20);
            $table->foreignId('libro_id')->constrained('libros')->onDelete('restrict');
            $table->integer('cantidad_ingresada');
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('total_entrada', 10, 2);
            $table->string('motivo_entrada', 200);
            $table->text('observaciones')->nullable();
            $table->enum('estado', ['PENDIENTE', 'CONFIRMADA', 'ANULADA'])->default('PENDIENTE');
            $table->enum('tipo_entrada', ['COMPRA', 'DEVOLUCION', 'AJUSTE', 'CORRECCION'])->default('COMPRA');
            $table->foreignId('usuario_id')->constrained('users')->onDelete('restrict');
            $table->timestamp('fecha_entrada')->useCurrent();
            
            // Índices
            $table->unique('numero_entrada');
            $table->index('estado');
            $table->index('tipo_entrada');
            $table->index('fecha_entrada');
            $table->index(['libro_id', 'estado']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas_stock');
    }
};
