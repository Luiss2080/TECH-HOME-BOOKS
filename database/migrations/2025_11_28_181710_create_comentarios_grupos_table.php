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
        Schema::create('comentarios_grupos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trabajo_grupal_id')->constrained('trabajos_grupales')->onDelete('cascade');
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade'); // estudiante o docente
            $table->text('comentario');
            $table->json('archivos_adjuntos')->nullable();
            $table->boolean('es_privado')->default(false); // si es privado solo lo ve el docente
            $table->boolean('es_importante')->default(false);
            $table->foreignId('respondiendo_a')->nullable()->constrained('comentarios_grupos')->onDelete('cascade');
            $table->timestamps();
            
            // Índices
            $table->index(['trabajo_grupal_id', 'created_at']);
            $table->index(['usuario_id', 'es_privado']);
            $table->index('respondiendo_a');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios_grupos');
    }
};
