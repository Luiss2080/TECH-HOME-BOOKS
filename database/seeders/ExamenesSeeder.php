<?php

namespace Database\Seeders;

use App\Models\Examen;
use App\Models\Docente;
use App\Models\Materia;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ExamenesSeeder extends Seeder
{
    public function run(): void
    {
        $docentes = Docente::with('materias')->get();
        
        foreach ($docentes as $docente) {
            foreach ($docente->materias as $materia) {
                // 2 exámenes por materia
                for ($i = 1; $i <= 2; $i++) {
                    $tipos = ['teorico', 'practico', 'virtual'];
                    $modalidades = ['presencial', 'virtual'];
                    
                    Examen::create([
                        'materia_id' => $materia->id,
                        'docente_id' => $docente->id,
                        'titulo' => "Examen {$i} - {$materia->nombre}",
                        'descripcion' => "Evaluación {$i} de la materia {$materia->nombre}",
                        'tipo' => $tipos[rand(0, 2)],
                        'fecha_examen' => Carbon::now()->addDays(rand(5, 30)),
                        'duracion_minutos' => [60, 90, 120][rand(0, 2)],
                        'puntuacion_total' => [50, 75, 100][rand(0, 2)],
                        'instrucciones' => "Instrucciones generales para el examen:\n1. Llegar 15 minutos antes\n2. Traer material necesario\n3. No se permite consulta de material",
                        'modalidad' => $modalidades[rand(0, 1)],
                        'estado' => ['programado', 'en_progreso', 'finalizado', 'cancelado'][rand(0, 3)],
                        'mostrar_resultados' => rand(0, 1) ? true : false,
                        'fecha_limite_resultados' => Carbon::now()->addDays(rand(35, 50))
                    ]);
                }
            }
        }
    }
}