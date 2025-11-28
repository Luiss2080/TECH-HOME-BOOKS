<?php

namespace Database\Seeders;

use App\Models\Colegio;
use App\Models\Docente;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener el usuario docente creado en UsersSeeder
        $userDocente = User::where('email', 'maria.garcia@tech-home.com')->first();
        $colegioCentral = Colegio::where('nombre', 'LIKE', '%Central%')->first();
        
        if ($userDocente && $colegioCentral) {
            Docente::create([
                'user_id' => $userDocente->id,
                'colegio_id' => $colegioCentral->id,
                'codigo_docente' => 'DOC-001',
                'especialidad' => 'Matemáticas y Física',
                'titulo_profesional' => 'Licenciatura en Matemáticas',
                'experiencia' => '10 años de experiencia en educación secundaria',
                'tipo_contrato' => 'tiempo_completo',
                'fecha_contratacion' => '2020-02-01',
                'estado_laboral' => 'activo',
                'salario' => 8500.00,
                'observaciones' => 'Docente especializada en ciencias exactas'
            ]);
        }
    }
}
