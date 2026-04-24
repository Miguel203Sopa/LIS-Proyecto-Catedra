-- 1. ESPECIES Y RAZAS 
INSERT INTO fundacion.especies (id_especie, nombre) VALUES (1, 'Perro'), (2, 'Gato') ON CONFLICT DO NOTHING;

INSERT INTO fundacion.razas (id_especie, nombre) VALUES 
(1, 'Mestizo'), (1, 'Salvadoreño'), -- Perros
(2, 'Común'), (2, 'Mestizo');      -- Gatos


--DATOS DE PRUEBA--

-- 2. INSERT DE ANIMALES (PERROS)
INSERT INTO fundacion.animales (nombre, id_especie, id_raza, fecha_nacimiento, sexo, estado, estado_salud, fecha_rescate, descripcion) VALUES 
('Malcon', 1, 1, '2023-11-06', 'macho', 'disponible', 'Sano', '2025-11-06', 'Rescatado en noviembre, busca hogar responsable.'),
('Sicilia', 1, 1, '2026-02-15', 'hembra', 'en_tratamiento', 'Positivo a enfermedad de garrapatas', '2026-04-18', 'Cachorra juguetona rescatada en Nuevo Cuscatlán.'),
('Metapán', 1, 1, '2026-03-01', 'macho', 'disponible', 'En control inicial', '2026-04-15', 'Rescatado de un barranco en Metapán.'),
('Bimba', 1, 1, '2025-12-01', 'hembra', 'disponible', 'Sana y esterilizada', '2025-12-15', 'Rescatada de maltrato extremo, muy alegre.'),
('Amaranta', 1, 1, '2024-05-01', 'hembra', 'disponible', 'Sana y esterilizada', '2026-01-12', 'Rescatada en estado deplorable, ya recuperada.'),
('Vera', 1, 1, '2023-01-01', 'hembra', 'en_tratamiento', 'Recuperación de cirugía de cadera', '2025-11-30', 'Atropellada en Ciudad Marsella, muy social.'),
('Tomás', 1, 1, '2025-06-01', 'hembra', 'disponible', 'Tratamiento Bravecto aplicado', '2026-04-01', 'Busca hogar urgente.'),
('Coco', 1, 1, '2026-02-01', 'hembra', 'disponible', 'Desnutrición leve, desparasitada', '2026-04-10', 'Encontrada en un saco con sus hermanos.'),
('Celeste', 1, 1, '2026-02-01', 'hembra', 'disponible', 'Desnutrición leve, desparasitada', '2026-04-10', 'Encontrada en un saco con sus hermanos.'),
('Chiqui', 1, 1, '2026-02-01', 'macho', 'disponible', 'Desnutrición leve, desparasitada', '2026-04-10', 'Encontrado en un saco con sus hermanos.'),
('Caramelo', 1, 1, '2026-02-01', 'macho', 'disponible', 'Desnutrición leve, desparasitada', '2026-04-10', 'Encontrado en un saco con sus hermanos.'),
('Nyssa', 1, 1, '2021-04-01', 'hembra', 'disponible', 'Sana y esterilizada', '2026-03-15', 'Rescatada en San Salvador, talla mediana.'),
('Dotty', 1, 1, '2024-04-01', 'hembra', 'disponible', 'Sana y esterilizada', '2026-03-01', 'Rescatada con sus 10 cachorros.'),
('Nena', 1, 1, '2022-01-01', 'hembra', 'disponible', 'Sana', '2026-04-20', 'Dueños adultos mayores ya no pueden cuidarla.'),
('Bebita', 1, 1, '2026-02-15', 'hembra', 'disponible', 'Sana', '2026-04-18', 'Encontrada en Mercado Colón.'),
('Dottyto', 1, 1, '2026-01-01', 'macho', 'disponible', 'Vacunas iniciales', '2026-03-15', 'Hijo de Dotty, talla mediana/grande.'),
('Dottyta', 1, 1, '2026-01-01', 'hembra', 'disponible', 'Vacunas iniciales', '2026-03-15', 'Hija de Dotty, talla mediana/grande.'),
('Rocky', 1, 1, '2025-08-01', 'macho', 'disponible', 'Sano', '2026-04-01', 'Juguetón y amoroso.'); 

