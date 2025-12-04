# Inicio Rápido (Quick Start)

Si ya tienes el entorno configurado, sigue estos pasos para empezar a trabajar inmediatamente.

1.  **Levantar servicios**:
    Abre dos terminales:

    Terminal 1 (Backend):

    ```bash
    php artisan serve
    ```

    Terminal 2 (Frontend - si vas a editar CSS/JS):

    ```bash
    npm run dev
    ```

2.  **Acceder al sistema**:
    Abre tu navegador en `http://127.0.0.1:8000` (o el puerto que indique `php artisan serve`).

3.  **Iniciar Sesión**:
    Utiliza las credenciales por defecto (ver `CREDENCIALES.md`) para acceder como Administrador, Docente o Estudiante.

4.  **Flujo de Trabajo Común**:
    -   Si modificas archivos `.blade.php`, solo recarga la página.
    -   Si modificas archivos en `resources/css` o `resources/js`, asegúrate de que `npm run dev` esté corriendo.
    -   Si modificas la estructura de la BD (migraciones), ejecuta `php artisan migrate:fresh --seed`.
