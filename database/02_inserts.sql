INSERT INTO fundacion.personas (nombre, apellido, dui, correo, telefono) VALUES
('Administrador','Principal','06789413-5','admin@admin.com','0000-0000'),
('Gabriela','Rivas Molina','04729183-6','gaby.rivas94@gmail.com','7381-4920'),
('Fernando','Castellanos Vega','07163842-1','fer_castev@hotmail.com','6274-8531'),
('Marcela','Orellana Cruz','02984751-3','marce.orellana@outlook.com','7849-2063'),
('Rodrigo','Henríquez Paz','08341627-9','rodh.paz22@gmail.com','6512-7394'),
('Valeria','Mendoza Flores','05617394-2','vale_mendoz@gmail.com','7163-5827'),
('Diego','Portillo Aguilar','03872549-0','dportillo.ag@protonmail.com','6938-1472'),
('Sofía','Guzmán Leiva','09254873-7','sofi.guzleiva@gmail.com','7425-6381'),
('Alejandro','Morales Serrano','06138294-5','alex.morser@outlook.com','6817-3940'),
('Karla','Escobar Turcios','01793485-4','karlita.esc@gmail.com','7592-4816'),
('Josué','Amaya Pineda','07462831-8','josamaya_p@gmail.com','6384-7259'),
('Daniela','Recinos Bonilla','04985273-1','dani.recbonilla@hotmail.com','7651-3082'),
('Emilio','Fuentes Chávez','02637194-6','emi.fuench@gmail.com','6847-5193'),
('Paola','Zelaya Ramos','08174362-3','pao.zelramos@outlook.com','7213-9468'),
('Andrés','Villacorta Mejía','05829416-0','andres.villamej@gmail.com','6479-8321'),
('Lucía','Martínez Herrera','03461728-9','lu.mtzh@gmail.com','7836-2547'),
('César','Benítez Alfaro','09718243-5','csr.benitalf@icloud.com','6153-7984'),
('Natalia','Soriano Pacheco','06293875-2','naty.soripach@gmail.com','7694-1823'),
('Óscar','Lemus Coreas','01847362-7','oscar.lemco@outlook.com','6328-5047'),
('Rebeca','Peraza Romero','07524916-4','rebe.perrom@gmail.com','7541-8362');

INSERT INTO fundacion.usuarios (id_persona, firebase_uid, rol) VALUES
((SELECT id_persona FROM fundacion.personas WHERE dui='06789413-5'),'20hlJDy4AxRHLiUptYRjqvwLr0v1','admin'),
((SELECT id_persona FROM fundacion.personas WHERE dui='04729183-6'),'Bl5QbhqcsjhMeaHbm0vWfri1Lyz2','voluntario'),
((SELECT id_persona FROM fundacion.personas WHERE dui='07163842-1'),'GNijIUndfdSWWRzxeLnFJ65WsRI2','voluntario'),
((SELECT id_persona FROM fundacion.personas WHERE dui='02984751-3'),'bSWpFJyV1QYDhGkHXWFOD4MNFle2','voluntario'),
((SELECT id_persona FROM fundacion.personas WHERE dui='08341627-9'),'IsTMFkE0aTWTkaAlRIezRVlJwY73','voluntario'),
((SELECT id_persona FROM fundacion.personas WHERE dui='05617394-2'),'vfGtUfIjOneTyy1Y1CcqBPf6epj1','voluntario');


INSERT INTO fundacion.animales (nombre, especie, fecha_nacimiento, sexo, estado, estado_salud, fecha_rescate, descripcion, foto_url, historial_medico) VALUES

