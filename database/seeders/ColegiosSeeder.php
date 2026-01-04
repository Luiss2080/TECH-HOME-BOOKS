<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColegiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Datos REALES del SQL systemVentas - tabla colegios
        $colegios = [
            [
                'id' => 1,
                'nombre_colegio' => 'TECH HOME BOLIVIA',
                'direccion' => 'Zona Norte, Santa Cruz',
                'telefono' => '70123456',
                'email' => 'info@techhomebolivia.com',
                'departamento' => 'Santa Cruz',
                'nacionalidad' => 'Bolivia',
                'activo' => true,
                'fecha_registro' => '2025-10-24 23:45:55',
                'usuario_registro' => 1
            ],
            [
                'id' => 2,
                'nombre_colegio' => 'Colegio La Salle',
                'direccion' => 'Av. Cristo Redentor',
                'telefono' => '33456789',
                'email' => 'administracion@lasallescz.edu.bo',
                'departamento' => 'Santa Cruz',
                'nacionalidad' => 'Bolivia',
                'activo' => true,
                'fecha_registro' => '2025-10-24 23:45:55',
                'usuario_registro' => 1
            ],
            [
                'id' => 3,
                'nombre_colegio' => 'Unidad Educativa Santa Rosa',
                'direccion' => 'Barrio Las Flores',
                'telefono' => '33789123',
                'email' => 'secretaria@santarosa.edu.bo',
                'departamento' => 'Santa Cruz',
                'nacionalidad' => 'Bolivia',
                'activo' => true,
                'fecha_registro' => '2025-10-24 23:45:55',
                'usuario_registro' => 1
            ],
            [
                'id' => 4,
                'nombre_colegio' => 'Colegio Nacional El Pari',
                'direccion' => 'Villa 1ro de Mayo',
                'telefono' => '33123456',
                'email' => 'direccion@elpari.edu.bo',
                'departamento' => 'Santa Cruz',
                'nacionalidad' => 'Bolivia',
                'activo' => true,
                'fecha_registro' => '2025-10-24 23:45:55',
                'usuario_registro' => 1
            ],
            [
                'id' => 5,
                'nombre_colegio' => 'Universidad Privada Domingo Savio',
                'direccion' => 'Plan 3000',
                'telefono' => '33987654',
                'email' => 'info@upds.edu.bo',
                'departamento' => 'Santa Cruz',
                'nacionalidad' => 'Bolivia',
                'activo' => true,
                'fecha_registro' => '2025-10-24 23:45:55',
                'usuario_registro' => 1
            ],
            [
                'id' => 6,
                'nombre_colegio' => 'SAN PABLO',
                'direccion' => '5to anillo Av. San Pablo',
                'telefono' => '',
                'email' => '',
                'departamento' => 'Santa Cruz',
                'nacionalidad' => 'Bolivia',
                'activo' => true,
                'fecha_registro' => '2025-10-25 10:50:23',
                'usuario_registro' => 50
            ],
            [
                'id' => 7,
                'nombre_colegio' => 'Colegio Alemán',
                'direccion' => '4to Anillo',
                'telefono' => '',
                'email' => '',
                'departamento' => 'Santa Cruz',
                'nacionalidad' => 'Bolivia',
                'activo' => true,
                'fecha_registro' => '2025-11-08 09:02:03',
                'usuario_registro' => 50
            ],
            // Datos adicionales para llegar a 20
            [
                'id' => 8,
                'nombre_colegio' => 'Colegio San Agustín',
                'direccion' => 'Av. Santos Dumont',
                'telefono' => '33445566',
                'email' => 'contacto@sanagustin.edu.bo',
                'departamento' => 'Santa Cruz',
                'nacionalidad' => 'Bolivia',
                'activo' => true,
                'fecha_registro' => '2025-11-15 10:00:00',
                'usuario_registro' => 1
            ],
            [
                'id' => 9,
                'nombre_colegio' => 'Instituto Tecnológico',
                'direccion' => 'Av. Busch',
                'telefono' => '33556677',
                'email' => 'info@tecnologico.edu.bo',
                'departamento' => 'Santa Cruz',
                'nacionalidad' => 'Bolivia',
                'activo' => true,
                'fecha_registro' => '2025-11-16 11:00:00',
                'usuario_registro' => 1
            ],
            [
                'id' => 10,
                'nombre_colegio' => 'Colegio Internacional',
                'direccion' => 'Zona Equipetrol',
                'telefono' => '33667788',
                'email' => 'admin@internacional.edu.bo',
                'departamento' => 'Santa Cruz',
                'nacionalidad' => 'Bolivia',
                'activo' => true,
                'fecha_registro' => '2025-11-17 12:00:00',
                'usuario_registro' => 1
            ],
            [
                'id' => 11,
                'nombre_colegio' => 'Colegio Boliviano Holandés',
                'direccion' => 'Av. Banzer',
                'telefono' => '33778899',
                'email' => 'contacto@bolivianoholandes.edu.bo',
                'departamento' => 'Santa Cruz',
                'nacionalidad' => 'Bolivia',
                'activo' => true,
                'fecha_registro' => '2025-11-18 13:00:00',
                'usuario_registro' => 1
            ],
            [
                'id' => 12,
                'nombre_colegio' => 'Unidad Educativa Cristo Rey',
                'direccion' => 'Zona Centro',
                'telefono' => '33889900',
                'email' => 'secretaria@cristorey.edu.bo',
                'departamento' => 'Santa Cruz',
                'nacionalidad' => 'Bolivia',
                'activo' => true,
                'fecha_registro' => '2025-11-19 14:00:00',
                'usuario_registro' => 1
            ],
            [
                'id' => 13,
                'nombre_colegio' => 'Colegio Don Bosco',
                'direccion' => 'Av. 26 de Febrero',
                'telefono' => '33990011',
                'email' => 'info@donbosco.edu.bo',
                'departamento' => 'Santa Cruz',
                'nacionalidad' => 'Bolivia',
                'activo' => true,
                'fecha_registro' => '2025-11-20 15:00:00',
                'usuario_registro' => 1
            ],
            [
                'id' => 14,
                'nombre_colegio' => 'Instituto Educacional del Norte',
                'direccion' => 'Zona Norte',
                'telefono' => '34001122',
                'email' => 'contacto@ienorte.edu.bo',
                'departamento' => 'Santa Cruz',
                'nacionalidad' => 'Bolivia',
                'activo' => true,
                'fecha_registro' => '2025-11-21 16:00:00',
                'usuario_registro' => 1
            ],
            [
                'id' => 15,
                'nombre_colegio' => 'Colegio Militar del Ejército',
                'direccion' => 'Av. Roca y Coronado',
                'telefono' => '34112233',
                'email' => 'admin@cme.edu.bo',
                'departamento' => 'Santa Cruz',
                'nacionalidad' => 'Bolivia',
                'activo' => true,
                'fecha_registro' => '2025-11-22 17:00:00',
                'usuario_registro' => 1
            ],
            [
                'id' => 16,
                'nombre_colegio' => 'Unidad Educativa 1ro de Abril',
                'direccion' => 'Villa 1ro de Abril',
                'telefono' => '34223344',
                'email' => 'ue1abril@gmail.com',
                'departamento' => 'Santa Cruz',
                'nacionalidad' => 'Bolivia',
                'activo' => true,
                'fecha_registro' => '2025-11-23 18:00:00',
                'usuario_registro' => 1
            ],
            [
                'id' => 17,
                'nombre_colegio' => 'Colegio Gabriel René Moreno',
                'direccion' => 'Av. Grigotá',
                'telefono' => '34334455',
                'email' => 'grmoreno@edu.bo',
                'departamento' => 'Santa Cruz',
                'nacionalidad' => 'Bolivia',
                'activo' => true,
                'fecha_registro' => '2025-11-24 19:00:00',
                'usuario_registro' => 1
            ],
            [
                'id' => 18,
                'nombre_colegio' => 'Instituto de Formación Técnica',
                'direccion' => 'Av. Alemana',
                'telefono' => '34445566',
                'email' => 'ift@tecnico.edu.bo',
                'departamento' => 'Santa Cruz',
                'nacionalidad' => 'Bolivia',
                'activo' => true,
                'fecha_registro' => '2025-11-25 20:00:00',
                'usuario_registro' => 1
            ],
            [
                'id' => 19,
                'nombre_colegio' => 'Colegio San Francisco de Asís',
                'direccion' => 'Av. Beni',
                'telefono' => '34556677',
                'email' => 'sanfrancisco@edu.bo',
                'departamento' => 'Santa Cruz',
                'nacionalidad' => 'Bolivia',
                'activo' => true,
                'fecha_registro' => '2025-11-26 21:00:00',
                'usuario_registro' => 1
            ],
            [
                'id' => 20,
                'nombre_colegio' => 'Universidad Autónoma Gabriel René Moreno',
                'direccion' => 'Av. Busch',
                'telefono' => '34667788',
                'email' => 'uagrm@universidad.edu.bo',
                'departamento' => 'Santa Cruz',
                'nacionalidad' => 'Bolivia',
                'activo' => true,
                'fecha_registro' => '2025-11-27 22:00:00',
                'usuario_registro' => 1
            ],
        ];
        
        DB::table('colegios')->insert($colegios);
    }
}
