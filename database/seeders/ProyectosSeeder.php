<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyecto;
use App\Models\Materia;
use Carbon\Carbon;

class ProyectosSeeder extends Seeder
{
    public function run(): void
    {
        $materias = Materia::with('docentes')->get();
        
        foreach ($materias as $materia) {
            $docente = $materia->docentes->first();
            if (!$docente) continue;
            
            // 2 proyectos por materia
            for ($i = 1; $i <= 2; $i++) {
                $tipo = ['individual', 'grupal'][rand(0, 1)];
                
                Proyecto::create([
                    'materia_id' => $materia->id,
                    'docente_id' => $docente->id,
                    'titulo' => $this->getTitulo($materia->nombre, $i),
                    'descripcion' => $this->getDescripcion($materia->nombre, $tipo),
                    'objetivos' => json_encode($this->getObjetivos($materia->nombre)),
                    'fecha_inicio' => Carbon::now()->addDays(rand(1, 10)),
                    'fecha_entrega' => Carbon::now()->addDays(rand(30, 60)),
                    'puntuacion_maxima' => [80, 90, 100][rand(0, 2)],
                    'tipo' => $tipo,
                    'requiere_presentacion' => rand(0, 1) ? true : false,
                    'fecha_presentacion' => Carbon::now()->addDays(rand(65, 80)),
                    'recursos_necesarios' => json_encode($this->getRecursos($materia->nombre)),
                    'estado' => ['planificado', 'en_desarrollo', 'completado'][rand(0, 2)],
                    'rubrica_evaluacion' => json_encode($this->getRubrica())
                ]);
            }
        }
    }
    
    private function getTitulo($materia, $numero)
    {
        $titulos = [
            'Matemáticas' => [
                'Modelado Matemático de Fenómenos Reales',
                'Análisis Estadístico de Datos',
                'Aplicaciones de Cálculo en Ingeniería',
                'Geometría en el Arte y Arquitectura'
            ],
            'Física' => [
                'Experimento de Física Aplicada',
                'Construcción de Dispositivo Mecánico',
                'Análisis de Energías Renovables',
                'Simulación de Fenómenos Físicos'
            ],
            'Química' => [
                'Síntesis de Compuesto Orgánico',
                'Análisis de Contaminantes Ambientales',
                'Desarrollo de Material Biodegradable',
                'Estudio de Reacciones Catalíticas'
            ],
            'Historia' => [
                'Investigación Histórica Documental',
                'Reconstrucción de Época Histórica',
                'Análisis Comparativo de Civilizaciones',
                'Biografía de Personaje Histórico'
            ],
            'Literatura' => [
                'Antología de Textos Literarios',
                'Adaptación de Obra Clásica',
                'Creación de Texto Narrativo Original',
                'Análisis Intertextual de Obras'
            ]
        ];

        $materiaTitulos = $titulos[$materia] ?? [
            'Proyecto de Investigación Aplicada',
            'Desarrollo de Propuesta Innovadora',
            'Análisis de Caso Práctico',
            'Estudio de Campo Especializado'
        ];

        return $materiaTitulos[($numero - 1) % count($materiaTitulos)];
    }
    
    private function getDescripcion($materia, $tipo)
    {
        if ($tipo === 'individual') {
            return "Proyecto individual de investigación y desarrollo en el área de {$materia}. El estudiante debe demostrar dominio de los conceptos teóricos mediante su aplicación práctica, incluyendo investigación bibliográfica, análisis de datos y presentación de resultados.";
        } else {
            return "Proyecto grupal colaborativo en {$materia} donde los estudiantes trabajan en equipo para desarrollar una propuesta innovadora. Cada miembro del grupo debe contribuir con sus fortalezas específicas para lograr un resultado integral y de calidad.";
        }
    }
    
    private function getObjetivos($materia)
    {
        return [
            "Aplicar los conocimientos teóricos de {$materia} en un contexto práctico",
            "Desarrollar habilidades de investigación y análisis crítico",
            "Fomentar la creatividad y el pensamiento innovador",
            "Mejorar las competencias de comunicación y presentación",
            "Promover el trabajo autónomo y la gestión del tiempo"
        ];
    }
    
    private function getRecursos($materia)
    {
        $recursos = [
            'Acceso a biblioteca física y digital',
            'Computadora con conexión a internet',
            'Software especializado según la materia',
            'Materiales de oficina para presentación',
            'Tiempo de asesoría con el docente'
        ];
        
        // Recursos específicos por materia
        if (str_contains(strtolower($materia), 'matemática') || str_contains(strtolower($materia), 'física')) {
            $recursos[] = 'Calculadora científica o software matemático';
            $recursos[] = 'Acceso a laboratorio si es necesario';
        } elseif (str_contains(strtolower($materia), 'química')) {
            $recursos[] = 'Acceso a laboratorio de química';
            $recursos[] = 'Equipo de seguridad personal';
        } elseif (str_contains(strtolower($materia), 'historia') || str_contains(strtolower($materia), 'literatura')) {
            $recursos[] = 'Acceso a archivos históricos';
            $recursos[] = 'Bases de datos especializadas';
        }
        
        return $recursos;
    }
    
    private function getRubrica()
    {
        return [
            'Investigación y contenido' => [
                'peso' => 35,
                'descripcion' => 'Profundidad y calidad de la investigación realizada'
            ],
            'Metodología aplicada' => [
                'peso' => 25,
                'descripcion' => 'Correcta aplicación de metodologías de investigación'
            ],
            'Presentación y formato' => [
                'peso' => 20,
                'descripcion' => 'Organización, claridad y calidad de la presentación'
            ],
            'Originalidad y creatividad' => [
                'peso' => 15,
                'descripcion' => 'Innovación y pensamiento creativo demostrado'
            ],
            'Cumplimiento de plazos' => [
                'peso' => 5,
                'descripcion' => 'Entrega puntual y gestión adecuada del tiempo'
            ]
        ];
    }
}