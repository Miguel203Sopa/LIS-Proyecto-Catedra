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

        $ok = $this->model->crear(
            $data['id_animal'],
            $data['id_persona'],
            $data['estado'] ?? 'en proceso',
            $data['observaciones'] ?? null
        );

        echo json_encode([
            "success" => $ok,
            "message" => $ok
                ? "Adopción creada"
                : "No se pudo crear"
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