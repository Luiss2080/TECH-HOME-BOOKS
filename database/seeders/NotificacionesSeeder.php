<?php

namespace Database\Seeders;

use App\Models\Notificacion;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NotificacionesSeeder extends Seeder
{
    public function run(): void
    {
        $usuarios = User::all();
        $admin = User::where('rol', 'admin')->first();
        $docentes = User::where('rol', 'docente')->get();
        $estudiantes = User::where('rol', 'estudiante')->get();
        
        // Notificaciones para estudiantes
        foreach ($estudiantes as $estudiante) {
            // Notificación de nueva tarea
            Notificacion::create([
                'user_id' => $estudiante->id,
                'emisor_id' => $docentes->random()->id,
                'titulo' => 'Nueva Tarea Disponible',
                'mensaje' => 'Se ha publicado una nueva tarea en Matemáticas. Fecha de entrega: ' . Carbon::now()->addDays(7)->format('d/m/Y'),
                'tipo' => 'tarea',
                'modulo' => 'tareas',
                'datos_adicionales' => json_encode(['tarea_id' => rand(1, 10), 'materia' => 'Matemáticas']),
                'leida' => rand(0, 1) ? true : false,
                'prioridad' => 'normal',
                'expira_en' => Carbon::now()->addDays(30)
            ]);
            
            // Notificación de calificación
            Notificacion::create([
                'user_id' => $estudiante->id,
                'emisor_id' => $docentes->random()->id,
                'titulo' => 'Calificación Registrada',
                'mensaje' => 'Tu calificación del examen de Ciencias Naturales ha sido registrada: ' . rand(70, 95) . '/100',
                'tipo' => 'calificacion',
                'modulo' => 'calificaciones',
                'datos_adicionales' => json_encode(['examen_id' => rand(1, 5), 'nota' => rand(70, 95)]),
                'leida' => rand(0, 1) ? true : false,
                'prioridad' => 'alta',
                'expira_en' => Carbon::now()->addDays(60)
            ]);
            
            // Notificación de próximo examen
            Notificacion::create([
                'user_id' => $estudiante->id,
                'emisor_id' => $docentes->random()->id,
                'titulo' => 'Recordatorio: Próximo Examen',
                'mensaje' => 'Recuerda que tienes un examen de Lenguaje programado para ' . Carbon::now()->addDays(3)->format('d/m/Y') . ' a las 10:00 AM',
                'tipo' => 'recordatorio',
                'modulo' => 'examenes',
                'datos_adicionales' => json_encode(['examen_id' => rand(1, 5), 'fecha' => Carbon::now()->addDays(3)->format('Y-m-d')]),
                'leida' => rand(0, 1) ? true : false,
                'prioridad' => 'alta',
                'expira_en' => Carbon::now()->addDays(3)
            ]);
        }
        
        // Notificaciones para docentes
        foreach ($docentes as $docente) {
            // Notificación de entrega de tarea
            Notificacion::create([
                'user_id' => $docente->id,
                'emisor_id' => $admin->id,
                'titulo' => 'Nuevas Entregas Pendientes',
                'mensaje' => 'Tienes ' . rand(3, 15) . ' entregas de tareas pendientes de calificar',
                'tipo' => 'trabajo_pendiente',
                'modulo' => 'tareas',
                'datos_adicionales' => json_encode(['entregas_pendientes' => rand(3, 15)]),
                'leida' => rand(0, 1) ? true : false,
                'prioridad' => 'normal',
                'expira_en' => Carbon::now()->addDays(15)
            ]);
            
            // Notificación de reunión
            Notificacion::create([
                'user_id' => $docente->id,
                'emisor_id' => $admin->id,
                'titulo' => 'Reunión Académica Programada',
                'mensaje' => 'Se ha programado una reunión académica para ' . Carbon::now()->addDays(5)->format('d/m/Y') . ' a las 14:00. Sala de profesores.',
                'tipo' => 'evento',
                'modulo' => 'calendario',
                'datos_adicionales' => json_encode(['tipo_evento' => 'reunion', 'lugar' => 'Sala de profesores']),
                'leida' => rand(0, 1) ? true : false,
                'prioridad' => 'alta',
                'expira_en' => Carbon::now()->addDays(5)
            ]);
        }
        
        // Notificaciones del sistema para administradores
        if ($admin) {
            Notificacion::create([
                'user_id' => $admin->id,
                'emisor_id' => null,
                'titulo' => 'Respaldo del Sistema Completado',
                'mensaje' => 'El respaldo automático del sistema se ha completado exitosamente. Fecha: ' . Carbon::now()->format('d/m/Y H:i'),
                'tipo' => 'sistema',
                'modulo' => 'backups',
                'datos_adicionales' => json_encode(['backup_size' => rand(500, 2000) . ' MB']),
                'leida' => false,
                'prioridad' => 'baja',
                'expira_en' => Carbon::now()->addDays(7)
            ]);
            
            Notificacion::create([
                'user_id' => $admin->id,
                'emisor_id' => null,
                'titulo' => 'Reporte Mensual Disponible',
                'mensaje' => 'El reporte académico mensual ha sido generado y está disponible para su revisión.',
                'tipo' => 'reporte',
                'modulo' => 'reportes',
                'datos_adicionales' => json_encode(['periodo' => Carbon::now()->format('Y-m'), 'tipo_reporte' => 'academico']),
                'leida' => rand(0, 1) ? true : false,
                'prioridad' => 'normal',
                'expira_en' => Carbon::now()->addDays(30)
            ]);
        }
        
        // Notificaciones generales para todos
        foreach ($usuarios->take(5) as $usuario) {
            Notificacion::create([
                'user_id' => $usuario->id,
                'emisor_id' => $admin->id,
                'titulo' => 'Mantenimiento Programado del Sistema',
                'mensaje' => 'El sistema estará en mantenimiento el próximo domingo de 2:00 AM a 6:00 AM. Durante este tiempo no estará disponible.',
                'tipo' => 'mantenimiento',
                'modulo' => 'sistema',
                'datos_adicionales' => json_encode(['inicio' => 'domingo 2:00 AM', 'fin' => 'domingo 6:00 AM']),
                'leida' => rand(0, 1) ? true : false,
                'prioridad' => 'alta',
                'expira_en' => Carbon::now()->addDays(7)
            ]);
        }
    }
}