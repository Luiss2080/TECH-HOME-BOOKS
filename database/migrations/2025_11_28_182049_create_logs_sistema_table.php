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
        Schema::create('logs_sistema', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('accion'); // 'crear', 'editar', 'eliminar', 'login', 'logout', etc.
            $table->string('modulo'); // 'usuarios', 'tareas', 'calificaciones', etc.
            $table->string('tabla_afectada')->nullable();
            $table->unsignedBigInteger('registro_id')->nullable(); // ID del registro afectado
            $table->json('datos_anteriores')->nullable(); // estado anterior del registro
            $table->json('datos_nuevos')->nullable(); // nuevo estado del registro
            $table->text('descripcion')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->enum('nivel', ['info', 'warning', 'error', 'critical'])->default('info');
            $table->boolean('requiere_revision')->default(false);
            $table->timestamps();
            
            // Índices
            $table->index(['usuario_id', 'created_at']);
            $table->index(['accion', 'modulo']);
            $table->index(['tabla_afectada', 'registro_id']);
            $table->index(['nivel', 'created_at']);
            $table->index('ip_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs_sistema');
    }
};
