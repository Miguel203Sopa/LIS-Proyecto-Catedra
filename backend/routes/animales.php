<?php

require_once __DIR__ . "/../controllers/AnimalController.php";

$controller = new AnimalController();

$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['id'] ?? null;

header("Content-Type: application/json");

switch ($method) {

    case "GET":
        $id ? $controller->show($id) : $controller->index();
        break;

    case "POST":
        if ($id) {
            $controller->update($id, $_POST);
        } else {
            $controller->store($_POST, $_FILES);
        }

        break;

    case "DELETE":

    if ($id) {
        $controller->delete($id);
    }

    break;

    default:
        echo json_encode([
            "success" => false,
            "message" => "Método no permitido"
        ]);
}