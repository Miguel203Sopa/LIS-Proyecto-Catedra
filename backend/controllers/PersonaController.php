<?php
require_once __DIR__ . "/../clases/Persona.php";

class PersonaController {
    private $model;

    public function __construct() {
        $this->model = new Persona();
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
            $data['apellido'],
            $data['correo'],
            $data['telefono']
        );
        echo json_encode(["msg" => "Persona creada"]);
    }

    public function update($id, $data) {
        $this->model->actualizar(
            $id,
            $data['nombre'],
            $data['apellido'],
            $data['correo'],
            $data['telefono']
        );
        echo json_encode(["msg" => "Persona actualizada"]);
    }

    public function delete($id) {
        $this->model->eliminar($id);
        echo json_encode(["msg" => "Persona eliminada"]);
    }
}