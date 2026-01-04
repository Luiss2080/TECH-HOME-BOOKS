# Credenciales de Usuarios - TECH HOME BOOKS

## 🔐 Credenciales de Acceso al Sistema

### Usuarios para Testing/Dashboard

| Usuario | Email | Contraseña | Rol | ID Rol | Descripción |
|---------|-------|------------|-----|--------|-------------|
| **Admin** | admin@techhome.com | `admin123` | Administrador | 1 | Usuario administrador de prueba |
| **Docente** | docente@techhome.com | `docente123` | Profesor Primaria | 2 | Usuario docente de prueba |
| **Estudiante** | estudiante@techhome.com | `estudiante123` | Invitado | 4 | Usuario estudiante de prueba |

---

## 👥 Usuarios Originales del Sistema (Migrados desde systemVentas.sql)

| ID | Usuario | Email | Rol | ID Rol |
|----|---------|-------|-----|--------|
| 1 | Gustavo | tantani.m.g@gmail.com | Administrador | 1 |
| 2 | Mauricio | mauriciovasquezmenacho@gmail.com | Profes TECH HOME | 5 |
| 3 | Amilcar | arcamgel20165@gmail.com | Profes TECH HOME | 5 |
| 4 | Yorbin Afriel | yorbinmiercabrera@gmail.com | Profes TECH HOME | 5 |
| 47 | Luis Mario | luisrochavela990@gmail.com | Administrador | 1 |
| 48 | Cliente Bot | clientebot6001@gmail.com | Administrador | 1 |
| 49 | Luis Mario | lr0900573@gmail.com | Vendedor | 11 |
| 50 | Jessica Ariana | jessicasandyarteaga@gmail.com | Vendedor | 11 |

> **Nota:** Las contraseñas de los usuarios originales están encriptadas con bcrypt. Para cambiarlas, usar `php artisan tinker` y ejecutar:
> ```php
> $user = User::find(ID);
> $user->password = bcrypt('nueva_contraseña');
> $user->save();
> ```

---

## 📋 Roles del Sistema

| ID | Nombre del Rol | Descripción |
|----|----------------|-------------|
| 1 | Administrador | Acceso completo al sistema |
| 2 | Profesor Primaria | Docente de nivel primario |
| 3 | Profesor Secundaria | Docente de nivel secundario |
| 4 | Invitado | Usuario con permisos limitados |
| 5 | Profes TECH HOME | Profesores de TECH HOME |
| 6 | Libro muestra primaria y secundaria | Acceso a libros de muestra |
| 7 | Profesor primaria 1 | Profesor de primaria nivel 1 |
| 8 | Profesor Secundaria 1 | Profesor de secundaria nivel 1 |
| 9 | Profesor Secundaria 1, 2 y 3 | Profesor de secundaria niveles 1-3 |
| 10 | Libro Primaria y Secundaria | Acceso a libros de ambos niveles |
| 11 | Vendedor | Usuario con permisos de ventas |

---

## 🎯 Acceso por Dashboard

### Dashboard Administrador
- **Usuarios con acceso:** Admin (ID: 51), Gustavo (ID: 1), Luis Mario (ID: 47), Cliente Bot (ID: 48)
- **Rol requerido:** Administrador (ID: 1)
- **Permisos:** Gestión completa del sistema

### Dashboard Docente
- **Usuario de prueba:** Docente (ID: 52)
- **Rol requerido:** Profesor Primaria (ID: 2) u otros roles de profesor
- **Permisos:** Gestión de cursos, materiales, calificaciones

### Dashboard Estudiante
- **Usuario de prueba:** Estudiante (ID: 53)
- **Rol requerido:** Invitado (ID: 4)
- **Permisos:** Ver cursos, materiales, calificaciones propias

### Dashboard Vendedor
- **Usuarios:** Luis Mario (ID: 49), Jessica Ariana (ID: 50)
- **Rol requerido:** Vendedor (ID: 11)
- **Permisos:** Gestión de ventas, clientes, stock

---

## 🔄 Comandos Útiles

### Crear un nuevo usuario
```bash
php artisan tinker
```
```php
$user = new User();
$user->name = 'Nombre Usuario';
$user->email = 'email@ejemplo.com';
$user->password = bcrypt('contraseña');
$user->rol_id = 1; // ID del rol
$user->save();
```

### Cambiar contraseña de usuario
```bash
php artisan tinker
```
```php
$user = User::where('email', 'email@ejemplo.com')->first();
$user->password = bcrypt('nueva_contraseña');
$user->save();
```

### Cambiar rol de usuario
```bash
php artisan tinker
```
```php
$user = User::find(ID);
$user->rol_id = NUEVO_ROL_ID;
$user->save();
```

---

## ⚠️ Notas de Seguridad

1. **Cambiar contraseñas de prueba en producción**
2. Las contraseñas mostradas son solo para entorno de desarrollo
3. Todos los usuarios originales mantienen sus contraseñas encriptadas del sistema anterior
4. Usar autenticación de Laravel para login: `Auth::attempt(['email' => $email, 'password' => $password])`

---

## 🌐 Configuración para Entornos (Local vs Producción)

### Entorno Local (Desarrollo)
El archivo `.env` actual está configurado para desarrollo local:
```env
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost
SESSION_DOMAIN=null
```

### Entorno Producción (Servidor)
Para el servidor, usar el archivo `.env.production` como referencia:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://librodigital.techhomebolivia.com
SESSION_DOMAIN=.techhomebolivia.com
SESSION_SECURE_COOKIE=true
```

**Comandos después de cambiar .env:**
```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

---

## 🔧 Solución de Problemas

### Error 419 (Token CSRF)
1. Limpiar cookies del navegador (F12 → Application → Cookies → Eliminar)
2. Verificar `SESSION_DOMAIN` en `.env` (debe ser `null` en local)
3. Ejecutar: `php artisan config:clear`
4. Usar modo incógnito para probar

### Error de Conexión en Login
1. Verificar que la base de datos esté corriendo
2. Verificar credenciales de DB en `.env`
3. Asegurar que tabla `sessions` existe: `php artisan migrate`
4. Limpiar tabla sessions: `TRUNCATE TABLE sessions;`

---

**Última actualización:** 3 de enero de 2026
**Base de datos:** tech_home_books
**Total usuarios:** 11
**Total roles:** 11