-- PERROS
('Malcon','Perro','2023-11-06','macho','disponible','Sano','2025-11-06','Rescatado en noviembre, busca hogar responsable.','/uploads/malcon.png','[{"tipo":"control","descripcion":"Chequeo general inicial","veterinario":"Veterinaria Central"}]'),
('Sicilia','Perro','2026-02-15','hembra','en tratamiento','Positivo a enfermedad de garrapatas','2026-04-18','Cachorra juguetona rescatada en Nuevo Cuscatlán.','/uploads/sicilia.png','[{"tipo":"control","descripcion":"Chequeo general inicial","veterinario":"Veterinaria Central"},{"tipo":"tratamiento","descripcion":"Tratamiento contra enfermedad de garrapatas","veterinario":"Clínica San Francisco"}]'),
('Metapán','Perro','2026-03-01','macho','disponible','En control inicial','2026-04-15','Rescatado de un barranco en Metapán.','/uploads/metapan.png','[{"tipo":"control","descripcion":"Chequeo general inicial","veterinario":"Veterinaria Central"}]'),
('Bimba','Perro','2025-12-01','hembra','disponible','Sana y esterilizada','2025-12-15','Rescatada de maltrato extremo, muy alegre.','/uploads/bimba.png','[{"tipo":"control","descripcion":"Chequeo general inicial","veterinario":"Veterinaria Central"}]'),
('Amaranta','Perro','2024-05-01','hembra','disponible','Sana y esterilizada','2026-01-12','Rescatada en estado deplorable, ya recuperada.','/uploads/amaranta.png','[{"tipo":"control","descripcion":"Chequeo general inicial","veterinario":"Veterinaria Central"}]'),
('Vera','Perro','2023-01-01','hembra','en tratamiento','Recuperación de cirugía de cadera','2025-11-30','Atropellada en Ciudad Marsella, muy social.','/uploads/vera.png','[{"tipo":"cirugia","descripcion":"Cirugía de cadera y seguimiento","veterinario":"Hospivet"}]'),
('Tomás','Perro','2025-06-01','hembra','disponible','Tratamiento Bravecto aplicado','2026-04-01','Busca hogar urgente.','/uploads/tomas.png','[{"tipo":"control","descripcion":"Chequeo general inicial","veterinario":"Veterinaria Central"}]'),
('Coco','Perro','2026-02-01','hembra','disponible','Desnutrición leve, desparasitada','2026-04-10','Encontrada en un saco con sus hermanos.','/uploads/coco.png','[{"tipo":"control","descripcion":"Chequeo general inicial","veterinario":"Veterinaria Central"}]'),
('Celeste','Perro','2026-02-01','hembra','disponible','Desnutrición leve, desparasitada','2026-04-10','Encontrada en un saco con sus hermanos.','/uploads/celeste.png','[{"tipo":"control","descripcion":"Chequeo general inicial","veterinario":"Veterinaria Central"}]'),
('Chiqui','Perro','2026-02-01','macho','disponible','Desnutrición leve, desparasitada','2026-04-10','Encontrado en un saco con sus hermanos.','/uploads/chiqui.png','[{"tipo":"control","descripcion":"Chequeo general inicial","veterinario":"Veterinaria Central"}]'),
('Caramelo','Perro','2026-02-01','macho','disponible','Desnutrición leve, desparasitada','2026-04-10','Encontrado en un saco con sus hermanos.','/uploads/caramelo.png','[{"tipo":"control","descripcion":"Chequeo general inicial","veterinario":"Veterinaria Central"}]'),
('Nyssa','Perro','2021-04-01','hembra','disponible','Sana y esterilizada','2026-03-15','Rescatada en San Salvador.','/uploads/nyssa.png','[{"tipo":"control","descripcion":"Chequeo general inicial","veterinario":"Veterinaria Central"}]'),
('Dotty','Perro','2024-04-01','hembra','disponible','Sana y esterilizada','2026-03-01','Rescatada con 10 cachorros.','/uploads/dotty.png','[{"tipo":"control","descripcion":"Chequeo general inicial","veterinario":"Veterinaria Central"}]'),
('Nena','Perro','2022-01-01','hembra','disponible','Sana','2026-04-20','Dueños adultos mayores.','/uploads/nena.png','[{"tipo":"control","descripcion":"Chequeo general inicial","veterinario":"Veterinaria Central"}]'),
('Bebita','Perro','2026-02-15','hembra','disponible','Sana','2026-04-18','Encontrada en Mercado Colón.','/uploads/bebita.png','[{"tipo":"control","descripcion":"Chequeo general inicial","veterinario":"Veterinaria Central"}]'),
('Dottyto','Perro','2026-01-01','macho','disponible','Vacunas iniciales','2026-03-15','Hijo de Dotty.','/uploads/dottyto.png','[{"tipo":"control","descripcion":"Chequeo general inicial","veterinario":"Veterinaria Central"}]'),
('Dottyta','Perro','2026-01-01','hembra','disponible','Vacunas iniciales','2026-03-15','Hija de Dotty.','/uploads/dottyta.png','[{"tipo":"control","descripcion":"Chequeo general inicial","veterinario":"Veterinaria Central"}]'),
('Rocky','Perro','2025-08-01','macho','disponible','Sano','2026-04-01','Juguetón.','/uploads/rocky.png','[{"tipo":"control","descripcion":"Chequeo general inicial","veterinario":"Veterinaria Central"}]'),

