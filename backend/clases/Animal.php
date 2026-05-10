<?php

require_once __DIR__ . "/Conexion.php";

class Animal
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
                id_animal,
                nombre,
                especie,
                fecha_nacimiento,
                sexo,
                estado,
                estado_salud,
                descripcion,
                foto_url,
                historial_medico
            FROM fundacion.animales
            ORDER BY id_animal DESC
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /* ================= OBTENER ================= */
    public function obtener($id)
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM fundacion.animales
            WHERE id_animal = ?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /* ================= CREAR ================= */
    public function crear(
        $nombre,
        $especie,
        $fecha_nacimiento,
        $sexo,
        $estado_salud,
        $descripcion,
        $historial_json
    ) {
        $stmt = $this->db->prepare("
            INSERT INTO fundacion.animales
            (
                nombre,
                especie,
                fecha_nacimiento,
                sexo,
                estado_salud,
                descripcion,
                historial_medico
            )
            VALUES (?, ?, ?, ?, ?, ?, ?::jsonb)
            RETURNING id_animal
        ");

        $stmt->execute([
            $nombre,
            $especie,
            $fecha_nacimiento,
            $sexo,
            $estado_salud,
            $descripcion,
            $historial_json
        ]);

        return $stmt->fetchColumn();
    }

    /* ================= ACTUALIZAR ================= */
    public function actualizar(
        $id,
        $nombre,
        $estado,
        $estado_salud,
        $descripcion,
        $historial_json
    ) {
        $stmt = $this->db->prepare("
            UPDATE fundacion.animales
            SET 
                nombre = ?,
                estado = ?,
                estado_salud = ?,
                descripcion = ?,
                historial_medico = ?::jsonb
            WHERE id_animal = ?
        ");

        return $stmt->execute([
            $nombre,
            $estado,
            $estado_salud,
            $descripcion,
            $historial_json,
            $id
        ]);
    }

    /* ================= ELIMINAR ================= */

public function eliminar($id)
{
    $stmt = $this->db->prepare("
        DELETE FROM fundacion.animales
        WHERE id_animal = ?
    ");

    return $stmt->execute([$id]);
}

}