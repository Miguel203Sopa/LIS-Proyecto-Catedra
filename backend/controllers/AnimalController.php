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

            $idAnimal = $this->animal->crear(
                $data['nombre'],
                $data['especie'],
                $data['fecha_nacimiento'] ?? null,
                $data['sexo'],
                $data['estado'] ?? 'disponible',
                $data['estado_salud'] ?? null,
                $data['descripcion'] ?? null,
                json_encode($historial)
            );

            /* ================= IMAGEN ================= */

            if (
                isset($files['imagen']) &&
                $files['imagen']['error'] === UPLOAD_ERR_OK
            ) {

                $file = $files['imagen'];

                $ext = strtolower(
                    pathinfo($file['name'], PATHINFO_EXTENSION)
                );

                $permitidas = ['jpg', 'jpeg', 'png', 'webp'];

                if (!in_array($ext, $permitidas)) {

                    throw new Exception(
                        "Formato de imagen no permitido"
                    );
                }

                $nombreArchivo =
                    uniqid("animal_") . "." . $ext;

                $rutaFisica =
                    __DIR__ . "/../uploads/" . $nombreArchivo;

                if (!move_uploaded_file(
                    $file['tmp_name'],
                    $rutaFisica
                )) {

                    throw new Exception(
                        "No se pudo guardar la imagen"
                    );
                }

                $this->animal->actualizarFoto(
                    $idAnimal,
                    "/uploads/" . $nombreArchivo
                );
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

    public function update($id, $data, $files)
    {
        header("Content-Type: application/json");

        try {

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
                $data['especie'],
                $data['fecha_nacimiento'] ?? null,
                $data['sexo'],
                $data['estado'],
                $data['estado_salud'] ?? null,
                $data['descripcion'] ?? null,
                json_encode($historial)
            );

            /* ================= NUEVA FOTO ================= */

            if (
                isset($files['imagen']) &&
                $files['imagen']['error'] === UPLOAD_ERR_OK
            ) {

                $file = $files['imagen'];

                $ext = strtolower(
                    pathinfo($file['name'], PATHINFO_EXTENSION)
                );

                $nombreArchivo =
                    uniqid("animal_") . "." . $ext;

                $rutaFisica =
                    __DIR__ . "/../uploads/" . $nombreArchivo;

                move_uploaded_file(
                    $file['tmp_name'],
                    $rutaFisica
                );

                $this->animal->actualizarFoto(
                    $id,
                    "/uploads/" . $nombreArchivo
                );
            }

            echo json_encode([
                "success" => $ok,
                "message" => $ok
                    ? "Animal actualizado correctamente"
                    : "No se pudo actualizar"
            ]);

        } catch (Exception $e) {

            echo json_encode([
                "success" => false,
                "message" => $e->getMessage()
            ]);
        }
    }

    /* ================= ELIMINAR ================= */

    public function delete($id)
    {
        header("Content-Type: application/json");

        try {

            $ok = $this->animal->eliminar($id);

            echo json_encode([
                "success" => $ok,
                "message" => $ok
                    ? "Animal eliminado"
                    : "No se pudo eliminar"
            ]);

        } catch (Exception $e) {

            echo json_encode([
                "success" => false,
                "message" => $e->getMessage()
            ]);
        }
    }
}