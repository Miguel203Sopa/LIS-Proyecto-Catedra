<?php

require_once __DIR__ . "/../controllers/UsuarioController.php";

header("Content-Type: application/json");

$controller = new UsuarioController();

$data = json_decode(
    file_get_contents("php://input"),
    true
);

$uri =
    $_SERVER['REQUEST_URI'];

$segments =
    explode('/', trim($uri, '/'));

$id = null;

$passwordRoute = false;

foreach ($segments as $index => $segment) {

    if (is_numeric($segment)) {

        $id = $segment;

        if (
            isset($segments[$index + 1]) &&
            $segments[$index + 1] === 'password'
        ) {

            $passwordRoute = true;
        }

        break;
    }
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

        if ($passwordRoute) {

            $controller->cambiarPassword(
                $id,
                $data
            );

        } else {

            $controller->update(
                $id,
                $data
            );
        }

        break;

    case 'DELETE':

        $controller->delete($id);

        break;

    default:

        http_response_code(405);

        echo json_encode([
            "success" => false,
            "message" => "Método no permitido"
        ]);

        break;
}