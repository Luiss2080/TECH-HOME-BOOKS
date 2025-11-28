<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tarea;
use App\Models\Materia;
use App\Models\Docente;
use Carbon\Carbon;

class TareasSeeder extends Seeder
{
    public function run(): void
    {
        $materias = Materia::with('docentes')->get();

        foreach ($materias as $materia) {
            // 3-5 tareas por materia
            $numTareas = rand(3, 5);
            
            foreach ($materia->docentes as $docente) {
                for ($i = 1; $i <= $numTareas; $i++) {
                    $fechaPublicacion = Carbon::now()->subDays(rand(1, 30));
                    $fechaEntrega = $fechaPublicacion->copy()->addDays(rand(7, 21));
                    $tipo = ['individual', 'grupal'][rand(0, 1)];
                    
                    Tarea::create([
                        'materia_id' => $materia->id,
                        'docente_id' => $docente->id,
                        'titulo' => $this->getTitulo($materia->nombre, $i),
                        'descripcion' => $this->getDescripcion($materia->nombre, $tipo),
                        'instrucciones' => $this->getInstrucciones($materia->nombre, $tipo),
                        'archivo_adjunto' => rand(0, 1) ? "/storage/tareas/{$materia->nombre}_tarea_{$i}.pdf" : null,
                        'fecha_publicacion' => $fechaPublicacion,
                        'fecha_entrega' => $fechaEntrega,
                        'puntuacion_maxima' => [20, 50, 100, 150][rand(0, 3)],
                        'tipo' => $tipo,
                        'permite_entrega_tardia' => rand(0, 1) ? true : false,
                        'penalizacion_tardia' => rand(0, 1) ? rand(10, 30) : 0,
                        'estado' => ['borrador', 'publicada', 'finalizada', 'cancelada'][rand(0, 3)],
                        'criterios_evaluacion' => json_encode($this->getCriterios($materia->nombre))
                    ]);
                }
                break; // Solo un docente por materia para evitar duplicados
            }
        }
    }

    private function getTitulo($materia, $numero)
    {
        $titulos = [
            'Matemáticas' => [
                'Ejercicios de Álgebra Lineal',
                'Problemas de Cálculo Diferencial',
                'Análisis de Funciones',
                'Ecuaciones Diferenciales',
                'Geometría Analítica'
            ],
            'Física' => [
                'Laboratorio de Mecánica',
                'Análisis de Circuitos Eléctricos',
                'Ondas y Oscilaciones',
                'Termodinámica Aplicada',
                'Óptica y Fotónica'
            ],
            'Química' => [
                'Reacciones Químicas',
                'Análisis Cualitativo',
                'Síntesis Orgánica',
                'Equilibrio Químico',
                'Cinética Química'
            ],
            'Historia' => [
                'Análisis de Fuentes Históricas',
                'Ensayo sobre el Siglo XX',
                'Investigación Documental',
                'Cronología de Eventos',
                'Biografía Histórica'
            ],
            'Literatura' => [
                'Análisis Literario',
                'Ensayo Crítico',
                'Reseña de Obra',
                'Creación Literaria',
                'Comparación de Autores'
            ]
        ];

        $materiaTitulos = $titulos[$materia] ?? [
            'Tarea de Investigación',
            'Proyecto Práctico',
            'Análisis de Caso',
            'Ejercicios Aplicados',
            'Estudio Dirigido'
        ];

        return $materiaTitulos[($numero - 1) % count($materiaTitulos)] . " #{$numero}";
    }

    private function getDescripcion($materia, $tipo)
    {
        $descripciones = [
            'individual' => [
                'Desarrollar de manera individual los ejercicios propuestos, mostrando el proceso completo de resolución.',
                'Realizar un análisis detallado del tema asignado, incluyendo referencias bibliográficas.',
                'Completar la investigación asignada siguiendo la metodología establecida en clase.',
                'Resolver los problemas planteados aplicando los conceptos teóricos estudiados.',
                'Elaborar un informe técnico sobre el tema de ' . strtolower($materia) . ' asignado.'
            ],
            'grupal' => [
                'Trabajar en equipo para desarrollar el proyecto asignado, distribuyendo equitativamente las tareas.',
                'Colaborar en la investigación del tema, cada miembro debe contribuir con una sección específica.',
                'Realizar una presentación grupal sobre los hallazgos de la investigación.',
                'Desarrollar en conjunto la solución al problema planteado, documentando el proceso.',
                'Crear un proyecto colaborativo que integre los conocimientos de ' . strtolower($materia) . '.'
            ]
        ];

        return $descripciones[$tipo][rand(0, count($descripciones[$tipo]) - 1)];
    }

    private function getInstrucciones($materia, $tipo)
    {
        $instrucciones = [
            'individual' => [
                "1. Leer cuidadosamente el material de estudio\n2. Resolver cada ejercicio paso a paso\n3. Incluir gráficos y diagramas cuando sea necesario\n4. Entregar en formato PDF\n5. Citar todas las fuentes utilizadas",
                "1. Investigar el tema asignado\n2. Estructurar el trabajo con introducción, desarrollo y conclusiones\n3. Usar formato APA para las citas\n4. Mínimo 5 páginas, máximo 10\n5. Incluir bibliografía actualizada",
                "1. Seguir la metodología científica\n2. Documentar todos los procedimientos\n3. Incluir análisis de resultados\n4. Presentar conclusiones fundamentadas\n5. Entregar informe completo"
            ],
            'grupal' => [
                "1. Formar equipos de 3-4 personas\n2. Distribuir tareas equitativamente\n3. Realizar reuniones periódicas de seguimiento\n4. Preparar presentación de 15-20 minutos\n5. Cada miembro debe participar en la exposición",
                "1. Coordinar el trabajo entre los miembros\n2. Establecer cronograma de actividades\n3. Revisar y unificar criterios\n4. Preparar material visual de apoyo\n5. Entregar trabajo escrito y hacer presentación oral",
                "1. Designar roles específicos en el equipo\n2. Mantener comunicación constante\n3. Documentar las contribuciones individuales\n4. Revisar la calidad del trabajo final\n5. Preparar defensa grupal del proyecto"
            ]
        ];

        return $instrucciones[$tipo][rand(0, count($instrucciones[$tipo]) - 1)];
    }

    private function getCriterios($materia)
    {
        return [
            'contenido' => [
                'peso' => 40,
                'descripcion' => 'Dominio del contenido de ' . strtolower($materia) . ' y precisión conceptual'
            ],
            'metodologia' => [
                'peso' => 25,
                'descripcion' => 'Aplicación correcta de la metodología y procedimientos'
            ],
            'presentacion' => [
                'peso' => 20,
                'descripcion' => 'Organización, claridad y formato del trabajo'
            ],
            'creatividad' => [
                'peso' => 10,
                'descripcion' => 'Originalidad y creatividad en el desarrollo'
            ],
            'puntualidad' => [
                'peso' => 5,
                'descripcion' => 'Entrega oportuna en la fecha establecida'
            ]
        ];
    }
}