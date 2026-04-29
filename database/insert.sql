




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
('Nata','Gato','2026-02-15','macho','disponible','Sano','2026-04-18','Rescatado de un basurero.');




--personas 

DO $$
DECLARE 
    i INT;
    nombres TEXT[] := ARRAY['Rodrigo','Lucia','Samuel','Monica','Fernando','Xenia','Gustavo','Irene','Ricardo','Camila','Emilio','Paola','Alvaro','Natalia','Javier','Beatriz','Hector','Elena','Eduardo','Sofia'];
    apellidos TEXT[] := ARRAY['Zelaya','Portillo','Avelar','Sermeño','Orellana','Quinteros','Mejia','Vigil','Guillen','Arevalo','Carcamo','Menjivar','Batres','Lainez','Valladares','Canales','Palacios','Bonilla','Escobar','Alfaro'];
    dominios TEXT[] := ARRAY['@gmail.com','@outlook.com','@yahoo.com','@icloud.com'];
    
    correo_gen TEXT;
BEGIN
    FOR i IN 1..20 LOOP
        
        correo_gen := LOWER(
            CASE 
                WHEN i % 4 = 0 THEN nombres[i] || '.' || apellidos[i]
                WHEN i % 4 = 1 THEN SUBSTRING(nombres[i],1,1) || apellidos[i] || floor(random()*99)::text
                WHEN i % 4 = 2 THEN nombres[i] || floor(random()*2000+80)::text
                ELSE apellidos[i] || '.' || nombres[i]
            END
        ) || dominios[floor(random()*array_length(dominios,1))+1];

        INSERT INTO fundacion.personas (nombre, apellido, correo, telefono)
        VALUES (
            nombres[i],
            apellidos[i],
            correo_gen,
            '7' || floor(random()*9+1)::text || floor(random()*100)::text || '-' || LPAD(floor(random()*9999)::text,4,'0')
        );
        
    END LOOP;
END $$;

--voluntario y admin

DO $$
DECLARE 
    r RECORD;
    contador INT := 0;
BEGIN
    FOR r IN SELECT id_persona FROM fundacion.personas LIMIT 10 LOOP
        contador := contador + 1;

        INSERT INTO fundacion.usuarios (id_persona, rol, password)
        VALUES (
            r.id_persona,
            (CASE 
                WHEN contador = 1 THEN 'admin'
                ELSE 'voluntario'
            END)::fundacion.rol_usuario,
            MD5(random()::text)
        );
    END LOOP;
END $$;

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


--pruebas

SELECT u.id_usuario, p.nombre, p.apellido, u.rol, u.activo
FROM fundacion.usuarios u
JOIN fundacion.personas p ON u.id_persona = p.id_persona;


SELECT 
    a.nombre AS animal,
    p.nombre || ' ' || p.apellido AS adoptante,
    u.id_usuario AS aprobado_por,
    ad.fecha_adopcion,
    ad.observaciones
FROM fundacion.adopciones ad
JOIN fundacion.animales a ON ad.id_animal = a.id_animal
JOIN fundacion.personas p ON ad.id_persona = p.id_persona
LEFT JOIN fundacion.usuarios u ON ad.id_usuario_aprobacion = u.id_usuario;

SELECT 
    a.nombre AS animal,
    h.tipo,
    h.descripcion,
    h.veterinario,
    h.fecha
FROM fundacion.historial_medico h
JOIN fundacion.animales a ON h.id_animal = a.id_animal;


SELECT estado, COUNT(*) 
FROM fundacion.animales
GROUP BY estado;
