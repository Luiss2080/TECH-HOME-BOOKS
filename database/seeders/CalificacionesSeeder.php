<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Calificacion;
use App\Models\Estudiante;
use App\Models\Materia;
use App\Models\Docente;
use App\Models\Tarea;
use Carbon\Carbon;

class CalificacionesSeeder extends Seeder
{
    public function run(): void
    {
        $estudiantes = Estudiante::all();
        $materias = Materia::with('docentes')->get();
        $tareas = Tarea::all();

        foreach ($estudiantes as $estudiante) {
            $curso = $estudiante->curso;
            $materiasDelCurso = $materias->where('curso_id', $curso->id);
            
            foreach ($materiasDelCurso as $materia) {
                $docente = $materia->docentes->first();
                
                if (!$docente) continue;

                // Calificaciones por tareas de esta materia
                $tareasMateria = $tareas->where('materia_id', $materia->id)->take(3);
                foreach ($tareasMateria as $tarea) {
                    $nota = rand(60, 100);
                    Calificacion::create([
                        'estudiante_id' => $estudiante->id,
                        'materia_id' => $materia->id,
                        'docente_id' => $docente->id,
                        'evaluacion_type' => 'App\\Models\\Tarea',
                        'evaluacion_id' => $tarea->id,
                        'tipo_evaluacion' => 'tarea',
                        'nota' => $nota,
                        'nota_maxima' => $tarea->puntuacion_maxima,
                        'porcentaje_nota' => 20.00,
                        'periodo_academico' => 'bimestre_1',
                        'fecha_evaluacion' => Carbon::now()->subDays(rand(1, 30))->format('Y-m-d'),
                        'observaciones_docente' => $this->getObservacion($nota),
                        'estado' => 'definitiva'
                    ]);
                }

                // Calificación por participación
                $nota = rand(70, 100);
                Calificacion::create([
                    'estudiante_id' => $estudiante->id,
                    'materia_id' => $materia->id,
                    'docente_id' => $docente->id,
                    'evaluacion_type' => null,
                    'evaluacion_id' => null,
                    'tipo_evaluacion' => 'participacion',
                    'nota' => $nota,
                    'nota_maxima' => 100.00,
                    'porcentaje_nota' => 20.00,
                    'periodo_academico' => 'bimestre_1',
                    'fecha_evaluacion' => Carbon::now()->subDays(rand(1, 15))->format('Y-m-d'),
                    'observaciones_docente' => $this->getObservacionParticipacion($nota),
                    'estado' => 'definitiva'
                ]);

                // Calificación de conducta
                $nota = rand(85, 100);
                Calificacion::create([
                    'estudiante_id' => $estudiante->id,
                    'materia_id' => $materia->id,
                    'docente_id' => $docente->id,
                    'evaluacion_type' => null,
                    'evaluacion_id' => null,
                    'tipo_evaluacion' => 'conducta',
                    'nota' => $nota,
                    'nota_maxima' => 100.00,
                    'porcentaje_nota' => 20.00,
                    'periodo_academico' => 'bimestre_1',
                    'fecha_evaluacion' => Carbon::now()->subDays(rand(1, 10))->format('Y-m-d'),
                    'observaciones_docente' => $this->getObservacionConducta($nota),
                    'estado' => 'definitiva'
                ]);
            }
        }
    }

    private function getObservacion($nota)
    {
        if ($nota >= 90) {
            return 'Excelente desempeño. Demuestra dominio completo del tema.';
        } elseif ($nota >= 80) {
            return 'Buen trabajo. Comprende bien los conceptos principales.';
        } elseif ($nota >= 70) {
            return 'Desempeño satisfactorio. Puede mejorar en algunos aspectos.';
        } elseif ($nota >= 60) {
            return 'Necesita reforzar algunos conceptos. Se recomienda estudiar más.';
        } else {
            return 'Requiere apoyo adicional para mejorar el rendimiento académico.';
        }
    }

    private function getObservacionParticipacion($nota)
    {
        if ($nota >= 90) {
            return 'Participación muy activa y constructiva en clase.';
        } elseif ($nota >= 80) {
            return 'Buena participación y colaboración en actividades.';
        } elseif ($nota >= 70) {
            return 'Participación regular, puede ser más activo.';
        } else {
            return 'Debe participar más activamente en las clases.';
        }
    }

    private function getObservacionConducta($nota)
    {
        if ($nota >= 95) {
            return 'Excelente comportamiento y respeto hacia compañeros y docentes.';
        } elseif ($nota >= 85) {
            return 'Buena conducta en general. Respeta las normas del aula.';
        } else {
            return 'Debe mejorar algunos aspectos del comportamiento en clase.';
        }
    }
}