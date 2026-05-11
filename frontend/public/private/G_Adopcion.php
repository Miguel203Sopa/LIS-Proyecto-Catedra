<?php
require_once __DIR__ . '/../../clases/Auth.php';

Auth::check();

$usuario = Auth::user();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Adopciones</title>
    <link rel="shortcut icon" href="/assets/imagenes/Puppy.png">
    <link rel="stylesheet" href="/assets/css/admin.css?v=<?= time() ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body>

    <?php include __DIR__ . '/navbar.php'; ?>
    <div class="panel-container">
        <h1 class="mb-4">
            <i class="fa-solid fa-heart-circle-check"></i>
            Gestión de Adopciones
        </h1>

        <!-- ================= TABLA ================= -->

        <table class="table table-hover mt-4" id="tabla-adopciones">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>ID Animal</th>
                    <th>ID Persona</th>
                    <th>Estado</th>
                    <th>Observaciones</th>
                    <th>Acciones</th>

                </tr>

            </thead>

            <tbody></tbody>

        </table>

        <hr class="my-5">

        <!-- ================= FORM ================= -->

        <h3 class="mb-4">

            <i class="fa-solid fa-plus"></i>
            Registrar / Editar Adopción

        </h3>

        <form id="formAdopcion">

            <div class="row g-4">


                <!-- estado -->

                <div class="col-md-6">

                    <label class="form-label">

                        Estado

                    </label>

                    <select name="estado" class="form-select">

                        <option value="en proceso">
                            En proceso
                        </option>

                        <option value="aprobada">
                            Aprobada
                        </option>

                        <option value="rechazada">
                            Rechazada
                        </option>

                    </select>

                </div>

                <!-- observaciones -->

                <div class="col-md-6">

                    <label class="form-label">

                        Observaciones

                    </label>

                    <textarea name="observaciones" class="form-control"></textarea>

                </div>

                <!-- submit -->

                <div class="col-12">

                    <button type="submit" class="btn btn-success w-100 py-2">

                        <i class="fa-solid fa-floppy-disk"></i>
                        Guardar Adopción

                    </button>

                </div>

            </div>

        </form>

    </div>
    <script src="js/adopciones.js"></script>

</body>

</html>