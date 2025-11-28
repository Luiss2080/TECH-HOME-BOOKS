<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\Materia;
use App\Models\Docente;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MaterialesSeeder extends Seeder
{
    public function run(): void
    {
        $materias = Materia::all();
        $docentes = Docente::all();
        
        $tiposMateriales = ['PDF', 'video', 'presentacion', 'documento', 'imagen', 'audio'];
        
        foreach ($materias as $materia) {
            // Seleccionar un docente aleatorio para crear materiales
            $docente = $docentes->random();
            
            // 5 materiales por materia
            for ($i = 1; $i <= 5; $i++) {
                    $tipo = $tiposMateriales[rand(0, count($tiposMateriales) - 1)];
                    $extension = $this->getExtension($tipo);
                    
                    Material::create([
                        'materia_id' => $materia->id,
                        'docente_id' => $docente->id,
                        'titulo' => $this->getTitulo($materia->nombre, $i, $tipo),
                        'descripcion' => $this->getDescripcion($materia->nombre, $tipo),
                        'tipo' => $tipo,
                        'archivo' => "/storage/materiales/{$materia->nombre}_{$i}.{$extension}",
                        'url_externa' => null,
                        'tamaño_archivo' => rand(500000, 50000000), // bytes
                        'fecha_publicacion' => Carbon::now()->subDays(rand(1, 60))->format('Y-m-d'),
                        'etiquetas' => json_encode($this->getEtiquetas($materia->nombre)),
                        'cursos_destinatarios' => json_encode($this->getDestinatarios()),
                        'descargas' => rand(0, 200),
                        'visualizaciones' => rand(0, 500),
                        'estado' => ['activo', 'inactivo', 'borrador'][rand(0, 2)]
                    ]);
                }
        }
    }
    
    private function getExtension($tipo)
    {
        switch ($tipo) {
            case 'PDF': return 'pdf';
            case 'video': return 'mp4';
            case 'presentacion': return 'pptx';
            case 'documento': return 'docx';
            case 'imagen': return 'jpg';
            case 'audio': return 'mp3';
            default: return 'pdf';
        }
    }
    
    private function getTitulo($materia, $numero, $tipo)
    {
        $titulos = [
            'PDF' => "Guía de Estudio #{$numero} - {$materia}",
            'video' => "Video Tutorial #{$numero} - {$materia}",
            'presentacion' => "Presentación #{$numero} - {$materia}",
            'documento' => "Material de Apoyo #{$numero} - {$materia}",
            'imagen' => "Infografía #{$numero} - {$materia}",
            'audio' => "Explicación en Audio #{$numero} - {$materia}"
        ];
        
        return $titulos[$tipo] ?? "Material #{$numero} - {$materia}";
    }
    
    private function getDescripcion($materia, $tipo)
    {
        $descripciones = [
            'PDF' => "Documento con contenido teórico y ejercicios prácticos de {$materia}.",
            'video' => "Video explicativo con ejemplos y demostraciones de {$materia}.",
            'presentacion' => "Presentación con diapositivas del tema principal de {$materia}.",
            'documento' => "Documento complementario con información adicional de {$materia}.",
            'imagen' => "Imagen ilustrativa con esquemas y diagramas de {$materia}.",
            'audio' => "Explicación en audio para reforzar conceptos de {$materia}."
        ];
        
        return $descripciones[$tipo] ?? "Material educativo de {$materia}.";
    }
    
    private function getDestinatarios()
    {
        $opciones = [
            ['tipo' => 'curso', 'id' => rand(1, 7)],
            ['tipo' => 'materia', 'id' => rand(1, 62)],
            ['tipo' => 'publico', 'id' => null]
        ];
        
        return [$opciones[rand(0, 2)]];
    }
    
    private function getEtiquetas($materia)
    {
        $etiquetasBase = ['educativo', 'teoria', 'practica', 'evaluacion'];
        $etiquetasMateria = [
            'Matemáticas' => ['algebra', 'geometria', 'numeros', 'operaciones'],
            'Lenguaje' => ['gramatica', 'literatura', 'escritura', 'lectura'],
            'Ciencias Naturales' => ['biologia', 'fisica', 'quimica', 'experimentos'],
            'Ciencias Sociales' => ['historia', 'geografia', 'civismo', 'cultura']
        ];
        
        $etiquetas = $etiquetasBase;
        if (isset($etiquetasMateria[$materia])) {
            $etiquetas = array_merge($etiquetas, $etiquetasMateria[$materia]);
        }
        
        return array_slice($etiquetas, 0, rand(2, 4));
    }
}