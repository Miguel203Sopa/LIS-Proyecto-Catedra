<?php
require_once __DIR__ . "/../controllers/AnimalController.php";

$controller = new AnimalController();

$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['id'] ?? null;

switch ($method) {

    case 'GET':
        $id ? $controller->show($id) : $controller->index();
        break;

    case 'POST':
        $controller->store($_POST, $_FILES);
        break;

    case 'PUT':
        parse_str(file_get_contents("php://input"), $data);
        $controller->update($id, $data);
        break;
}