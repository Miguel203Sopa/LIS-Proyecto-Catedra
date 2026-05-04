<?php
require_once "Conexion.php";

class Adopcion {
    private $db;

    public function __construct() {
        $this->db = Conexion::conectar();
    }

    public function crear($id_animal, $id_persona) {
        $sql = "INSERT INTO fundacion.adopciones(id_animal, id_persona)
                VALUES (:id_animal, :id_persona)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ":id_animal" => $id_animal,
            ":id_persona" => $id_persona
        ]);
    }
}