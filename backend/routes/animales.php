<?php

require_once __DIR__ . "/../controllers/AnimalController.php";

$controller = new AnimalController();

$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['id'] ?? null;

header("Content-Type: application/json");

switch ($method) {

    case "GET":

        if ($id) {
            $controller->show($id);
        } else {
            $controller->index();
        }

        break;

    case "POST":

        if ($id) {
            $controller->update($id, $_POST, $_FILES);
        } else {
            $controller->store($_POST, $_FILES);
        }

        break;

    case "DELETE":

        if ($id) {

            $controller->delete($id);

        } else {

            echo json_encode([
                "success" => false,
                "message" => "ID requerido"
            ]);
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