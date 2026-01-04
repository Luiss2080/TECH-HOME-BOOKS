<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibrosSeeder extends Seeder
{
    public function run(): void
    {
        // Datos REALES del SQL systemVentas - tabla libros (30 registros)
        $libros = [
            ['id' => 1, 'codigo' => 'LIB-P1-001', 'titulo' => 'Libro Digital Primaria 1ro TEST', 'nivel' => 'PRIMARIA', 'grado' => '1ro Primaria', 'precio_venta' => 25.00, 'stock_actual' => 94, 'stock_minimo' => 10, 'descripcion' => 'Libro digital para primer grado de primaria', 'activo' => true, 'fecha_registro' => '2025-10-01 10:00:00'],
            ['id' => 2, 'codigo' => 'LIB-P2-001', 'titulo' => 'Libro Digital Primaria 2do TEST', 'nivel' => 'PRIMARIA', 'grado' => '2do Primaria', 'precio_venta' => 25.00, 'stock_actual' => 64, 'stock_minimo' => 10, 'descripcion' => 'Libro digital para segundo grado de primaria', 'activo' => true, 'fecha_registro' => '2025-10-01 10:00:00'],
            ['id' => 3, 'codigo' => 'LIB-S1-001', 'titulo' => 'Libro Digital Secundaria 1ro TEST', 'nivel' => 'SECUNDARIA', 'grado' => '1ro Secundaria', 'precio_venta' => 30.00, 'stock_actual' => 72, 'stock_minimo' => 10, 'descripcion' => 'Libro digital para primer grado de secundaria', 'activo' => true, 'fecha_registro' => '2025-10-01 10:00:00'],
            ['id' => 4, 'codigo' => 'LIB-S2-001', 'titulo' => 'Libro Digital Secundaria 2do TEST', 'nivel' => 'SECUNDARIA', 'grado' => '2do Secundaria', 'precio_venta' => 30.00, 'stock_actual' => 53, 'stock_minimo' => 10, 'descripcion' => 'Libro digital para segundo grado de secundaria', 'activo' => true, 'fecha_registro' => '2025-10-01 10:00:00'],
            ['id' => 5, 'codigo' => 'LIB-ARD-001', 'titulo' => 'Guía Arduino Básico TEST', 'nivel' => 'SECUNDARIA', 'grado' => 'Cursos Especiales', 'precio_venta' => 45.00, 'stock_actual' => 49, 'stock_minimo' => 5, 'descripcion' => 'Manual práctico de Arduino para principiantes', 'activo' => true, 'fecha_registro' => '2025-10-01 10:00:00'],
            ['id' => 6, 'codigo' => 'TEST-001', 'titulo' => 'Libro de Prueba TEST', 'nivel' => 'PRIMARIA', 'grado' => 'Test', 'precio_venta' => 44.00, 'stock_actual' => 22, 'stock_minimo' => 5, 'descripcion' => 'Libro para pruebas del sistema', 'activo' => true, 'fecha_registro' => '2025-10-14 10:55:32'],
            ['id' => 7, 'codigo' => 'LIB-SS-02', 'titulo' => 'ROBOTICA Y TECNOLOGIA 2', 'nivel' => 'SECUNDARIA', 'grado' => '2do', 'precio_venta' => 150.00, 'stock_actual' => -2, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-10-25 10:59:11'],
            ['id' => 8, 'codigo' => 'DIS-001', 'titulo' => 'Arduino UNO CH340 con cable', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 120.00, 'stock_actual' => 19, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 11:54:47'],
            ['id' => 9, 'codigo' => 'MAT-001', 'titulo' => 'Módulo Bluetooth HC-05', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 65.00, 'stock_actual' => 19, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 16:13:55'],
            ['id' => 10, 'codigo' => 'MAT-002', 'titulo' => 'Motor reductor amarillo Doble eje', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 20.00, 'stock_actual' => 48, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 16:19:31'],
            ['id' => 11, 'codigo' => 'MAT-003', 'titulo' => 'Rueda para motor reductor', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 10.00, 'stock_actual' => 23, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 16:21:07'],
            ['id' => 12, 'codigo' => 'MAT-004', 'titulo' => 'Porta pila PAR 3.7 V', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 18.00, 'stock_actual' => 49, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 16:22:52'],
            ['id' => 13, 'codigo' => 'MAT-005', 'titulo' => 'Servomotor MG90 eje metálico', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 35.00, 'stock_actual' => 20, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 16:24:53'],
            ['id' => 14, 'codigo' => 'MAT-006', 'titulo' => 'Puente H L298N', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 40.00, 'stock_actual' => 29, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 16:35:18'],
            ['id' => 15, 'codigo' => 'MAT-007', 'titulo' => 'Cable Jumper 20 cm M-M', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 0.50, 'stock_actual' => 790, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 16:39:13'],
            ['id' => 16, 'codigo' => 'MAT-008', 'titulo' => 'Cable Jumper 20 cm H-M', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 0.50, 'stock_actual' => 790, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 16:41:39'],
            ['id' => 17, 'codigo' => 'MAT-009', 'titulo' => 'Par pilas Cafini recargable 3.7 V', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 35.00, 'stock_actual' => 24, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 16:44:32'],
            ['id' => 18, 'codigo' => 'MAT-010', 'titulo' => 'Interruptor pequeño para proyectos', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 3.00, 'stock_actual' => 49, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 16:46:33'],
            ['id' => 19, 'codigo' => 'MAT-011', 'titulo' => 'Estaño BERA 8mm metro', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 6.00, 'stock_actual' => 58, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 16:50:44'],
            ['id' => 20, 'codigo' => 'MAT-012', 'titulo' => 'Chasis SUMO con 4 tornillos para motor 12.5cm', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 120.00, 'stock_actual' => 9, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 17:14:06'],
            ['id' => 21, 'codigo' => 'MAT-013', 'titulo' => 'Pasta para soldar 10gr', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 13.00, 'stock_actual' => 19, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 17:15:48'],
            ['id' => 22, 'codigo' => 'MAT-014', 'titulo' => 'Termocontraible 3mm metro', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 5.00, 'stock_actual' => 200, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 17:19:14'],
            ['id' => 23, 'codigo' => 'MAT-015', 'titulo' => 'Barra de silicona pequeña', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 2.00, 'stock_actual' => 18, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 17:30:40'],
            ['id' => 24, 'codigo' => 'MAT-016', 'titulo' => 'Sensor Ultrasónico HC-SR04', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 35.00, 'stock_actual' => 50, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 17:34:26'],
            ['id' => 25, 'codigo' => 'MAT-017', 'titulo' => 'Cable de RED UTP CAT-5', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 6.00, 'stock_actual' => 100, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 17:37:10'],
            ['id' => 26, 'codigo' => 'MAT-018', 'titulo' => 'Protoboard mediano 400 pts', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 20.00, 'stock_actual' => 50, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 17:38:42'],
            ['id' => 27, 'codigo' => 'MAT-019', 'titulo' => 'Foquito LED 3mm', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 0.50, 'stock_actual' => 1000, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 17:41:43'],
            ['id' => 28, 'codigo' => 'MAT-020', 'titulo' => 'Resistencia 1/8 220 Ohm', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 0.50, 'stock_actual' => 1000, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 17:44:00'],
            ['id' => 29, 'codigo' => 'MAT-021', 'titulo' => 'Cautin 50W con regulador analógico', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 100.00, 'stock_actual' => 6, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 17:46:19'],
            ['id' => 30, 'codigo' => 'MAT-022', 'titulo' => 'Sensor de lluvia YL-83', 'nivel' => 'SECUNDARIA', 'grado' => 'TEC', 'precio_venta' => 40.00, 'stock_actual' => 20, 'stock_minimo' => 5, 'descripcion' => null, 'activo' => true, 'fecha_registro' => '2025-11-21 17:49:39'],
        ];

        DB::table('libros')->insert($libros);
    }
}