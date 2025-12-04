# Instalación Básica del Sistema

Este documento detalla los pasos necesarios para instalar y configurar el sistema "TECH HOME BOOKS" en un entorno local.

## Requisitos Previos

Asegúrate de tener instalado el siguiente software:

-   **PHP**: Versión 8.1 o superior.
-   **Composer**: Gestor de dependencias de PHP.
-   **Node.js y NPM**: Para la gestión de paquetes frontend (Vite).
-   **MySQL/MariaDB**: Base de datos.
-   **Git**: Para el control de versiones.

## Pasos de Instalación

1.  **Clonar el Repositorio**

    ```bash
    git clone <URL_DEL_REPOSITORIO>
    cd TECH-HOME-BOOKS
    ```

2.  **Instalar Dependencias de PHP**

    ```bash
    composer install
    ```

3.  **Instalar Dependencias de Frontend**

    ```bash
    npm install
    ```

4.  **Configurar el Entorno**

    Copia el archivo de ejemplo `.env.example` a `.env`:

    ```bash
    cp .env.example .env
    ```

    Edita el archivo `.env` y configura las credenciales de tu base de datos:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=tech_home_books
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5.  **Generar Clave de Aplicación**

    ```bash
    php artisan key:generate
    ```

6.  **Migrar y Sembrar la Base de Datos**

    Este comando creará las tablas e insertará los datos de prueba (usuarios, roles, etc.):

    ```bash
    php artisan migrate --seed
    ```

7.  **Compilar Assets**

    Para desarrollo:

    ```bash
    npm run dev
    ```

    Para producción:

    ```bash
    npm run build
    ```

8.  **Iniciar el Servidor**

    ```bash
    php artisan serve
    ```

    El sistema estará accesible en `http://localhost:8000`.
