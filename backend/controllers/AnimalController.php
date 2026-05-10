<?php

require_once __DIR__ . "/../clases/Animal.php";
require_once __DIR__ . "/../clases/Conexion.php";

class AnimalController
{
    private $animal;
    private $db;

    public function __construct()
    {
        $this->animal = new Animal();
        $this->db = Conexion::conectar();
    }

    /* ================= LISTAR ================= */
    public function index()
    {
        header("Content-Type: application/json");

        $data = $this->animal->listar();

        echo json_encode([
            "success" => true,
            "data" => $data
        ]);
    }

    /* ================= OBTENER ================= */
    public function show($id)
    {
        header("Content-Type: application/json");

        $data = $this->animal->obtener($id);

        echo json_encode([
            "success" => true,
            "data" => $data
        ]);
    }

    /* ================= CREAR ================= */
    public function store($data, $files)
    {
        header("Content-Type: application/json");

        try {
            $this->db->beginTransaction();

            /* ================= HISTORIAL JSON ================= */
            $historial = [];

            if (!empty($data['historial_tipo'])) {

                for ($i = 0; $i < count($data['historial_tipo']); $i++) {

                    $tipo = $data['historial_tipo'][$i] ?? null;
                    $desc = $data['historial_descripcion'][$i] ?? null;
                    $vet = $data['historial_veterinario'][$i] ?? null;

                    if ($tipo || $desc || $vet) {
                        $historial[] = [
                            "tipo" => $tipo,
                            "descripcion" => $desc,
                            "veterinario" => $vet
                        ];
                    }
                }
            }

            /* ================= CREAR ANIMAL ================= */
            $idAnimal = $this->animal->crear(
                $data['nombre'],
                $data['especie'],
                $data['fecha_nacimiento'],
                $data['sexo'],
                $data['estado_salud'],
                $data['descripcion'],
                json_encode($historial)
            );

            /* ================= IMAGEN ================= */
            if (!empty($files['imagen'])) {

                $file = $files['imagen'];

                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                $name = uniqid("animal_") . "." . $ext;

                $path = __DIR__ . "/../uploads/" . $name;

                move_uploaded_file($file['tmp_name'], $path);

                $stmt = $this->db->prepare("
                    UPDATE fundacion.animales
                    SET foto_url = ?
                    WHERE id_animal = ?
                ");

                $stmt->execute([
                    "/uploads/" . $name,
                    $idAnimal
                ]);
            }

            $this->db->commit();

            echo json_encode([
                "success" => true,
                "message" => "Animal creado correctamente",
                "id_animal" => $idAnimal
            ]);

        } catch (Exception $e) {

            $this->db->rollBack();

            echo json_encode([
                "success" => false,
                "message" => $e->getMessage()
            ]);
        }
    }

    /* ================= ACTUALIZAR ================= */
    public function update($id, $data)
    {
        header("Content-Type: application/json");

        try {

            /* ================= HISTORIAL NUEVO ================= */
            $historial = [];

            if (!empty($data['historial_tipo'])) {

                for ($i = 0; $i < count($data['historial_tipo']); $i++) {

                    $historial[] = [
                        "tipo" => $data['historial_tipo'][$i] ?? null,
                        "descripcion" => $data['historial_descripcion'][$i] ?? null,
                        "veterinario" => $data['historial_veterinario'][$i] ?? null
                    ];
                }
            }

            $ok = $this->animal->actualizar(
                $id,
                $data['nombre'],
                $data['estado'],
                $data['estado_salud'],
                $data['descripcion'],
                json_encode($historial)
            );

            echo json_encode([
                "success" => $ok,
                "message" => $ok ? "Actualizado correctamente" : "Error al actualizar"
            ]);

        } catch (Exception $e) {

            echo json_encode([
                "success" => false,
                "message" => $e->getMessage()
            ]);
        }
    }
}