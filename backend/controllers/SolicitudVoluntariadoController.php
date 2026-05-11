<?php

require_once __DIR__ . "/../clases/FirebaseClient.php";
require_once __DIR__ . "/../clases/SolicitudVoluntariado.php";


class SolicitudVoluntariadoController
{
    private $model;


    /* ================= CREAR ================= */

    public function store($data)
    {
        $ok = $this->model->crear(

            $data['nombre'],
            $data['apellido'],
            $data['dui'],
            $data['correo'],
            $data['telefono'],
            $data['motivacion'] ?? null

        );

        echo json_encode([

            "success" => $ok,

            "message" => $ok
                ? "Solicitud enviada correctamente"
                : "Error enviando solicitud"
        ]);
    }

    public function __construct()
    {
        $this->model = new SolicitudVoluntariado();
    }

    public function index()
    {
        echo json_encode([
            "success" => true,
            "data" => $this->model->listar()
        ]);
    }

    public function show($id)
    {
        echo json_encode([
            "success" => true,
            "data" => $this->model->obtener($id)
        ]);
    }

    public function update($id, $data)
    {
        $ok = $this->model->actualizarEstado(
            $id,
            $data['estado']
        );

        echo json_encode([
            "success" => $ok
        ]);
    }

    public function delete($id)
    {
        $ok = $this->model->eliminar($id);

        echo json_encode([
            "success" => $ok
        ]);
    }


    public function aprobar($data)
    {
        $firebase = new FirebaseClient();

        $correo = $data['correo'];
        $password = $data['password'];
        $id = $data['id'];

        // 1. crear usuario en Firebase
        $firebaseUser = $firebase->createUser($correo, $password);

        if (!$firebaseUser['success']) {
            echo json_encode([
                "success" => false,
                "message" => "Error creando usuario en Firebase",
                "firebase" => $firebaseUser
            ]);
            return;
        }

        $uid = $firebaseUser['data']['localId'];

        // 2. guardar en tabla personas/usuarios
        $conn = Conexion::conectar();

        $conn->beginTransaction();

        try {

            // persona básica
            $stmt = $conn->prepare("
            INSERT INTO fundacion.personas
            (nombre, apellido, correo, activo)
            SELECT nombre, apellido, correo, 1
            FROM fundacion.solicitudes_voluntariado
            WHERE id_solicitud = ?
        ");

            $stmt->execute([$id]);

            $personaId = $conn->lastInsertId();

            // usuario
            $stmt2 = $conn->prepare("
            INSERT INTO fundacion.usuarios
            (id_persona, firebase_uid, rol, activo)
            VALUES (?, ?, 'voluntario', 1)
        ");

            $stmt2->execute([$personaId, $uid]);

            // actualizar solicitud
            $this->model->aprobarConUsuario($id);

            $conn->commit();

            echo json_encode([
                "success" => true,
                "message" => "Usuario creado y solicitud aprobada"
            ]);

        } catch (Exception $e) {

            $conn->rollBack();

            echo json_encode([
                "success" => false,
                "message" => "Error en proceso de aprobación",
                "error" => $e->getMessage()
            ]);
        }
    }
}