# TECH HOME - Sistema Académico Integral
## Instrucciones de Instalación de Base de Datos

### 📋 Requisitos Previos
- ✅ Laragon instalado y funcionando
- ✅ MySQL/MariaDB ejecutándose en Laragon
- ✅ PHP y Composer disponibles

### 🗄️ Paso 1: Crear la Base de Datos

#### Opción A: Usando el script SQL directo
```bash
# Ejecutar el script SQL en MySQL
mysql -u root < database/crear_base_datos.sql
```

#### Opción B: Crear manualmente en phpMyAdmin
1. Abrir phpMyAdmin desde Laragon
2. Crear nueva base de datos: `tech_home_books`
3. Colación: `utf8mb4_unicode_ci`

### 🚀 Paso 2: Ejecutar Migraciones de Laravel

```bash
# Verificar conexión a la base de datos
php artisan db:show

# Ejecutar todas las migraciones
php artisan migrate

# Si hay problemas, ejecutar con --force
php artisan migrate --force
```

### 🌱 Paso 3: Ejecutar Seeders para Datos Iniciales

```bash
# Ejecutar todos los seeders
php artisan db:seed

# O ejecutar seeders específicos
php artisan db:seed --class=RolesPermisosSeeder
php artisan db:seed --class=ConfiguracionesSeeder
php artisan db:seed --class=ColegiosSeeder
```

### 🔧 Paso 4: Verificar la Instalación

```bash
# Verificar tablas creadas
php artisan db:table users
php artisan db:table colegios
php artisan db:table cursos
php artisan db:table materias
```

### 📊 Estructura de la Base de Datos

#### Tablas Principales:
- **users** - Usuarios del sistema (admin, docente, estudiante)
- **colegios** - Instituciones educativas
- **cursos** - Cursos por colegio y año
- **materias** - Materias por curso
- **docentes** - Información específica de docentes
- **estudiantes** - Información específica de estudiantes

#### Sistema de Roles y Permisos:
- **roles** - Roles del sistema y personalizados
- **permisos** - Permisos granulares por módulo
- **rol_permisos** - Relación roles-permisos
- **usuario_roles** - Asignación de roles a usuarios

#### Módulos Académicos:
- **tareas** - Tareas y actividades
- **examenes** - Evaluaciones
- **proyectos** - Proyectos académicos
- **calificaciones** - Notas y evaluaciones
- **asistencias** - Control de asistencia
- **libros** - Biblioteca digital
- **materiales** - Materiales educativos

#### Gestión del Sistema:
- **configuraciones** - Configuraciones por colegio
- **notificaciones** - Sistema de notificaciones
- **periodos_academicos** - Bimestres, trimestres, etc.
- **logs_sistema** - Auditoría del sistema

### 🔗 Relaciones Obligatorias Implementadas

```
COLEGIO (1)
   └── CURSOS (N)
          └── MATERIAS (N)
                 ├── DOCENTES (N) [docente_materia]
                 └── ESTUDIANTES (N) [estudiante_materia]
```

**Reglas de Negocio Implementadas:**
- ✅ Todo Estudiante debe estar asignado a un Colegio, Curso y Materia(s)
- ✅ Todo Docente debe estar asignado a un Colegio y Materia(s)
- ✅ Las Materias pertenecen a Cursos específicos
- ✅ Los Cursos pertenecen a Colegios específicos

### 🛠️ Solución de Problemas

#### Error de Conexión MySQL:
```bash
# Verificar que MySQL esté ejecutándose
netstat -an | findstr :3306

# Reiniciar servicios en Laragon
# Usar el panel de Laragon para Stop/Start All
```

#### Error en Migraciones:
```bash
# Limpiar y rehacer migraciones
php artisan migrate:fresh

# Ejecutar con seeders
php artisan migrate:fresh --seed
```

#### Permisos de Archivos:
```bash
# Dar permisos a las carpetas de Laravel
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
```

### 📈 Datos de Prueba Incluidos

Los seeders crearán:
- **3 roles básicos**: Administrador, Docente, Estudiante  
- **40+ permisos** organizados por módulos
- **Colegio de ejemplo** con cursos y materias
- **Períodos académicos** (4 bimestres del año actual)
- **Configuraciones iniciales** del sistema
- **Usuario administrador** para acceso inicial

### 🔐 Usuario Administrador Inicial

```
Email: admin@tech-home.com
Password: admin123
Rol: Administrador
```

### 📞 Soporte

Si encuentras problemas:
1. Verificar que Laragon esté ejecutándose completamente
2. Revisar el archivo `.env` para las credenciales de BD
3. Ejecutar `php artisan config:clear` para limpiar cache
4. Verificar logs en `storage/logs/laravel.log`