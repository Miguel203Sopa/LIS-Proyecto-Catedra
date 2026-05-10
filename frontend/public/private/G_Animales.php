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

    <title>Gestión de Animales</title>

    <link rel="stylesheet" href="/assets/css/admin.css?v=<?= time() ?>">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        rel="stylesheet">

</head>

<body>

    <?php include __DIR__ . '/navbar.php'; ?>

    <div class="panel-container">

        <h1 class="mb-4">
            <i class="fa-solid fa-paw"></i>
            Gestión de Animales
        </h1>

        <!-- ================= TABLA ================= -->

        <table
            class="table table-hover mt-3"
            id="tabla-animales">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Especie</th>
                    <th>Estado</th>
                    <th>Sexo</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody></tbody>

        </table>

        <hr class="my-5">

        <!-- ================= FORM ================= -->

        <h3 class="mb-4">

            <i class="fa-solid fa-circle-plus"></i>
            Registrar / Editar Animal

        </h3>

        <form
            id="formAnimal"
            enctype="multipart/form-data">

            <div class="row g-4">

                <!-- nombre -->

                <div class="col-md-6">

                    <label class="form-label">

                        <i class="fa-solid fa-tag"></i>
                        Nombre

                    </label>

                    <input
                        type="text"
                        name="nombre"
                        class="form-control"
                        required>

                </div>

                <!-- especie -->

                <div class="col-md-6">

                    <label class="form-label">

                        <i class="fa-solid fa-dna"></i>
                        Especie

                    </label>

                    <select
                        name="especie"
                        class="form-select"
                        required>

                        <option value="">Seleccione</option>
                        <option value="Perro">Perro</option>
                        <option value="Gato">Gato</option>

                    </select>

                </div>

                <!-- fecha nacimiento -->

                <div class="col-md-6">

                    <label class="form-label">

                        <i class="fa-regular fa-calendar"></i>
                        Fecha nacimiento

                    </label>

                    <input
                        type="date"
                        name="fecha_nacimiento"
                        class="form-control">

                </div>

                <!-- sexo -->

                <div class="col-md-6">

                    <label class="form-label">

                        <i class="fa-solid fa-venus-mars"></i>
                        Sexo

                    </label>

                    <select
                        name="sexo"
                        class="form-select"
                        required>

                        <option value="">Seleccione</option>
                        <option value="macho">Macho</option>
                        <option value="hembra">Hembra</option>

                    </select>

                </div>

                <!-- estado -->

                <div class="col-md-6">

                    <label class="form-label">

                        <i class="fa-solid fa-heart-circle-check"></i>
                        Estado

                    </label>

                    <select
                        name="estado"
                        class="form-select">

                        <option value="disponible">Disponible</option>
                        <option value="en proceso">En proceso</option>
                        <option value="adoptado">Adoptado</option>
                        <option value="en tratamiento">En tratamiento</option>

                    </select>

                </div>

                <!-- estado salud -->

                <div class="col-md-6">

                    <label class="form-label">

                        <i class="fa-solid fa-notes-medical"></i>
                        Estado salud

                    </label>

                    <textarea
                        name="estado_salud"
                        class="form-control"></textarea>

                </div>

                <!-- descripcion -->

                <div class="col-md-6">

                    <label class="form-label">

                        <i class="fa-solid fa-align-left"></i>
                        Descripción

                    </label>

                    <textarea
                        name="descripcion"
                        class="form-control"></textarea>

                </div>

                <!-- imagen -->

                <div class="col-md-6">

                    <label class="form-label">

                        <i class="fa-solid fa-image"></i>
                        Imagen

                    </label>

                    <input
                        type="file"
                        name="imagen"
                        class="form-control">

                </div>

                <!-- historial -->

                <div class="col-12">

                    <label class="form-label">

                        <i class="fa-solid fa-syringe"></i>
                        Historial médico

                    </label>

                    <div id="historial-container"></div>

                    <button
                        type="button"
                        class="btn btn-secondary btn-sm mt-2"
                        onclick="addHistorial()">

                        <i class="fa-solid fa-plus"></i>
                        Agregar registro

                    </button>

                </div>

                <!-- boton -->

                <div class="col-12">

                    <button
                        type="submit"
                        class="btn btn-success w-100 py-2">

                        <i class="fa-solid fa-floppy-disk"></i>
                        Guardar Animal

                    </button>

                </div>

                <!-- Boton de Salida --> 
                 <div class="col-12">

                    <button
                        type="button"
                        class="btn btn-secondary w-100 py-2 mt-2"
                        onclick="limpiarFormulario()">

                        <i class="fa-solid fa-xmark"></i>
                        Cancelar edición

                    </button>

                </div>

            </div>

        </form>

    </div>

    
    <script src="js/animales.js"></script>
</body>

</html>