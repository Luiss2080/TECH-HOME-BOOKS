<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permiso;
use App\Models\RolPermiso;
use Illuminate\Database\Seeder;

class RolesPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles del sistema
        $adminRole = Role::create([
            'nombre' => 'Administrador',
            'descripcion' => 'Control total del sistema',
            'es_sistema' => true,
            'activo' => true,
        ]);

        $docenteRole = Role::create([
            'nombre' => 'Docente',
            'descripcion' => 'Gestión de cursos y evaluaciones',
            'es_sistema' => true,
            'activo' => true,
        ]);

        $estudianteRole = Role::create([
            'nombre' => 'Estudiante',
            'descripcion' => 'Acceso a contenidos y entregas',
            'es_sistema' => true,
            'activo' => true,
        ]);

        // Crear permisos del sistema
        $permisos = [
            // Gestión de usuarios
            ['nombre' => 'gestionar_usuarios', 'descripcion' => 'Crear, editar y eliminar usuarios', 'modulo' => 'usuarios', 'accion' => 'gestionar'],
            ['nombre' => 'ver_usuarios', 'descripcion' => 'Ver lista de usuarios', 'modulo' => 'usuarios', 'accion' => 'leer'],
            
            // Gestión de colegios
            ['nombre' => 'gestionar_colegios', 'descripcion' => 'Administrar colegios', 'modulo' => 'colegios', 'accion' => 'gestionar'],
            ['nombre' => 'ver_colegios', 'descripcion' => 'Ver información de colegios', 'modulo' => 'colegios', 'accion' => 'leer'],
            
            // Gestión de cursos
            ['nombre' => 'crear_cursos', 'descripcion' => 'Crear nuevos cursos', 'modulo' => 'cursos', 'accion' => 'crear'],
            ['nombre' => 'editar_cursos', 'descripcion' => 'Modificar cursos existentes', 'modulo' => 'cursos', 'accion' => 'actualizar'],
            ['nombre' => 'ver_cursos', 'descripcion' => 'Ver información de cursos', 'modulo' => 'cursos', 'accion' => 'leer'],
            ['nombre' => 'eliminar_cursos', 'descripcion' => 'Eliminar cursos', 'modulo' => 'cursos', 'accion' => 'eliminar'],
            
            // Gestión de materias
            ['nombre' => 'crear_materias', 'descripcion' => 'Crear nuevas materias', 'modulo' => 'materias', 'accion' => 'crear'],
            ['nombre' => 'editar_materias', 'descripcion' => 'Modificar materias existentes', 'modulo' => 'materias', 'accion' => 'actualizar'],
            ['nombre' => 'ver_materias', 'descripcion' => 'Ver información de materias', 'modulo' => 'materias', 'accion' => 'leer'],
            ['nombre' => 'eliminar_materias', 'descripcion' => 'Eliminar materias', 'modulo' => 'materias', 'accion' => 'eliminar'],
            
            // Gestión de tareas
            ['nombre' => 'crear_tareas', 'descripcion' => 'Crear nuevas tareas', 'modulo' => 'tareas', 'accion' => 'crear'],
            ['nombre' => 'editar_tareas', 'descripcion' => 'Modificar tareas existentes', 'modulo' => 'tareas', 'accion' => 'actualizar'],
            ['nombre' => 'ver_tareas', 'descripcion' => 'Ver tareas', 'modulo' => 'tareas', 'accion' => 'leer'],
            ['nombre' => 'eliminar_tareas', 'descripcion' => 'Eliminar tareas', 'modulo' => 'tareas', 'accion' => 'eliminar'],
            ['nombre' => 'calificar_tareas', 'descripcion' => 'Calificar entregas de tareas', 'modulo' => 'tareas', 'accion' => 'calificar'],
            
            // Gestión de exámenes
            ['nombre' => 'crear_examenes', 'descripcion' => 'Crear nuevos exámenes', 'modulo' => 'examenes', 'accion' => 'crear'],
            ['nombre' => 'editar_examenes', 'descripcion' => 'Modificar exámenes existentes', 'modulo' => 'examenes', 'accion' => 'actualizar'],
            ['nombre' => 'ver_examenes', 'descripcion' => 'Ver exámenes', 'modulo' => 'examenes', 'accion' => 'leer'],
            ['nombre' => 'eliminar_examenes', 'descripcion' => 'Eliminar exámenes', 'modulo' => 'examenes', 'accion' => 'eliminar'],
            
            // Gestión de calificaciones
            ['nombre' => 'crear_calificaciones', 'descripcion' => 'Registrar calificaciones', 'modulo' => 'calificaciones', 'accion' => 'crear'],
            ['nombre' => 'editar_calificaciones', 'descripcion' => 'Modificar calificaciones', 'modulo' => 'calificaciones', 'accion' => 'actualizar'],
            ['nombre' => 'ver_calificaciones', 'descripcion' => 'Ver calificaciones', 'modulo' => 'calificaciones', 'accion' => 'leer'],
            ['nombre' => 'ver_calificaciones_propias', 'descripcion' => 'Ver calificaciones propias', 'modulo' => 'calificaciones', 'accion' => 'leer'],
            
            // Gestión de asistencia
            ['nombre' => 'registrar_asistencia', 'descripcion' => 'Registrar asistencia de estudiantes', 'modulo' => 'asistencia', 'accion' => 'crear'],
            ['nombre' => 'ver_asistencia', 'descripcion' => 'Ver registros de asistencia', 'modulo' => 'asistencia', 'accion' => 'leer'],
            ['nombre' => 'ver_asistencia_propia', 'descripcion' => 'Ver asistencia propia', 'modulo' => 'asistencia', 'accion' => 'leer'],
            
            // Gestión de libros y materiales
            ['nombre' => 'crear_libros', 'descripcion' => 'Agregar libros digitales', 'modulo' => 'libros', 'accion' => 'crear'],
            ['nombre' => 'editar_libros', 'descripcion' => 'Modificar información de libros', 'modulo' => 'libros', 'accion' => 'actualizar'],
            ['nombre' => 'ver_libros', 'descripcion' => 'Acceder a libros digitales', 'modulo' => 'libros', 'accion' => 'leer'],
            ['nombre' => 'eliminar_libros', 'descripcion' => 'Eliminar libros', 'modulo' => 'libros', 'accion' => 'eliminar'],
            
            ['nombre' => 'crear_materiales', 'descripcion' => 'Subir materiales educativos', 'modulo' => 'materiales', 'accion' => 'crear'],
            ['nombre' => 'editar_materiales', 'descripcion' => 'Modificar materiales', 'modulo' => 'materiales', 'accion' => 'actualizar'],
            ['nombre' => 'ver_materiales', 'descripcion' => 'Acceder a materiales educativos', 'modulo' => 'materiales', 'accion' => 'leer'],
            ['nombre' => 'eliminar_materiales', 'descripcion' => 'Eliminar materiales', 'modulo' => 'materiales', 'accion' => 'eliminar'],
            
            // Reportes
            ['nombre' => 'generar_reportes', 'descripcion' => 'Generar reportes del sistema', 'modulo' => 'reportes', 'accion' => 'crear'],
            ['nombre' => 'ver_reportes', 'descripcion' => 'Ver reportes generados', 'modulo' => 'reportes', 'accion' => 'leer'],
            
            // Configuraciones
            ['nombre' => 'gestionar_configuraciones', 'descripcion' => 'Modificar configuraciones del sistema', 'modulo' => 'configuraciones', 'accion' => 'gestionar'],
            ['nombre' => 'ver_logs', 'descripcion' => 'Ver logs del sistema', 'modulo' => 'logs', 'accion' => 'leer'],
        ];

        foreach ($permisos as $permiso) {
            Permiso::create($permiso);
        }

        // Asignar permisos a roles
        $todosPermisos = Permiso::all();

        // Administrador: todos los permisos
        foreach ($todosPermisos as $permiso) {
            RolPermiso::create([
                'rol_id' => $adminRole->id,
                'permiso_id' => $permiso->id,
                'permitir' => true,
            ]);
        }

        // Docente: permisos específicos
        $permisosDocente = [
            'ver_cursos', 'ver_materias', 'crear_tareas', 'editar_tareas', 'ver_tareas', 'calificar_tareas',
            'crear_examenes', 'editar_examenes', 'ver_examenes', 'crear_calificaciones', 'editar_calificaciones',
            'ver_calificaciones', 'registrar_asistencia', 'ver_asistencia', 'crear_libros', 'editar_libros',
            'ver_libros', 'crear_materiales', 'editar_materiales', 'ver_materiales', 'generar_reportes', 'ver_reportes'
        ];

        foreach ($permisosDocente as $nombrePermiso) {
            $permiso = Permiso::where('nombre', $nombrePermiso)->first();
            if ($permiso) {
                RolPermiso::create([
                    'rol_id' => $docenteRole->id,
                    'permiso_id' => $permiso->id,
                    'permitir' => true,
                ]);
            }
        }

        // Estudiante: permisos de solo lectura
        $permisosEstudiante = [
            'ver_cursos', 'ver_materias', 'ver_tareas', 'ver_examenes', 'ver_calificaciones_propias',
            'ver_asistencia_propia', 'ver_libros', 'ver_materiales'
        ];

        foreach ($permisosEstudiante as $nombrePermiso) {
            $permiso = Permiso::where('nombre', $nombrePermiso)->first();
            if ($permiso) {
                RolPermiso::create([
                    'rol_id' => $estudianteRole->id,
                    'permiso_id' => $permiso->id,
                    'permitir' => true,
                ]);
            }
        }
    }
}