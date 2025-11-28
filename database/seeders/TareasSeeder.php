<?php

namespace Database\Seeders;

use App\Models\Tarea;
use App\Models\Docente;
use App\Models\Materia;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TareasSeeder extends Seeder
{
    public function run(): void
    {
        $docentes = Docente::with('materias')->get();
        
        foreach ($docentes as $docente) {
            foreach ($docente->materias as $materia) {
                // 3 tareas por materia
                for ($i = 1; $i <= 3; $i++) {
                    Tarea::create([
                        'materia_id' => $materia->id,
                        'docente_id' => $docente->id,
                        'titulo' => "Tarea {$i} - {$materia->nombre}",
                        'descripcion' => "Esta es la tarea número {$i} de la materia {$materia->nombre}. Los estudiantes deben completar los ejercicios propuestos.",
                        'instrucciones' => "1. Leer el material proporcionado\n2. Resolver los ejercicios\n3. Subir el archivo con las respuestas",
                        'fecha_publicacion' => Carbon::now()->subDays(rand(7, 30)),
                        'fecha_entrega' => Carbon::now()->addDays(rand(3, 14)),
                        'puntuacion_maxima' => rand(50, 100),
                        'tipo' => rand(0, 1) ? 'individual' : 'grupal',
                        'permite_entrega_tardia' => rand(0, 1) ? true : false,
                        'penalizacion_tardia' => rand(0, 1) ? rand(10, 30) : 0,
                        'estado' => ['borrador', 'publicada', 'finalizada'][rand(0, 2)],
                        'criterios_evaluacion' => json_encode([
                            'Comprensión del tema' => 30,
                            'Desarrollo de ejercicios' => 40,
                            'Presentación' => 20,
                            'Entrega puntual' => 10
                        ])
                    ]);
                }
            }
        }
    }
}