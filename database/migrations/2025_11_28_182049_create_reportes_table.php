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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('creado_por')->constrained('users')->onDelete('cascade');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->enum('tipo', ['academico', 'asistencia', 'estadistico', 'financiero', 'recursos', 'personalizado'])->default('academico');
            $table->json('parametros'); // parámetros del reporte (fechas, cursos, materias, etc.)
            $table->text('consulta_sql')->nullable(); // para reportes personalizados
            $table->json('campos_mostrar'); // qué campos incluir en el reporte
            $table->enum('formato_salida', ['pdf', 'excel', 'csv', 'html'])->default('pdf');
            $table->boolean('es_programado')->default(false);
            $table->string('frecuencia_programacion')->nullable(); // 'diario', 'semanal', 'mensual'
            $table->time('hora_ejecucion')->nullable();
            $table->json('destinatarios_email')->nullable(); // emails para envío automático
            $table->boolean('activo')->default(true);
            $table->timestamps();
            
            // Índices
            $table->index(['creado_por', 'tipo']);
            $table->index(['es_programado', 'activo']);
            $table->index('nombre');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};
