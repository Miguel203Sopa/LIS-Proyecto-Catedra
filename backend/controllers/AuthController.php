<?php

require_once __DIR__ . '/../clases/FirebaseClient.php';
require_once __DIR__ . '/../clases/Conexion.php';

class AuthController
{
    public static function login()
    {
        header("Content-Type: application/json");

        $data = json_decode(
            file_get_contents("php://input"),
            true
        );

        $correo =
            trim($data['correo'] ?? '');

        $password =
            trim($data['password'] ?? '');

        if (!$correo || !$password) {

            http_response_code(400);

            echo json_encode([
                "success" => false,
                "message" =>
                    "Correo y contraseña requeridos"
            ]);

            return;
        }

        $firebase =
            new FirebaseClient();

        $firebaseUser =
            $firebase->signIn(
                $correo,
                $password
            );

        if (!$firebaseUser['success']) {

    http_response_code(401);

    echo json_encode([
        "success" => false,
        "firebase" => $firebaseUser
    ]);

    return;
}

 /*if (!$firebaseUser['success']) { 

            http_response_code(401);

            echo json_encode([
                "success" => false,
                "message" =>
                    "Credenciales inválidas"
            ]);

            return;
        }
*/







        $uid =
            $firebaseUser['data']['localId'];

        $conn =
            Conexion::conectar();

        $stmt = $conn->prepare("

            SELECT
                u.id_usuario,
                u.firebase_uid,
                u.rol,
                u.activo,
                p.nombre,
                p.apellido,
                p.correo,
                p.activo AS persona_activa
            FROM fundacion.usuarios u
            INNER JOIN fundacion.personas p
                ON p.id_persona = u.id_persona
            WHERE u.firebase_uid = :uid
            LIMIT 1

        ");

        $stmt->execute([
            ":uid" => $uid
        ]);

        $usuario =
            $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) {

            http_response_code(403);

            echo json_encode([
                "success" => false,
                "message" =>
                    "Usuario no autorizado"
            ]);

            return;
        }

        if (
            !$usuario['activo'] ||
            !$usuario['persona_activa']
        ) {

            http_response_code(403);

            echo json_encode([
                "success" => false,
                "message" =>
                    "Usuario inactivo"
            ]);

            return;
        }

        echo json_encode([

            "success" => true,

            "usuario" => [

                "id" =>
                    $usuario['id_usuario'],

                "uid" =>
                    $usuario['firebase_uid'],

                "nombre" =>
                    $usuario['nombre'],

                "apellido" =>
                    $usuario['apellido'],

                "correo" =>
                    $usuario['correo'],

                "rol" =>
                    $usuario['rol']
            ]
        ]);
    }
}