-- 3. INSERT DE ANIMALES (GATOS)
INSERT INTO fundacion.animales (nombre, id_especie, id_raza, fecha_nacimiento, sexo, estado, estado_salud, fecha_rescate, descripcion) VALUES 
('Anuel', 2, NULL, '2026-03-15', 'macho', 'en_tratamiento', 'Problemas de piel', '2026-04-10', 'Abandonado en casa de adultos mayores.'),
('Ariel', 2, 2, '2026-02-15', 'hembra', 'disponible', 'Prueba Uranotes Negativa', '2026-04-10', 'Gatita carey rescatada.'),
('Kika', 2, 2, '2026-02-15', 'hembra', 'disponible', 'Desparasitada', '2026-04-12', 'Rescatada en Apopa.'),
('Soya', 2, NULL, '2025-08-01', 'hembra', 'disponible', 'Esterilizada', '2026-03-15', 'Rescatada en Soyapango.'),
('Negrita', 2, NULL, '2026-02-01', 'hembra', 'disponible', 'Desparasitada', '2026-04-01', 'Rescatada de un parque.'),
('Cami', 2, 3, '2025-04-01', 'hembra', 'en_tratamiento', 'Herida infectada en cuello', '2026-04-15', 'Rescatada en Santa Tecla.'),
('Kimi', 2, NULL, '2025-12-01', 'hembra', 'disponible', 'Esterilizada y desparasitada', '2026-04-01', 'Rescatada en Villa Constitución.'),
('Príncipe', 2, NULL, '2025-06-01', 'macho', 'disponible', 'Sano', '2026-04-05', 'Se entrega con promesa de castración.'),
('Oreo', 2, NULL, '2026-02-15', 'hembra', 'disponible', 'Sana', '2026-04-18', 'Rescatada de un basurero, usa arenero.'),
('Nata', 2, NULL, '2026-02-15', 'macho', 'disponible', 'Sano', '2026-04-18', 'Rescatado de un basurero, usa arenero.');





--DATOS EN FORMA MASIVA---


--personas 

DO $$
DECLARE 
    i INT;
    noms TEXT[] := ARRAY['Rodrigo', 'Lucia', 'Samuel', 'Monica', 'Fernando', 'Xenia', 'Gustavo', 'Irene', 'Ricardo', 'Camila', 'Emilio', 'Paola', 'Alvaro', 'Natalia', 'Javier', 'Beatriz', 'Hector', 'Elena', 'Eduardo', 'Sofia', 'Salvador', 'Marcela', 'Enrique', 'Tatiana', 'Mauricio', 'Gabriela', 'Oscar', 'Karla', 'Roberto', 'Fatima'];
    apes TEXT[] := ARRAY['Zelaya', 'Portillo', 'Avelar', 'Sermeño', 'Orellana', 'Quinteros', 'Mejia', 'Vigil', 'Guillen', 'Arevalo', 'Carcamo', 'Menjivar', 'Batres', 'Lainez', 'Valladares', 'Canales', 'Palacios', 'Bonilla', 'Escobar', 'Alfaro', 'Ceron', 'Guevara', 'Chicas', 'Pineda', 'Rivas', 'Cortez', 'Mendoza', 'Aguilar', 'Castillo', 'Rivera', 'Gomez', 'Hernandez', 'Lopez', 'Martinez', 'Perez', 'Rodriguez', 'Sanchez', 'Flores', 'Ramirez', 'Cruz', 'Morales', 'Vasquez', 'Jimenez', 'Reyes', 'Diaz', 'Torres', 'Paz', 'Bustillo', 'Choto', 'Landaverde'];
    dominios TEXT[] := ARRAY['@gmail.com', '@outlook.es', '@yahoo.com', '@hotmail.com', '@icloud.com'];
    dui_gen TEXT;
    tel_gen TEXT;
    correo_gen TEXT;
    nombre_elegido TEXT;
    apellido_elegido TEXT;
BEGIN
    FOR i IN 1..100 LOOP
        nombre_elegido := noms[floor(random() * array_length(noms, 1)) + 1];
        apellido_elegido := apes[floor(random() * array_length(apes, 1)) + 1];
        

        dui_gen := LPAD(floor(random() * (99999999 - 10101010 + 1) + 10101010)::text, 8, '0') || '-' || floor(random() * 10)::text;
        
  
        tel_gen := (CASE WHEN random() > 0.5 THEN '7' ELSE '6' END) || floor(random()*9+1)::text || floor(random()*100)::text || '-' || LPAD(floor(random()*9999)::text, 4, '0');


        correo_gen := CASE 
            WHEN i % 3 = 0 THEN LOWER(SUBSTR(nombre_elegido, 1, 3) || apellido_elegido || floor(random()*99)::text)
            WHEN i % 3 = 1 THEN LOWER(apellido_elegido || floor(random()*1990+20)::text)
            ELSE LOWER(nombre_elegido || '.' || apellido_elegido || floor(random()*9)::text)
        END || dominios[floor(random() * array_length(dominios, 1)) + 1];

        INSERT INTO fundacion.personas (nombre, apellido, dui, correo, telefono, activo)
        VALUES (nombre_elegido, apellido_elegido, dui_gen, correo_gen, tel_gen, TRUE);
    END LOOP;
