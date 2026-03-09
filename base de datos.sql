
-- SCHEMA


DROP SCHEMA IF EXISTS fundacion CASCADE;
CREATE SCHEMA fundacion;
SET search_path TO fundacion;

-- ENUM TYPES


CREATE TYPE rol_usuario AS ENUM (
'admin',
'voluntario'
);

CREATE TYPE sexo_animal AS ENUM (
'macho',
'hembra'
);

CREATE TYPE estado_animal AS ENUM (
'disponible',
'en_proceso',
'adoptado',
'en_tratamiento'
);

CREATE TYPE tipo_registro_medico AS ENUM (
'vacunacion',
'tratamiento',
'control',
'cirugia'
);

-- PERSONAS (Entidad base)


CREATE TABLE personas (
    id_persona SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    dui VARCHAR(10) UNIQUE,
    correo VARCHAR(150) UNIQUE,
    telefono VARCHAR(20),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE INDEX idx_personas_dui
ON personas(dui);

CREATE INDEX idx_personas_correo
ON personas(correo);

-- USUARIOS DEL SISTEMA


CREATE TABLE usuarios (
    id_usuario SERIAL PRIMARY KEY,
    id_persona INTEGER NOT NULL UNIQUE,
    password_hash TEXT NOT NULL,
    rol rol_usuario NOT NULL,
    activo BOOLEAN DEFAULT TRUE,

    CONSTRAINT fk_usuario_persona
        FOREIGN KEY (id_persona)
        REFERENCES personas(id_persona)
        ON DELETE CASCADE
);


-- ADOPTANTES


CREATE TABLE adoptantes (
    id_adoptante SERIAL PRIMARY KEY,
    id_persona INTEGER NOT NULL UNIQUE,
    direccion TEXT,

    CONSTRAINT fk_adoptante_persona
        FOREIGN KEY (id_persona)
        REFERENCES personas(id_persona)
        ON DELETE CASCADE
);


-- ESPECIES


CREATE TABLE especies (
    id_especie SMALLSERIAL PRIMARY KEY,
    nombre VARCHAR(20) NOT NULL UNIQUE
);

INSERT INTO especies (nombre)
VALUES
('Perro'),
('Gato');


-- ANIMALES


CREATE TABLE animales (
    id_animal SERIAL PRIMARY KEY,
    nombre VARCHAR(100),
    id_especie SMALLINT NOT NULL,
    edad INTEGER CHECK (edad >= 0),
    sexo sexo_animal,
    estado estado_animal DEFAULT 'disponible',
    estado_salud TEXT,
    fecha_rescate DATE,
    descripcion TEXT,
    foto_url TEXT,

    CONSTRAINT fk_animales_especie
        FOREIGN KEY (id_especie)
        REFERENCES especies(id_especie)
);

CREATE INDEX idx_animales_especie
ON animales(id_especie);

CREATE INDEX idx_animales_estado
ON animales(estado);

-- ADOPCIONES


CREATE TABLE adopciones (
    id_adopcion SERIAL PRIMARY KEY,
    id_animal INTEGER NOT NULL,
    id_adoptante INTEGER NOT NULL,
    id_usuario_aprobacion INTEGER NOT NULL,
    fecha_adopcion DATE NOT NULL,
    observaciones TEXT,

    CONSTRAINT uq_animal_adoptado
        UNIQUE (id_animal),

    CONSTRAINT fk_adopciones_animal
        FOREIGN KEY (id_animal)
        REFERENCES animales(id_animal)
        ON DELETE RESTRICT,

    CONSTRAINT fk_adopciones_adoptante
        FOREIGN KEY (id_adoptante)
        REFERENCES adoptantes(id_adoptante),

    CONSTRAINT fk_adopciones_usuario
        FOREIGN KEY (id_usuario_aprobacion)
        REFERENCES usuarios(id_usuario)
);

CREATE INDEX idx_adopciones_adoptante
ON adopciones(id_adoptante);

CREATE INDEX idx_adopciones_usuario
ON adopciones(id_usuario_aprobacion);


-- HISTORIAL MEDICO


CREATE TABLE historial_medico (
    id_historial SERIAL PRIMARY KEY,
    id_animal INTEGER NOT NULL,
    tipo tipo_registro_medico NOT NULL,
    fecha DATE NOT NULL,
    descripcion TEXT NOT NULL,
    veterinario VARCHAR(150),

    CONSTRAINT fk_historial_animal
        FOREIGN KEY (id_animal)
        REFERENCES animales(id_animal)
        ON DELETE CASCADE
);

CREATE INDEX idx_historial_animal
ON historial_medico(id_animal);
