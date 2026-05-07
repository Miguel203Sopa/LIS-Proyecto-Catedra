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

            header("Location: login.php");

            exit;
        }
    }

    public static function requireAdmin()
    {
        self::check();

        if ($_SESSION['usuario']['rol'] !== 'admin') {

            header("Location: inicio.php");

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

        session_destroy();

        header("Location: login.php");

        exit;
    }
}