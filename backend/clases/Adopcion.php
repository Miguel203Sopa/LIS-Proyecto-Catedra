<?php

require_once __DIR__ . "/Conexion.php";

class Adopcion
{
    private $db;

    public function __construct()
    {
        $this->db = Conexion::conectar();
    }

    /* ================= LISTAR ================= */

    public function listar()
    {
        $stmt = $this->db->query("
            SELECT
                id_adopcion,
                id_animal,
                id_persona,
                id_usuario_aprobacion,
                fecha_adopcion,
                estado,
                observaciones
            FROM fundacion.adopciones
            ORDER BY id_adopcion DESC
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /* ================= OBTENER ================= */

    public function obtener($id)
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM fundacion.adopciones
            WHERE id_adopcion = ?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /* ================= CREAR ================= */

    public function crear(
        $id_animal,
        $id_persona,
        $estado,
        $observaciones
    ) {

        $stmt = $this->db->prepare("
            INSERT INTO fundacion.adopciones
            (
                id_animal,
                id_persona,
                estado,
                observaciones
            )
            VALUES (?, ?, ?, ?)
        ");

        return $stmt->execute([
            $id_animal,
            $id_persona,
            $estado,
            $observaciones
        ]);
    }

    /* ================= ACTUALIZAR ================= */

    public function actualizar(
        $id,
        $estado,
        $observaciones
    ) {

        $stmt = $this->db->prepare("
            UPDATE fundacion.adopciones
            SET
                estado = ?,
                observaciones = ?
            WHERE id_adopcion = ?
        ");

        return $stmt->execute([
            $estado,
            $observaciones,
            $id
        ]);
    }

    /* ================= ELIMINAR ================= */

    public function eliminar($id)
    {
        $stmt = $this->db->prepare("
            DELETE FROM fundacion.adopciones
            WHERE id_adopcion = ?
        ");

        return $stmt->execute([$id]);
    }
}