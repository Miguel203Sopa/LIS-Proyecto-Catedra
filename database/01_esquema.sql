DROP SCHEMA IF EXISTS fundacion CASCADE;
CREATE SCHEMA fundacion;
SET search_path TO fundacion;

CREATE TYPE rol_usuario AS ENUM ('admin', 'voluntario');
CREATE TYPE sexo_animal AS ENUM ('macho', 'hembra');
CREATE TYPE estado_animal AS ENUM ('disponible','en proceso','adoptado','en tratamiento');

CREATE TABLE personas (
id_persona SERIAL PRIMARY KEY,
nombre VARCHAR(100) NOT NULL,
apellido VARCHAR(100) NOT NULL,
dui VARCHAR(10) UNIQUE NOT NULL,
correo VARCHAR(150) UNIQUE NOT NULL,
telefono VARCHAR(20) NOT NULL,
activo BOOLEAN DEFAULT TRUE,
fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE usuarios (
id_usuario SERIAL PRIMARY KEY,
id_persona INTEGER UNIQUE REFERENCES personas(id_persona) ON DELETE CASCADE,
firebase_uid VARCHAR(255) UNIQUE,
rol rol_usuario NOT NULL,
activo BOOLEAN DEFAULT TRUE
);

CREATE TABLE animales (
id_animal SERIAL PRIMARY KEY,
nombre VARCHAR(100),
especie VARCHAR(50),
fecha_nacimiento DATE,
sexo sexo_animal,
estado estado_animal DEFAULT 'disponible',
estado_salud TEXT,
fecha_rescate DATE DEFAULT CURRENT_DATE,
descripcion TEXT,
foto_url TEXT,
historial_medico JSONB DEFAULT '[]'
);

CREATE TABLE adopciones (
id_adopcion SERIAL PRIMARY KEY,
id_animal INTEGER NOT NULL UNIQUE REFERENCES animales(id_animal),
id_persona INTEGER NOT NULL REFERENCES personas(id_persona),
id_usuario_aprobacion INTEGER REFERENCES usuarios(id_usuario),
fecha_adopcion DATE DEFAULT CURRENT_DATE,
estado VARCHAR(20) DEFAULT 'en proceso',
observaciones TEXT
);

CREATE TABLE fundacion.solicitudes_voluntariado (
    id_solicitud SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    dui VARCHAR(10) NOT NULL,
    correo VARCHAR(150) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    motivacion TEXT,
    estado estado_solicitud DEFAULT 'pendiente',
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE INDEX idx_usuarios_uid ON usuarios(firebase_uid);

CREATE TYPE estado_solicitud AS ENUM (
    'pendiente',
    'aprobado',
    'rechazado'
);
