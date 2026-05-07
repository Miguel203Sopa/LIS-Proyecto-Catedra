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
            "id" => $usuario['id_usuario'],
            "uid" => $usuario['firebase_uid'],
            "nombre" => $usuario['nombre'],
            "apellido" => $usuario['apellido'],
            "correo" => $usuario['correo'],
            "rol" => $usuario['rol']
        ];
    }

    public static function logout()
    {
        self::start();

        session_destroy();
    }
}