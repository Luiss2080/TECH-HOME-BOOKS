<?php

namespace Database\Seeders;

use App\Models\Certificado;
use App\Models\Estudiante;
use App\Models\Materia;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CertificadosSeeder extends Seeder
{
    public function run(): void
    {
        $estudiantes = Estudiante::with('materias')->get();
        
        foreach ($estudiantes as $estudiante) {
            // Certificado de aprobación de curso
            Certificado::create([
                'estudiante_id' => $estudiante->id,
                'tipo' => 'aprobacion',
                'titulo' => 'Certificado de Aprobación de Curso',
                'descripcion' => "Certifica que {$estudiante->user->name} {$estudiante->user->apellido} ha aprobado satisfactoriamente el curso académico correspondiente al período 2025.",
                'fecha_emision' => Carbon::now()->subDays(rand(1, 30)),
                'fecha_validez' => Carbon::now()->addYears(5),
                'codigo_verificacion' => 'CERT-' . strtoupper(substr(md5($estudiante->id . time()), 0, 10)),
                'firmado_por' => 'Director Académico - Dr. Carlos Mendoza',
                'datos_adicionales' => json_encode([
                    'curso' => $estudiante->curso->nombre,
                    'colegio' => $estudiante->colegio->nombre,
                    'año_lectivo' => '2025',
                    'promedio_general' => rand(70, 95) / 10
                ]),
                'plantilla_utilizada' => 'plantilla_aprobacion_v1',
                'estado' => 'emitido',
                'archivo_url' => "/storage/certificados/aprobacion_{$estudiante->id}.pdf"
            ]);
            
            // Certificado de participación (solo algunos estudiantes)
            if (rand(0, 1)) {
                Certificado::create([
                    'estudiante_id' => $estudiante->id,
                    'tipo' => 'participacion',
                    'titulo' => 'Certificado de Participación',
                    'descripcion' => "Certifica que {$estudiante->user->name} {$estudiante->user->apellido} participó activamente en actividades extracurriculares durante el período académico 2025.",
                    'fecha_emision' => Carbon::now()->subDays(rand(5, 45)),
                    'fecha_validez' => Carbon::now()->addYears(3),
                    'codigo_verificacion' => 'PART-' . strtoupper(substr(md5($estudiante->id . 'part' . time()), 0, 10)),
                    'firmado_por' => 'Coordinador de Actividades - Prof. Ana Vargas',
                    'datos_adicionales' => json_encode([
                        'actividades' => ['Olimpiadas de Matemáticas', 'Festival de Ciencias', 'Concurso de Lectura'],
                        'horas_participacion' => rand(20, 80),
                        'reconocimientos' => rand(0, 1) ? ['Mención Honorífica'] : []
                    ]),
                    'plantilla_utilizada' => 'plantilla_participacion_v1',
                    'estado' => 'emitido',
                    'archivo_url' => "/storage/certificados/participacion_{$estudiante->id}.pdf"
                ]);
            }
            
            // Mención honorífica (solo estudiantes destacados)
            if (rand(1, 10) <= 2) { // 20% de probabilidad
                Certificado::create([
                    'estudiante_id' => $estudiante->id,
                    'tipo' => 'mencion_honorifica',
                    'titulo' => 'Mención Honorífica al Rendimiento Académico',
                    'descripcion' => "Se otorga mención honorífica a {$estudiante->user->name} {$estudiante->user->apellido} por su excelente rendimiento académico y destacada participación en clase.",
                    'fecha_emision' => Carbon::now()->subDays(rand(10, 60)),
                    'fecha_validez' => Carbon::now()->addYears(10),
                    'codigo_verificacion' => 'HONOR-' . strtoupper(substr(md5($estudiante->id . 'honor' . time()), 0, 10)),
                    'firmado_por' => 'Director General - Dr. Carlos Mendoza',
                    'datos_adicionales' => json_encode([
                        'promedio_obtenido' => rand(90, 100),
                        'materias_destacadas' => ['Matemáticas', 'Ciencias Naturales', 'Lenguaje'],
                        'periodo' => 'Primer Semestre 2025',
                        'ranking' => rand(1, 3) . '° lugar en su curso'
                    ]),
                    'plantilla_utilizada' => 'plantilla_mencion_v1',
                    'estado' => 'emitido',
                    'archivo_url' => "/storage/certificados/mencion_{$estudiante->id}.pdf"
                ]);
            }
        }
        
        // Algunos certificados en otros estados
        $certificadosRevision = Certificado::take(3)->get();
        foreach ($certificadosRevision as $cert) {
            $cert->update(['estado' => 'en_revision']);
        }
        
        $certificadosAnulados = Certificado::skip(3)->take(2)->get();
        foreach ($certificadosAnulados as $cert) {
            $cert->update(['estado' => 'anulado']);
        }
    }
}