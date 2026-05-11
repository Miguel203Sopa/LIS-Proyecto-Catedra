<?php

require_once __DIR__ . "/Conexion.php";

class SolicitudVoluntariado
{
    private $db;


    /* ================= CREAR ================= */

public function crear(
    $nombre,
    $apellido,
    $dui,
    $correo,
    $telefono,
    $motivacion
) {

    $stmt = $this->db->prepare("

        INSERT INTO fundacion.solicitudes_voluntariado
        (
            nombre,
            apellido,
            dui,
            correo,
            telefono,
            motivacion
        )
        VALUES
        (?, ?, ?, ?, ?, ?)

    ");

    return $stmt->execute([

        $nombre,
        $apellido,
        $dui,
        $correo,
        $telefono,
        $motivacion

    ]);
}


    public function __construct()
    {
        $this->db = Conexion::conectar();
    }

    public function listar()
    {
        $stmt = $this->db->query("
            SELECT *
            FROM fundacion.solicitudes_voluntariado
            ORDER BY id_solicitud DESC
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtener($id)
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM fundacion.solicitudes_voluntariado
            WHERE id_solicitud = ?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarEstado($id, $estado)
    {
        $stmt = $this->db->prepare("
            UPDATE fundacion.solicitudes_voluntariado
            SET estado = ?
            WHERE id_solicitud = ?
        ");

        return $stmt->execute([$estado, $id]);
    }

    public function eliminar($id)
    {
        $stmt = $this->db->prepare("
            DELETE FROM fundacion.solicitudes_voluntariado
            WHERE id_solicitud = ?
        ");

        return $stmt->execute([$id]);
    }
}