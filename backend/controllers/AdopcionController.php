<?php

require_once __DIR__ . "/../clases/Adopcion.php";

class AdopcionController
{
    private $model;

    public function __construct()
    {
        $this->model = new Adopcion();
    }

    /* ================= LISTAR ================= */

    public function index()
    {
        header("Content-Type: application/json");

        echo json_encode([
            "success" => true,
            "data" => $this->model->listar()
        ]);
    }

    /* ================= OBTENER ================= */

    public function show($id)
    {
        header("Content-Type: application/json");

        echo json_encode([
            "success" => true,
            "data" => $this->model->obtener($id)
        ]);
    }

    /* ================= CREAR ================= */

    public function store($data)
    {
        header("Content-Type: application/json");

        require_once __DIR__ . "/../clases/Persona.php";

        $personaModel = new Persona();

        $dui = $data['dui'];

        $persona = $personaModel->obtenerPorDui($dui);

        if (!$persona) {

            $personaModel->crear(
                $data['nombre'],
                $data['apellido'],
                $data['dui'],
                $data['correo'],
                $data['telefono']
            );

            $persona = $personaModel->obtenerPorDui($dui);
        }

        $ok = $this->model->crear(
            $data['id_animal'],
            $persona['id_persona'],
            "en proceso",
            $data['observaciones'] ?? null
        );

        echo json_encode([
            "success" => $ok,
            "message" => $ok ? "Adopción creada correctamente" : "Error"
        ]);
    }

    /* ================= ACTUALIZAR ================= */

    public function update($id, $data)
    {
        header("Content-Type: application/json");

        $ok = $this->model->actualizar(
            $id,
            $data['estado'],
            $data['observaciones'] ?? null
        );

        echo json_encode([
            "success" => $ok,
            "message" => $ok
                ? "Adopción actualizada"
                : "No se pudo actualizar"
        ]);
    }

    /* ================= ELIMINAR ================= */

    public function delete($id)
    {
        header("Content-Type: application/json");

        $ok = $this->model->eliminar($id);

        echo json_encode([
            "success" => $ok,
            "message" => $ok
                ? "Adopción eliminada"
                : "No se pudo eliminar"
        ]);
    }
}