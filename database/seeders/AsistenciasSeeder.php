<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asistencia;
use App\Models\Estudiante;
use App\Models\Materia;
use Carbon\Carbon;

class AsistenciasSeeder extends Seeder
{
    public function run(): void
    {
        $estudiantes = Estudiante::all();
        $materias = Materia::with('docentes')->get();
        
        // Generar asistencias para los últimos 30 días hábiles
        $fechasClase = $this->getFechasClase(30);
        
        foreach ($estudiantes as $estudiante) {
            $curso = $estudiante->curso;
            $materiasDelCurso = $materias->where('curso_id', $curso->id);
            
            foreach ($materiasDelCurso as $materia) {
                $docente = $materia->docentes->first();
                
                if (!$docente) continue;
                
                foreach ($fechasClase as $fecha) {
                    // 85% probabilidad de asistencia normal
                    $probabilidad = rand(1, 100);
                    
                    if ($probabilidad <= 85) {
                        $estado = 'presente';
                        $horaRegistro = '07:' . str_pad(rand(0, 59), 2, '0', STR_PAD_LEFT) . ':00';
                        $minutosTardanza = 0;
                        $observaciones = null;
                    } elseif ($probabilidad <= 92) {
                        $estado = 'tardanza';
                        $minutosTardanza = rand(5, 30);
                        $minutosBase = rand(0, 30);
                        $minutosTotal = min($minutosBase + $minutosTardanza, 59);
                        $horaRegistro = '07:' . str_pad($minutosTotal, 2, '0', STR_PAD_LEFT) . ':00';
                        $observaciones = "Llegó {$minutosTardanza} minutos tarde";
                    } elseif ($probabilidad <= 96) {
                        $estado = 'justificado';
                        $horaRegistro = null;
                        $minutosTardanza = 0;
                        $observaciones = $this->getJustificacionAleatoria();
                    } elseif ($probabilidad <= 98) {
                        $estado = 'falta_medica';
                        $horaRegistro = null;
                        $minutosTardanza = 0;
                        $observaciones = 'Falta médica justificada';
                    } else {
                        $estado = 'ausente';
                        $horaRegistro = null;
                        $minutosTardanza = 0;
                        $observaciones = 'Falta sin justificar';
                    }
                    
                    Asistencia::create([
                        'estudiante_id' => $estudiante->id,
                        'materia_id' => $materia->id,
                        'docente_id' => $docente->id,
                        'fecha' => $fecha->format('Y-m-d'),
                        'hora_registro' => $horaRegistro,
                        'estado' => $estado,
                        'minutos_tardanza' => $minutosTardanza,
                        'justificacion' => in_array($estado, ['justificado', 'falta_medica']) ? $this->getJustificacionAleatoria() : null,
                        'justificacion_aprobada' => in_array($estado, ['justificado', 'falta_medica']),
                        'observaciones' => $observaciones,
                        'periodo_academico' => 'bimestre_1'
                    ]);
                }
            }
        }
    }
    
    private function getFechasClase($dias)
    {
        $fechas = [];
        $fecha = Carbon::now()->subDays($dias);
        
        for ($i = 0; $i < $dias; $i++) {
            // Solo días de semana (lunes a viernes)
            if ($fecha->isWeekday()) {
                $fechas[] = $fecha->copy();
            }
            $fecha->addDay();
        }
        
        return $fechas;
    }
    
    private function getJustificacionAleatoria()
    {
        $justificaciones = [
            'Cita médica programada',
            'Problemas familiares',
            'Transporte público demorado',
            'Consulta médica de emergencia',
            'Trámites legales familiares',
            'Inconvenientes climáticos',
            'Problema de salud menor',
            'Actividad escolar en otra institución',
            'Cita odontológica',
            'Acompañar familiar al médico'
        ];
        
        return $justificaciones[array_rand($justificaciones)];
    }
}