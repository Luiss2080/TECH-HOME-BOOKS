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
            // Solo crear si no existe
            if (!Estudiante::where('codigo_estudiante', 'EST-001-2025')->exists()) {
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
            
            // Crear estudiantes adicionales
            $cursos = Curso::all();
            $nombresEstudiantes = [
                ['nombre' => 'María González', 'email' => 'maria.gonzalez@estudiante.com', 'tutor' => 'Pedro González'],
                ['nombre' => 'Diego López', 'email' => 'diego.lopez@estudiante.com', 'tutor' => 'Carmen López'],
                ['nombre' => 'Sofia Morales', 'email' => 'sofia.morales@estudiante.com', 'tutor' => 'Roberto Morales'],
                ['nombre' => 'Andrés Vargas', 'email' => 'andres.vargas@estudiante.com', 'tutor' => 'Elena Vargas'],
                ['nombre' => 'Lucía Herrera', 'email' => 'lucia.herrera@estudiante.com', 'tutor' => 'Miguel Herrera'],
                ['nombre' => 'Sebastián Cruz', 'email' => 'sebastian.cruz@estudiante.com', 'tutor' => 'Ana Cruz'],
                ['nombre' => 'Valentina Silva', 'email' => 'valentina.silva@estudiante.com', 'tutor' => 'Carlos Silva'],
                ['nombre' => 'Mateo Ramos', 'email' => 'mateo.ramos@estudiante.com', 'tutor' => 'Rosa Ramos'],
                ['nombre' => 'Isabella Torres', 'email' => 'isabella.torres@estudiante.com', 'tutor' => 'Juan Torres'],
                ['nombre' => 'Gabriel Mendez', 'email' => 'gabriel.mendez@estudiante.com', 'tutor' => 'Marta Mendez']
            ];
            
            foreach ($nombresEstudiantes as $index => $estudianteData) {
                $codigoEstudiante = 'EST-' . str_pad($index + 2, 3, '0', STR_PAD_LEFT) . '-2025';
                
                if (Estudiante::where('codigo_estudiante', $codigoEstudiante)->exists()) {
                    continue;
                }
                
                // Crear usuario para el estudiante
                $user = User::create([
                    'name' => $estudianteData['nombre'],
                    'email' => $estudianteData['email'],
                    'password' => bcrypt('password')
                ]);
                
                $curso = $cursos->random();
                
                Estudiante::create([
                    'user_id' => $user->id,
                    'colegio_id' => $curso->colegio_id,
                    'curso_id' => $curso->id,
                    'codigo_estudiante' => $codigoEstudiante,
                    'tutor_nombre' => $estudianteData['tutor'],
                    'tutor_telefono' => '+591 ' . rand(60000000, 79999999),
                    'tutor_email' => strtolower(str_replace(' ', '.', $estudianteData['tutor'])) . '@email.com',
                    'estado_academico' => 'activo',
                    'fecha_inscripcion' => '2025-02-' . str_pad(rand(1, 28), 2, '0', STR_PAD_LEFT),
                    'observaciones' => 'Estudiante activo con buen desempeño'
                ]);
            }
    }
}
