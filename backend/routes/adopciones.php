<?php

require_once __DIR__ . "/../controllers/AdopcionController.php";

$controller = new AdopcionController();

$method = $_SERVER['REQUEST_METHOD'];

$id = $_GET['id'] ?? null;

$data = json_decode(
    file_get_contents("php://input"),
    true
);

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
        }

        break;

    case 'DELETE':

        if ($id) {
            $controller->delete($id);
        }

        break;

    default:

        http_response_code(405);

        echo json_encode([
            "success" => false,
            "message" => "Método no permitido"
        ]);

        break;
}