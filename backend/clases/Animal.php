<?php
require_once __DIR__ . "/Conexion.php";

class Animal
{

    private $db;

    public function __construct()
    {
        $this->db = Conexion::conectar();
    }

    public function listar()
    {
        $sql = "
            SELECT *
            FROM fundacion.animales
            ORDER BY id_animal DESC
        ";

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

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

    public function crear($nombre, $especie, $fecha_nacimiento, $sexo, $estado_salud, $descripcion)
    {

        $sql = "
            INSERT INTO fundacion.animales
            (nombre, especie, fecha_nacimiento, sexo, estado_salud, descripcion)
            VALUES (?, ?, ?, ?, ?, ?)
            RETURNING id_animal
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $nombre,
            $especie,
            $fecha_nacimiento,
            $sexo,
            $estado_salud,
            $descripcion
        ]);

        return $stmt->fetchColumn();
    }

    public function actualizar($id, $nombre, $estado, $estado_salud, $descripcion)
    {

        $sql = "
            UPDATE fundacion.animales
            SET nombre = ?, 
                estado = ?, 
                estado_salud = ?, 
                descripcion = ?
            WHERE id_animal = ?
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $nombre,
            $estado,
            $estado_salud,
            $descripcion,
            $id
        ]);
    }
}