<?php

namespace App\Http\Controllers\Estudiante;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        // Verificar que el usuario esté autenticado
        if (!Session::has('user_id') || Session::get('user_role') !== 'estudiante') {
            return redirect()->route('login');
        }
        
        $userId = Session::get('user_id');
        
        // Obtener el estudiante actual
        $estudiante = DB::table('estudiantes')
            ->join('users', 'estudiantes.user_id', '=', 'users.id')
            ->where('estudiantes.user_id', $userId)
            ->select('estudiantes.*', 'users.name', 'users.apellido', 'users.email')
            ->first();
        
        // Si no existe el estudiante, obtener datos mínimos
        $estudianteId = $estudiante->id ?? 0;
        
        // Obtener estadísticas del estudiante
        $stats = [
            'materias' => DB::table('estudiante_materia')
                ->where('estudiante_id', $estudianteId)
                ->count(),
            'materias_activas' => DB::table('estudiante_materia')
                ->where('estudiante_id', $estudianteId)
                ->count(),
            'tareas_pendientes' => DB::table('entrega_tareas')
                ->join('tareas', 'entrega_tareas.tarea_id', '=', 'tareas.id')
                ->where('entrega_tareas.estudiante_id', $estudianteId)
                ->whereNull('entrega_tareas.fecha_entrega')
                ->where('tareas.fecha_limite', '>=', now())
                ->count(),
            'tareas_completadas' => DB::table('entrega_tareas')
                ->where('estudiante_id', $estudianteId)
                ->whereNotNull('fecha_entrega')
                ->count(),
            'promedio_general' => DB::table('calificaciones')
                ->where('estudiante_id', $estudianteId)
                ->avg('nota') ?? 0,
            'nota_maxima' => DB::table('calificaciones')
                ->where('estudiante_id', $estudianteId)
                ->max('nota') ?? 0,
            'total_evaluaciones' => DB::table('calificaciones')
                ->where('estudiante_id', $estudianteId)
                ->count(),
            'asistencias' => DB::table('asistencias')
                ->where('estudiante_id', $estudianteId)
                ->where('estado', 'presente')
                ->count(),
            'faltas' => DB::table('asistencias')
                ->where('estudiante_id', $estudianteId)
                ->where('estado', 'ausente')
                ->count(),
            'porcentaje_asistencia' => 0
        ];
        
        // Calcular porcentaje de asistencia
        $totalAsistencias = $stats['asistencias'] + $stats['faltas'];
        if ($totalAsistencias > 0) {
            $stats['porcentaje_asistencia'] = ($stats['asistencias'] / $totalAsistencias) * 100;
        }
        
        // Obtener las materias del estudiante con promedio
        $misMaterias = DB::table('estudiante_materia')
            ->join('materias', 'estudiante_materia.materia_id', '=', 'materias.id')
            ->leftJoin('docente_materia', 'materias.id', '=', 'docente_materia.materia_id')
            ->leftJoin('docentes', 'docente_materia.docente_id', '=', 'docentes.id')
            ->leftJoin('users as docente_user', 'docentes.user_id', '=', 'docente_user.id')
            ->where('estudiante_materia.estudiante_id', $estudianteId)
            ->select(
                'materias.*',
                DB::raw('CONCAT(COALESCE(docente_user.name, ""), " ", COALESCE(docente_user.apellido, "")) as docente')
            )
            ->limit(5)
            ->get()
            ->map(function($materia) use ($estudianteId) {
                // Calcular promedio de la materia
                $materia->promedio = DB::table('calificaciones')
                    ->where('estudiante_id', $estudianteId)
                    ->where('materia_id', $materia->id)
                    ->avg('nota') ?? 0;
                
                // Si no tiene docente asignado
                if (empty(trim($materia->docente))) {
                    $materia->docente = 'Sin asignar';
                }
                
                return $materia;
            });
        
        // Obtener horario del día (placeholder - esto debe venir de una tabla de horarios)
        $horarioHoy = [];
        
        // Datos para las gráficas
        $chartData = [
            'rendimiento' => [85, 78, 92, 88, 90],
            'tareas' => [2, 3, 1, 4, 2, 1, 0],
            'asistencia' => [85, 10, 5],
            'notas' => [0, 2, 5, 8, 12, 7]
        ];
        
        return view('components.estudiante', compact('stats', 'misMaterias', 'horarioHoy', 'chartData'));
    }
}