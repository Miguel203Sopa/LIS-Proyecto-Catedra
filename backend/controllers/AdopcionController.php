<?php
require_once "../clases/Adopcion.php";

class AdopcionController {
    private $model;

    public function __construct() {
        $this->model = new Adopcion();
    }

    public function index() {
        echo json_encode($this->model->listar());
    }

    public function show($id) {
        echo json_encode($this->model->obtener($id));
    }

    public function store($data) {
        $this->model->crear(
            $data['id_animal'],
            $data['id_persona']
        );
        echo json_encode(["msg" => "Adopción creada"]);
    }

    public function update($id, $data) {
        $this->model->actualizar($id, $data['estado'], $data['observaciones']);
        echo json_encode(["msg" => "Adopción actualizada"]);
    }

    public function delete($id) {
        $this->model->eliminar($id);
        echo json_encode(["msg" => "Adopción eliminada"]);
    }
}