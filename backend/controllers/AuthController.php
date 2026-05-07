<?php

require_once __DIR__ . '/../clases/FirebaseClient.php';
require_once __DIR__ . '/../clases/Conexion.php';

class AuthController
{
    public static function login()
    {
        $data = json_decode(
            file_get_contents("php://input"),
            true
        );

        $correo = $data['correo'] ?? '';
        $password = $data['password'] ?? '';

        $firebase = new FirebaseClient();

        $firebaseUser = $firebase->signIn(
            $correo,
            $password
        );

        if (
            !$firebaseUser ||
            isset($firebaseUser['error'])
        ) {

            http_response_code(401);

            echo json_encode([
    "success" => false,
    "firebase" => $firebaseUser
]);

            return;
        }

        $uid = $firebaseUser['localId'];

        $conn = (new Conexion())->conectar();

        $stmt = $conn->prepare("
            SELECT
                u.id_usuario,
                u.firebase_uid,
                u.rol,
                p.nombre,
                p.apellido,
                p.correo
            FROM fundacion.usuarios u
            INNER JOIN fundacion.personas p
                ON p.id_persona = u.id_persona
            WHERE u.firebase_uid = :uid
            AND u.activo = true
        ");

        $stmt->execute([
            ":uid" => $uid
        ]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) {

            http_response_code(403);

            echo json_encode([
                "success" => false,
                "message" => "Usuario no autorizado"
            ]);

            return;
        }

        echo json_encode([
            "success" => true,
            "usuario" => [
                "id" => $usuario['id_usuario'],
                "uid" => $usuario['firebase_uid'],
                "nombre" => $usuario['nombre'],
                "apellido" => $usuario['apellido'],
                "correo" => $usuario['correo'],
                "rol" => $usuario['rol']
            ]
        ]);
    }
}