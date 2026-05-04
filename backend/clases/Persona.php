<?php
require_once "Conexion.php";

class Persona {
    private $db;

    public function __construct() {
        $this->db = Conexion::conectar();
    }

    public function crear($nombre, $apellido, $correo, $telefono) {
        $sql = "INSERT INTO fundacion.personas(nombre, apellido, correo, telefono)
                VALUES (:nombre, :apellido, :correo, :telefono)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ":nombre" => $nombre,
            ":apellido" => $apellido,
            ":correo" => $correo,
            ":telefono" => $telefono
        ]);
    }

    public function obtenerTodos() {
        return $this->db->query("SELECT * FROM fundacion.personas")->fetchAll(PDO::FETCH_ASSOC);
    }
}