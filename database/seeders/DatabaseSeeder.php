<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ConfiguracionesSeeder::class,
            UsersSeeder::class,
            ColegiosSeeder::class,
            CursosSeeder::class,
            MateriasSeeder::class,
            DocentesSeeder::class,
            EstudiantesSeeder::class,
        ]);
    }
}
