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

    <link rel="stylesheet" href="/assets/css/admin.css?v=<?= time() ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <dialog id="modalVoluntario">

        <h3>Aprobar voluntario</h3>

        <input type="email" id="correoVoluntario" readonly>

        <input type="password" id="passwordVoluntario" placeholder="Crear contraseña">

        <div style="display:flex; gap:10px; justify-content:flex-end; margin-top:10px;">

            <button class="btn btn-success" onclick="confirmarAprobacion()">
                Confirmar
            </button>

            <button class="btn btn-secondary" onclick="document.getElementById('modalVoluntario').close()">
                Cancelar
            </button>

        </div>

    </dialog>
    <script src="/private/js/solicitudes.js"></script>

</body>

</html>