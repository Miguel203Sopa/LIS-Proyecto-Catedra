<?php

require_once __DIR__ . '/../controllers/AuthController.php';

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

/* ================= OBTENER URI ================= */

$request =
    $_SERVER['REQUEST_URI'];

$request =
    explode('/', trim($request, '/'));

/*
Ejemplo:

/api.php/auth/login

Resultado:
[api.php, auth, login]
*/

$id =
    end($request);

/* ================= ROUTING ================= */

switch ($method) {

    case "POST":

        if ($id === "login") {

            AuthController::login();

        } else {

            http_response_code(404);

            echo json_encode([

                "success" => false,

                "message" =>
                    "Ruta no encontrada",

                "debug_id" =>
                    $id
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