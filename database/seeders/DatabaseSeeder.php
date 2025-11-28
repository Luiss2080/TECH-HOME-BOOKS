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
            // Configuraciones base del sistema
            ConfiguracionesSeeder::class,
            
            // Sistema de roles y permisos
            RolesPermisosSeeder::class,
            
            // Datos de usuarios e instituciones
            UsersSeeder::class,
            ColegiosSeeder::class,
            CursosSeeder::class,
            MateriasSeeder::class,
            
            // Períodos académicos
            PeriodosAcademicosSeeder::class,
            
            // Usuarios específicos del sistema
            DocentesSeeder::class,
            EstudiantesSeeder::class,
        ]);
    }
}
