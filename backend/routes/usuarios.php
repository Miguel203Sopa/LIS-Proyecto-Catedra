<?php
require_once __DIR__ . "/../controllers/UsuarioController.php";

$controller = new UsuarioController();
$data = json_decode(file_get_contents("php://input"), true);

switch ($method) {
    case 'GET':
        $id ? $controller->show($id) : $controller->index();
        break;

    case 'POST':
        $controller->store($data);
        break;

    case 'PUT':
        $controller->update($id, $data);
        break;

    case 'DELETE':
        $controller->delete($id);
        break;
}