<?php
require_once __DIR__ . '/../../clases/Auth.php';
Auth::check();

$usuario = Auth::user();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Animales</title>

    <link rel="stylesheet" href="/assets/css/admin.css?v=<?= time() ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body>

    <?php include __DIR__ . '/navbar.php'; ?>

    <div class="panel-container">

        <h1><i class="fa-solid fa-paw"></i> Gestión de Animales</h1>

        <!-- ================= TABLA ================= -->
        <table class="table table-hover mt-3" id="tabla-animales">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Especie</th>
                    <th>Estado</th>
                    <th>Sexo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <hr>

        <!-- ================= FORM ================= -->
        <h3 class="mb-4">
            <i class="fa-solid fa-circle-plus"></i> Registrar Animal
        </h3>

        <form id="formAnimal" enctype="multipart/form-data">

            <div class="row g-4">

                <!-- nombre -->
                <div class="col-md-6">
                    <label class="form-label"><i class="fa-solid fa-tag"></i> Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>

                <!-- especie -->
                <div class="col-md-6">
                    <label class="form-label"><i class="fa-solid fa-dna"></i> Especie</label>
                    <select name="especie" class="form-select" required>
                        <option value="">Seleccione</option>
                        <option value="Perro">Perro</option>
                        <option value="Gato">Gato</option>
                    </select>
                </div>

                <!-- fecha -->
                <div class="col-md-6">
                    <label class="form-label"><i class="fa-regular fa-calendar"></i> Fecha nacimiento</label>
                    <input type="date" name="fecha_nacimiento" class="form-control" required>
                </div>

                <!-- sexo -->
                <div class="col-md-6">
                    <label class="form-label"><i class="fa-solid fa-venus-mars"></i> Sexo</label>
                    <select name="sexo" class="form-select" required>
                        <option value="">Seleccione</option>
                        <option value="macho">Macho</option>
                        <option value="hembra">Hembra</option>
                    </select>
                </div>

                <!-- estado -->
                <div class="col-md-6">
                    <label class="form-label"><i class="fa-solid fa-heart-circle-check"></i> Estado</label>
                    <select name="estado" class="form-select" required>
                        <option value="disponible">Disponible</option>
                        <option value="en proceso">En proceso</option>
                        <option value="adoptado">Adoptado</option>
                        <option value="en tratamiento">En tratamiento</option>
                    </select>
                </div>

                <!-- salud -->
                <div class="col-md-6">
                    <label class="form-label"><i class="fa-solid fa-notes-medical"></i> Estado salud</label>
                    <textarea name="estado_salud" class="form-control"></textarea>
                </div>

                <!-- descripcion -->
                <div class="col-md-6">
                    <label class="form-label"><i class="fa-solid fa-align-left"></i> Descripción</label>
                    <textarea name="descripcion" class="form-control"></textarea>
                </div>

                <!-- imagen -->
                <div class="col-md-6">
                    <label class="form-label"><i class="fa-solid fa-image"></i> Imagen</label>
                    <input type="file" name="imagen" class="form-control">
                </div>

                <!-- HISTORIAL -->
                <div class="col-12">
                    <label class="form-label"><i class="fa-solid fa-syringe"></i> Historial médico</label>

                    <div id="historial-container"></div>

                    <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="addHistorial()">
                        <i class="fa-solid fa-plus"></i> Agregar registro
                    </button>
                </div>

                <div class="col-12">
                    <button class="btn btn-success w-100 py-2">
                        <i class="fa-solid fa-floppy-disk"></i> Guardar Animal
                    </button>
                </div>

            </div>

        </form>

    </div>

    <script>

        const API = "/api.php/animales";

        async function cargarAnimales() {

            const res = await fetch(API);
            const json = await res.json();

            const lista = json.data || [];

            const tbody = document.querySelector("#tabla-animales tbody");
            tbody.innerHTML = "";

            lista.forEach(a => {
                tbody.innerHTML += `
            <tr>
                <td>${a.id_animal}</td>
                <td>${a.nombre}</td>
                <td>${a.especie}</td>
                <td>${a.estado}</td>
                <td>${a.sexo}</td>
                <td>
                    <button class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </td>
            </tr>
        `;
            });
        }

        function addHistorial() {

            const container = document.getElementById("historial-container");

            const row = document.createElement("div");
            row.classList.add("row", "g-2", "mb-2");

            row.innerHTML = `
        <div class="col-md-3">
            <select name="historial_tipo[]" class="form-select">
                <option value="">Tipo</option>
                <option value="vacunacion">Vacunación</option>
                <option value="tratamiento">Tratamiento</option>
                <option value="control">Control</option>
                <option value="cirugia">Cirugía</option>
            </select>
        </div>

        <div class="col-md-6">
            <input name="historial_descripcion[]" class="form-control" placeholder="Descripción">
        </div>

        <div class="col-md-3">
            <input name="historial_veterinario[]" class="form-control" placeholder="Veterinario">
        </div>
    `;

            container.appendChild(row);
        }

        document.getElementById("formAnimal").addEventListener("submit", async (e) => {

            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);

            const res = await fetch(API, {
                method: "POST",
                body: formData
            });

            const json = await res.json();

            if (json.success) {
                alert("Animal creado correctamente");
                form.reset();
                document.getElementById("historial-container").innerHTML = "";
                cargarAnimales();
            } else {
                alert(json.message);
            }
        });

        document.addEventListener("DOMContentLoaded", cargarAnimales);

    </script>

</body>

</html>