END $$;

--animales
DO $$
DECLARE
    id_perro_mestizo INT;
    id_perro_salva INT;
    id_gato_comun INT;
    id_gato_mestizo INT;
    id_esp_perro INT;
    id_esp_gato INT;
    i INT;
 
    n_anim TEXT[] := ARRAY[
        'Malcon', 'Sicilia', 'Metapan', 'Bimba', 'Amaranta', 'Vera', 'Tomas', 'Coco', 'Celeste', 'Chiqui', 
        'Caramelo', 'Nyssa', 'Dotty', 'Nena', 'Bebita', 'Dottyto', 'Dottyta', 'Rocky', 'Ariel', 'Kika', 
        'Soya', 'Negrita', 'Cami', 'Kimi', 'Principe', 'Oreo', 'Nata', 'Frijol', 'Taco', 'Pupusa', 
        'Torito', 'Chello', 'Nube', 'Pecas', 'Flaco', 'Rafa', 'Chamba', 'Tita', 'Lulu', 'Chele', 
        'Mish', 'Bobi', 'Clifor', 'Doki', 'Sultan', 'Comino', 'Pimienta', 'Zar', 'Gordo', 'Vago', 
        'Piba', 'Choco', 'Sombra', 'Rayo', 'Fuego', 'Trueno', 'Miel', 'Mister', 'Buddy', 'Zeus', 
        'Lola', 'Pirata', 'Duque', 'Copo', 'Rai', 'Tinto', 'Azabache', 'Capitan', 'Bigotes', 'Garritas', 
        'Esponja', 'Fito', 'Luna', 'Gala', 'Bruno', 'Simba', 'Pantufla', 'Manchas', 'Osito', 'Canela'
    ];

    locs TEXT[] := ARRAY['Nuevo Cuscatlán', 'Metapán', 'Apopa', 'Soyapango', 'Santa Tecla', 'Mercado Colón', 'San Salvador', 'Ciudad Marsella', 'Zaragoza', 'Ilopango', 'San Jacinto', 'Lourdes', 'Mejicanos', 'Sonsonate', 'Chalatenango'];

    salud TEXT[] := ARRAY['Sano', 'En control inicial', 'Tratamiento de garrapatas', 'Desnutrición leve', 'Bravecto aplicado', 'Esterilizado', 'Sano y vacunado', 'Problemas de piel'];
BEGIN
  

    INSERT INTO fundacion.especies (nombre) VALUES ('Perro') RETURNING id_especie INTO id_esp_perro;
    INSERT INTO fundacion.especies (nombre) VALUES ('Gato') RETURNING id_especie INTO id_esp_gato;

    INSERT INTO fundacion.razas (id_especie, nombre) VALUES (id_esp_perro, 'Mestizo') RETURNING id_raza INTO id_perro_mestizo;
    INSERT INTO fundacion.razas (id_especie, nombre) VALUES (id_esp_perro, 'Salvadoreño') RETURNING id_raza INTO id_perro_salva;
    
    INSERT INTO fundacion.razas (id_especie, nombre) VALUES (id_esp_gato, 'Común') RETURNING id_raza INTO id_gato_comun;
    INSERT INTO fundacion.razas (id_especie, nombre) VALUES (id_esp_gato, 'Mestizo') RETURNING id_raza INTO id_gato_mestizo;

    
    FOR i IN 1..80 LOOP
        INSERT INTO fundacion.animales (nombre, id_especie, id_raza, fecha_nacimiento, sexo, estado, estado_salud, fecha_rescate, descripcion)
        VALUES (
            n_anim[i], -- Uso del índice para asegurar nombre único
            CASE WHEN i % 2 = 1 THEN id_esp_perro ELSE id_esp_gato END,
            CASE 
                WHEN i % 2 = 1 THEN (CASE WHEN random() > 0.5 THEN id_perro_mestizo ELSE id_perro_salva END)
                ELSE (CASE WHEN random() > 0.5 THEN id_gato_comun ELSE id_gato_mestizo END)
            END,
            CURRENT_DATE - (floor(random() * 1800 + 45) * interval '1 day'), -- Fecha nacimiento 
            CASE WHEN random() > 0.5 THEN 'macho'::fundacion.sexo_animal ELSE 'hembra'::fundacion.sexo_animal END,
            CASE 
                WHEN i <= 30 THEN 'disponible'::fundacion.estado_animal
                WHEN i <= 60 THEN 'adoptado'::fundacion.estado_animal
                ELSE 'en_tratamiento'::fundacion.estado_animal
            END,
            salud[floor(random() * array_length(salud, 1)) + 1],
            CURRENT_DATE - (floor(random() * 120 + 1) * interval '1 day'), -- Rescate en los últimos 4 meses
            'Rescatado en inmediaciones de ' || locs[floor(random() * array_length(locs, 1)) + 1] || '. Caso registrado manualmente.'
        );
    END LOOP;
