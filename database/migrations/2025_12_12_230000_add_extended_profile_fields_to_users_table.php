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
            $table->string('profesion')->nullable()->after('genero');
            $table->string('nivel_estudios')->nullable()->after('profesion');
            $table->string('website')->nullable()->after('nivel_estudios');
            $table->string('facebook')->nullable()->after('website');
            $table->string('twitter')->nullable()->after('facebook');
            $table->string('linkedin')->nullable()->after('twitter');
            $table->string('instagram')->nullable()->after('linkedin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'profesion',
                'nivel_estudios',
                'website',
                'facebook',
                'twitter',
                'linkedin',
                'instagram'
            ]);
        });
    }
};
