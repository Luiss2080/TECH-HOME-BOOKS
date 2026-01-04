-- Script SQL para crear la base de datos en el servidor
-- Ejecutar este script en MySQL Workbench o phpMyAdmin del hosting

-- 1. Crear la base de datos
CREATE DATABASE IF NOT EXISTS tech_home_books 
    CHARACTER SET utf8mb4 
    COLLATE utf8mb4_unicode_ci;

-- 2. Seleccionar la base de datos
USE tech_home_books;

-- 3. Crear usuario (opcional, si tienes permisos)
-- NOTA: Generalmente el hosting ya proporciona el usuario
-- CREATE USER 'usuario_tech'@'localhost' IDENTIFIED BY 'password_seguro';
-- GRANT ALL PRIVILEGES ON tech_home_books.* TO 'usuario_tech'@'localhost';
-- FLUSH PRIVILEGES;

-- 4. Verificar que la base de datos se creó correctamente
SHOW DATABASES LIKE 'tech_home_books';

-- 5. Verificar el charset
SELECT 
    DEFAULT_CHARACTER_SET_NAME,
    DEFAULT_COLLATION_NAME
FROM 
    information_schema.SCHEMATA
WHERE 
    SCHEMA_NAME = 'tech_home_books';

-- Después de ejecutar este script:
-- 1. Importa el archivo systemVentas.sql desde database/backups/
-- 2. O ejecuta las migraciones: php artisan migrate --force
