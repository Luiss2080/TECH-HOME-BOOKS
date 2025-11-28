<?php

namespace Database\Seeders;

use App\Models\Asistencia;
use App\Models\Estudiante;
use App\Models\Materia;
use App\Models\Docente;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AsistenciasSeeder extends Seeder
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
                
                // Generar asistencias para los últimos 30 días (días hábiles)
                $fechaInicio = Carbon::now()->subDays(30);
                $fechaFin = Carbon::now();
                
                for ($fecha = $fechaInicio->copy(); $fecha <= $fechaFin; $fecha->addDay()) {
                    // Solo días de semana (lunes a viernes)
                    if ($fecha->isWeekday()) {
                        $estados = ['presente', 'ausente', 'tardanza', 'justificado'];
                        $probabilidades = [80, 5, 10, 5]; // % de probabilidad
                        
                        $rand = rand(1, 100);
                        $estado = 'presente';
                        
                        if ($rand <= 5) $estado = 'ausente';
                        elseif ($rand <= 15) $estado = 'tardanza';
                        elseif ($rand <= 20) $estado = 'justificado';
                        
                        Asistencia::create([
                            'estudiante_id' => $estudiante->id,
                            'materia_id' => $materia->id,
                            'docente_id' => $docente->id,
                            'fecha' => $fecha->format('Y-m-d'),
                            'hora_registro' => $fecha->setTime(rand(7, 9), rand(0, 59))->format('H:i:s'),
                            'estado' => $estado,
                            'observaciones' => $this->getObservacion($estado),
                            'justificacion' => $estado === 'justificado' ? 'Cita médica' : null
                        ]);
                    }
                }
            }
        }
    }
    
    private function getObservacion($estado)
    {
        switch ($estado) {
            case 'presente':
                return rand(0, 1) ? 'Asistencia puntual' : null;
            case 'tardanza':
                return 'Llegó ' . rand(5, 20) . ' minutos tarde';
            case 'ausente':
                return 'Falta injustificada';
            case 'justificado':
                return 'Ausencia justificada por motivos médicos';
            default:
                return null;
        }
    }
}