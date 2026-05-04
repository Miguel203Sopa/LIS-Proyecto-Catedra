<?php
require_once "Conexion.php";

class Adopcion {
    private $db;

    public function __construct() {
        $this->db = Conexion::conectar();
    }

    public function listar() {
        return $this->db->query("SELECT * FROM fundacion.adopciones")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtener($id) {
        $stmt = $this->db->prepare("SELECT * FROM fundacion.adopciones WHERE id_adopcion = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear($id_animal, $id_persona) {
        $stmt = $this->db->prepare(
            "INSERT INTO fundacion.adopciones(id_animal, id_persona)
             VALUES (?, ?)"
        );
        return $stmt->execute([$id_animal, $id_persona]);
    }

    public function actualizar($id, $estado, $obs) {
        $stmt = $this->db->prepare(
            "UPDATE fundacion.adopciones
             SET estado = ?, observaciones = ?
             WHERE id_adopcion = ?"
        );
        return $stmt->execute([$estado, $obs, $id]);
    }

    public function eliminar($id) {
        $stmt = $this->db->prepare(
            "DELETE FROM fundacion.adopciones WHERE id_adopcion = ?"
        );
        return $stmt->execute([$id]);
    }
}