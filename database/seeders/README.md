# Seeders - Tech Home Books

Este directorio contiene todos los seeders para poblar la base de datos con datos iniciales y de prueba.

## 📋 Orden de Ejecución

Los seeders se ejecutan en el siguiente orden (definido en `DatabaseSeeder.php`):

### 1. Configuraciones Base
- `ConfiguracionesSeeder` - Configuraciones del sistema

### 2. Sistema de Roles y Permisos
- `RolesPermisosSeeder` - Roles y permisos del sistema

### 3. Datos de Usuarios e Instituciones
- `UsersSeeder` - Usuarios principales (admin, docente, estudiante)
- `ColegiosSeeder` - Instituciones educativas
- `CursosSeeder` - Cursos académicos
- `MateriasSeeder` - Materias/Asignaturas

### 4. Períodos Académicos
- `PeriodosAcademicosSeeder` - Períodos académicos

### 5. Usuarios Específicos del Sistema
- `DocentesSeeder` - Registros de docentes (depende de UsersSeeder y ColegiosSeeder)
- `EstudiantesSeeder` - Registros de estudiantes

### 6. Contenido Educativo
- `LibrosSeeder` - Biblioteca
- `MaterialesSeeder` - Materiales educativos

### 7. Actividades Académicas
- `TareasSeeder` - Tareas
- `ExamenesSeeder` - Exámenes
- `ProyectosSeeder` - Proyectos

### 8. Evaluaciones y Seguimiento
- `CalificacionesSeeder` - Calificaciones
- `AsistenciasSeeder` - Registro de asistencias
- `CertificadosSeeder` - Certificados

## 🚀 Comandos de Ejecución

### Ejecutar todos los seeders
```bash
php artisan db:seed
```

### Ejecutar un seeder específico
```bash
php artisan db:seed --class=UsersSeeder
php artisan db:seed --class=DocentesSeeder
```

### Resetear base de datos y ejecutar seeders
```bash
php artisan migrate:fresh --seed
```

### Ejecutar migraciones y seeders (producción)
```bash
php artisan migrate --seed --force
```

## 👥 Usuarios Creados por Defecto

### Administrador
- **Email:** `admin@tech-home.com`
- **Contraseña:** `admin123`
- **Rol:** admin

### Docente Principal
- **Email:** `maria.garcia@tech-home.com`
- **Contraseña:** `docente123`
- **Rol:** docente
- **Especialidad:** Matemáticas y Física

### Estudiante
- **Email:** `juan.perez@estudiante.com`
- **Contraseña:** `estudiante123`
- **Rol:** estudiante

## 📝 Notas Importantes

1. **DocentesSeeder** requiere que `UsersSeeder` y `ColegiosSeeder` se hayan ejecutado primero
2. Si no existen colegios, `DocentesSeeder` creará uno por defecto automáticamente
3. Los seeders verifican si los registros ya existen antes de crearlos (idempotentes)
4. En producción, cambiar todas las contraseñas por defecto

## 🔧 Troubleshooting

### Error: "Usuario docente no existe"
**Solución:** Ejecutar `UsersSeeder` primero
```bash
php artisan db:seed --class=UsersSeeder
php artisan db:seed --class=DocentesSeeder
```

### Error: "No hay colegios registrados"
**Solución:** El seeder creará uno automáticamente, o ejecutar:
```bash
php artisan db:seed --class=ColegiosSeeder
```

### Error: "Duplicate entry"
**Solución:** Los datos ya existen. Esto es normal si el seeder se ejecuta múltiples veces.

## 📚 Estructura de Datos

### Relaciones Importantes
- `User` (users) → `Docente` (docentes) [1:1]
- `User` (users) → `Estudiante` (estudiantes) [1:1]
- `Docente` → `Colegio` [N:1]
- `Docente` → `Materia` (docente_materia) [N:M]
- `Estudiante` → `Materia` (estudiante_materia) [N:M]

## 🔄 Para Nuevas Instalaciones

En una nueva computadora, ejecutar en orden:

1. Clonar el repositorio
2. Configurar `.env` con las credenciales de base de datos
3. Instalar dependencias: `composer install`
4. Generar key: `php artisan key:generate`
5. Ejecutar migraciones: `php artisan migrate`
6. Ejecutar seeders: `php artisan db:seed`

O todo junto:
```bash
php artisan migrate:fresh --seed
```

---
**Última actualización:** 20 de diciembre de 2025
