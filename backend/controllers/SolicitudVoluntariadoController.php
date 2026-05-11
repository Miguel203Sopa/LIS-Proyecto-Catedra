<?php

require_once __DIR__ . "/../clases/SolicitudVoluntariado.php";

class SolicitudVoluntariadoController
{
    private $model;

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
}