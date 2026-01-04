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
        Schema::create('control_prueba_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->nullable()->constrained('users')->onDelete('set null');
            $table->integer('minutes_requested');
            $table->text('message')->nullable();
            $table->string('estado', 20)->default('pendiente');
            $table->timestamp('creado_en')->useCurrent();
            $table->timestamp('procesado_en')->nullable();
            $table->foreignId('procesado_por')->nullable()->constrained('users')->onDelete('set null');
            
            // Índices
            $table->index('estado');
            $table->index('creado_en');
            $table->index(['usuario_id', 'estado']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('control_prueba_requests');
    }
};
