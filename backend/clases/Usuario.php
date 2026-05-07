<?php
require_once "Conexion.php";

class Usuario {
    private $db;

    public function __construct() {
        $this->db = Conexion::conectar();
    }

    public function crear($id_persona, $rol, $password) {
        $sql = "INSERT INTO fundacion.usuarios(id_persona, rol, password)
                VALUES (:id_persona, :rol, :password)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ":id_persona" => $id_persona,
            ":rol" => $rol,
            ":password" => password_hash($password, PASSWORD_BCRYPT)
        ]);
    }
}