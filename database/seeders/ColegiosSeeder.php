<?php

namespace Database\Seeders;

use App\Models\Colegio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColegiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colegios = [
            [
                'nombre' => 'Colegio TECH HOME - Sede Central',
                'direccion' => 'Av. Principal #123, Zona Centro',
                'telefono' => '+591 4-4000000',
                'email' => 'info@tech-home-central.edu.bo',
                'director' => 'Dr. Carlos Mendoza',
                'niveles_educativos' => json_encode(['primaria', 'secundaria']),
                'ano_lectivo_actual' => 2025,
                'estado' => 'activo',
                'descripcion' => 'Sede central del sistema educativo TECH HOME'
            ],
            [
                'nombre' => 'Colegio TECH HOME - Sede Norte',
                'direccion' => 'Calle Norte #456, Zona Norte',
                'telefono' => '+591 4-4000001',
                'email' => 'info@tech-home-norte.edu.bo',
                'director' => 'Lic. Ana Vargas',
                'niveles_educativos' => json_encode(['secundaria']),
                'ano_lectivo_actual' => 2025,
                'estado' => 'activo',
                'descripcion' => 'Sede norte especializada en educación secundaria'
            ],
            [
                'nombre' => 'Colegio TECH HOME - Sede Sur',
                'direccion' => 'Av. Sur #789, Zona Sur',
                'telefono' => '+591 4-4000002',
                'email' => 'info@tech-home-sur.edu.bo',
                'director' => 'Ing. Roberto Silva',
                'niveles_educativos' => json_encode(['primaria']),
                'ano_lectivo_actual' => 2025,
                'estado' => 'activo',
                'descripcion' => 'Sede sur especializada en educación primaria'
            ]
        ];
        
        foreach ($colegios as $colegio) {
            Colegio::create($colegio);
        }
    }
}
