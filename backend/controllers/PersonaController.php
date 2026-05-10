<?php
require_once __DIR__ . "/../clases/Persona.php";

class PersonaController {

    private $model;

    public function __construct() {
        $this->model = new Persona();
    }

    // LISTAR TODAS LAS PERSONAS
    public function index() {

        echo json_encode(
            $this->model->listar()
        );

    }

    // OBTENER UNA PERSONA
    public function show($id) {

        $persona = $this->model->obtener($id);

        if ($persona) {

            echo json_encode($persona);

        } else {

            http_response_code(404);

            echo json_encode([
                "success" => false,
                "msg" => "Persona no encontrada"
            ]);

        }

    }

    // CREAR PERSONA
    public function store($data) {

            $resultado = $this->model->crear(
                $data['nombre'],
                $data['apellido'],
                $data['dui'],
                $data['correo'],
                $data['telefono']
            );

        if ($resultado) {

            echo json_encode([
                "success" => true,
                "msg" => "Persona creada correctamente"
            ]);

        } else {

            http_response_code(500);

            echo json_encode([
                "success" => false,
                "msg" => "Error al crear persona"
            ]);

        }

    }

    // ACTUALIZAR PERSONA
    public function update($id, $data) {

        $resultado =    $this->model->actualizar(
        $id,
        $data['nombre'],
        $data['apellido'],
        $data['dui'],
        $data['correo'],
        $data['telefono'],
        $data['activo'] ?? true

        );

        if ($resultado) {

            echo json_encode([
                "success" => true,
                "msg" => "Persona actualizada correctamente"
            ]);

        } else {

            http_response_code(500);

            echo json_encode([
                "success" => false,
                "msg" => "Error al actualizar persona"
            ]);

        }

    }

    // ELIMINAR PERSONA
    public function delete($id) {

        $resultado = $this->model->eliminar($id);

        if ($resultado) {

            echo json_encode([
                "success" => true,
                "msg" => "Persona eliminada correctamente"
            ]);

        } else {

            http_response_code(500);

            echo json_encode([
                "success" => false,
                "msg" => "Error al eliminar persona"
            ]);

        }

    }

}