
-- SCHEMA
DROP SCHEMA IF EXISTS fundacion CASCADE;
CREATE SCHEMA fundacion;
SET search_path TO fundacion;

-- 1. TIPOS ENUM 
CREATE TYPE rol_usuario AS ENUM ('admin', 'voluntario');
CREATE TYPE sexo_animal AS ENUM ('macho', 'hembra');
CREATE TYPE estado_animal AS ENUM ('disponible', 'en_proceso', 'adoptado', 'en_tratamiento');
CREATE TYPE tipo_registro_medico AS ENUM ('vacunacion', 'tratamiento', 'control', 'cirugia');

-- 2. TABLA PERSONAS (Con validación de DUI salvadoreño)
CREATE TABLE personas (
    id_persona SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    -- Validación Regex: 8 números, un guion y 1 número
    dui VARCHAR(10) UNIQUE CONSTRAINT check_dui_format CHECK (dui ~ '^[0-9]{8}-[0-9]{1}$'),
    correo VARCHAR(150) UNIQUE,
    telefono VARCHAR(20),
    activo BOOLEAN DEFAULT TRUE,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 3. USUARIOS Y ADOPTANTES
CREATE TABLE usuarios (
    id_usuario SERIAL PRIMARY KEY,
    id_persona INTEGER NOT NULL UNIQUE REFERENCES personas(id_persona) ON DELETE CASCADE,
    password_hash TEXT NOT NULL,
    rol rol_usuario NOT NULL,
    activo BOOLEAN DEFAULT TRUE
);

CREATE TABLE adoptantes (
    id_adoptante SERIAL PRIMARY KEY,
    id_persona INTEGER NOT NULL UNIQUE REFERENCES personas(id_persona) ON DELETE CASCADE,
    direccion TEXT
);

-- 4. ESPECIES Y RAZAS 
CREATE TABLE especies (
    id_especie SMALLSERIAL PRIMARY KEY,
    nombre VARCHAR(20) NOT NULL UNIQUE
);

CREATE TABLE razas (
    id_raza SERIAL PRIMARY KEY,
    id_especie SMALLINT NOT NULL REFERENCES especies(id_especie),
    nombre VARCHAR(50) NOT NULL
);

-- 5. ANIMALES 
CREATE TABLE animales (
    id_animal SERIAL PRIMARY KEY,
    nombre VARCHAR(100),
    id_especie SMALLINT NOT NULL REFERENCES especies(id_especie),
    id_raza INTEGER REFERENCES razas(id_raza),
    fecha_nacimiento DATE, -- Mejor que "edad" estática
    sexo sexo_animal,
    estado estado_animal DEFAULT 'disponible',
    estado_salud TEXT,
    fecha_rescate DATE DEFAULT CURRENT_DATE,
    descripcion TEXT
);

-- 6. GALERÍA DE FOTOS (múltiples imágenes)
CREATE TABLE animales_fotos (
    id_foto SERIAL PRIMARY KEY,
    id_animal INTEGER NOT NULL REFERENCES animales(id_animal) ON DELETE CASCADE,
    url_foto TEXT NOT NULL,
    es_principal BOOLEAN DEFAULT FALSE
);

-- 7. ADOPCIONES 
CREATE TABLE adopciones (
    id_adopcion SERIAL PRIMARY KEY,
    id_animal INTEGER NOT NULL UNIQUE REFERENCES animales(id_animal),
    id_adoptante INTEGER NOT NULL REFERENCES adoptantes(id_adoptante),
    id_usuario_aprobacion INTEGER NOT NULL REFERENCES usuarios(id_usuario),
    fecha_adopcion DATE NOT NULL DEFAULT CURRENT_DATE,
    observaciones TEXT
);

-- 8. HISTORIAL MÉDICO
CREATE TABLE historial_medico (
    id_historial SERIAL PRIMARY KEY,
    id_animal INTEGER NOT NULL REFERENCES animales(id_animal) ON DELETE CASCADE,
    tipo tipo_registro_medico NOT NULL,
    fecha DATE NOT NULL DEFAULT CURRENT_DATE,
    descripcion TEXT NOT NULL,
    veterinario VARCHAR(150)
);

-- ÍNDICES PARA RENDIMIENTO
CREATE INDEX idx_animales_raza ON animales(id_raza);
CREATE INDEX idx_fotos_animal ON animales_fotos(id_animal);