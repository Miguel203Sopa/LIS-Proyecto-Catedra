<?php
require_once "Conexion.php";

class FotoAnimal {
    private $db;

    public function __construct() {
        $this->db = Conexion::conectar();
    }

    public function agregar($id_animal, $url) {
        $sql = "INSERT INTO fundacion.animales_fotos(id_animal, url_foto)
                VALUES (:id_animal, :url)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ":id_animal" => $id_animal,
            ":url" => $url
        ]);
    }
}