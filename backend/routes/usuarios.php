<?php
require_once __DIR__ . "/../controllers/UsuarioController.php";

$controller = new UsuarioController();

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

        $controller->store([
            "id_persona" => $data["id_persona"] ?? null,
            "firebase_uid" => $data["firebase_uid"] ?? null,
            "rol" => $data["rol"] ?? null
        ]);

        break;

    case 'PUT':

        $controller->update($id, [
            "firebase_uid" => $data["firebase_uid"] ?? null,
            "rol" => $data["rol"] ?? null,
            "activo" => $data["activo"] ?? true
        ]);

        break;

    case 'DELETE':

        $controller->delete($id);

        break;

    default:

        http_response_code(405);

        echo json_encode([
            "error" => "Método no permitido"
        ]);

        break;
}