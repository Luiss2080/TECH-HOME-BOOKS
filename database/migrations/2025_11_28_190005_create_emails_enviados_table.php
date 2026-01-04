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
        Schema::create('emails_enviados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venta_id')->constrained('ventas')->onDelete('cascade');
            $table->string('email_destino', 255);
            $table->string('numero_venta', 50);
            $table->string('asunto', 255);
            $table->enum('estado', ['ENVIADO', 'FALLIDO', 'PENDIENTE'])->default('PENDIENTE');
            $table->integer('intentos')->default(1);
            $table->text('error_mensaje')->nullable();
            $table->string('pdf_ruta_temporal', 500)->nullable();
            $table->decimal('tamano_pdf_kb', 10, 2)->nullable();
            $table->timestamp('fecha_envio')->useCurrent();
            $table->timestamp('fecha_ultimo_intento')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->foreignId('usuario_id')->nullable()->constrained('users')->onDelete('set null');
            
            // Índices
            $table->index('estado');
            $table->index('fecha_envio');
            $table->index(['venta_id', 'estado']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emails_enviados');
    }
};
