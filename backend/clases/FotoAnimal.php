<?php
require_once __DIR__ . "/Conexion.php";

class FotoAnimal
{

    private $db;

    public function __construct()
    {
        $this->db = Conexion::conectar();
    }

    public function agregar($id_animal, $url, $principal = false)
    {

        $sql = "
            INSERT INTO fundacion.animales_fotos
            (id_animal, url_foto, es_principal)
            VALUES (:id_animal, :url, :principal)
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ":id_animal" => $id_animal,
            ":url" => $url,
            ":principal" => $principal
        ]);
    }

    public function listarPorAnimal($id_animal)
    {

        $stmt = $this->db->prepare("
            SELECT * 
            FROM fundacion.animales_fotos
            WHERE id_animal = ?
        ");

        $stmt->execute([$id_animal]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}