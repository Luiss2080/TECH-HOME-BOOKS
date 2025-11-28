<?php

namespace Database\Seeders;

use App\Models\Libro;
use App\Models\Materia;
use Illuminate\Database\Seeder;

class LibrosSeeder extends Seeder
{
    public function run(): void
    {
        $materias = Materia::all();
        
        $librosBase = [
            'Matemáticas' => [
                ['titulo' => 'Álgebra Fundamental', 'autor' => 'Dr. Juan Pérez', 'editorial' => 'Educativa Plus'],
                ['titulo' => 'Geometría Básica', 'autor' => 'María González', 'editorial' => 'Matemática Fácil'],
                ['titulo' => 'Aritmética Práctica', 'autor' => 'Carlos Mendoza', 'editorial' => 'Números y Más']
            ],
            'Lenguaje' => [
                ['titulo' => 'Gramática Española', 'autor' => 'Ana Rodríguez', 'editorial' => 'Letras Claras'],
                ['titulo' => 'Literatura Infantil', 'autor' => 'Pedro Sánchez', 'editorial' => 'Cuentos y Más'],
                ['titulo' => 'Comprensión Lectora', 'autor' => 'Laura Martín', 'editorial' => 'Leo y Entiendo']
            ],
            'Ciencias Naturales' => [
                ['titulo' => 'Mi Primer Atlas de Ciencias', 'autor' => 'Roberto Silva', 'editorial' => 'Descubre el Mundo'],
                ['titulo' => 'Experimentos Divertidos', 'autor' => 'Carmen López', 'editorial' => 'Ciencia Fácil'],
                ['titulo' => 'El Cuerpo Humano', 'autor' => 'Diego Fernández', 'editorial' => 'Anatomía Básica']
            ],
            'Ciencias Sociales' => [
                ['titulo' => 'Historia de Mi País', 'autor' => 'Elena Torres', 'editorial' => 'Patria Editores'],
                ['titulo' => 'Geografía Mundial', 'autor' => 'Manuel Ruiz', 'editorial' => 'Atlas Global'],
                ['titulo' => 'Civismo y Valores', 'autor' => 'Sandra Vega', 'editorial' => 'Ciudadanía Activa']
            ]
        ];
        
        foreach ($materias as $materia) {
            $nombreMateria = $materia->nombre;
            $libros = $librosBase[$nombreMateria] ?? [
                ['titulo' => "Manual de $nombreMateria", 'autor' => 'Varios Autores', 'editorial' => 'Educativa General'],
                ['titulo' => "Guía Práctica de $nombreMateria", 'autor' => 'Expertos en Educación', 'editorial' => 'Aprende Más'],
            ];
            
            foreach ($libros as $libroData) {
                Libro::create([
                    'materia_id' => $materia->id,
                    'titulo' => $libroData['titulo'],
                    'autor' => $libroData['autor'],
                    'editorial' => $libroData['editorial'],
                    'isbn' => '978-' . rand(1000000000, 9999999999),
                    'categoria' => $nombreMateria,
                    'descripcion' => "Libro educativo de {$nombreMateria} diseñado para estudiantes de nivel básico y medio.",
                    'nivel_educativo' => rand(0, 1) ? 'primaria' : 'secundaria',
                    'ano_publicacion' => rand(2020, 2025),
                    'numero_paginas' => rand(150, 400),
                    'idioma' => 'es',
                    'archivo_pdf' => "/storage/libros/{$libroData['titulo']}.pdf",
                    'portada' => "/storage/portadas/{$libroData['titulo']}.jpg",
                    'disponibilidad' => ['publico', 'por_curso', 'por_materia'][rand(0, 2)],
                    'descargas' => rand(0, 500),
                    'destacado' => rand(0, 1) ? true : false,
                    'estado' => 'activo'
                ]);
            }
        }
        
        // Agregar algunos libros generales
        $librosGenerales = [
            ['titulo' => 'Metodología de Estudio', 'categoria' => 'Metodología', 'autor' => 'Dr. Estudio Fácil'],
            ['titulo' => 'Técnicas de Aprendizaje', 'categoria' => 'Pedagogía', 'autor' => 'Prof. Ana Enseña'],
            ['titulo' => 'Desarrollo Personal', 'categoria' => 'Autoayuda', 'autor' => 'Lic. Crece Más'],
            ['titulo' => 'Historia Universal', 'categoria' => 'Historia', 'autor' => 'Historiador Mundial'],
            ['titulo' => 'Ciencias de la Computación', 'categoria' => 'Tecnología', 'autor' => 'Ing. Código Limpio']
        ];
        
        foreach ($librosGenerales as $libro) {
            Libro::create([
                'materia_id' => null,
                'titulo' => $libro['titulo'],
                'autor' => $libro['autor'],
                'editorial' => 'Editorial TECH HOME',
                'isbn' => '978-' . rand(1000000000, 9999999999),
                'categoria' => $libro['categoria'],
                'descripcion' => "Libro complementario de {$libro['categoria']} para el desarrollo integral de los estudiantes.",
                'nivel_educativo' => 'secundaria',
                'ano_publicacion' => rand(2022, 2025),
                'numero_paginas' => rand(200, 350),
                'idioma' => 'es',
                'archivo_pdf' => "/storage/libros/{$libro['titulo']}.pdf",
                'portada' => "/storage/portadas/{$libro['titulo']}.jpg",
                'disponibilidad' => 'publico',
                'descargas' => rand(100, 1000),
                'destacado' => true,
                'estado' => 'activo'
            ]);
        }
    }
}