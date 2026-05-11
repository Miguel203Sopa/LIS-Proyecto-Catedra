<?php
require_once __DIR__ . '/../../clases/Auth.php';

Auth::check();
Auth::requireAdmin();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <title>Solicitudes de Voluntariado</title>
    <link rel="shortcut icon" href="/assets/imagenes/Puppy.png">
    <link rel="stylesheet" href="/assets/css/admin.css?v=<?= time() ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

</head>

<body>

    <?php include __DIR__ . '/navbar.php'; ?>

    <div class="panel-container">

        <h1>
            <i class="fa-solid fa-hand-holding-heart"></i>
            Solicitudes de Voluntariado
        </h1>

        <table class="table table-hover mt-3">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>DUI</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody id="tablaSolicitudes"></tbody>

        </table>

    </div>
    <dialog id="modalAprobacion">

        <div class="p-3" style="min-width:350px;">

            <h4 class="mb-3">
                Aprobar voluntario
            </h4>

            <div class="mb-3">

                <label class="form-label">
                    Correo
                </label>

                <input type="email" id="correoUsuario" class="form-control" readonly>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Contraseña
                </label>

                <input type="password" id="password" class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Confirmar contraseña
                </label>

                <input type="password" id="confirmPassword" class="form-control">

            </div>

            <div class="d-flex justify-content-end gap-2">

                <button class="btn btn-secondary" onclick="document.getElementById('modalAprobacion').close()">

                    Cancelar

                </button>

                <button class="btn btn-success" onclick="confirmarAprobacion()">

                    Confirmar

                </button>

            </div>

        </div>

    </dialog>
    <script src="/private/js/solicitudes.js"></script>

</body>

</html>