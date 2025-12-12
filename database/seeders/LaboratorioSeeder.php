<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Laboratorio;
use Faker\Factory as Faker;

class LaboratorioSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('es_ES');

        $estados = ['disponible', 'mantenimiento', 'ocupado', 'clausurado'];
        $nombres = [
            'Laboratorio de Química', 'Laboratorio de Física', 'Laboratorio de Biología', 
            'Sala de Cómputo 1', 'Sala de Cómputo 2', 'Laboratorio de Robótica', 
            'Taller de Electrónica', 'Laboratorio de Idiomas', 'Sala de Proyecciones',
            'Laboratorio de Mecánica', 'Invernadero Escolar', 'Laboratorio de Suelos',
            'Taller de Arte', 'Laboratorio Multimedia', 'Sala de Redes'
        ];

        for ($i = 0; $i < 20; $i++) {
            Laboratorio::create([
                'nombre' => $faker->randomElement($nombres) . ' ' . $faker->numberBetween(1, 5),
                'descripcion' => $faker->sentence(10),
                'ubicacion' => 'Edificio ' . $faker->randomLetter() . ' - Piso ' . $faker->numberBetween(1, 3),
                'capacidad' => $faker->numberBetween(15, 40),
                'estado' => $faker->randomElement($estados),
                'encargado' => $faker->name,
                'imagen' => null, // Keeping it simple without images for now
            ]);
        }
    }
}
