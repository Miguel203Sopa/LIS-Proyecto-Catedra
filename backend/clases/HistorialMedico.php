<?php
require_once __DIR__ . "/Conexion.php";

class HistorialMedico
{

    private $db;

    public function __construct()
    {
        $this->db = Conexion::conectar();
    }

    public function agregar($id_animal, $tipo, $descripcion, $veterinario = null)
    {

        $sql = "
            INSERT INTO fundacion.historial_medico
            (id_animal, tipo, descripcion, veterinario)
            VALUES (:id_animal, :tipo, :descripcion, :veterinario)
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ":id_animal" => $id_animal,
            ":tipo" => $tipo,
            ":descripcion" => $descripcion,
            ":veterinario" => $veterinario
        ]);
    }

    public function listarPorAnimal($id_animal)
    {

        $stmt = $this->db->prepare("
            SELECT *
            FROM fundacion.historial_medico
            WHERE id_animal = ?
            ORDER BY fecha DESC
        ");

        $stmt->execute([$id_animal]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}