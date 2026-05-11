<?php

class Session
{
    public static function start()
    {
        if (session_status() === PHP_SESSION_NONE) {

            session_start();
        }
    }

    public static function login($usuario)
    {
        self::start();

        $_SESSION['usuario'] = [

            "id" =>
                $usuario['id'],

            "uid" =>
                $usuario['uid'],

            "nombre" =>
                $usuario['nombre'],

            "apellido" =>
                $usuario['apellido'],

            "correo" =>
                $usuario['correo'],

            "rol" =>
                $usuario['rol']
        ];
    }

    public static function logout()
    {
        self::start();

        $_SESSION = [];

        session_unset();

        if (ini_get("session.use_cookies")) {

            $params =
                session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        session_destroy();
    }

    public static function user()
    {
        self::start();

        return $_SESSION['usuario'] ?? null;
    }

    public static function check()
    {
        self::start();

        return isset($_SESSION['usuario']);
    }
}