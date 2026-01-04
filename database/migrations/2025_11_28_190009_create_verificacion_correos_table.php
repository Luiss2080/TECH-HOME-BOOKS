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
        Schema::create('verificacion_correos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->string('token', 255);
            $table->timestamp('creado_en')->useCurrent();
            $table->timestamp('expira_en');
            $table->boolean('usado')->default(false);
            $table->timestamp('usado_en')->nullable();
            
            // Índices
            $table->index('token');
            $table->index(['usuario_id', 'usado']);
            $table->index('expira_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verificacion_correos');
    }
};
