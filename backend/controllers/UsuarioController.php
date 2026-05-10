<?php

require_once __DIR__ . "/../clases/Usuario.php";

class UsuarioController
{
    private $model;

    public function __construct()
    {
        $this->model = new Usuario();
    }

    /* ================= LISTAR ================= */

    public function index()
    {
        header("Content-Type: application/json");

        try {

            $usuarios = $this->model->listar();

            echo json_encode([
                "success" => true,
                "data" => $usuarios
            ]);

        } catch (Exception $e) {

            http_response_code(500);

            echo json_encode([
                "success" => false,
                "message" => $e->getMessage()
            ]);
        }
    }

    /* ================= OBTENER ================= */

    public function show($id)
    {
        header("Content-Type: application/json");

        try {

            $usuario = $this->model->obtener($id);

            echo json_encode([
                "success" => true,
                "data" => $usuario
            ]);

        } catch (Exception $e) {

            http_response_code(500);

            echo json_encode([
                "success" => false,
                "message" => $e->getMessage()
            ]);
        }
    }

    /* ================= CREAR ================= */

    public function store($data)
    {
        header("Content-Type: application/json");

        try {

            $ok = $this->model->crear(
                $data['id_persona'],
                $data['firebase_uid'],
                $data['rol']
            );

            echo json_encode([
                "success" => $ok,
                "message" => $ok
                    ? "Usuario creado"
                    : "Error al crear usuario"
            ]);

        } catch (Exception $e) {

            http_response_code(500);

            echo json_encode([
                "success" => false,
                "message" => $e->getMessage()
            ]);
        }
    }

    /* ================= ACTUALIZAR ================= */

    public function update($id, $data)
    {
        header("Content-Type: application/json");

        try {

            $ok = $this->model->actualizar(
                $id,
                $data['firebase_uid'],
                $data['rol'],
                $data['activo']
            );

            echo json_encode([
                "success" => $ok,
                "message" => $ok
                    ? "Usuario actualizado"
                    : "Error al actualizar"
            ]);

        } catch (Exception $e) {

            http_response_code(500);

            echo json_encode([
                "success" => false,
                "message" => $e->getMessage()
            ]);
        }
    }

    /* ================= ELIMINAR ================= */

    public function delete($id)
    {
        header("Content-Type: application/json");

        try {

            $ok = $this->model->eliminar($id);

            echo json_encode([
                "success" => $ok,
                "message" => $ok
                    ? "Usuario eliminado"
                    : "Error al eliminar"
            ]);

        } catch (Exception $e) {

            http_response_code(500);

            echo json_encode([
                "success" => false,
                "message" => $e->getMessage()
            ]);
        }
    }
}