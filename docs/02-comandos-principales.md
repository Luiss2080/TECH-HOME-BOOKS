# Comandos Principales

Lista de comandos frecuentes utilizados en el desarrollo y mantenimiento del sistema.

## Desarrollo

-   **Iniciar servidor de desarrollo Laravel**:

    ```bash
    php artisan serve
    ```

-   **Compilar assets en tiempo real (Vite)**:

    ```bash
    npm run dev
    ```

-   **Compilar assets para producción**:
    ```bash
    npm run build
    ```

## Base de Datos

-   **Ejecutar migraciones (crear tablas)**:

    ```bash
    php artisan migrate
    ```

-   **Ejecutar migraciones y seeders (reiniciar DB)**:

    ```bash
    php artisan migrate:fresh --seed
    ```

    _Nota: Este comando borra todos los datos existentes._

-   **Ejecutar solo seeders**:
    ```bash
    php artisan db:seed
    ```

## Mantenimiento y Caché

-   **Limpiar caché de configuración**:

    ```bash
    php artisan config:clear
    ```

-   **Limpiar caché de rutas**:

    ```bash
    php artisan route:clear
    ```

-   **Limpiar caché de vistas**:

    ```bash
    php artisan view:clear
    ```

-   **Crear enlace simbólico para storage (imágenes)**:
    ```bash
    php artisan storage:link
    ```

## Generación de Código

-   **Crear un controlador**:

    ```bash
    php artisan make:controller NombreController
    ```

-   **Crear un modelo con migración**:

    ```bash
    php artisan make:model NombreModelo -m
    ```

-   **Crear un seeder**:
    ```bash
    php artisan make:seeder NombreSeeder
    ```
