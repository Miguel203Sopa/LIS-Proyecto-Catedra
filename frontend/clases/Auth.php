<?php

class Auth
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

            header(
                "Location: /login.php?error=sesion"
            );

            exit;
        }
    }

    public static function requireAdmin()
    {
        self::check();

        if (
            !isset($_SESSION['usuario']['rol']) ||
            $_SESSION['usuario']['rol'] !== 'admin'
        ) {

            header(
                "Location: /login.php?error=permiso"
            );

            exit;
        }
    }

    public static function user()
    {
        self::start();

        return $_SESSION['usuario'] ?? null;
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

        header("Location: /login.php");

        exit;
    }
}