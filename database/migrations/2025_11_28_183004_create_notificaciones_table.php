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
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // usuario que recibe la notificación
            $table->foreignId('emisor_id')->nullable()->constrained('users')->onDelete('set null'); // usuario que envía (puede ser sistema)
            $table->string('titulo');
            $table->text('mensaje');
            $table->string('tipo')->default('info'); // 'info', 'success', 'warning', 'error', 'tarea', 'calificacion', etc.
            $table->string('modulo')->nullable(); // módulo que generó la notificación
            $table->json('datos_adicionales')->nullable(); // datos extra como IDs, enlaces, etc.
            $table->boolean('leida')->default(false);
            $table->timestamp('leida_en')->nullable();
            $table->boolean('email_enviado')->default(false);
            $table->timestamp('email_enviado_en')->nullable();
            $table->string('prioridad')->default('normal'); // 'baja', 'normal', 'alta', 'urgente'
            $table->timestamp('expira_en')->nullable(); // fecha de expiración de la notificación
            $table->timestamps();
            
            // Índices
            $table->index(['user_id', 'leida']);
            $table->index(['user_id', 'tipo']);
            $table->index(['emisor_id', 'created_at']);
            $table->index('modulo');
            $table->index(['prioridad', 'leida']);
            $table->index('expira_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificaciones');
    }
};