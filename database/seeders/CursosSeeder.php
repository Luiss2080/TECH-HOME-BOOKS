<?php

namespace Database\Seeders;

use App\Models\Colegio;
use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colegioCentral = Colegio::where('nombre', 'LIKE', '%Central%')->first();
        $colegioNorte = Colegio::where('nombre', 'LIKE', '%Norte%')->first();
        $colegioSur = Colegio::where('nombre', 'LIKE', '%Sur%')->first();
        
        $cursos = [
            // Cursos del Colegio Central - Primaria
            [
                'colegio_id' => $colegioCentral->id,
                'nombre' => '1ro de Primaria - Sección A',
                'nivel' => 'primaria',
                'grado' => '1ro',
                'seccion' => 'A',
                'turno' => 'mañana',
                'aula' => 'Aula 101',
                'ano_lectivo' => 2025,
                'cupo_maximo' => 25
            ],
            [
                'colegio_id' => $colegioCentral->id,
                'nombre' => '2do de Primaria - Sección A',
                'nivel' => 'primaria',
                'grado' => '2do',
                'seccion' => 'A',
                'turno' => 'mañana',
                'aula' => 'Aula 102',
                'ano_lectivo' => 2025,
                'cupo_maximo' => 25
            ],
            
            // Cursos del Colegio Central - Secundaria
            [
                'colegio_id' => $colegioCentral->id,
                'nombre' => '1ro de Secundaria - Sección A',
                'nivel' => 'secundaria',
                'grado' => '1ro',
                'seccion' => 'A',
                'turno' => 'mañana',
                'aula' => 'Aula 201',
                'ano_lectivo' => 2025,
                'cupo_maximo' => 30
            ],
            [
                'colegio_id' => $colegioCentral->id,
                'nombre' => '2do de Secundaria - Sección A',
                'nivel' => 'secundaria',
                'grado' => '2do',
                'seccion' => 'A',
                'turno' => 'mañana',
                'aula' => 'Aula 202',
                'ano_lectivo' => 2025,
                'cupo_maximo' => 30
            ],
            [
                'colegio_id' => $colegioCentral->id,
                'nombre' => '5to de Secundaria - Sección A',
                'nivel' => 'secundaria',
                'grado' => '5to',
                'seccion' => 'A',
                'turno' => 'mañana',
                'aula' => 'Aula 205',
                'ano_lectivo' => 2025,
                'cupo_maximo' => 28
            ],
            
            // Cursos del Colegio Norte
            [
                'colegio_id' => $colegioNorte->id,
                'nombre' => '3ro de Secundaria - Sección B',
                'nivel' => 'secundaria',
                'grado' => '3ro',
                'seccion' => 'B',
                'turno' => 'tarde',
                'aula' => 'Aula 301',
                'ano_lectivo' => 2025,
                'cupo_maximo' => 32
            ],
            [
                'colegio_id' => $colegioNorte->id,
                'nombre' => '4to de Secundaria - Sección B',
                'nivel' => 'secundaria',
                'grado' => '4to',
                'seccion' => 'B',
                'turno' => 'tarde',
                'aula' => 'Aula 302',
                'ano_lectivo' => 2025,
                'cupo_maximo' => 32
            ]
        ];
        
        foreach ($cursos as $curso) {
            Curso::create($curso);
        }
    }
}
