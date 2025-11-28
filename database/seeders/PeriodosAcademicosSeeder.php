<?php

namespace Database\Seeders;

use App\Models\PeriodoAcademico;
use App\Models\Colegio;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PeriodosAcademicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colegios = Colegio::all();
        $anoActual = Carbon::now()->year;

        foreach ($colegios as $colegio) {
            // Crear periodos académicos para el año actual
            $periodos = [
                [
                    'nombre' => 'Primer Bimestre',
                    'codigo' => 'B1_' . $anoActual,
                    'tipo' => 'bimestre',
                    'fecha_inicio' => Carbon::createFromDate($anoActual, 2, 1)->format('Y-m-d'),
                    'fecha_fin' => Carbon::createFromDate($anoActual, 4, 15)->format('Y-m-d'),
                    'orden' => 1,
                    'es_actual' => true, // primer periodo como actual por defecto
                ],
                [
                    'nombre' => 'Segundo Bimestre',
                    'codigo' => 'B2_' . $anoActual,
                    'tipo' => 'bimestre',
                    'fecha_inicio' => Carbon::createFromDate($anoActual, 4, 16)->format('Y-m-d'),
                    'fecha_fin' => Carbon::createFromDate($anoActual, 6, 30)->format('Y-m-d'),
                    'orden' => 2,
                    'es_actual' => false,
                ],
                [
                    'nombre' => 'Tercer Bimestre',
                    'codigo' => 'B3_' . $anoActual,
                    'tipo' => 'bimestre',
                    'fecha_inicio' => Carbon::createFromDate($anoActual, 8, 1)->format('Y-m-d'),
                    'fecha_fin' => Carbon::createFromDate($anoActual, 10, 15)->format('Y-m-d'),
                    'orden' => 3,
                    'es_actual' => false,
                ],
                [
                    'nombre' => 'Cuarto Bimestre',
                    'codigo' => 'B4_' . $anoActual,
                    'tipo' => 'bimestre',
                    'fecha_inicio' => Carbon::createFromDate($anoActual, 10, 16)->format('Y-m-d'),
                    'fecha_fin' => Carbon::createFromDate($anoActual, 12, 20)->format('Y-m-d'),
                    'orden' => 4,
                    'es_actual' => false,
                ],
            ];

            foreach ($periodos as $periodo) {
                PeriodoAcademico::create(array_merge($periodo, [
                    'colegio_id' => $colegio->id,
                    'ano_lectivo' => $anoActual,
                    'activo' => true,
                    'descripcion' => 'Período académico ' . $periodo['nombre'] . ' del año ' . $anoActual,
                ]));
            }
        }
    }
}