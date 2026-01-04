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
        Schema::create('impresiones_ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venta_id')->constrained('ventas')->onDelete('cascade');
            $table->foreignId('usuario_id')->constrained('users')->onDelete('restrict');
            $table->timestamp('fecha_impresion')->useCurrent();
            $table->string('ip_address', 45)->nullable();
            
            // Índices
            $table->index('fecha_impresion');
            $table->index(['venta_id', 'fecha_impresion']);
            $table->index(['usuario_id', 'fecha_impresion']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('impresiones_ventas');
    }
};
