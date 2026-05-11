<?php

require_once __DIR__ . "/../clases/Usuario.php";
require_once __DIR__ . "/../clases/FirebaseClient.php";

class UsuarioController
{
    private $model;

    public function __construct()
    {
        $this->model = new Usuario();
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

    public function store($data)
    {
        $ok = $this->model->crear(
            $data['id_persona'],
            $data['firebase_uid'],
            $data['rol']
        );

        echo json_encode([
            "success" => $ok
        ]);
    }

    public function update($id, $data)
    {
        $ok = $this->model->actualizar(
            $id,
            $data['rol'],
            $data['activo']
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

    /* ================= PASSWORD ================= */

    public function cambiarPassword($id, $data)
    {

        if (
            !isset($data['password']) ||
            empty($data['password'])
        ) {

            echo json_encode([
                "success" => false,
                "message" => "Password requerida"
            ]);

            return;
        }

        $usuario =
            $this->model->obtenerCorreo($id);

        if (!$usuario) {

            echo json_encode([
                "success" => false,
                "message" => "Usuario no encontrado"
            ]);

            return;
        }

        $correo =
            $usuario['correo'];

        /*
            IMPORTANTE:
            Firebase NO permite cambiar password
            solo con UID usando REST simple.

            Necesitamos el idToken del usuario.

            Entonces:
            - el admin escribe password nueva
            - usamos login temporal
            - actualizamos password
        */

        $firebase =
            new FirebaseClient();

        /*
            Login temporal.
            AQUÍ debes usar una contraseña actual válida.
            Si no la tienes, Firebase REST no deja hacerlo.
        */

        echo json_encode([
            "success" => false,
            "message" =>
                "Firebase REST requiere idToken del usuario para cambiar password."
        ]);
    }
}