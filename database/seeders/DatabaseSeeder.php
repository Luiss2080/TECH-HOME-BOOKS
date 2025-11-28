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
            // 1. Configuraciones base del sistema
            ConfiguracionesSeeder::class,
            
            // 2. Sistema de roles y permisos
            RolesPermisosSeeder::class,
            
            // 3. Datos de usuarios e instituciones (orden importante)
            UsersSeeder::class,
            ColegiosSeeder::class,
            CursosSeeder::class,
            MateriasSeeder::class,
            
            // 4. Períodos académicos
            PeriodosAcademicosSeeder::class,
            
            // 5. Usuarios específicos del sistema
            DocentesSeeder::class,
            EstudiantesSeeder::class,
            
            // 6. Contenido educativo
            LibrosSeeder::class,
            MaterialesSeeder::class,
            
            // 7. Actividades académicas (requieren docentes y materias)
            TareasSeeder::class,
            ExamenesSeeder::class,
            ProyectosSeeder::class,
            
            // 8. Evaluaciones y seguimiento (requieren estudiantes y actividades)
            CalificacionesSeeder::class,
            AsistenciasSeeder::class,
            CertificadosSeeder::class,
            
            // 9. Organización académica
            HorariosSeeder::class,
            
            // 10. Sistema de comunicación
            NotificacionesSeeder::class,
        ]);
    }
}
