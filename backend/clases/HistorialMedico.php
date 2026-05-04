<?php
require_once "Conexion.php";

class HistorialMedico {
    private $db;

    public function __construct() {
        $this->db = Conexion::conectar();
    }

    public function agregar($id_animal, $tipo, $descripcion) {
        $sql = "INSERT INTO fundacion.historial_medico(id_animal, tipo, descripcion)
                VALUES (:id_animal, :tipo, :descripcion)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ":id_animal" => $id_animal,
            ":tipo" => $tipo,
            ":descripcion" => $descripcion
        ]);
    }
}