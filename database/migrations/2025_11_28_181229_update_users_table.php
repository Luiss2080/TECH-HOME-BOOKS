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
            // Campos adicionales compatibles con systemVentas (tabla usuarios)
            $table->string('apellido', 100)->nullable()->after('name');
            $table->string('numci', 50)->nullable()->after('apellido');
            $table->date('fenac')->nullable()->after('numci');
            $table->string('numtel', 20)->nullable()->after('fenac');
            $table->string('nomcol', 200)->nullable()->after('numtel');
            $table->foreignId('rol_id')->nullable()->after('nomcol')->constrained('roles')->onDelete('restrict');
            $table->boolean('email_verificado')->default(false)->after('email_verified_at');
            $table->boolean('activo')->default(true)->after('email_verificado');
            $table->timestamp('ultimo_acceso')->nullable()->after('remember_token');
            
            // Índices
            $table->index('rol_id');
            $table->index('email_verificado');
            $table->index('activo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['rol_id']);
            $table->dropColumn([
                'apellido',
                'numci',
                'fenac',
                'numtel',
                'nomcol',
                'rol_id',
                'email_verificado',
                'activo',
                'ultimo_acceso'
            ]);
        });
    }
};
