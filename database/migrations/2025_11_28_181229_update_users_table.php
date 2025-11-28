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
        Schema::table('users', function (Blueprint $table) {
            // Campos adicionales para usuarios
            $table->string('apellido')->nullable()->after('name');
            $table->string('ci')->unique()->nullable()->after('apellido');
            $table->date('fecha_nacimiento')->nullable()->after('ci');
            $table->string('telefono')->nullable()->after('fecha_nacimiento');
            $table->text('direccion')->nullable()->after('telefono');
            $table->string('avatar')->nullable()->after('direccion');
            $table->enum('rol', ['admin', 'docente', 'estudiante'])->default('estudiante')->after('avatar');
            $table->enum('estado', ['activo', 'inactivo', 'suspendido'])->default('activo')->after('rol');
            $table->json('configuracion_notificaciones')->nullable()->after('estado');
            $table->timestamp('ultimo_acceso')->nullable()->after('configuracion_notificaciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'apellido',
                'ci', 
                'fecha_nacimiento',
                'telefono',
                'direccion',
                'avatar',
                'rol',
                'estado',
                'configuracion_notificaciones',
                'ultimo_acceso'
            ]);
        });
    }
};
