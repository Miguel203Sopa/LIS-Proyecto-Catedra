

--DATOS 

--  INSERT DE ANIMALES (PERROS)
INSERT INTO fundacion.animales 
(nombre, especie, fecha_nacimiento, sexo, estado, estado_salud, fecha_rescate, descripcion) 
VALUES 
('Malcon','Perro','2023-11-06','macho','disponible','Sano','2025-11-06','Rescatado en noviembre, busca hogar responsable.'),
('Sicilia','Perro','2026-02-15','hembra','en_tratamiento','Positivo a enfermedad de garrapatas','2026-04-18','Cachorra juguetona rescatada en Nuevo Cuscatlán.'),
('Metapán','Perro','2026-03-01','macho','disponible','En control inicial','2026-04-15','Rescatado de un barranco en Metapán.'),
('Bimba','Perro','2025-12-01','hembra','disponible','Sana y esterilizada','2025-12-15','Rescatada de maltrato extremo, muy alegre.'),
('Amaranta','Perro','2024-05-01','hembra','disponible','Sana y esterilizada','2026-01-12','Rescatada en estado deplorable, ya recuperada.'),
('Vera','Perro','2023-01-01','hembra','en_tratamiento','Recuperación de cirugía de cadera','2025-11-30','Atropellada en Ciudad Marsella, muy social.'),
('Tomás','Perro','2025-06-01','hembra','disponible','Tratamiento Bravecto aplicado','2026-04-01','Busca hogar urgente.'),
('Coco','Perro','2026-02-01','hembra','disponible','Desnutrición leve, desparasitada','2026-04-10','Encontrada en un saco con sus hermanos.'),
('Celeste','Perro','2026-02-01','hembra','disponible','Desnutrición leve, desparasitada','2026-04-10','Encontrada en un saco con sus hermanos.'),
('Chiqui','Perro','2026-02-01','macho','disponible','Desnutrición leve, desparasitada','2026-04-10','Encontrado en un saco con sus hermanos.'),
('Caramelo','Perro','2026-02-01','macho','disponible','Desnutrición leve, desparasitada','2026-04-10','Encontrado en un saco con sus hermanos.'),
('Nyssa','Perro','2021-04-01','hembra','disponible','Sana y esterilizada','2026-03-15','Rescatada en San Salvador, talla mediana.'),
('Dotty','Perro','2024-04-01','hembra','disponible','Sana y esterilizada','2026-03-01','Rescatada con sus 10 cachorros.'),
('Nena','Perro','2022-01-01','hembra','disponible','Sana','2026-04-20','Dueños adultos mayores ya no pueden cuidarla.'),
('Bebita','Perro','2026-02-15','hembra','disponible','Sana','2026-04-18','Encontrada en Mercado Colón.'),
('Dottyto','Perro','2026-01-01','macho','disponible','Vacunas iniciales','2026-03-15','Hijo de Dotty.'),
('Dottyta','Perro','2026-01-01','hembra','disponible','Vacunas iniciales','2026-03-15','Hija de Dotty.'),
('Rocky','Perro','2025-08-01','macho','disponible','Sano','2026-04-01','Juguetón y amoroso.');

