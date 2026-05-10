<?php

require_once __DIR__ . "/../clases/Conexion.php";
require_once __DIR__ . "/../clases/Animal.php";
require_once __DIR__ . "/../clases/FotoAnimal.php";
require_once __DIR__ . "/../clases/HistorialMedico.php";

class AnimalController
{
    private $animal;
    private $foto;
    private $historial;
    private $db;

    public function __construct()
    {
        $this->animal = new Animal();
        $this->foto = new FotoAnimal();
        $this->historial = new HistorialMedico();
        $this->db = Conexion::conectar();
    }

    public function index()
    {
        echo json_encode($this->animal->listar());
    }

    public function show($id)
    {
        echo json_encode($this->animal->obtener($id));
    }

    public function store($data, $files)
    {
        try {
            $this->db->beginTransaction();

            // ================= CREAR ANIMAL =================
            $idAnimal = $this->animal->crear(
                $data['nombre'] ?? null,
                $data['especie'] ?? null,
                $data['fecha_nacimiento'] ?? null,
                $data['sexo'] ?? null,
                $data['estado_salud'] ?? null,
                $data['descripcion'] ?? null
            );

            // ================= IMAGEN =================
            if (isset($files['imagen']) && $files['imagen']['error'] === UPLOAD_ERR_OK) {

                $file = $files['imagen'];

                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                $name = uniqid("animal_") . "." . $ext;

                $path = __DIR__ . "/../uploads/" . $name;

                if (move_uploaded_file($file['tmp_name'], $path)) {
                    $url = "/uploads/" . $name;
                    $this->foto->agregar($idAnimal, $url);
                }
            }

            // ================= HISTORIAL =================
            if (!empty($data['historial'])) {

                $historial = json_decode($data['historial'], true);

                if (is_array($historial)) {
                    foreach ($historial as $h) {
                        $this->historial->agregar(
                            $idAnimal,
                            $h['tipo'] ?? null,
                            $h['descripcion'] ?? null,
                            $h['veterinario'] ?? null
                        );
                    }
                }
            }

            $this->db->commit();

            echo json_encode([
                "success" => true,
                "id_animal" => $idAnimal
            ]);

        } catch (Exception $e) {

            $this->db->rollBack();

            http_response_code(500);

            echo json_encode([
                "success" => false,
                "error" => $e->getMessage()
            ]);
        }
    }

    public function update($id, $data)
    {
        try {
            $this->animal->actualizar(
                $id,
                $data['nombre'] ?? null,
                $data['estado'] ?? null,
                $data['estado_salud'] ?? null,
                $data['descripcion'] ?? null
            );

            echo json_encode([
                "success" => true,
                "msg" => "Actualizado"
            ]);

        } catch (Exception $e) {

            http_response_code(500);

            echo json_encode([
                "success" => false,
                "error" => $e->getMessage()
            ]);
        }
    }
}