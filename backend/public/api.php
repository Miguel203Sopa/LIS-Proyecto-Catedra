<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$method = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];
$request = strtok($request, '?');

$parts = explode('/', trim($request, '/'));

$resource = $parts[1] ?? null;
$id = $parts[2] ?? null;

// rutas
switch ($resource) {
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
        echo json_encode(["error" => "Ruta no encontrada"]);
}