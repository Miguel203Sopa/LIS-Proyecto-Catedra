<?php

require_once __DIR__ . "/../clases/SolicitudVoluntariado.php";
require_once __DIR__ . "/../clases/FirebaseClient.php";
require_once __DIR__ . "/../clases/Conexion.php";

class SolicitudVoluntariadoController
{
    private $model;

    public function __construct()
    {
        $this->model = new SolicitudVoluntariado();
    }

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
        $idSolicitud =
            $data['id_solicitud'] ?? null;

        $correo =
            trim($data['correo'] ?? '');

        $password =
            trim($data['password'] ?? '');

        if (
            !$idSolicitud ||
            !$correo ||
            !$password
        ) {

            echo json_encode([
                "success" => false,
                "message" => "Datos incompletos"
            ]);

            return;
        }

        $solicitud =
            $this->model->obtener($idSolicitud);

        if (!$solicitud) {

            echo json_encode([
                "success" => false,
                "message" => "Solicitud no encontrada"
            ]);

            return;
        }

        $firebase =
            new FirebaseClient();

        $firebaseUser =
            $firebase->crearUsuario(
                $correo,
                $password
            );

        if (!$firebaseUser['success']) {

            echo json_encode([
                "success" => false,
                "message" =>
                    $firebaseUser['message']
            ]);

            return;
        }

        $uid =
            $firebaseUser['data']['localId'];

        try {

            $conn =
                Conexion::conectar();

            $conn->beginTransaction();

            $stmtBuscar =
                $conn->prepare("

                    SELECT id_persona
                    FROM fundacion.personas
                    WHERE dui = ?
                    OR correo = ?
                    LIMIT 1

                ");

            $stmtBuscar->execute([

                $solicitud['dui'],
                $solicitud['correo']

            ]);

            $persona =
                $stmtBuscar->fetch(PDO::FETCH_ASSOC);

            if ($persona) {

                $idPersona =
                    $persona['id_persona'];

            } else {

                $stmtPersona =
                    $conn->prepare("

                        INSERT INTO fundacion.personas
                        (
                            nombre,
                            apellido,
                            dui,
                            correo,
                            telefono,
                            activo
                        )
                        VALUES
                        (?, ?, ?, ?, ?, true)

                    ");

                $stmtPersona->execute([

                    $solicitud['nombre'],
                    $solicitud['apellido'],
                    $solicitud['dui'],
                    $solicitud['correo'],
                    $solicitud['telefono']

                ]);

                $idPersona =
                    $conn->lastInsertId();
            }

            $stmtExisteUsuario =
                $conn->prepare("

                    SELECT id_usuario
                    FROM fundacion.usuarios
                    WHERE id_persona = ?
                    LIMIT 1

                ");

            $stmtExisteUsuario->execute([
                $idPersona
            ]);

            $usuarioExistente =
                $stmtExisteUsuario->fetch(PDO::FETCH_ASSOC);

            if ($usuarioExistente) {

                throw new Exception(
                    "La persona ya posee un usuario"
                );
            }

            $stmtUsuario =
                $conn->prepare("

                    INSERT INTO fundacion.usuarios
                    (
                        id_persona,
                        firebase_uid,
                        rol,
                        activo
                    )
                    VALUES
                    (?, ?, 'voluntario', true)

                ");

            $stmtUsuario->execute([

                $idPersona,
                $uid

            ]);

            $this->model->aprobarConUsuario(
                $idSolicitud
            );

            $conn->commit();

            echo json_encode([
                "success" => true
            ]);

        } catch (Exception $e) {

            $conn->rollBack();

            echo json_encode([
                "success" => false,
                "message" => $e->getMessage()
            ]);
        }
    }
}