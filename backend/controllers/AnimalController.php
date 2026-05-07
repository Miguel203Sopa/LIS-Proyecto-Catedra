<?php
require_once __DIR__ . "/../clases/Animal.php";

class AnimalController {
    private $model;

    public function __construct() {
        $this->model = new Animal();
    }

    public function index() {
        echo json_encode($this->model->listar());
    }

    public function show($id) {
        echo json_encode($this->model->obtener($id));
    }

    public function store($data) {
        $this->model->crear(
            $data['nombre'],
            $data['especie'],
            $data['sexo'],
            $data['estado_salud'],
            $data['descripcion']
        );
        echo json_encode(["msg" => "Animal creado"]);
    }

    public function update($id, $data) {
        $this->model->actualizar(
            $id,
            $data['nombre'],
            $data['estado'],
            $data['estado_salud'],
            $data['descripcion']
        );
        echo json_encode(["msg" => "Animal actualizado"]);
    }

    public function delete($id) {
        $this->model->eliminar($id);
        echo json_encode(["msg" => "Animal eliminado"]);
    }
}