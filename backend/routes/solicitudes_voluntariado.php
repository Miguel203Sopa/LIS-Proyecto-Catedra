<?php

require_once __DIR__ . "/../controllers/SolicitudVoluntariadoController.php";

header("Content-Type: application/json");

$controller = new SolicitudVoluntariadoController();

$method = $_SERVER['REQUEST_METHOD'];

$request = $_SERVER['REQUEST_URI'];
$parts = explode('/', trim($request, '/'));

$id = end($parts);
if (!is_numeric($id))
    $id = null;

switch ($method) {

    case 'GET':

        if ($id) {
            $controller->show($id);
        } else {
            $controller->index();
        }

        break;

    case 'PUT':

        $data = json_decode(file_get_contents("php://input"), true);
        $controller->update($id, $data);

        break;

    case 'DELETE':

        $controller->delete($id);

        break;

    default:

        echo json_encode([
            "success" => false,
            "message" => "Método no permitido"
        ]);

        break;
}