<?php
require_once __DIR__ . "/Conexion.php";

class Persona
{
    private $db;

    public function __construct()
    {
        $this->db = Conexion::conectar();
    }

    // LISTAR
    public function listar()
    {
        $sql = "SELECT * FROM fundacion.personas
                ORDER BY id_persona ASC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // OBTENER UNA
    public function obtener($id)
    {
        $sql = "SELECT * FROM fundacion.personas
                WHERE id_persona = :id";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ":id" => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerPorDui($dui)
    {
        $stmt = $this->db->prepare("
        SELECT *
        FROM fundacion.personas
        WHERE dui = ?
        LIMIT 1
    ");

        $stmt->execute([$dui]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // CREAR
    public function crear($nombre, $apellido, $dui, $correo, $telefono)
    {

        $sql = "INSERT INTO fundacion.personas
                (
                    nombre,
                    apellido,
                    dui,
                    correo,
                    telefono
                )
                VALUES
                (
                    :nombre,
                    :apellido,
                    :dui,
                    :correo,
                    :telefono
                )";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ":nombre" => $nombre,
            ":apellido" => $apellido,
            ":dui" => $dui,
            ":correo" => $correo,
            ":telefono" => $telefono
        ]);
    }

    // ACTUALIZAR
    public function actualizar(
        $id,
        $nombre,
        $apellido,
        $dui,
        $correo,
        $telefono,
        $activo
    ) {

        $sql = "UPDATE fundacion.personas
                SET
                    nombre = :nombre,
                    apellido = :apellido,
                    dui = :dui,
                    correo = :correo,
                    telefono = :telefono,
                    activo = :activo
                WHERE id_persona = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ":id" => $id,
            ":nombre" => $nombre,
            ":apellido" => $apellido,
            ":dui" => $dui,
            ":correo" => $correo,
            ":telefono" => $telefono,
            ":activo" => $activo
        ]);
    }

    // ELIMINAR
    public function eliminar($id)
    {

        $sql = "DELETE FROM fundacion.personas
                WHERE id_persona = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ":id" => $id
        ]);
    }
}