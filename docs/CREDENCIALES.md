# Credenciales de Acceso

Estas son las credenciales por defecto generadas por los seeders del sistema. Úsalas para pruebas y desarrollo.

> **NOTA**: En un entorno de producción, estas contraseñas deben ser cambiadas inmediatamente.

---

## 👑 Administrador

Acceso total al sistema, gestión de usuarios, roles y configuraciones.

-   **Email**: `admin@tech-home.com`
-   **Contraseña**: `admin123`
-   **User ID**: 1
-   **Estado**: ✅ Activo

---

## 👨‍🏫 Docente

Gestión de cursos, materias, calificaciones y asistencia.

-   **Email**: `maria.garcia@tech-home.com`
-   **Contraseña**: `docente123`
-   **User ID**: 21
-   **Docente ID**: 7
-   **Especialidad**: Matemáticas
-   **Estado**: ✅ Activo

---

## 👨‍🎓 Estudiantes

Acceso a materiales, visualización de notas y entrega de tareas.

### Estudiante Principal
-   **Email**: `juan.perez@estudiante.com`
-   **Contraseña**: `estudiante123`
-   **User ID**: 3
-   **Código**: EST-001-2025
-   **Estado**: ✅ Activo

### Estudiantes Adicionales

Todos con contraseña: `estudiante123`

| Nombre | Email | User ID | Código Estudiante | Estado |
|--------|-------|---------|-------------------|--------|
| María González | `maria.gonzalez@estudiante.com` | 8 | EST-002-2025 | ✅ Activo |
| Diego López | `diego.lopez@estudiante.com` | 9 | EST-003-2025 | ✅ Activo |
| Sofia Morales | `sofia.morales@estudiante.com` | 10 | EST-004-2025 | ✅ Activo |
| Andrés Vargas | `andres.vargas@estudiante.com` | 11 | EST-005-2025 | ✅ Activo |
| Lucía Herrera | `lucia.herrera@estudiante.com` | 12 | EST-006-2025 | ✅ Activo |
| Sebastián Cruz | `sebastian.cruz@estudiante.com` | 13 | EST-007-2025 | ✅ Activo |
| Valentina Silva | `valentina.silva@estudiante.com` | 14 | EST-008-2025 | ✅ Activo |
| Mateo Ramos | `mateo.ramos@estudiante.com` | 15 | EST-009-2025 | ✅ Activo |
| Isabella Torres | `isabella.torres@estudiante.com` | 16 | EST-010-2025 | ✅ Activo |
| Gabriel Méndez | `gabriel.mendez@estudiante.com` | 17 | EST-011-2025 | ✅ Activo |

---

## 🚀 Iniciar el Servidor

Para iniciar el servidor de desarrollo en una IP específica:

```bash
php artisan serve --host=127.0.0.30 --port=9100
```

---

## 📝 Notas Importantes

1. **Todos los estudiantes** tienen registros válidos en la tabla `estudiantes`
2. **El docente** tiene su registro correspondiente en la tabla `docentes`
3. La contraseña por defecto para **todos los estudiantes** es: `estudiante123`
4. La contraseña por defecto para **todos los docentes** es: `docente123`
5. La contraseña del **administrador** es: `admin123`

### ⚠️ Verificación de Integridad

Todos los usuarios listados tienen:
- ✅ Registro en tabla `users`
- ✅ Registro en su tabla correspondiente (`docentes` o `estudiantes`)
- ✅ Estado activo
- ✅ Relación user_id correcta

Si necesitas agregar más usuarios, ejecuta los seeders correspondientes:
```bash
php artisan db:seed --class=DocentesSeeder
php artisan db:seed --class=EstudiantesSeeder
```
