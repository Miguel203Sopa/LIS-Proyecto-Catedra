<?php

require_once __DIR__ . '/../../clases/Auth.php';

Auth::requireAdmin();

$usuario = Auth::user();

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>
        Gestión de Usuarios
    </title>

    <link
        rel="stylesheet"
        href="/assets/css/admin.css?v=<?= time() ?>">

    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        rel="stylesheet">

</head>

<body>

<?php include __DIR__ . '/navbar.php'; ?>

<div id="content-body" class="container">

    <div class="contenedor-cristal">

        <div class="top-bar">

            <h1>
                Gestión de Usuarios
            </h1>

            <button
                class="btn-agregar"
                onclick="abrirModal()">

                <i class="fa-solid fa-plus"></i>

                Nuevo Usuario

            </button>

        </div>

        <table class="table">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Persona</th>

                    <th>Correo</th>

                    <th>Firebase UID</th>

                    <th>Rol</th>

                    <th>Activo</th>

                    <th>Acciones</th>

                </tr>

            </thead>

            <tbody id="tablaUsuarios">
            </tbody>

        </table>

    </div>

</div>

<?php include __DIR__ . '/modals/usuarioModal.php'; ?>

<script src="/private/js/usuarios.js"></script>

</body>
</html>