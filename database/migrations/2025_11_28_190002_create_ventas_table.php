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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('numero_venta', 20);
            $table->foreignId('libro_id')->constrained('libros')->onDelete('restrict');
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('descuento', 10, 2)->default(0.00);
            $table->decimal('subtotal', 10, 2);
            $table->decimal('total', 10, 2);
            $table->string('cliente_nombre', 200)->nullable();
            $table->string('cliente_contacto', 150)->nullable();
            $table->enum('metodo_pago', ['EFECTIVO', 'TARJETA', 'TRANSFERENCIA'])->default('EFECTIVO');
            $table->enum('estado', ['PENDIENTE', 'COMPLETADA', 'ANULADA'])->default('PENDIENTE');
            $table->foreignId('usuario_id')->constrained('users')->onDelete('restrict');
            $table->timestamp('fecha_venta')->useCurrent();
            $table->text('observaciones')->nullable();
            
            // Índices
            $table->index('numero_venta');
            $table->index('estado');
            $table->index('metodo_pago');
            $table->index('fecha_venta');
            $table->index(['libro_id', 'estado']);
            $table->index(['usuario_id', 'fecha_venta']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
