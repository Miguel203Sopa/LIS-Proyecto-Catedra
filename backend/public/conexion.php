<?php
class Conexion {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $host = 'db'; 
        $db   = 'midb';
        $user = 'admin';
        $pass = '1234';
        $port = '5432';

        try {
            $dsn = "pgsql:host=$host;port=$port;dbname=$db";
            $this->pdo = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
            $this->pdo->exec("SET search_path TO fundacion, public");

        } catch (PDOException $e) {
            die("Error crítico de conexión: " . $e->getMessage());
        }
    }

    public static function obtenerInstancia() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->pdo;
    }
}