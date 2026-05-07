<?php
require_once __DIR__ . "/../clases/Usuario.php";

class UsuarioController {
    private $model;

    public function __construct() {
        $this->model = new Usuario();
    }

    public function index() {
        echo json_encode($this->model->listar());
    }

    public function show($id) {
        echo json_encode($this->model->obtener($id));
    }

    public function store($data) {
        $this->model->crear(
            $data['id_persona'],
            $data['rol'],
            $data['password']
        );
        echo json_encode(["msg" => "Usuario creado"]);
    }

    public function update($id, $data) {
        $this->model->actualizar(
            $id,
            $data['rol'],
            $data['activo']
        );
        echo json_encode(["msg" => "Usuario actualizado"]);
    }

    public function delete($id) {
        $this->model->eliminar($id);
        echo json_encode(["msg" => "Usuario eliminado"]);
    }
}