<?php
require_once "Conexion.php";

class Animal {
    private $db;

    public function __construct() {
        $this->db = Conexion::conectar();
    }

    public function crear($nombre, $especie, $sexo) {
        $sql = "INSERT INTO fundacion.animales(nombre, especie, sexo)
                VALUES (:nombre, :especie, :sexo)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ":nombre" => $nombre,
            ":especie" => $especie,
            ":sexo" => $sexo
        ]);
    }

    public function listar() {
        return $this->db->query("SELECT * FROM fundacion.animales")->fetchAll(PDO::FETCH_ASSOC);
    }
}