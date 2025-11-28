<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Materia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MateriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cursos = Curso::all();
        
        $materiasPrimaria = [
            ['nombre' => 'Matemáticas', 'codigo' => 'MAT-PRIM', 'horas_semanales' => 6, 'color' => '#007bff'],
            ['nombre' => 'Lenguaje', 'codigo' => 'LEN-PRIM', 'horas_semanales' => 6, 'color' => '#28a745'],
            ['nombre' => 'Ciencias Naturales', 'codigo' => 'CNAT-PRIM', 'horas_semanales' => 4, 'color' => '#17a2b8'],
            ['nombre' => 'Ciencias Sociales', 'codigo' => 'CSOC-PRIM', 'horas_semanales' => 4, 'color' => '#ffc107'],
            ['nombre' => 'Educación Física', 'codigo' => 'EDFIS-PRIM', 'horas_semanales' => 2, 'color' => '#fd7e14'],
            ['nombre' => 'Arte y Creatividad', 'codigo' => 'ARTE-PRIM', 'horas_semanales' => 2, 'color' => '#e83e8c']
        ];
        
        $materiasSecundaria = [
            ['nombre' => 'Matemáticas', 'codigo' => 'MAT-SEC', 'horas_semanales' => 6, 'color' => '#007bff'],
            ['nombre' => 'Física', 'codigo' => 'FIS-SEC', 'horas_semanales' => 4, 'color' => '#6610f2'],
            ['nombre' => 'Química', 'codigo' => 'QUIM-SEC', 'horas_semanales' => 4, 'color' => '#dc3545'],
            ['nombre' => 'Biología', 'codigo' => 'BIO-SEC', 'horas_semanales' => 4, 'color' => '#28a745'],
            ['nombre' => 'Historia', 'codigo' => 'HIST-SEC', 'horas_semanales' => 3, 'color' => '#6f42c1'],
            ['nombre' => 'Geografía', 'codigo' => 'GEO-SEC', 'horas_semanales' => 3, 'color' => '#20c997'],
            ['nombre' => 'Literatura', 'codigo' => 'LIT-SEC', 'horas_semanales' => 4, 'color' => '#fd7e14'],
            ['nombre' => 'Inglés', 'codigo' => 'ING-SEC', 'horas_semanales' => 3, 'color' => '#17a2b8'],
            ['nombre' => 'Informática', 'codigo' => 'INF-SEC', 'horas_semanales' => 3, 'color' => '#495057'],
            ['nombre' => 'Educación Física', 'codigo' => 'EDFIS-SEC', 'horas_semanales' => 2, 'color' => '#fd7e14']
        ];
        
        foreach ($cursos as $curso) {
            $materias = $curso->nivel === 'primaria' ? $materiasPrimaria : $materiasSecundaria;
            
            foreach ($materias as $materiaData) {
                // Crear código único por curso
                $codigo = $materiaData['codigo'] . '-' . $curso->id;
                
                Materia::create([
                    'curso_id' => $curso->id,
                    'nombre' => $materiaData['nombre'],
                    'codigo' => $codigo,
                    'descripcion' => 'Materia de ' . $materiaData['nombre'] . ' para ' . $curso->nombre,
                    'horas_semanales' => $materiaData['horas_semanales'],
                    'objetivos' => json_encode([
                        'Desarrollar competencias en ' . $materiaData['nombre'],
                        'Promover el pensamiento crítico',
                        'Fomentar la participación activa'
                    ]),
                    'color' => $materiaData['color'],
                    'estado' => 'activa'
                ]);
            }
        }
    }
}
