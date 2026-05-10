<?php

require_once __DIR__ . "/../clases/Animal.php";
require_once __DIR__ . "/../clases/FotoAnimal.php";
require_once __DIR__ . "/../clases/HistorialMedico.php";
require_once __DIR__ . "/../clases/Conexion.php";

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
        header("Content-Type: application/json");

        $data = $this->animal->listar();

        echo json_encode([
            "success" => true,
            "data" => $data
        ]);
    }

    public function show($id)
    {
        header("Content-Type: application/json");

        $data = $this->animal->obtener($id);

        echo json_encode([
            "success" => true,
            "data" => $data
        ]);
    }

    public function store($data, $files)
    {
        header("Content-Type: application/json");

        try {
            $this->db->beginTransaction();

            $idAnimal = $this->animal->crear(
                $data['nombre'],
                $data['especie'],
                $data['fecha_nacimiento'],
                $data['sexo'],
                $data['estado_salud'],
                $data['descripcion']
            );

            /* FOTO */
            if (!empty($files['imagen'])) {

                $file = $files['imagen'];

                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                $name = uniqid("animal_") . "." . $ext;

                $path = __DIR__ . "/../uploads/" . $name;

                move_uploaded_file($file['tmp_name'], $path);

                $this->foto->agregar($idAnimal, "/uploads/" . $name);
            }

            /* HISTORIAL */
            if (!empty($data['historial'])) {

                $historial = json_decode($data['historial'], true);

                if (is_array($historial)) {
                    foreach ($historial as $h) {
                        $this->historial->agregar(
                            $idAnimal,
                            $h['tipo'],
                            $h['descripcion'],
                            $h['veterinario'] ?? null
                        );
                    }
                }
            }

            $this->db->commit();

            echo json_encode([
                "success" => true,
                "message" => "Animal creado",
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

    public function update($id, $data)
    {
        header("Content-Type: application/json");

        $ok = $this->animal->actualizar(
            $id,
            $data['nombre'],
            $data['estado'],
            $data['estado_salud'],
            $data['descripcion']
        );

        echo json_encode([
            "success" => $ok,
            "message" => $ok ? "Actualizado" : "Error al actualizar"
        ]);
    }
}