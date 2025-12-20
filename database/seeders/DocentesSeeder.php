<?php

namespace Database\Seeders;

use App\Models\Colegio;
use App\Models\Docente;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DocentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asegurar que existan colegios
        if (Colegio::count() === 0) {
            $this->command->warn('No hay colegios registrados. Creando colegio por defecto...');
            Colegio::create([
                'nombre' => 'Tech Home Instituto',
                'direccion' => 'Zona Central',
                'telefono' => '+591 70000000',
                'email' => 'contacto@tech-home.com',
                'director' => 'Admin',
                'tipo' => 'privado',
                'estado' => 'activo'
            ]);
        }
        
        $colegios = Colegio::all();
        
        // Verificar si existe el usuario docente principal
        $userDocente = User::where('email', 'maria.garcia@tech-home.com')->first();
        
        if (!$userDocente) {
            $this->command->warn('Usuario docente principal no existe. Verifica que UsersSeeder se haya ejecutado primero.');
            return;
        }
        
        // Crear el docente original (María García)
        $colegioPrincipal = $colegios->first();
        
        if ($userDocente && $colegioPrincipal) {
            // Solo crear si no existe
            if (!Docente::where('user_id', $userDocente->id)->exists()) {
                Docente::create([
                    'user_id' => $userDocente->id,
                    'colegio_id' => $colegioPrincipal->id,
                    'codigo_docente' => 'DOC-' . str_pad($userDocente->id, 5, '0', STR_PAD_LEFT),
                    'especialidad' => 'Matemáticas y Física',
                    'titulo_profesional' => 'Licenciatura en Educación - Matemáticas',
                    'experiencia' => '10 años de experiencia en educación secundaria',
                    'tipo_contrato' => 'tiempo_completo',
                    'fecha_contratacion' => '2015-01-15',
                    'estado_laboral' => 'activo',
                    'salario' => 8500.00,
                    'observaciones' => 'Docente especializada en ciencias exactas'
                ]);
                
                $this->command->info('✓ Docente principal creado: María García');
            } else {
                $this->command->info('✓ Docente principal ya existe: María García');
            }
        }
        
        // Crear docentes adicionales
        $docentesAdicionales = [
            [
                'nombre' => 'Carlos',
                'apellido' => 'Mendoza',
                'email' => 'carlos.mendoza@tech-home.com',
                'especialidad' => 'Historia y Literatura',
                'titulo' => 'Licenciatura en Historia',
                'experiencia' => '8 años de experiencia docente'
            ],
            [
                'nombre' => 'Ana',
                'apellido' => 'Rodriguez',
                'email' => 'ana.rodriguez@tech-home.com',
                'especialidad' => 'Química y Biología',
                'titulo' => 'Licenciatura en Química',
                'experiencia' => '6 años de experiencia docente'
            ],
            [
                'nombre' => 'José',
                'apellido' => 'Fernández',
                'email' => 'jose.fernandez@tech-home.com',
                'especialidad' => 'Física y Matemáticas',
                'titulo' => 'Ingeniería Física',
                'experiencia' => '12 años de experiencia docente'
            ],
            [
                'nombre' => 'Laura',
                'apellido' => 'Vargas',
                'email' => 'laura.vargas@tech-home.com',
                'especialidad' => 'Literatura e Inglés',
                'titulo' => 'Licenciatura en Filología',
                'experiencia' => '5 años de experiencia docente'
            ]
        ];
        
        foreach ($docentesAdicionales as $index => $docenteData) {
            // Verificar si el usuario ya existe
            $user = User::where('email', $docenteData['email'])->first();
            
            if (!$user) {
                // Crear usuario para el docente
                $user = User::create([
                    'name' => $docenteData['nombre'],
                    'apellido' => $docenteData['apellido'],
                    'email' => $docenteData['email'],
                    'password' => Hash::make('docente123'),
                    'ci' => '8000000' . ($index + 1),
                    'telefono' => '+591 7000000' . ($index + 2),
                    'direccion' => 'Zona ' . ['Norte', 'Sur', 'Este', 'Oeste'][$index % 4],
                    'rol' => 'docente',
                    'estado' => 'activo',
                    'email_verified_at' => now(),
                    'genero' => ['masculino', 'femenino', 'masculino', 'femenino'][$index % 4],
                    'profesion' => $docenteData['titulo'],
                    'nivel_estudios' => 'Licenciatura'
                ]);
            }
            
            // Verificar si el docente ya existe
            if (!Docente::where('user_id', $user->id)->exists()) {
                $codigoDocente = 'DOC-' . str_pad($user->id, 5, '0', STR_PAD_LEFT);
                
                Docente::create([
                    'user_id' => $user->id,
                    'colegio_id' => $colegios->random()->id,
                    'codigo_docente' => $codigoDocente,
                    'especialidad' => $docenteData['especialidad'],
                    'titulo_profesional' => $docenteData['titulo'],
                    'experiencia' => $docenteData['experiencia'],
                    'tipo_contrato' => ['tiempo_completo', 'medio_tiempo'][rand(0, 1)],
                    'fecha_contratacion' => '202' . rand(0, 3) . '-0' . rand(1, 9) . '-15',
                    'estado_laboral' => 'activo',
                    'salario' => rand(6000, 10000),
                    'observaciones' => 'Docente especializado en ' . strtolower($docenteData['especialidad'])
                ]);
                
                $this->command->info('✓ Docente creado: ' . $docenteData['nombre'] . ' ' . $docenteData['apellido']);
            } else {
                $this->command->info('✓ Docente ya existe: ' . $docenteData['nombre'] . ' ' . $docenteData['apellido']);
            }
        }
        
        $this->command->info('✓ DocentesSeeder completado. Total docentes: ' . Docente::count());
    }
}
