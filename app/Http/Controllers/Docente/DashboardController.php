<?php

namespace App\Http\Controllers\Docente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        // Verificar que el usuario esté autenticado y tenga rol de docente
        $userRoleId = Session::get('user_role_id');
        $rolesDocente = [2, 3, 5, 7, 8, 9]; // IDs de roles de profesores
        if (!Session::has('user_id') || !in_array($userRoleId, $rolesDocente)) {
            return redirect()->route('login');
        }
        
        $userId = Session::get('user_id');
        
        // Obtener el docente actual
        $docente = DB::table('docentes')
            ->join('users', 'docentes.user_id', '=', 'users.id')
            ->where('docentes.user_id', $userId)
            ->select('docentes.*', 'users.name', 'users.apellido', 'users.email')
            ->first();
        
        // Obtener estadísticas del docente
        $stats = [
            'materias' => DB::table('docente_materia')
                ->where('docente_id', $docente->id ?? 0)
                ->count(),
            'materias_activas' => DB::table('docente_materia')
                ->where('docente_id', $docente->id ?? 0)
                ->count(),
            'estudiantes' => DB::table('estudiante_materia')
                ->join('docente_materia', 'estudiante_materia.materia_id', '=', 'docente_materia.materia_id')
                ->where('docente_materia.docente_id', $docente->id ?? 0)
                ->distinct('estudiante_materia.estudiante_id')
                ->count(),
            'tareas_pendientes' => DB::table('tareas')
                ->join('docente_materia', 'tareas.materia_id', '=', 'docente_materia.materia_id')
                ->where('docente_materia.docente_id', $docente->id ?? 0)
                ->where('tareas.estado', 'pendiente')
                ->count(),
            'tareas_total' => DB::table('tareas')
                ->join('docente_materia', 'tareas.materia_id', '=', 'docente_materia.materia_id')
                ->where('docente_materia.docente_id', $docente->id ?? 0)
                ->count(),
            'promedio_general' => DB::table('calificaciones')
                ->join('docente_materia', 'calificaciones.materia_id', '=', 'docente_materia.materia_id')
                ->where('docente_materia.docente_id', $docente->id ?? 0)
                ->avg('calificaciones.nota') ?? 0,
            'calificaciones_realizadas' => DB::table('calificaciones')
                ->join('docente_materia', 'calificaciones.materia_id', '=', 'docente_materia.materia_id')
                ->where('docente_materia.docente_id', $docente->id ?? 0)
                ->whereNotNull('calificaciones.nota')
                ->count(),
            'calificaciones_pendientes' => DB::table('calificaciones')
                ->join('docente_materia', 'calificaciones.materia_id', '=', 'docente_materia.materia_id')
                ->where('docente_materia.docente_id', $docente->id ?? 0)
                ->whereNull('calificaciones.nota')
                ->count(),
        ];
        
        // Obtener las materias del docente
        $misMaterias = DB::table('docente_materia')
            ->join('materias', 'docente_materia.materia_id', '=', 'materias.id')
            ->where('docente_materia.docente_id', $docente->id ?? 0)
            ->select('materias.*')
            ->limit(5)
            ->get()
            ->map(function($materia) {
                $materia->estudiantes_count = DB::table('estudiante_materia')
                    ->where('materia_id', $materia->id)
                    ->count();
                $materia->horario = 'L-M-V 10:00'; // Placeholder
                return $materia;
            });
        
        // Obtener horario del día (placeholder)
        $horarioHoy = [];
        
        // Datos para las gráficas
        $chartData = [
            'asistencia' => [85, 90, 78, 92, 88],
            'rendimiento' => [85, 78, 92, 88, 90],
            'tareas' => [75, 15, 10],
            'examenes' => [2, 5, 12, 18, 15, 8]
        ];
        
        return view('components.docente', compact('stats', 'misMaterias', 'horarioHoy', 'chartData'));
    }
}