-- GATOS
('Anuel','Gato','2026-03-15','macho','en tratamiento','Problemas de piel','2026-04-10','Abandonado.','/uploads/anuel.png','[{"tipo":"tratamiento","descripcion":"Problemas dermatológicos","veterinario":"Clínica San Francisco"}]'),
('Ariel','Gato','2026-02-15','hembra','disponible','Prueba negativa','2026-04-10','Gatita carey.','/uploads/ariel.png','[{"tipo":"control","descripcion":"Chequeo general","veterinario":"Veterinaria Central"}]'),
('Kika','Gato','2026-02-15','hembra','disponible','Desparasitada','2026-04-12','Rescatada en Apopa.','/uploads/kika.png','[{"tipo":"control","descripcion":"Chequeo general","veterinario":"Veterinaria Central"}]'),
('Soya','Gato','2025-08-01','hembra','disponible','Esterilizada','2026-03-15','Rescatada en Soyapango.','/uploads/soya.png','[{"tipo":"control","descripcion":"Chequeo general","veterinario":"Veterinaria Central"}]'),
('Negrita','Gato','2026-02-01','hembra','disponible','Desparasitada','2026-04-01','Rescatada parque.','/uploads/negrita.png','[{"tipo":"control","descripcion":"Chequeo general","veterinario":"Veterinaria Central"}]'),
('Cami','Gato','2025-04-01','hembra','en tratamiento','Herida infectada','2026-04-15','Santa Tecla.','/uploads/cami.png','[{"tipo":"tratamiento","descripcion":"Herida infectada cuello","veterinario":"Veterinaria El Establo"}]'),
('Kimi','Gato','2025-12-01','hembra','disponible','Esterilizada','2026-04-01','Villa Constitución.','/uploads/kimi.png','[{"tipo":"control","descripcion":"Chequeo general","veterinario":"Veterinaria Central"}]'),
('Príncipe','Gato','2025-06-01','macho','disponible','Sano','2026-04-05','Promesa castración.','/uploads/principe.png','[{"tipo":"control","descripcion":"Chequeo general","veterinario":"Veterinaria Central"}]'),
('Oreo','Gato','2026-02-15','hembra','disponible','Sana','2026-04-18','Basurero.','/uploads/oreo.png','[{"tipo":"control","descripcion":"Chequeo general","veterinario":"Veterinaria Central"}]'),
('Nata','Gato','2026-02-15','macho','disponible','Sano','2026-04-18','Basurero.','/uploads/nata.png','[{"tipo":"control","descripcion":"Chequeo general","veterinario":"Veterinaria Central"}]'),
('Luna','Gato','2026-01-20','hembra','disponible','Vacunada','2026-04-20','Mejicanos.','/uploads/luna.png','[{"tipo":"control","descripcion":"Chequeo general","veterinario":"Veterinaria Central"}]'),
('Michi','Gato','2025-09-10','macho','disponible','Castrado','2026-03-28','Mercado.','/uploads/michi.png','[{"tipo":"control","descripcion":"Chequeo general","veterinario":"Veterinaria Central"}]'),
('Canela','Gato','2026-03-01','hembra','en tratamiento','Conjuntivitis','2026-04-22','Ilopango.','/uploads/canela.png','[{"tipo":"tratamiento","descripcion":"Conjuntivitis","veterinario":"Veterinaria Central"}]'),
('Simba','Gato','2025-11-15','macho','disponible','Desparasitado','2026-04-08','Antiguo Cuscatlán.','/uploads/simba.png','[{"tipo":"control","descripcion":"Chequeo general","veterinario":"Veterinaria Central"}]'),
('Mimi','Gato','2026-02-28','hembra','disponible','Sana','2026-04-25','Rescate calle.','/uploads/mimi.png','[{"tipo":"control","descripcion":"Chequeo general","veterinario":"Veterinaria Central"}]'),
('Tobías','Gato','2026-02-28','macho','disponible','Sano','2026-04-25','Rescate calle.','/uploads/tobias.png','[{"tipo":"control","descripcion":"Chequeo general","veterinario":"Veterinaria Central"}]'),
('Perla','Gato','2025-07-14','hembra','disponible','Esterilizada','2026-03-10','San Marcos.','/uploads/perla.png','[{"tipo":"control","descripcion":"Chequeo general","veterinario":"Veterinaria Central"}]'),
('Zeus','Gato','2025-10-05','macho','en tratamiento','Desnutrición leve','2026-04-30','Ilopango.','/uploads/zeus.png','[{"tipo":"control","descripcion":"Control nutricional","veterinario":"Hospivet"}]');

