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
        Schema::table('calificaciones', function (Blueprint $table) {
            $table->string('evaluacion_type')->nullable()->change();
            $table->unsignedBigInteger('evaluacion_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calificaciones', function (Blueprint $table) {
            $table->string('evaluacion_type')->nullable(false)->change();
            $table->unsignedBigInteger('evaluacion_id')->nullable(false)->change();
        });
    }
};
