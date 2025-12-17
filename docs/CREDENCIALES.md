# Credenciales de Acceso

Estas son las credenciales por defecto generadas por los seeders del sistema. Úsalas para pruebas y desarrollo.

> **NOTA**: En un entorno de producción, estas contraseñas deben ser cambiadas inmediatamente.

## 👑 Administrador

Acceso total al sistema, gestión de usuarios, roles y configuraciones.

-   **Email**: `admin@tech-home.com`
-   **Contraseña**: `admin123`

php artisan serve --host=127.0.0.30 --port=9100

## 👨‍🏫 Docente

Gestión de cursos, materias, calificaciones y asistencia.

-   **Email**: `maria.garcia@tech-home.com`
-   **Contraseña**: `docente123`
-

## 👨‍🎓 Estudiante

Acceso a materiales, visualización de notas y entrega de tareas.

-   **Email**: `juan.perez@estudiante.com`
-   **Contraseña**: `estudiante123`

---

## Usuarios Adicionales

Si has ejecutado seeders adicionales (Factory), es posible que existan más usuarios con el patrón:

-   Email: `email@ejemplo.com`
-   Password: `password` (o la definida en el Factory)
