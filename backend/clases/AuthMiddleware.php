<?php

class AuthMiddleware
{
    public static function start()
    {
        if (session_status() === PHP_SESSION_NONE) {

            session_start();
        }
    }

    public static function check()
    {
        self::start();

        if (!isset($_SESSION['usuario'])) {

            http_response_code(401);

            echo json_encode([
                "success" => false,
                "message" => "No autenticado"
            ]);

            exit;
        }
    }

    public static function admin()
    {
        self::check();

        if (
            $_SESSION['usuario']['rol']
            !== 'admin'
        ) {

            http_response_code(403);

            echo json_encode([
                "success" => false,
                "message" => "No autorizado"
            ]);

            exit;
        }
    }

    public static function user()
    {
        self::start();

        return $_SESSION['usuario'] ?? null;
    }
}