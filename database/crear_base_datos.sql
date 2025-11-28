-- Script SQL para crear la base de datos TECH-HOME-BOOKS
-- Sistema Académico Integral
-- Ejecutar este script en MySQL de Laragon

-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS tech_home_books CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE tech_home_books;

-- ===============================================
-- TABLAS PRINCIPALES DEL SISTEMA
-- ===============================================

-- Tabla de usuarios (ya existe en Laravel)
-- Esta se creará con la migración de Laravel

-- Tabla de colegios
CREATE TABLE IF NOT EXISTS colegios (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    logo VARCHAR(255) NULL,
    direccion TEXT NULL,
    telefono VARCHAR(255) NULL,
    email VARCHAR(255) NULL,
    director VARCHAR(255) NULL,
    niveles_educativos JSON NULL COMMENT 'Array de niveles: primaria, secundaria, etc.',
    ano_lectivo_actual YEAR NOT NULL,
    estado ENUM('activo', 'inactivo') DEFAULT 'activo',
    configuracion_personalizada JSON NULL,
    descripcion TEXT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_estado (estado),
    INDEX idx_ano_lectivo (ano_lectivo_actual)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla de cursos
CREATE TABLE IF NOT EXISTS cursos (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    colegio_id BIGINT UNSIGNED NOT NULL,
    nombre VARCHAR(255) NOT NULL COMMENT 'ej: 5to de Secundaria - Sección A',
    nivel VARCHAR(255) NOT NULL COMMENT 'primaria, secundaria',
    grado VARCHAR(255) NOT NULL COMMENT '1ro, 2do, 3ro, etc.',
    seccion VARCHAR(255) NULL COMMENT 'A, B, C, etc.',
    turno ENUM('mañana', 'tarde', 'noche') DEFAULT 'mañana',
    aula VARCHAR(255) NULL,
    ano_lectivo YEAR NOT NULL,
    cupo_maximo INT DEFAULT 30,
    estado ENUM('activo', 'inactivo', 'finalizado') DEFAULT 'activo',
    descripcion TEXT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (colegio_id) REFERENCES colegios(id) ON DELETE CASCADE,
    INDEX idx_colegio_estado (colegio_id, estado),
    INDEX idx_nivel_grado (nivel, grado),
    INDEX idx_ano_lectivo (ano_lectivo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla de materias
CREATE TABLE IF NOT EXISTS materias (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    curso_id BIGINT UNSIGNED NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    codigo VARCHAR(255) UNIQUE NOT NULL COMMENT 'código único de la materia',
    descripcion TEXT NULL,
    horas_semanales INT DEFAULT 4,
    objetivos JSON NULL COMMENT 'objetivos de aprendizaje',
    color VARCHAR(255) DEFAULT '#007bff' COMMENT 'color para identificación visual',
    estado ENUM('activa', 'inactiva') DEFAULT 'activa',
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (curso_id) REFERENCES cursos(id) ON DELETE CASCADE,
    INDEX idx_curso_estado (curso_id, estado),
    INDEX idx_codigo (codigo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ===============================================
-- SISTEMA DE ROLES Y PERMISOS
-- ===============================================

-- Tabla de roles
CREATE TABLE IF NOT EXISTS roles (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) UNIQUE NOT NULL,
    descripcion TEXT NULL,
    es_sistema BOOLEAN DEFAULT FALSE COMMENT 'roles del sistema no editables',
    activo BOOLEAN DEFAULT TRUE,
    configuracion_adicional JSON NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_nombre (nombre),
    INDEX idx_es_sistema (es_sistema),
    INDEX idx_activo (activo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla de permisos
CREATE TABLE IF NOT EXISTS permisos (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) UNIQUE NOT NULL COMMENT 'ej: crear_tareas, ver_calificaciones',
    descripcion TEXT NULL,
    modulo VARCHAR(255) NOT NULL COMMENT 'tareas, calificaciones, usuarios, etc.',
    accion VARCHAR(255) NOT NULL COMMENT 'crear, leer, actualizar, eliminar, gestionar',
    recurso VARCHAR(255) NULL COMMENT 'recurso específico si aplica',
    activo BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_nombre (nombre),
    INDEX idx_modulo_accion (modulo, accion),
    INDEX idx_activo (activo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla pivot rol_permisos
CREATE TABLE IF NOT EXISTS rol_permisos (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    rol_id BIGINT UNSIGNED NOT NULL,
    permiso_id BIGINT UNSIGNED NOT NULL,
    permitir BOOLEAN DEFAULT TRUE COMMENT 'true = permitir, false = denegar',
    condiciones TEXT NULL COMMENT 'condiciones adicionales en JSON',
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (rol_id) REFERENCES roles(id) ON DELETE CASCADE,
    FOREIGN KEY (permiso_id) REFERENCES permisos(id) ON DELETE CASCADE,
    UNIQUE KEY unique_rol_permiso (rol_id, permiso_id),
    INDEX idx_rol_permitir (rol_id, permitir),
    INDEX idx_permiso (permiso_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla pivot usuario_roles
CREATE TABLE IF NOT EXISTS usuario_roles (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    rol_id BIGINT UNSIGNED NOT NULL,
    colegio_id BIGINT UNSIGNED NULL COMMENT 'rol específico por colegio',
    fecha_asignacion DATE NOT NULL,
    fecha_expiracion DATE NULL COMMENT 'si el rol tiene vencimiento',
    activo BOOLEAN DEFAULT TRUE,
    observaciones TEXT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (rol_id) REFERENCES roles(id) ON DELETE CASCADE,
    FOREIGN KEY (colegio_id) REFERENCES colegios(id) ON DELETE CASCADE,
    UNIQUE KEY unique_user_rol_colegio (user_id, rol_id, colegio_id),
    INDEX idx_user_activo (user_id, activo),
    INDEX idx_rol_activo (rol_id, activo),
    INDEX idx_colegio (colegio_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ===============================================
-- USUARIOS ESPECÍFICOS DEL SISTEMA
-- ===============================================

-- Tabla de docentes
CREATE TABLE IF NOT EXISTS docentes (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    colegio_id BIGINT UNSIGNED NOT NULL,
    codigo_docente VARCHAR(255) UNIQUE NOT NULL,
    especialidad VARCHAR(255) NOT NULL,
    titulo_profesional VARCHAR(255) NOT NULL,
    experiencia TEXT NULL,
    tipo_contrato ENUM('tiempo_completo', 'medio_tiempo', 'por_horas') DEFAULT 'tiempo_completo',
    fecha_contratacion DATE NOT NULL,
    estado_laboral ENUM('activo', 'inactivo', 'licencia', 'vacaciones') DEFAULT 'activo',
    salario DECIMAL(10, 2) NULL,
    observaciones TEXT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (colegio_id) REFERENCES colegios(id) ON DELETE CASCADE,
    INDEX idx_colegio_estado (colegio_id, estado_laboral),
    INDEX idx_codigo (codigo_docente),
    INDEX idx_especialidad (especialidad)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla de estudiantes
CREATE TABLE IF NOT EXISTS estudiantes (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    colegio_id BIGINT UNSIGNED NOT NULL,
    curso_id BIGINT UNSIGNED NOT NULL,
    codigo_estudiante VARCHAR(255) UNIQUE NOT NULL,
    tutor_nombre VARCHAR(255) NULL,
    tutor_telefono VARCHAR(255) NULL,
    tutor_email VARCHAR(255) NULL,
    estado_academico ENUM('activo', 'retirado', 'egresado', 'transferido') DEFAULT 'activo',
    fecha_inscripcion DATE NOT NULL,
    observaciones TEXT NULL,
    historial_academico JSON NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (colegio_id) REFERENCES colegios(id) ON DELETE CASCADE,
    FOREIGN KEY (curso_id) REFERENCES cursos(id) ON DELETE CASCADE,
    INDEX idx_colegio_curso (colegio_id, curso_id),
    INDEX idx_codigo (codigo_estudiante),
    INDEX idx_estado (estado_academico)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ===============================================
-- RELACIONES ACADÉMICAS
-- ===============================================

-- Tabla pivot docente_materia
CREATE TABLE IF NOT EXISTS docente_materia (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    docente_id BIGINT UNSIGNED NOT NULL,
    materia_id BIGINT UNSIGNED NOT NULL,
    ano_lectivo YEAR NOT NULL,
    estado ENUM('activo', 'inactivo') DEFAULT 'activo',
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (docente_id) REFERENCES docentes(id) ON DELETE CASCADE,
    FOREIGN KEY (materia_id) REFERENCES materias(id) ON DELETE CASCADE,
    UNIQUE KEY unique_docente_materia_ano (docente_id, materia_id, ano_lectivo),
    INDEX idx_materia_estado (materia_id, estado)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla pivot estudiante_materia
CREATE TABLE IF NOT EXISTS estudiante_materia (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    estudiante_id BIGINT UNSIGNED NOT NULL,
    materia_id BIGINT UNSIGNED NOT NULL,
    ano_lectivo YEAR NOT NULL,
    estado ENUM('inscrito', 'aprobado', 'reprobado', 'retirado') DEFAULT 'inscrito',
    nota_final DECIMAL(5, 2) NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (estudiante_id) REFERENCES estudiantes(id) ON DELETE CASCADE,
    FOREIGN KEY (materia_id) REFERENCES materias(id) ON DELETE CASCADE,
    UNIQUE KEY unique_estudiante_materia_ano (estudiante_id, materia_id, ano_lectivo),
    INDEX idx_materia_estado (materia_id, estado),
    INDEX idx_nota_final (nota_final)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ===============================================
-- PERÍODOS ACADÉMICOS
-- ===============================================

CREATE TABLE IF NOT EXISTS periodos_academicos (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    colegio_id BIGINT UNSIGNED NOT NULL,
    nombre VARCHAR(255) NOT NULL COMMENT 'Primer Bimestre, Segundo Trimestre, etc.',
    codigo VARCHAR(255) UNIQUE NOT NULL COMMENT 'B1_2025, T2_2025, etc.',
    tipo ENUM('bimestre', 'trimestre', 'semestre', 'anual') DEFAULT 'bimestre',
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE NOT NULL,
    ano_lectivo YEAR NOT NULL,
    orden INT DEFAULT 1 COMMENT 'orden del período (1, 2, 3, 4)',
    activo BOOLEAN DEFAULT TRUE,
    es_actual BOOLEAN DEFAULT FALSE COMMENT 'período académico actual',
    descripcion TEXT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (colegio_id) REFERENCES colegios(id) ON DELETE CASCADE,
    INDEX idx_colegio_ano_orden (colegio_id, ano_lectivo, orden),
    INDEX idx_actual_activo (es_actual, activo),
    INDEX idx_codigo (codigo),
    INDEX idx_fechas (fecha_inicio, fecha_fin)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ===============================================
-- SISTEMA DE NOTIFICACIONES
-- ===============================================

CREATE TABLE IF NOT EXISTS notificaciones (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL COMMENT 'usuario que recibe la notificación',
    emisor_id BIGINT UNSIGNED NULL COMMENT 'usuario que envía (puede ser sistema)',
    titulo VARCHAR(255) NOT NULL,
    mensaje TEXT NOT NULL,
    tipo VARCHAR(255) DEFAULT 'info' COMMENT 'info, success, warning, error, tarea, calificacion, etc.',
    modulo VARCHAR(255) NULL COMMENT 'módulo que generó la notificación',
    datos_adicionales JSON NULL COMMENT 'datos extra como IDs, enlaces, etc.',
    leida BOOLEAN DEFAULT FALSE,
    leida_en TIMESTAMP NULL,
    email_enviado BOOLEAN DEFAULT FALSE,
    email_enviado_en TIMESTAMP NULL,
    prioridad VARCHAR(255) DEFAULT 'normal' COMMENT 'baja, normal, alta, urgente',
    expira_en TIMESTAMP NULL COMMENT 'fecha de expiración de la notificación',
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (emisor_id) REFERENCES users(id) ON DELETE SET NULL,
    INDEX idx_user_leida (user_id, leida),
    INDEX idx_user_tipo (user_id, tipo),
    INDEX idx_emisor_fecha (emisor_id, created_at),
    INDEX idx_modulo (modulo),
    INDEX idx_prioridad_leida (prioridad, leida),
    INDEX idx_expira_en (expira_en)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ===============================================
-- MENSAJE DE CONFIRMACIÓN
-- ===============================================

SELECT 'Base de datos TECH-HOME-BOOKS creada exitosamente' AS mensaje;
SELECT 'Ejecuta las migraciones de Laravel para completar la estructura' AS siguiente_paso;