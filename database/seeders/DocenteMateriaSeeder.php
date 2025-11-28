<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Docente;
use App\Models\Materia;
use Illuminate\Support\Facades\DB;

class DocenteMateriaSeeder extends Seeder
{
    public function run(): void
    {
        $docentes = Docente::all();
        $materias = Materia::all();
        
        foreach ($docentes as $docente) {
            // Asignar 2-4 materias por docente
            $materiasAsignadas = $materias->random(rand(2, 4));
            
            foreach ($materiasAsignadas as $materia) {
                DB::table('docente_materia')->insert([
                    'docente_id' => $docente->id,
                    'materia_id' => $materia->id,
                    'ano_lectivo' => 2024,
                    'estado' => 'activo',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
