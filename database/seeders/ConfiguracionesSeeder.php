<?php

namespace Database\Seeders;

use App\Models\Configuracion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfiguracionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $configuraciones = [
            // Configuraciones generales
            [
                'clave' => 'sistema_nombre',
                'valor' => 'TECH HOME - Sistema Académico Integral',
                'tipo' => 'string',
                'descripcion' => 'Nombre del sistema educativo',
                'categoria' => 'general',
                'es_global' => true,
                'es_editable' => false
            ],
            [
                'clave' => 'sistema_version',
                'valor' => '1.0.0',
                'tipo' => 'string',
                'descripcion' => 'Versión actual del sistema',
                'categoria' => 'general',
                'es_global' => true,
                'es_editable' => false
            ],
            [
                'clave' => 'ano_lectivo_actual',
                'valor' => '2025',
                'tipo' => 'integer',
                'descripcion' => 'Año lectivo activo en el sistema',
                'categoria' => 'academico',
                'es_global' => true,
                'es_editable' => true
            ],
            
            // Configuraciones académicas
            [
                'clave' => 'escala_calificacion_minima',
                'valor' => '0',
                'tipo' => 'integer',
                'descripcion' => 'Calificación mínima en el sistema',
                'categoria' => 'academico',
                'es_global' => true,
                'es_editable' => true
            ],
            [
                'clave' => 'escala_calificacion_maxima',
                'valor' => '100',
                'tipo' => 'integer',
                'descripcion' => 'Calificación máxima en el sistema',
                'categoria' => 'academico',
                'es_global' => true,
                'es_editable' => true
            ],
            [
                'clave' => 'nota_minima_aprobacion',
                'valor' => '51',
                'tipo' => 'integer',
                'descripcion' => 'Nota mínima para aprobar una materia',
                'categoria' => 'academico',
                'es_global' => true,
                'es_editable' => true
            ],
            [
                'clave' => 'periodos_academicos',
                'valor' => '["bimestre_1", "bimestre_2", "bimestre_3", "bimestre_4"]',
                'tipo' => 'json',
                'descripcion' => 'Períodos académicos del año lectivo',
                'categoria' => 'academico',
                'es_global' => true,
                'es_editable' => true
            ],
            
            // Configuraciones de sistema
            [
                'clave' => 'backup_automatico',
                'valor' => 'true',
                'tipo' => 'boolean',
                'descripcion' => 'Realizar backups automáticos del sistema',
                'categoria' => 'sistema',
                'es_global' => true,
                'es_editable' => true
            ],
            [
                'clave' => 'backup_frecuencia',
                'valor' => 'diario',
                'tipo' => 'string',
                'descripcion' => 'Frecuencia de backups automáticos',
                'categoria' => 'sistema',
                'es_global' => true,
                'es_editable' => true,
                'opciones_validas' => '["diario", "semanal", "mensual"]'
            ],
            
            // Configuraciones de notificaciones
            [
                'clave' => 'notificaciones_email_activas',
                'valor' => 'true',
                'tipo' => 'boolean',
                'descripcion' => 'Activar notificaciones por email',
                'categoria' => 'notificaciones',
                'es_global' => true,
                'es_editable' => true
            ]
        ];
        
        foreach ($configuraciones as $config) {
            Configuracion::create($config);
        }
    }
}
