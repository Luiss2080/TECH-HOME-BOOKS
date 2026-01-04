# Guía de Deployment - Tech Home Books

## Servidor FTP
- **Host:** librodigital.techhomebolivia.com
- **Puerto:** 21
- **Usuario:** luisrocha@librodigital.techhomebolivia.com
- **Contraseña:** LIBRODIGITAL-123

## Base de Datos MySQL
- **Nombre BD:** tech_home_books
- **Host:** 127.0.0.1 (o el proporcionado por el hosting)
- **Puerto:** 3306
- **Usuario:** (configurar en el panel del hosting)
- **Contraseña:** (configurar en el panel del hosting)

## Pasos para Subir el Proyecto

### 1. Preparar Archivos Localmente

```bash
# Generar assets de producción
npm install
npm run build

# Limpiar caché
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimizar para producción
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 2. Archivos a Subir via FileZilla

Sube TODOS los archivos excepto:
- `/node_modules/` (muy pesado, no necesario en producción)
- `.git/` (control de versiones, no necesario)
- `.env` (se configurará directamente en el servidor)
- `/storage/logs/*.log` (logs locales)

**Estructura recomendada en el servidor:**
```
public_html/
├── public/ (contenido va en la raíz de public_html o www)
├── app/
├── bootstrap/
├── config/
├── database/
├── resources/
├── routes/
├── storage/
├── vendor/
└── .env
```

### 3. Configurar Permisos en el Servidor

Después de subir los archivos, conectarte por SSH o usar el File Manager del hosting:

```bash
# Dar permisos de escritura a storage y bootstrap/cache
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# Si el servidor usa www-data como usuario web
chown -R www-data:www-data storage
chown -R www-data:www-data bootstrap/cache
```

### 4. Configurar .env en el Servidor

Crear el archivo `.env` en el servidor con la configuración de producción:

```env
APP_NAME="Tech Home Books"
APP_ENV=production
APP_KEY=base64:ILVU7NLfBfk831yDgtqWsWxJmUAEUqNqXx1xF0tiiNI=
APP_DEBUG=false
APP_URL=https://librodigital.techhomebolivia.com

APP_LOCALE=es
APP_FALLBACK_LOCALE=es
APP_FAKER_LOCALE=es_ES

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=tech_home_books
DB_USERNAME=[USUARIO_MYSQL_DEL_HOSTING]
DB_PASSWORD=[CONTRASEÑA_MYSQL_DEL_HOSTING]

SESSION_DRIVER=database
SESSION_DOMAIN=.techhomebolivia.com

CACHE_STORE=database
QUEUE_CONNECTION=database

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=[TU_EMAIL]
MAIL_PASSWORD=[TU_PASSWORD_APP]
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@techhomebolivia.com"
```

### 5. Configurar la Base de Datos

En MySQL Workbench o phpMyAdmin del hosting:

```sql
-- Crear la base de datos
CREATE DATABASE tech_home_books CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Importar el dump SQL
USE tech_home_books;
SOURCE /ruta/al/archivo/systemVentas.sql;
```

O desde el panel del hosting:
1. Crear base de datos `tech_home_books`
2. Importar el archivo `database/backups/systemVentas.sql`

### 6. Ejecutar Migraciones (si es necesario)

Si tienes acceso SSH:

```bash
cd /ruta/del/proyecto
php artisan migrate --force
php artisan db:seed --force
```

### 7. Configurar el Document Root

En el panel de control del hosting, configurar el Document Root a:
```
/ruta/del/proyecto/public
```

Si no puedes cambiar el Document Root, puedes:
1. Subir todo el contenido de `/public` a la raíz de `public_html`
2. Subir el resto del proyecto a una carpeta fuera de `public_html` (ej: `/home/usuario/laravel`)
3. Editar `public_html/index.php` para apuntar a la ubicación correcta

### 8. Verificaciones Finales

- [ ] Verificar que el sitio carga correctamente
- [ ] Probar el login
- [ ] Verificar que las imágenes/assets cargan
- [ ] Revisar logs: `storage/logs/laravel.log`
- [ ] Probar funcionalidades principales

### 9. Optimización Post-Deployment

```bash
php artisan optimize
php artisan storage:link  # Si usas almacenamiento público
```

## Notas Importantes

1. **Seguridad:**
   - `APP_DEBUG=false` en producción
   - Cambiar `APP_KEY` si es necesario
   - No subir archivos `.env` via FTP (créalo directamente en el servidor)

2. **Permisos:**
   - `storage/` debe ser escribible
   - `bootstrap/cache/` debe ser escribible

3. **Composer:**
   - Si el servidor lo permite: `composer install --no-dev --optimize-autoloader`
   - Si no, sube la carpeta `vendor/` completa

4. **Assets:**
   - Ejecuta `npm run build` antes de subir
   - Sube la carpeta `public/build/` con los assets compilados

5. **Backups:**
   - Haz backup de la BD regularmente
   - Mantén copias del código y `.env`
