<?php

require_once __DIR__ . "/Conexion.php";

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = Conexion::conectar();
    }

    public function listar()
    {
        $stmt = $this->db->query("
            SELECT
                u.id_usuario,
                u.id_persona,
                u.firebase_uid,
                u.rol,
                u.activo,
                p.nombre,
                p.apellido,
                p.correo
            FROM fundacion.usuarios u
            INNER JOIN fundacion.personas p
                ON p.id_persona = u.id_persona
            ORDER BY u.id_usuario DESC
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtener($id)
    {
        $stmt = $this->db->prepare("
            SELECT
                u.id_usuario,
                u.id_persona,
                u.firebase_uid,
                u.rol,
                u.activo,
                p.nombre,
                p.apellido,
                p.correo
            FROM fundacion.usuarios u
            INNER JOIN fundacion.personas p
                ON p.id_persona = u.id_persona
            WHERE u.id_usuario = ?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear(
        $id_persona,
        $firebase_uid,
        $rol
    ) {

        $stmt = $this->db->prepare("
            INSERT INTO fundacion.usuarios
            (
                id_persona,
                firebase_uid,
                rol
            )
            VALUES (?, ?, ?)
        ");

        return $stmt->execute([
            $id_persona,
            $firebase_uid,
            $rol
        ]);
    }

    public function actualizar(
        $id,
        $rol,
        $activo
    ) {

        $stmt = $this->db->prepare("
            UPDATE fundacion.usuarios
            SET
                rol = ?,
                activo = ?
            WHERE id_usuario = ?
        ");

        return $stmt->execute([
            $rol,
            $activo,
            $id
        ]);
    }

    public function eliminar($id)
    {
        $stmt = $this->db->prepare("
            DELETE FROM fundacion.usuarios
            WHERE id_usuario = ?
        ");

        return $stmt->execute([$id]);
    }

    /* ================= OBTENER EMAIL ================= */

    public function obtenerCorreo($id)
    {
        $stmt = $this->db->prepare("
            SELECT
                p.correo
            FROM fundacion.usuarios u
            INNER JOIN fundacion.personas p
                ON p.id_persona = u.id_persona
            WHERE u.id_usuario = ?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}