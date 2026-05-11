<?php

require_once __DIR__ . '/../controllers/AuthController.php';

header("Content-Type: application/json");

$method =
    $_SERVER['REQUEST_METHOD'];

$request =
    $_SERVER['REQUEST_URI'];

$request =
    explode('/', trim($request, '/'));

$id =
    end($request);

/*
    /api.php/auth/login
*/

switch ($method) {

    case "POST":

        if ($id === "login") {

            AuthController::login();

        } else {

            http_response_code(404);

            echo json_encode([

                "success" => false,

                "message" =>
                    "Ruta no encontrada"
            ]);
        }

        break;

    default:

        http_response_code(405);

        echo json_encode([

            "success" => false,

            "message" =>
                "Método no permitido"
        ]);

        break;
}