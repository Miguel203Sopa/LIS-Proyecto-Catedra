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
            <i class="fa-solid fa-plus"></i> Registrar Animal
        </h3>

        <form id="formAnimal" enctype="multipart/form-data">

            <div class="row g-4">

                <div class="col-md-6">
                    <label class="form-label text-start d-block">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-start d-block">Especie</label>
                    <select name="especie" class="form-select" required>
                        <option value="">Seleccione</option>
                        <option value="perro">Perro</option>
                        <option value="gato">Gato</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-start d-block">Fecha nacimiento</label>
                    <input type="date" name="fecha_nacimiento" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-start d-block">Sexo</label>
                    <select name="sexo" class="form-select" required>
                        <option value="">Seleccione</option>
                        <option value="macho">Macho</option>
                        <option value="hembra">Hembra</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-start d-block">Estado del animal</label>
                    <select name="estado" class="form-select" required>
                        <option value="disponible">Disponible</option>
                        <option value="en proceso">En proceso</option>
                        <option value="adoptado">Adoptado</option>
                        <option value="en tratamiento">En tratamiento</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-start d-block">Estado salud</label>
                    <textarea name="estado_salud" class="form-control"></textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-start d-block">Descripción</label>
                    <textarea name="descripcion" class="form-control"></textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-start d-block">Imagen</label>
                    <input type="file" name="imagen" class="form-control" accept="image/*">
                </div>

                <!-- HISTORIAL -->
                <div class="col-12">
                    <label class="form-label text-start d-block">Historial médico</label>

                    <div id="historial-container"></div>

                    <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="addHistorial()">
                        + Agregar registro
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
        /* ================= API ================= */
        const API = "http://localhost:3001/api.php/animales";

        /* ================= CARGAR ANIMALES ================= */
        async function cargarAnimales() {
            try {
                const res = await fetch(API);
                const data = await res.json();

                const tbody = document.querySelector("#tabla-animales tbody");
                tbody.innerHTML = "";

                const lista = Array.isArray(data) ? data : Object.values(data);

                lista.forEach(a => {
                    tbody.innerHTML += `
                <tr>
                    <td>${a.id_animal ?? ''}</td>
                    <td>${a.nombre ?? ''}</td>
                    <td>${a.especie ?? ''}</td>
                    <td>${a.estado ?? ''}</td>
                    <td>${a.sexo ?? ''}</td>
                    <td>
                        <button class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"></i>
                        </button>
                    </td>
                </tr>
            `;
                });

            } catch (err) {
                console.error("Error cargando animales:", err);
            }
        }

        /* ================= HISTORIAL DINÁMICO ================= */
        function addHistorial() {
            const container = document.getElementById("historial-container");

            const row = document.createElement("div");
            row.classList.add("row", "g-2", "mb-2");

            row.innerHTML = `
        <div class="col-md-4">
            <input name="historial_tipo[]" class="form-control" placeholder="Tipo" required>
        </div>
        <div class="col-md-5">
            <input name="historial_descripcion[]" class="form-control" placeholder="Descripción" required>
        </div>
        <div class="col-md-3">
            <input name="historial_veterinario[]" class="form-control" placeholder="Veterinario">
        </div>
    `;

            container.appendChild(row);
        }

        /* ================= CREAR ANIMAL ================= */
        document.getElementById("formAnimal").addEventListener("submit", async (e) => {
            e.preventDefault();

            const formData = new FormData(e.target);

            const res = await fetch(API, {
                method: "POST",
                body: formData
            });

            const data = await res.json();

            if (data.success) {
                alert("Animal creado correctamente");
                e.target.reset();
                document.getElementById("historial-container").innerHTML = "";
                cargarAnimales();
            } else {
                alert(data.message || "Error al crear animal");
            }
        });

        /* ================= INIT ================= */
        document.addEventListener("DOMContentLoaded", cargarAnimales);
    </script>

</body>

</html>