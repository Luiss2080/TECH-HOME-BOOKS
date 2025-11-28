<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usuario administrador principal
        User::create([
            'name' => 'Administrador',
            'apellido' => 'Sistema',
            'email' => 'admin@tech-home.com',
            'password' => Hash::make('admin123'),
            'ci' => '12345678',
            'telefono' => '+591 70000000',
            'direccion' => 'Oficina Central',
            'rol' => 'admin',
            'estado' => 'activo',
            'email_verified_at' => now()
        ]);
        
        // Usuario docente de ejemplo
        User::create([
            'name' => 'María',
            'apellido' => 'García',
            'email' => 'maria.garcia@tech-home.com',
            'password' => Hash::make('docente123'),
            'ci' => '87654321',
            'fecha_nacimiento' => '1985-05-15',
            'telefono' => '+591 70000001',
            'direccion' => 'Zona Central',
            'rol' => 'docente',
            'estado' => 'activo',
            'email_verified_at' => now()
        ]);
        
        // Usuario estudiante de ejemplo
        User::create([
            'name' => 'Juan',
            'apellido' => 'Pérez',
            'email' => 'juan.perez@estudiante.com',
            'password' => Hash::make('estudiante123'),
            'ci' => '11223344',
            'fecha_nacimiento' => '2008-03-20',
            'telefono' => '+591 70000002',
            'direccion' => 'Zona Sur',
            'rol' => 'estudiante',
            'estado' => 'activo',
            'email_verified_at' => now()
        ]);
    }
}
