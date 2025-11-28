<?php

namespace Database\Seeders;

use App\Models\Colegio;
use App\Models\Docente;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colegios = Colegio::all();
        $userDocente = User::where('email', 'maria.garcia@tech-home.com')->first();
        
        // Crear el docente original
        $colegioCentral = Colegio::where('nombre', 'LIKE', '%Central%')->first();
        
        if ($userDocente && $colegioCentral) {
            // Solo crear si no existe
            if (!Docente::where('codigo_docente', 'DOC-001')->exists()) {
                Docente::create([
                    'user_id' => $userDocente->id,
                    'colegio_id' => $colegioCentral->id,
                    'codigo_docente' => 'DOC-001',
                    'especialidad' => 'Matemáticas y Física',
                    'titulo_profesional' => 'Licenciatura en Matemáticas',
                    'experiencia' => '10 años de experiencia en educación secundaria',
                    'tipo_contrato' => 'tiempo_completo',
                    'fecha_contratacion' => '2020-02-01',
                    'estado_laboral' => 'activo',
                    'salario' => 8500.00,
                    'observaciones' => 'Docente especializada en ciencias exactas'
                ]);
            }
        }
        
        // Crear docentes adicionales
        $docentesAdicionales = [
            [
                'nombre' => 'Carlos Mendoza',
                'email' => 'carlos.mendoza@tech-home.com',
                'especialidad' => 'Historia y Literatura',
                'titulo' => 'Licenciatura en Historia'
            ],
            [
                'nombre' => 'Ana Rodriguez',
                'email' => 'ana.rodriguez@tech-home.com',
                'especialidad' => 'Química y Biología',
                'titulo' => 'Licenciatura en Química'
            ],
            [
                'nombre' => 'José Fernández',
                'email' => 'jose.fernandez@tech-home.com',
                'especialidad' => 'Física y Matemáticas',
                'titulo' => 'Ingeniería Física'
            ],
            [
                'nombre' => 'Laura Vargas',
                'email' => 'laura.vargas@tech-home.com',
                'especialidad' => 'Literatura e Inglés',
                'titulo' => 'Licenciatura en Filología'
            ]
        ];
        
        foreach ($docentesAdicionales as $index => $docenteData) {
            $codigoDocente = 'DOC-' . str_pad($index + 2, 3, '0', STR_PAD_LEFT);
            
            if (Docente::where('codigo_docente', $codigoDocente)->exists()) {
                continue;
            }
            
            // Crear usuario para el docente
            $user = User::create([
                'name' => $docenteData['nombre'],
                'email' => $docenteData['email'],
                'password' => bcrypt('password')
            ]);
            
            Docente::create([
                'user_id' => $user->id,
                'colegio_id' => $colegios->random()->id,
                'codigo_docente' => $codigoDocente,
                'especialidad' => $docenteData['especialidad'],
                'titulo_profesional' => $docenteData['titulo'],
                'experiencia' => rand(3, 15) . ' años de experiencia docente',
                'tipo_contrato' => ['tiempo_completo', 'medio_tiempo'][rand(0, 1)],
                'fecha_contratacion' => '202' . rand(0, 4) . '-0' . rand(1, 9) . '-01',
                'estado_laboral' => 'activo',
                'salario' => rand(6000, 12000),
                'observaciones' => 'Docente especializado en ' . strtolower($docenteData['especialidad'])
            ]);
        }
    }
}