--  INSERT DE ANIMALES (GATOS)
INSERT INTO fundacion.animales 
(nombre, especie, fecha_nacimiento, sexo, estado, estado_salud, fecha_rescate, descripcion) 
VALUES 
('Anuel','Gato','2026-03-15','macho','en_tratamiento','Problemas de piel','2026-04-10','Abandonado en casa de adultos mayores.'),
('Ariel','Gato','2026-02-15','hembra','disponible','Prueba negativa','2026-04-10','Gatita carey rescatada.'),
('Kika','Gato','2026-02-15','hembra','disponible','Desparasitada','2026-04-12','Rescatada en Apopa.'),
('Soya','Gato','2025-08-01','hembra','disponible','Esterilizada','2026-03-15','Rescatada en Soyapango.'),
('Negrita','Gato','2026-02-01','hembra','disponible','Desparasitada','2026-04-01','Rescatada de un parque.'),
('Cami','Gato','2025-04-01','hembra','en_tratamiento','Herida infectada en cuello','2026-04-15','Rescatada en Santa Tecla.'),
('Kimi','Gato','2025-12-01','hembra','disponible','Esterilizada y desparasitada','2026-04-01','Rescatada en Villa Constitución.'),
('Príncipe','Gato','2025-06-01','macho','disponible','Sano','2026-04-05','Se entrega con promesa de castración.'),
('Oreo','Gato','2026-02-15','hembra','disponible','Sana','2026-04-18','Rescatada de un basurero.'),
('Nata','Gato','2026-02-15','macho','disponible','Sano','2026-04-18','Rescatado de un basurero.'),
('Luna','Gato','2026-01-20','hembra','disponible','Desparasitada y vacunada','2026-04-20','Rescatada de una colonia en Mejicanos.'),
('Michi','Gato','2025-09-10','macho','disponible','Castrado y sano','2026-03-28','Encontrado deambulando en el mercado.'),
('Canela','Gato','2026-03-01','hembra','en_tratamiento','Conjuntivitis en tratamiento','2026-04-22','Rescatada de un terreno baldío en Ilopango.'),
('Simba','Gato','2025-11-15','macho','disponible','Desparasitado','2026-04-08','Abandonado amarrado en una bolsa en Antiguo Cuscatlán.'),
('Mimi','Gato','2026-02-28','hembra','disponible','Sana','2026-04-25','Rescatada de la calle junto a su hermano.'),
('Tobías','Gato','2026-02-28','macho','disponible','Sano','2026-04-25','Rescatado de la calle junto a su hermana.'),
('Perla','Gato','2025-07-14','hembra','disponible','Esterilizada y desparasitada','2026-03-10','Rescatada en San Marcos, muy sociable.'),
('Zeus','Gato','2025-10-05','macho','en_tratamiento','Desnutrición leve','2026-04-30','Rescatado en las cercanías del lago de Ilopango.');


--AGREGUE MAS GATOS PORQ TENIA MAS IMAGENES DE LOS GATOS



--historial medico

INSERT INTO fundacion.historial_medico (id_animal, tipo, descripcion, veterinario)
SELECT id_animal,
       'control'::fundacion.tipo_registro_medico,
       'Chequeo general inicial',
       'Veterinaria Central'
FROM fundacion.animales;

-- Casos específicos más realistas
INSERT INTO fundacion.historial_medico (id_animal, tipo, descripcion, veterinario)
VALUES
((SELECT id_animal FROM fundacion.animales WHERE nombre='Sicilia'),
 'tratamiento',
 'Tratamiento contra enfermedad de garrapatas',
 'Clínica San Francisco'),

((SELECT id_animal FROM fundacion.animales WHERE nombre='Vera'),
 'cirugia',
 'Cirugía de cadera y seguimiento postoperatorio',
 'Hospivet'),

((SELECT id_animal FROM fundacion.animales WHERE nombre='Cami'),
 'tratamiento',
 'Tratamiento de herida infectada en cuello',
 'Veterinaria El Establo'),

((SELECT id_animal FROM fundacion.animales WHERE nombre='Anuel'),
 'tratamiento',
 'Tratamiento dermatológico por problemas de piel',
 'Clínica San Francisco');
 

--adopciones
UPDATE fundacion.animales 
SET estado = 'adoptado'
WHERE nombre IN ('Malcon','Bimba','Rocky','Ariel','Kika');

