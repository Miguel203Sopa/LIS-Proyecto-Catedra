CREATE TABLE usuarios (
    id_usuario SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    correo VARCHAR(150) UNIQUE NOT NULL,
    password_hash TEXT NOT NULL,
    telefono VARCHAR(20),
    rol VARCHAR(20) NOT NULL CHECK (rol IN ('admin','voluntario','adoptante')),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

--indice para buscar correo
CREATE INDEX idx_usuario_correo
ON usuarios(correo);

CREATE TABLE animales (
    id_animal SERIAL PRIMARY KEY,
    nombre VARCHAR(100),
    especie VARCHAR(50) NOT NULL,
    raza VARCHAR(100),
    edad INTEGER CHECK (edad >= 0),
    sexo VARCHAR(10) CHECK (sexo IN ('macho','hembra')),
    estado_salud TEXT,
    estado VARCHAR(30) DEFAULT 'disponible'
        CHECK (estado IN ('disponible','en_proceso','adoptado')),
    fecha_rescate DATE,
    descripcion TEXT,
    foto_url TEXT
);

--indice para busquedas de estado 
CREATE INDEX idx_animales_estado
ON animales(estado);

CREATE TABLE solicitudes_adopcion (
    id_solicitud SERIAL PRIMARY KEY,
    id_usuario INTEGER NOT NULL,
    id_animal INTEGER NOT NULL,
    fecha_solicitud TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    estado VARCHAR(30) DEFAULT 'pendiente'
        CHECK (estado IN ('pendiente','en_revision','aprobada','rechazada')),
    comentario TEXT,

    CONSTRAINT fk_usuario_solicitud
        FOREIGN KEY (id_usuario)
        REFERENCES usuarios(id_usuario)
        ON DELETE CASCADE,

    CONSTRAINT fk_animal_solicitud
        FOREIGN KEY (id_animal)
        REFERENCES animales(id_animal)
        ON DELETE CASCADE
);

CREATE INDEX idx_solicitudes_usuario
ON solicitudes_adopcion(id_usuario);

CREATE INDEX idx_solicitudes_animal
ON solicitudes_adopcion(id_animal);

CREATE TABLE adopciones (
    id_adopcion SERIAL PRIMARY KEY,
    id_animal INTEGER NOT NULL UNIQUE,
    id_usuario INTEGER NOT NULL,
    fecha_adopcion DATE NOT NULL,
    observaciones TEXT,

    CONSTRAINT fk_animal_adopcion
        FOREIGN KEY (id_animal)
        REFERENCES animales(id_animal)
        ON DELETE RESTRICT,

    CONSTRAINT fk_usuario_adopcion
        FOREIGN KEY (id_usuario)
        REFERENCES usuarios(id_usuario)
        ON DELETE RESTRICT
);

CREATE TABLE historial_medico (
    id_historial SERIAL PRIMARY KEY,
    id_animal INTEGER NOT NULL,
    fecha DATE NOT NULL,
    tipo_registro VARCHAR(50)
        CHECK (tipo_registro IN ('vacunacion','tratamiento','control','cirugia')),
    descripcion TEXT NOT NULL,
    veterinario VARCHAR(150),

    CONSTRAINT fk_animal_historial
        FOREIGN KEY (id_animal)
        REFERENCES animales(id_animal)
        ON DELETE CASCADE
);

CREATE INDEX idx_historial_animal
ON historial_medico(id_animal);
