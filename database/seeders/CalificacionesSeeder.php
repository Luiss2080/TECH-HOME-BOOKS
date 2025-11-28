<?php

namespace Database\Seeders;

use App\Models\Calificacion;
use App\Models\Estudiante;
use App\Models\Materia;
use App\Models\Docente;
use App\Models\Tarea;
use App\Models\Examen;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CalificacionesSeeder extends Seeder
{
    public function run(): void
    {
        $estudiantes = Estudiante::with('materias')->get();
        
        foreach ($estudiantes as $estudiante) {
            foreach ($estudiante->materias as $materia) {
                $docente = Docente::whereHas('materias', function($query) use ($materia) {
                    $query->where('materia_id', $materia->id);
                })->first();
                
                if (!$docente) continue;
                
                // Calificaciones de tareas
                $tareas = Tarea::where('materia_id', $materia->id)->get();
                foreach ($tareas->take(5) as $tarea) {
                    Calificacion::create([
                        'estudiante_id' => $estudiante->id,
                        'materia_id' => $materia->id,
                        'docente_id' => $docente->id,
                        'evaluacion_type' => 'App\Models\Tarea',
                        'evaluacion_id' => $tarea->id,
                        'tipo_evaluacion' => 'tarea',
                        'nota' => rand(60, 100),
                        'nota_maxima' => $tarea->puntuacion_maxima,
                        'porcentaje_nota' => rand(10, 20),
                        'periodo_academico' => 'bimestre_1',
                        'fecha_evaluacion' => Carbon::now()->subDays(rand(1, 30)),
                        'observaciones_docente' => $this->getObservacion(rand(60, 100)),
                        'es_recuperacion' => false,
                        'estado' => 'definitiva'
                    ]);
                }
                
                // Calificaciones de exámenes
                $examenes = Examen::where('materia_id', $materia->id)->get();
                foreach ($examenes->take(2) as $examen) {
                    Calificacion::create([
                        'estudiante_id' => $estudiante->id,
                        'materia_id' => $materia->id,
                        'docente_id' => $docente->id,
                        'evaluacion_type' => 'App\Models\Examen',
                        'evaluacion_id' => $examen->id,
                        'tipo_evaluacion' => 'examen',
                        'nota' => rand(50, 95),
                        'nota_maxima' => $examen->puntuacion_total,
                        'porcentaje_nota' => rand(25, 35),
                        'periodo_academico' => 'bimestre_1',
                        'fecha_evaluacion' => Carbon::now()->subDays(rand(1, 20)),
                        'observaciones_docente' => $this->getObservacion(rand(50, 95)),
                        'es_recuperacion' => false,
                        'estado' => 'definitiva'
                    ]);
                }
                
                // Calificaciones de participación
                Calificacion::create([
                    'estudiante_id' => $estudiante->id,
                    'materia_id' => $materia->id,
                    'docente_id' => $docente->id,
                    'evaluacion_type' => null,
                    'evaluacion_id' => null,
                    'tipo_evaluacion' => 'participacion',
                    'nota' => rand(80, 100),
                    'nota_maxima' => 100,
                    'porcentaje_nota' => 15,
                    'periodo_academico' => 'bimestre_1',
                    'fecha_evaluacion' => Carbon::now()->subDays(rand(1, 15)),
                    'observaciones_docente' => 'Participación activa en clase',
                    'es_recuperacion' => false,
                    'estado' => 'definitiva'
                ]);
            }
        }
    }
    
    private function getObservacion($nota)
    {
        if ($nota >= 90) return 'Excelente trabajo, superó las expectativas';
        if ($nota >= 80) return 'Buen rendimiento, cumple con los objetivos';
        if ($nota >= 70) return 'Rendimiento satisfactorio, puede mejorar';
        if ($nota >= 60) return 'Rendimiento mínimo, necesita reforzar conceptos';
        return 'Bajo rendimiento, requiere apoyo adicional';
    }
}