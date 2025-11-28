<?php

namespace Database\Seeders;

use App\Models\Colegio;
use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstudiantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener el usuario estudiante creado en UsersSeeder
        $userEstudiante = User::where('email', 'juan.perez@estudiante.com')->first();
        $colegioCentral = Colegio::where('nombre', 'LIKE', '%Central%')->first();
        $cursoSecundaria = Curso::where('colegio_id', $colegioCentral->id)
                                ->where('grado', '2do')
                                ->where('nivel', 'secundaria')
                                ->first();
        
        if ($userEstudiante && $colegioCentral && $cursoSecundaria) {
            Estudiante::create([
                'user_id' => $userEstudiante->id,
                'colegio_id' => $colegioCentral->id,
                'curso_id' => $cursoSecundaria->id,
                'codigo_estudiante' => 'EST-001-2025',
                'tutor_nombre' => 'Carlos Pérez Mendoza',
                'tutor_telefono' => '+591 70123456',
                'tutor_email' => 'carlos.perez@email.com',
                'estado_academico' => 'activo',
                'fecha_inscripcion' => '2025-02-01',
                'observaciones' => 'Estudiante regular con buen rendimiento académico'
            ]);
        }
    }
}
