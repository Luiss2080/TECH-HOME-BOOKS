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
        Schema::create('materiales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materia_id')->constrained('materias')->onDelete('cascade');
            $table->foreignId('docente_id')->constrained('docentes')->onDelete('cascade');
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->enum('tipo', ['pdf', 'video', 'presentacion', 'documento', 'imagen', 'audio', 'enlace'])->default('pdf');
            $table->string('archivo')->nullable(); // ruta del archivo
            $table->string('url_externa')->nullable(); // para enlaces externos
            $table->bigInteger('tamaño_archivo')->nullable(); // en bytes
            $table->json('etiquetas')->nullable(); // tags para categorizar
            $table->json('cursos_destinatarios')->nullable(); // cursos específicos
            $table->date('fecha_publicacion');
            $table->integer('descargas')->default(0);
            $table->integer('visualizaciones')->default(0);
            $table->enum('estado', ['activo', 'inactivo', 'borrador'])->default('activo');
            $table->timestamps();
            
            // Índices
            $table->index(['materia_id', 'tipo', 'estado']);
            $table->index(['docente_id', 'fecha_publicacion']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiales');
    }
};
