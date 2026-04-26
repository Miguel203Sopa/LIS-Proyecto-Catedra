<?php
// FundacionModel.php

// 1. IMPORTANTE: Incluimos la tapa de acceso
require_once 'Conexion.php';

class FundacionModel {
    private $db;

    public function __construct() {
        // 2. Verificamos que la clase Conexion exista antes de usarla
        if (!class_exists('Conexion')) {
            die("Error: La clase 'Conexion' no se encuentra. Revisa que Conexion.php esté en la misma carpeta.");
        }
        $this->db = Conexion::obtenerInstancia();
    }

    // Método para obtener el listado principal
    public function listarAnimales() {
        try {
            $sql = "SELECT a.id_animal, a.nombre, e.nombre as especie, r.nombre as raza, a.estado 
                    FROM animales a
                    JOIN especies e ON a.id_especie = e.id_especie
                    JOIN razas r ON a.id_raza = r.id_raza
                    ORDER BY a.id_animal DESC";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die("Error al listar animales: " . $e->getMessage());
        }
    }

    // Método para ver el historial de un rescatado
    public function obtenerHistorial($id_animal) {
        try {
            $sql = "SELECT fecha, tipo, descripcion, veterinario 
                    FROM historial_medico 
                    WHERE id_animal = ? 
                    ORDER BY fecha DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id_animal]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die("Error al obtener historial: " . $e->getMessage());
        }
    }
}
