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
        Schema::create('configuraciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('colegio_id')->nullable()->constrained('colegios')->onDelete('cascade');
            $table->string('clave')->unique();
            $table->text('valor');
            $table->string('tipo')->default('string'); // 'string', 'integer', 'boolean', 'json', 'float'
            $table->text('descripcion')->nullable();
            $table->string('categoria')->default('general'); // 'general', 'academico', 'notificaciones', etc.
            $table->boolean('es_global')->default(true); // si aplica a todo el sistema o solo al colegio
            $table->boolean('es_editable')->default(true);
            $table->text('opciones_validas')->nullable(); // valores permitidos (JSON)
            $table->timestamps();
            
            // Índices
            $table->index(['colegio_id', 'categoria']);
            $table->index(['es_global', 'categoria']);
            $table->index('clave');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuraciones');
    }
};
