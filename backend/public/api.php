<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$method = $_SERVER['REQUEST_METHOD'];
$request = strtok($_SERVER['REQUEST_URI'], '?');
$path = preg_replace('#^/api\.php#', '', $request);
$parts = explode('/', trim($path, '/'));
$resource = $parts[0] ?? null;
$id = $parts[1] ?? null;

switch ($resource) {

    case "auth":
        require "../routes/auth.php";
        break;

    case "personas":
        require "../routes/personas.php";
        break;

    case "animales":
        require "../routes/animales.php";
        break;

    case "adopciones":
        require "../routes/adopciones.php";
        break;

    case "usuarios":
        require "../routes/usuarios.php";
        break;

    default:

        http_response_code(404);

        echo json_encode([
            "error" => "Ruta no encontrada",
            "ruta" => $resource
        ]);

        break;
}