INSERT INTO fundacion.adopciones 
(id_animal, id_persona, id_usuario_aprobacion, observaciones)
VALUES
(
 (SELECT id_animal FROM fundacion.animales WHERE nombre='Malcon'),
 (SELECT id_persona FROM fundacion.personas ORDER BY random() LIMIT 1),
 (SELECT id_usuario FROM fundacion.usuarios ORDER BY random() LIMIT 1),
 'Adopción exitosa'
),
(
 (SELECT id_animal FROM fundacion.animales WHERE nombre='Bimba'),
 (SELECT id_persona FROM fundacion.personas ORDER BY random() LIMIT 1),
 (SELECT id_usuario FROM fundacion.usuarios ORDER BY random() LIMIT 1),
 'Familia responsable'
),
(
 (SELECT id_animal FROM fundacion.animales WHERE nombre='Rocky'),
 (SELECT id_persona FROM fundacion.personas ORDER BY random() LIMIT 1),
 (SELECT id_usuario FROM fundacion.usuarios ORDER BY random() LIMIT 1),
 'Seguimiento en proceso'
),
(
 (SELECT id_animal FROM fundacion.animales WHERE nombre='Ariel'),
 (SELECT id_persona FROM fundacion.personas ORDER BY random() LIMIT 1),
 (SELECT id_usuario FROM fundacion.usuarios ORDER BY random() LIMIT 1),
 'Adopción aprobada'
),
(
 (SELECT id_animal FROM fundacion.animales WHERE nombre='Kika'),
 (SELECT id_persona FROM fundacion.personas ORDER BY random() LIMIT 1),
 (SELECT id_usuario FROM fundacion.usuarios ORDER BY random() LIMIT 1),
 'Entrega programada'
);


--urls de las fotos 


-- PERROS
INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/malcon.png', TRUE
FROM fundacion.animales WHERE nombre = 'Malcon' AND especie = 'Perro';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/sicilia.png', TRUE
FROM fundacion.animales WHERE nombre = 'Sicilia' AND especie = 'Perro';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/metapan.png', TRUE
FROM fundacion.animales WHERE nombre = 'Metapán' AND especie = 'Perro';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/bimba.png', TRUE
FROM fundacion.animales WHERE nombre = 'Bimba' AND especie = 'Perro';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/amaranta.png', TRUE
FROM fundacion.animales WHERE nombre = 'Amaranta' AND especie = 'Perro';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/vera.png', TRUE
FROM fundacion.animales WHERE nombre = 'Vera' AND especie = 'Perro';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/tomas.png', TRUE
FROM fundacion.animales WHERE nombre = 'Tomás' AND especie = 'Perro';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/coco.png', TRUE
FROM fundacion.animales WHERE nombre = 'Coco' AND especie = 'Perro';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/celeste.png', TRUE
FROM fundacion.animales WHERE nombre = 'Celeste' AND especie = 'Perro';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/chiqui.png', TRUE
FROM fundacion.animales WHERE nombre = 'Chiqui' AND especie = 'Perro';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/caramelo.png', TRUE
FROM fundacion.animales WHERE nombre = 'Caramelo' AND especie = 'Perro';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/nyssa.png', TRUE
FROM fundacion.animales WHERE nombre = 'Nyssa' AND especie = 'Perro';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/dotty.png', TRUE
FROM fundacion.animales WHERE nombre = 'Dotty' AND especie = 'Perro';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/nena.png', TRUE
FROM fundacion.animales WHERE nombre = 'Nena' AND especie = 'Perro';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/bebita.png', TRUE
FROM fundacion.animales WHERE nombre = 'Bebita' AND especie = 'Perro';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/dottyto.png', TRUE
FROM fundacion.animales WHERE nombre = 'Dottyto' AND especie = 'Perro';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/dottyta.png', TRUE
FROM fundacion.animales WHERE nombre = 'Dottyta' AND especie = 'Perro';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/rocky.png', TRUE
FROM fundacion.animales WHERE nombre = 'Rocky' AND especie = 'Perro';

