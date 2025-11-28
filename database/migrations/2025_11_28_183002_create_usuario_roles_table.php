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
        Schema::create('usuario_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('rol_id')->constrained('roles')->onDelete('cascade');
            $table->foreignId('colegio_id')->nullable()->constrained('colegios')->onDelete('cascade'); // rol específico por colegio
            $table->date('fecha_asignacion');
            $table->date('fecha_expiracion')->nullable(); // si el rol tiene vencimiento
            $table->boolean('activo')->default(true);
            $table->text('observaciones')->nullable();
            $table->timestamps();
            
            // Índices únicos - un usuario no puede tener el mismo rol duplicado en el mismo colegio
            $table->unique(['user_id', 'rol_id', 'colegio_id']);
            $table->index(['user_id', 'activo']);
            $table->index(['rol_id', 'activo']);
            $table->index('colegio_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_roles');
    }
};