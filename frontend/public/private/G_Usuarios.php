<?php

require_once __DIR__ . '/../../clases/Auth.php';

Auth::check();
Auth::requireAdmin();

$usuario = Auth::user();

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestión de Usuarios</title>

    <link rel="stylesheet" href="/assets/css/admin.css?v=<?= time() ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

</head>

<body>

    <?php include __DIR__ . '/navbar.php'; ?>

    <div class="panel-container">

        <h1 class="mb-4">

            <i class="fa-solid fa-users"></i>

            Gestión de Usuarios

        </h1>

        <!-- ================= TABLA ================= -->

        <table class="table table-hover mt-3">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Usuario</th>

                    <th>Correo</th>

                    <th>Rol</th>

                    <th>Estado</th>

                    <th>Acciones</th>

                </tr>

            </thead>

            <tbody id="tablaUsuarios"></tbody>

        </table>

        <hr class="my-5">

        <!-- ================= FORM EDIT ================= -->

        <div id="contenedorFormUsuario" style="display:none;">

            <h3 class="mb-4">

                <i class="fa-solid fa-user-pen"></i>

                Editar Usuario

            </h3>

            <form onsubmit="event.preventDefault(); guardarUsuario();">

                <input type="hidden" id="id_usuario">

                <div class="row g-4">

                    <div class="col-md-6">

                        <label class="form-label">

                            Rol

                        </label>

                        <select id="rol" class="form-select">

                            <option value="admin">
                                Admin
                            </option>

                            <option value="voluntario">
                                Voluntario
                            </option>

                        </select>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">

                            Estado

                        </label>

                        <select id="activo" class="form-select">

                            <option value="true">
                                Activo
                            </option>

                            <option value="false">
                                Inactivo
                            </option>

                        </select>

                    </div>

                    <div class="col-12">

                        <button class="btn btn-success w-100">

                            <i class="fa-solid fa-floppy-disk"></i>

                            Guardar cambios

                        </button>

                    </div>

                    <div class="col-12">

                        <button type="button" class="btn btn-secondary w-100" onclick="cerrarFormulario()">

                            Cancelar

                        </button>

                    </div>

                </div>

            </form>

        </div>

        <!-- ================= PASSWORD ================= -->

        <div id="contenedorPassword" style="display:none;">

            <hr>

            <h3>

                <i class="fa-solid fa-key"></i>

                Cambiar contraseña

            </h3>

            <form onsubmit="event.preventDefault(); cambiarPassword();">

                <input type="hidden" id="password_user_id">

                <div class="row g-4">

                    <div class="col-md-6">

                        <label>

                            Nueva contraseña

                        </label>

                        <input type="password" id="password" class="form-control" required>

                    </div>

                    <div class="col-md-6">

                        <label>

                            Confirmar contraseña

                        </label>

                        <input type="password" id="confirmPassword" class="form-control" required>

                    </div>

                    <div class="col-12">

                        <button class="btn btn-danger w-100">

                            <i class="fa-solid fa-key"></i>

                            Actualizar contraseña

                        </button>

                    </div>

                    <div class="col-12">

                        <button type="button" class="btn btn-secondary w-100" onclick="cerrarPassword()">

                            Cancelar

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <script src="/private/js/usuarios.js"></script>

</body>

</html>


