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
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('colegio_id')->constrained('colegios')->onDelete('cascade');
            $table->string('codigo_docente')->unique();
            $table->string('especialidad');
            $table->string('titulo_profesional');
            $table->text('experiencia')->nullable();
            $table->enum('tipo_contrato', ['tiempo_completo', 'medio_tiempo', 'por_horas'])->default('tiempo_completo');
            $table->date('fecha_contratacion');
            $table->enum('estado_laboral', ['activo', 'inactivo', 'licencia', 'vacaciones'])->default('activo');
            $table->decimal('salario', 10, 2)->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
            
            // Índices
            $table->index(['colegio_id', 'estado_laboral']);
            $table->index('codigo_docente');
            $table->index('especialidad');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docentes');
    }
};