END $$;

--usuarios, adoptantes y adopciones

DO $$
DECLARE
    -- Variables de control e IDs
    id_u INT; id_a INT; id_ad INT; i INT;
    
    -- Catálogos de apoyo
    locs TEXT[] := ARRAY['Col. Miramonte', 'Res. Santa Teresa', 'Urb. La Cima', 'Bo. San Miguelito', 'Santa Elena', 'Antiguo Cuscatlán', 'Lourdes', 'Col. Escalón', 'San Jacinto', 'Mejicanos'];
    vets TEXT[] := ARRAY['Veterinaria Marvet', 'Clínica San Francisco', 'Veterinaria El Establo', 'Hospivet', 'Dr. Méndez', 'Clínica de Huellitas'];
    
    -- Descripciones 
    casos_reales TEXT[] := ARRAY[
        'Fractura expuesta en fémur derecho por atropellamiento en Carretera de Oro. Requiere cirugía.',
        'Cachorro encontrado con desnutrición severa y signos de sarna sarcóptica. Inicio de baños medicados.',
        'Hemoparásitos confirmados (Ehrlichia). Presenta encías pálidas y decaimiento extremo.',
        'Corte profundo en almohadilla izquierda, probablemente con vidrio. Limpieza y sutura.',
        'Gastroenteritis hemorrágica. Se sospecha de ingesta de veneno o comida en mal estado en la calle.',
        'Control de garrapatas masivo. Aplicación de Bravecto y limpieza de oídos con otitis evidente.',
        'Catarata senil detectada en ojo izquierdo. Se receta colirio para bajar la inflamación.',
        'Mordedura de otro perro en el cuello. Absceso drenado y colocación de antibiótico de larga duración.',
        'Signos de maltrato: miedo extremo al contacto humano y quemaduras de cigarrillo en el lomo.',
        'Rescatada con preñez avanzada. Chequeo por ultrasonido para verificar viabilidad de fetos.',
        'TVT (Tumor Venéreo Transmisible) detectado en zona genital. Se programa quimioterapia.',
        'Deshidratación grado 2. Se deja en observación con fluidoterapia (suero Ringer Lactato).',
        'Soplo cardíaco grado III detectado en chequeo de rutina. Pendiente electrocardiograma.',
        'Dermatitis alérgica por pulgas. Piel enrojecida y pérdida de pelaje en la base de la cola.',
        'Uñas encarnadas que causan infección en los dedos. Recorte y curación de lecho ungular.',
        'Miosis y secreción nasal. Posible cuadro de distemper (moquillo). Aislamiento preventivo.',
        'Cuerpo extraño en el estómago (trozo de plástico). Se induce el vómito con éxito.',
        'Anemia regenerativa. Se recomienda dieta alta en proteína y suplemento de hierro.',
        'Pérdida de visión parcial por glaucoma. Se inicia tratamiento para presión intraocular.',
        'Hernia umbilical pequeña detectada. Se evaluará corrección en la misma cirugía de castración.',
        'Limpieza dental profunda (destartraje). Presenta gingivitis y dificultad para masticar.',
        'Cojera en pata trasera izquierda por luxación de rótula. Reposo absoluto por 10 días.',
        'Alergia alimentaria. Se cambia a dieta hipoalergénica por ronchas en el abdomen.',
        'Micosis cutánea (hongos). Se inicia tratamiento con Itraconazol y pomadas.',
        'Encontrado con collar encarnado en el cuello por crecimiento del animal. Cirugía de retiro.',
        'Tos de las perreras (Traqueobronquitis). Tratamiento con expectorantes y reposo.',
        'Picadura de insecto que causó edema facial (cara hinchada). Aplicación de antihistamínico.',
        'Debilidad general y parálisis parcial de tren posterior. Evaluación por trauma espinal.',
        'Otitis bilateral severa con presencia de ácaros. Limpieza profunda bajo sedación leve.',
        'Cachorro con parásitos internos (ascaris). Desparasitación urgente por abdomen distendido.'
    ];

    -- Captura de ENUMs dinámicos
    valores_historial TEXT[];
    valores_rol TEXT[];
