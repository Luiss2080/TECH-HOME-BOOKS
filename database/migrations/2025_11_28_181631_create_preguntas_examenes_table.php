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
        Schema::create('preguntas_examenes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('examen_id')->constrained('examenes')->onDelete('cascade');
            $table->text('pregunta');
            $table->enum('tipo_pregunta', ['multiple_choice', 'verdadero_falso', 'texto_libre', 'numero', 'ensayo'])->default('multiple_choice');
            $table->json('opciones')->nullable(); // para preguntas de opción múltiple
            $table->text('respuesta_correcta')->nullable();
            $table->decimal('puntuacion', 5, 2)->default(1.00);
            $table->integer('orden')->default(1);
            $table->text('explicacion')->nullable(); // explicación de la respuesta correcta
            $table->string('imagen')->nullable(); // imagen asociada a la pregunta
            $table->boolean('obligatoria')->default(true);
            $table->timestamps();
            
            // Índices
            $table->index(['examen_id', 'orden']);
            $table->index('tipo_pregunta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preguntas_examenes');
    }
};
