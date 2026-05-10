<?php
require_once __DIR__ . "/../controllers/PersonaController.php";

header("Content-Type: application/json");

$controller = new PersonaController();

$method = $_SERVER['REQUEST_METHOD'];

$data = json_decode(file_get_contents("php://input"), true);

/*
    Ejemplos:

    GET    /api/personas
    GET    /api/personas/1
    POST   /api/personas
    PUT    /api/personas/1
    DELETE /api/personas/1
*/

$request = $_SERVER['REQUEST_URI'];

$request = explode('/', trim($request, '/'));

$id = $request[count($request) - 1];

if (!is_numeric($id)) {
    $id = null;
}

switch ($method) {

    case 'GET':

        if ($id) {
            $controller->show($id);
        } else {
            $controller->index();
        }

        break;

    case 'POST':

        $controller->store($data);

        break;

    case 'PUT':

        if ($id) {
            $controller->update($id, $data);
        } else {
            echo json_encode([
                "error" => "ID requerido"
            ]);
        }

        break;

    case 'DELETE':

        if ($id) {
            $controller->delete($id);
        } else {
            echo json_encode([
                "error" => "ID requerido"
            ]);
        }

        break;

    default:

        echo json_encode([
            "error" => "Método no permitido"
        ]);

        break;
}