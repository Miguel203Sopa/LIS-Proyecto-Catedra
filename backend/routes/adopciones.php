<?php
require_once "../controllers/AdopcionController.php";

$controller = new AdopcionController();
$data = json_decode(file_get_contents("php://input"), true);

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
        $controller->update($id, $data);
        break;

    case 'DELETE':
        $controller->delete($id);
        break;
}