<?php

require_once __DIR__ . "/../clases/Usuario.php";

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
}