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
        Schema::create('rol_permisos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rol_id')->constrained('roles')->onDelete('cascade');
            $table->foreignId('permiso_id')->constrained('permisos')->onDelete('cascade');
            $table->boolean('permitir')->default(true); // true = permitir, false = denegar explícitamente
            $table->text('condiciones')->nullable(); // condiciones adicionales en JSON
            $table->timestamps();
            
            // Índices únicos - un rol no puede tener el mismo permiso duplicado
            $table->unique(['rol_id', 'permiso_id']);
            $table->index(['rol_id', 'permitir']);
            $table->index('permiso_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rol_permisos');
    }
};