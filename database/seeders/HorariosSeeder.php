<?php

namespace Database\Seeders;

use App\Models\Horario;
use App\Models\Materia;
use App\Models\Docente;
use App\Models\Curso;
use Illuminate\Database\Seeder;

class HorariosSeeder extends Seeder
{
    public function run(): void
    {
        $cursos = Curso::with('materias')->get();
        $diasSemana = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes'];
        $horariosDisponibles = [
            '07:00:00', '08:00:00', '09:00:00', '10:00:00', '11:00:00',
            '14:00:00', '15:00:00', '16:00:00', '17:00:00', '18:00:00'
        ];
        
        foreach ($cursos as $curso) {
            $horarioUsado = [];
            
            foreach ($curso->materias as $index => $materia) {
                $docente = Docente::whereHas('materias', function($query) use ($materia) {
                    $query->where('materia_id', $materia->id);
                })->first();
                
                if (!$docente) continue;
                
                // Asignar 2-3 horarios por materia
                $numeroHorarios = rand(2, 3);
                
                for ($i = 0; $i < $numeroHorarios; $i++) {
                    $intentos = 0;
                    do {
                        $dia = $diasSemana[rand(0, 4)];
                        $horaInicio = $horariosDisponibles[rand(0, count($horariosDisponibles) - 1)];
                        $clave = $dia . '_' . $horaInicio;
                        $intentos++;
                    } while (in_array($clave, $horarioUsado) && $intentos < 20);
                    
                    if ($intentos >= 20) break; // Evitar loop infinito
                    
                    $horarioUsado[] = $clave;
                    
                    // Calcular hora de fin (1 hora después)
                    $horaFin = date('H:i:s', strtotime($horaInicio . ' + 1 hour'));
                    
                    Horario::create([
                        'curso_id' => $curso->id,
                        'materia_id' => $materia->id,
                        'docente_id' => $docente->id,
                        'dia_semana' => $dia,
                        'hora_inicio' => $horaInicio,
                        'hora_fin' => $horaFin,
                        'aula' => $this->getAula($materia->nombre),
                        'tipo_clase' => $this->getTipoClase($materia->nombre),
                        'observaciones' => $this->getObservaciones($materia->nombre),
                        'estado' => 'activo',
                        'fecha_inicio_vigencia' => '2025-02-01',
                        'fecha_fin_vigencia' => '2025-12-15'
                    ]);
                }
            }
        }
    }
    
    private function getAula($nombreMateria)
    {
        $aulas = [
            'Matemáticas' => ['Aula 101', 'Aula 102', 'Laboratorio de Matemáticas'],
            'Ciencias Naturales' => ['Laboratorio de Ciencias', 'Aula 201', 'Aula 202'],
            'Educación Física' => ['Gimnasio', 'Cancha Deportiva', 'Patio Central'],
            'Arte y Creatividad' => ['Aula de Arte', 'Taller Creativo', 'Aula 301'],
            'Lenguaje' => ['Aula 103', 'Biblioteca', 'Aula 104'],
            'Ciencias Sociales' => ['Aula 203', 'Aula 204', 'Sala Audiovisual']
        ];
        
        if (isset($aulas[$nombreMateria])) {
            return $aulas[$nombreMateria][rand(0, count($aulas[$nombreMateria]) - 1)];
        }
        
        return 'Aula ' . rand(100, 400);
    }
    
    private function getTipoClase($nombreMateria)
    {
        $tipos = [
            'Matemáticas' => 'teorica',
            'Ciencias Naturales' => rand(0, 1) ? 'practica' : 'laboratorio',
            'Educación Física' => 'practica',
            'Arte y Creatividad' => 'taller',
            'Lenguaje' => 'teorica',
            'Ciencias Sociales' => 'teorica'
        ];
        
        return $tipos[$nombreMateria] ?? 'teorica';
    }
    
    private function getObservaciones($nombreMateria)
    {
        $observaciones = [
            'Matemáticas' => 'Traer calculadora científica',
            'Ciencias Naturales' => 'Uso obligatorio de bata de laboratorio',
            'Educación Física' => 'Traer ropa deportiva y botella de agua',
            'Arte y Creatividad' => 'Traer materiales de arte básicos',
            'Lenguaje' => 'Tener disponible diccionario',
            'Ciencias Sociales' => 'Traer atlas geográfico'
        ];
        
        if (rand(0, 1) && isset($observaciones[$nombreMateria])) {
            return $observaciones[$nombreMateria];
        }
        
        return null;
    }
}