-- GATOS
INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/anuel.png', TRUE
FROM fundacion.animales WHERE nombre = 'Anuel' AND especie = 'Gato';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/ariel.png', TRUE
FROM fundacion.animales WHERE nombre = 'Ariel' AND especie = 'Gato';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/kika.png', TRUE
FROM fundacion.animales WHERE nombre = 'Kika' AND especie = 'Gato';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/soya.png', TRUE
FROM fundacion.animales WHERE nombre = 'Soya' AND especie = 'Gato';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/negrita.png', TRUE
FROM fundacion.animales WHERE nombre = 'Negrita' AND especie = 'Gato';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/cami.png', TRUE
FROM fundacion.animales WHERE nombre = 'Cami' AND especie = 'Gato';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/kimi.png', TRUE
FROM fundacion.animales WHERE nombre = 'Kimi' AND especie = 'Gato';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/principe.png', TRUE
FROM fundacion.animales WHERE nombre = 'Príncipe' AND especie = 'Gato';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/oreo.png', TRUE
FROM fundacion.animales WHERE nombre = 'Oreo' AND especie = 'Gato';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/nata.png', TRUE
FROM fundacion.animales WHERE nombre = 'Nata' AND especie = 'Gato';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/luna.png', TRUE
FROM fundacion.animales WHERE nombre = 'Luna' AND especie = 'Gato';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/michi.png', TRUE
FROM fundacion.animales WHERE nombre = 'Michi' AND especie = 'Gato';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/canela.png', TRUE
FROM fundacion.animales WHERE nombre = 'Canela' AND especie = 'Gato';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/simba.png', TRUE
FROM fundacion.animales WHERE nombre = 'Simba' AND especie = 'Gato';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/mimi.png', TRUE
FROM fundacion.animales WHERE nombre = 'Mimi' AND especie = 'Gato';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/tobias.png', TRUE
FROM fundacion.animales WHERE nombre = 'Tobías' AND especie = 'Gato';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/perla.png', TRUE
FROM fundacion.animales WHERE nombre = 'Perla' AND especie = 'Gato';

INSERT INTO fundacion.animales_fotos (id_animal, url_foto, es_principal)
SELECT id_animal, '/assets/imagenes/animales/zeus.png', TRUE
FROM fundacion.animales WHERE nombre = 'Zeus' AND especie = 'Gato';


--admin

INSERT INTO personas (
    nombre,
    apellido,
    dui,
    correo,
    telefono
)
VALUES (
    'Administrador',
    'Principal',
    '06789413-5',
    'admin@admin.com',
    '0000-0000'
);

INSERT INTO usuarios (
    id_persona,
    firebase_uid,
    rol
)
VALUES (
    1,
    '5G5ohRBjzmfJMK30JukvwcanfzQ2',
    'admin'
);

--voluntarios

INSERT INTO personas (nombre, apellido, dui, correo, telefono)
VALUES ('Gabriela', 'Rivas Molina', '04729183-6', 'gaby.rivas94@gmail.com', '7381-4920');
INSERT INTO usuarios (id_persona, firebase_uid, rol)
VALUES (2, 'alejandro aramburu', 'voluntario');

INSERT INTO personas (nombre, apellido, dui, correo, telefono)
VALUES ('Fernando', 'Castellanos Vega', '07163842-1', 'fer_castev@hotmail.com', '6274-8531');
INSERT INTO usuarios (id_persona, firebase_uid, rol)
VALUES (3, 'iñaki godoy', 'voluntario');

INSERT INTO personas (nombre, apellido, dui, correo, telefono)
VALUES ('Marcela', 'Orellana Cruz', '02984751-3', 'marce.orellana@outlook.com', '7849-2063');
INSERT INTO usuarios (id_persona, firebase_uid, rol)
VALUES (4, 'han jisung', 'voluntario');

INSERT INTO personas (nombre, apellido, dui, correo, telefono)
VALUES ('Rodrigo', 'Henríquez Paz', '08341627-9', 'rodh.paz22@gmail.com', '6512-7394');
INSERT INTO usuarios (id_persona, firebase_uid, rol)
VALUES (5, 'lee felix', 'voluntario');

INSERT INTO personas (nombre, apellido, dui, correo, telefono)
VALUES ('Valeria', 'Mendoza Flores', '05617394-2', 'vale_mendoz@gmail.com', '7163-5827');
INSERT INTO usuarios (id_persona, firebase_uid, rol)
VALUES (6, 'choi yeonjun', 'voluntario');

 --cambiar el firebase uid
 





