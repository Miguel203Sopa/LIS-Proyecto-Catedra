
-- SCHEMA
DROP SCHEMA IF EXISTS fundacion CASCADE;
CREATE SCHEMA fundacion;
SET search_path TO fundacion;

-- ENUMS
CREATE TYPE rol_usuario AS ENUM ('admin', 'voluntario');
CREATE TYPE sexo_animal AS ENUM ('macho', 'hembra');
CREATE TYPE estado_animal AS ENUM ('disponible', 'en_proceso', 'adoptado', 'en_tratamiento');
CREATE TYPE tipo_registro_medico AS ENUM ('vacunacion', 'tratamiento', 'control', 'cirugia');

-- 1. PERSONAS (BASE PARA TODOS)
CREATE TABLE personas (
    id_persona SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    correo VARCHAR(150) UNIQUE NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    activo BOOLEAN DEFAULT TRUE,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. VOLUNTARIOS Y ADMINS
CREATE TABLE usuarios (
    id_usuario SERIAL PRIMARY KEY,
    id_persona INTEGER UNIQUE REFERENCES personas(id_persona) ON DELETE CASCADE,
    rol rol_usuario NOT NULL,
    password TEXT NOT NULL,
    activo BOOLEAN DEFAULT TRUE
);

-- 3. ANIMALES
CREATE TABLE animales (
    id_animal SERIAL PRIMARY KEY,
    nombre VARCHAR(100),
    especie VARCHAR(50),
    fecha_nacimiento DATE,
    sexo sexo_animal,
    estado estado_animal DEFAULT 'disponible',
    estado_salud TEXT,
    fecha_rescate DATE DEFAULT CURRENT_DATE,
    descripcion TEXT
);

-- 4. FOTOS DE ANIMALES
CREATE TABLE animales_fotos (
    id_foto SERIAL PRIMARY KEY,
    id_animal INTEGER NOT NULL REFERENCES animales(id_animal) ON DELETE CASCADE,
    url_foto TEXT NOT NULL,
    es_principal BOOLEAN DEFAULT FALSE
);

-- 5. ADOPCIONES 
CREATE TABLE adopciones (
    id_adopcion SERIAL PRIMARY KEY,
    id_animal INTEGER NOT NULL UNIQUE REFERENCES animales(id_animal),
    id_persona INTEGER NOT NULL REFERENCES personas(id_persona),
    id_usuario_aprobacion INTEGER REFERENCES usuarios(id_usuario),
    fecha_adopcion DATE DEFAULT CURRENT_DATE,
    estado VARCHAR(20) DEFAULT 'en_proceso',
    observaciones TEXT
);

-- 6. HISTORIAL MÉDICO
CREATE TABLE historial_medico (
    id_historial SERIAL PRIMARY KEY,
    id_animal INTEGER NOT NULL REFERENCES animales(id_animal) ON DELETE CASCADE,
    tipo tipo_registro_medico NOT NULL,
    fecha DATE NOT NULL DEFAULT CURRENT_DATE,
    descripcion TEXT NOT NULL,
    veterinario VARCHAR(150)
);

-- ÍNDICES
CREATE INDEX idx_fotos_animal ON animales_fotos(id_animal);
