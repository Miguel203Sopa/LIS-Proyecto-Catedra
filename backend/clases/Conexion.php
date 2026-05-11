<?php
class Conexion
{
    private static $conexion = null;

    public static function conectar()
    {
        if (self::$conexion === null) {
            $host = "db";
            $dbname = "midb";
            $user = "admin";
            $pass = "1234";

            try {
                self::$conexion = new PDO(
                    "pgsql:host=$host;dbname=$dbname",
                    $user,
                    $pass
                );
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die(json_encode([
                    "success" => false,
                    "message" => $e->getMessage()
                ]));
            }
        }
        return self::$conexion;
    }
}