<?php

namespace Database\Seeders;

use App\Models\Proyecto;
use App\Models\Docente;
use App\Models\Materia;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProyectosSeeder extends Seeder
{
    public function run(): void
    {
        $docentes = Docente::with('materias')->get();
        
        foreach ($docentes as $docente) {
            foreach ($docente->materias->take(2) as $materia) { // Solo 2 materias por docente
                $proyectos = [
                    [
                        'titulo' => 'Proyecto Investigativo de ' . $materia->nombre,
                        'descripcion' => 'Proyecto de investigación donde los estudiantes deben investigar un tema específico de la materia.',
                        'objetivos' => [
                            'Desarrollar habilidades de investigación',
                            'Aplicar conocimientos teóricos',
                            'Presentar resultados de forma clara'
                        ],
                        'tipo' => 'grupal'
                    ],
                    [
                        'titulo' => 'Análisis Práctico de ' . $materia->nombre,
                        'descripcion' => 'Proyecto práctico individual donde cada estudiante debe resolver un problema real.',
                        'objetivos' => [
                            'Resolver problemas prácticos',
                            'Aplicar metodologías aprendidas',
                            'Desarrollar pensamiento crítico'
                        ],
                        'tipo' => 'individual'
                    ]
                ];
                
                foreach ($proyectos as $index => $proyectoData) {
                    Proyecto::create([
                        'materia_id' => $materia->id,
                        'docente_id' => $docente->id,
                        'titulo' => $proyectoData['titulo'],
                        'descripcion' => $proyectoData['descripcion'],
                        'objetivos' => json_encode($proyectoData['objetivos']),
                        'fecha_inicio' => Carbon::now()->addDays(rand(1, 10)),
                        'fecha_entrega' => Carbon::now()->addDays(rand(30, 60)),
                        'puntuacion_maxima' => [80, 90, 100][rand(0, 2)],
                        'tipo' => $proyectoData['tipo'],
                        'requiere_presentacion' => rand(0, 1) ? true : false,
                        'fecha_presentacion' => Carbon::now()->addDays(rand(65, 80)),
                        'recursos_necesarios' => json_encode([
                            'Computadora con internet',
                            'Acceso a biblioteca',
                            'Software específico de la materia'
                        ]),
                        'estado' => ['planificado', 'en_progreso', 'finalizado'][rand(0, 2)],
                        'rubrica_evaluacion' => json_encode([
                            'Investigación y contenido' => 40,
                            'Metodología aplicada' => 25,
                            'Presentación y formato' => 20,
                            'Originalidad y creatividad' => 15
                        ])
                    ]);
                }
            }
        }
    }
}