BEGIN
    --  Leer los ENUMs directamente de la base
    SELECT array_agg(enumlabel::text) INTO valores_historial 
    FROM pg_enum WHERE enumtypid = 'fundacion.tipo_registro_medico'::regtype;
    
    SELECT array_agg(enumlabel::text) INTO valores_rol 
    FROM pg_enum WHERE enumtypid = 'fundacion.rol_usuario'::regtype;

    --  USUARIOS 
    FOR i IN 1..15 LOOP
        INSERT INTO fundacion.usuarios (id_persona, password_hash, rol)
        VALUES (
            i, 
            MD5(random()::text), 
            (CASE WHEN i = 1 THEN valores_rol[1] ELSE valores_rol[2] END)::fundacion.rol_usuario
        ) ON CONFLICT DO NOTHING;
    END LOOP;

    -- ADOPTANTES 
    FOR i IN 20..59 LOOP
        INSERT INTO fundacion.adoptantes (id_persona, direccion)
        VALUES (
            i,
            locs[floor(random() * array_length(locs, 1)) + 1] || ', Pasaje ' || floor(random()*15+1) || ', Casa #' || floor(random()*90+1)
        ) ON CONFLICT DO NOTHING;
    END LOOP;

    --  ADOPCIONES 
    FOR i IN 1..30 LOOP
        SELECT id_animal INTO id_a FROM fundacion.animales WHERE estado = 'adoptado' 
        AND id_animal NOT IN (SELECT id_animal FROM fundacion.adopciones) ORDER BY random() LIMIT 1;

        SELECT id_adoptante INTO id_ad FROM fundacion.adoptantes ORDER BY random() LIMIT 1;
        SELECT id_usuario INTO id_u FROM fundacion.usuarios ORDER BY random() LIMIT 1;

        IF id_a IS NOT NULL AND id_ad IS NOT NULL THEN
            INSERT INTO fundacion.adopciones (id_animal, id_adoptante, id_usuario_aprobacion, fecha_adopcion, observaciones)
            VALUES (id_a, id_ad, id_u, CURRENT_DATE - (floor(random() * 45) * interval '1 day'), 'Seguimiento iniciado. Expediente #' || (9000 + i));
        END IF;
    END LOOP;

    -- HISTORIAL MÉDICO 
    FOR i IN 1..80 LOOP
        SELECT id_animal INTO id_a FROM fundacion.animales ORDER BY random() LIMIT 1;

        IF id_a IS NOT NULL AND valores_historial IS NOT NULL THEN
            INSERT INTO fundacion.historial_medico (id_animal, tipo, fecha, descripcion, veterinario)
            VALUES (
                id_a,
                valores_historial[floor(random() * array_length(valores_historial, 1)) + 1]::fundacion.tipo_registro_medico,
                CURRENT_DATE - (floor(random() * 100) * interval '1 day'),
                casos_reales[floor(random() * array_length(casos_reales, 1)) + 1],
                vets[floor(random() * array_length(vets, 1)) + 1]
            );
        END IF;
    END LOOP;

END $$;

--selects--

SELECT id_persona, nombre, apellido, dui, correo, telefono 
FROM fundacion.personas 
ORDER BY id_persona;


SELECT 
    a.id_animal,
    a.nombre AS mascota,
    e.nombre AS especie,
    r.nombre AS raza,
    a.sexo,
    a.estado,
    a.fecha_rescate
FROM fundacion.animales a
JOIN fundacion.especies e ON a.id_especie = e.id_especie
JOIN fundacion.razas r ON a.id_raza = r.id_raza
ORDER BY a.id_animal;


SELECT 
    a.nombre AS mascota,
    p_ad.nombre || ' ' || p_ad.apellido AS adoptante,
    ad.direccion,
    p_us.nombre AS aprobado_por,
    ads.fecha_adopcion,
    ads.observaciones
FROM fundacion.adopciones ads
JOIN fundacion.animales a ON ads.id_animal = a.id_animal
JOIN fundacion.adoptantes ad ON ads.id_adoptante = ad.id_adoptante
JOIN fundacion.personas p_ad ON ad.id_persona = p_ad.id_persona
JOIN fundacion.usuarios u ON ads.id_usuario_aprobacion = u.id_usuario
JOIN fundacion.personas p_us ON u.id_persona = p_us.id_persona;

SELECT 
    a.nombre AS animal,
    h.tipo AS tipo_visita,
    h.fecha,
    h.descripcion,
    h.veterinario
FROM fundacion.historial_medico h
JOIN fundacion.animales a ON h.id_animal = a.id_animal
ORDER BY h.id_historial;