UPDATE fundacion.animales SET estado='adoptado'
WHERE nombre IN ('Malcon','Bimba','Rocky','Ariel','Kika');

INSERT INTO fundacion.adopciones (id_animal,id_persona,id_usuario_aprobacion,observaciones) VALUES
((SELECT id_animal FROM fundacion.animales WHERE nombre='Malcon'),(SELECT id_persona FROM fundacion.personas WHERE dui='06138294-5'),(SELECT id_usuario FROM fundacion.usuarios WHERE firebase_uid='coito'),'Adopción exitosa'),
((SELECT id_animal FROM fundacion.animales WHERE nombre='Bimba'),(SELECT id_persona FROM fundacion.personas WHERE dui='01793485-4'),(SELECT id_usuario FROM fundacion.usuarios WHERE firebase_uid='gay el q lo lea'),'Familia responsable'),
((SELECT id_animal FROM fundacion.animales WHERE nombre='Rocky'),(SELECT id_persona FROM fundacion.personas WHERE dui='07462831-8'),(SELECT id_usuario FROM fundacion.usuarios WHERE firebase_uid='si ves esto sos puto'),'Seguimiento'),
((SELECT id_animal FROM fundacion.animales WHERE nombre='Ariel'),(SELECT id_persona FROM fundacion.personas WHERE dui='04985273-1'),(SELECT id_usuario FROM fundacion.usuarios WHERE firebase_uid='xxx'),'Adopción aprobada'),
((SELECT id_animal FROM fundacion.animales WHERE nombre='Kika'),(SELECT id_persona FROM fundacion.personas WHERE dui='02637194-6'),(SELECT id_usuario FROM fundacion.usuarios WHERE firebase_uid='q vivan las pajas'),'Entrega programada');


INSERT INTO fundacion.solicitudes_voluntariado
(nombre, apellido, dui, correo, telefono, motivacion)
VALUES
('Lucía','Martínez Herrera','03461728-9','lu.mtzh@gmail.com','7836-2547','Deseo contribuir al bienestar de los animales y apoyar en rescates y cuidados básicos.'),
('César','Benítez Alfaro','09718243-5','csr.benitalf@icloud.com','6153-7984','Me interesa ser voluntario para ayudar en campañas de adopción y eventos.'),
('Natalia','Soriano Pacheco','06293875-2','naty.soripach@gmail.com','7694-1823','Quiero colaborar activamente en la fundación y aprender sobre rescate animal.'),
('Óscar','Lemus Coreas','01847362-7','oscar.lemco@outlook.com','6328-5047','Tengo experiencia previa con mascotas y quiero apoyar en su cuidado.'),
('Rebeca','Peraza Romero','07524916-4','rebe.perrom@gmail.com','7541-8362','Me gustaría formar parte del equipo de voluntariado y ayudar en lo que sea necesario.');
