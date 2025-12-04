# Arquitectura del Proyecto

El sistema "TECH HOME BOOKS" está construido sobre el framework **Laravel** (PHP) siguiendo el patrón de arquitectura **MVC (Modelo-Vista-Controlador)**.

## Estructura de Directorios Principal

-   **app/**: Contiene la lógica central de la aplicación.
    -   **Models/**: Modelos de Eloquent (User, Role, Colegio, etc.).
    -   **Http/Controllers/**: Controladores que manejan las peticiones.
    -   **Http/Middleware/**: Filtros para las peticiones HTTP (Auth, Roles).
-   **database/**:
    -   **migrations/**: Archivos para la creación de la estructura de la BD.
    -   **seeders/**: Datos de prueba e iniciales.
-   **resources/**:
    -   **views/**: Plantillas Blade para el frontend.
        -   `auth/`: Vistas de autenticación (login, registro).
        -   `layouts/`: Plantillas base (header, sidebar).
        -   `admin/`, `docente/`, `estudiante/`: Vistas específicas por rol.
    -   **css/** y **js/**: Archivos fuente de estilos y scripts.
-   **public/**: Directorio raíz accesible vía web. Contiene `index.php`, assets compilados, imágenes y uploads.
-   **routes/**: Definición de rutas (web.php, api.php).

## Tecnologías Clave

-   **Backend**: Laravel 10/11
-   **Frontend**: Blade Templates, JavaScript (Vanilla/ES6), CSS3 (Variables, Flexbox, Grid).
-   **Build Tool**: Vite.
-   **Base de Datos**: MySQL.
-   **Autenticación**: Sistema nativo de Laravel con Guards y Providers personalizados si es necesario.

## Flujo de Datos

1.  **Ruta**: El usuario accede a una URL.
2.  **Controlador**: La ruta llama a un método del controlador.
3.  **Modelo**: El controlador interactúa con los modelos para obtener/guardar datos.
4.  **Vista**: El controlador retorna una vista Blade con los datos procesados.
5.  **Respuesta**: El servidor envía el HTML al navegador.
