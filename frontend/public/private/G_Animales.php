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

        <div class="form-wrapper">

            <form id="formAnimal" enctype="multipart/form-data" class="animal-form">

                <div class="row g-4">

                    <div class="col-md-6">
                        <label><i class="fa-solid fa-signature"></i> Nombre</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label><i class="fa-solid fa-dog"></i> Especie</label>
                        <input type="text" name="especie" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label><i class="fa-solid fa-calendar"></i> Fecha nacimiento</label>
                        <input type="date" name="fecha_nacimiento" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label><i class="fa-solid fa-venus-mars"></i> Sexo</label>
                        <select name="sexo" class="form-select" required>
                            <option value="">Seleccione</option>
                            <option value="macho">Macho</option>
                            <option value="hembra">Hembra</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label><i class="fa-solid fa-heart-pulse"></i> Estado salud</label>
                        <textarea name="estado_salud" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="col-md-6">
                        <label><i class="fa-solid fa-align-left"></i> Descripción</label>
                        <textarea name="descripcion" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="col-md-6">
                        <label><i class="fa-solid fa-image"></i> Imagen</label>
                        <input type="file" name="imagen" class="form-control" accept="image/*">
                    </div>

                    <div class="col-md-6">
                        <label><i class="fa-solid fa-notes-medical"></i> Historial (JSON)</label>
                        <textarea name="historial" class="form-control" rows="3"
                            placeholder='[{"tipo":"consulta","descripcion":"vacuna"}]'></textarea>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-success w-100 py-2">
                            <i class="fa-solid fa-floppy-disk"></i> Guardar Animal
                        </button>
                    </div>

                </div>

            </form>

        </div>

    </div>

    <script>
        const API = "http://localhost:3001/api.php/animales";
        const token = localStorage.getItem("token");

        /* ================= CARGAR ================= */
        async function cargarAnimales() {
            const res = await fetch(API, {
                headers: {
                    "Authorization": "Bearer " + token
                }
            });

            const data = await res.json();

            const tbody = document.querySelector("#tabla-animales tbody");
            tbody.innerHTML = "";

            data.forEach(a => {
                tbody.innerHTML += `
        <tr>
            <td>${a.id_animal}</td>
            <td>${a.nombre}</td>
            <td>${a.especie}</td>
            <td>
                <select onchange="cambiarEstado(${a.id_animal}, this.value)">
                    <option ${a.estado == "disponible" ? "selected" : ""}>disponible</option>
                    <option ${a.estado == "en proceso" ? "selected" : ""}>en proceso</option>
                    <option ${a.estado == "adoptado" ? "selected" : ""}>adoptado</option>
                    <option ${a.estado == "en tratamiento" ? "selected" : ""}>en tratamiento</option>
                </select>
            </td>
            <td>${a.sexo}</td>
            <td>
                <button class="btn btn-primary btn-sm">
                    <i class="fa fa-edit"></i>
                </button>
            </td>
        </tr>`;
            });
        }

        /* ================= CREAR ================= */
        document.getElementById("formAnimal").addEventListener("submit", async (e) => {
            e.preventDefault();

            const formData = new FormData(e.target);

            const res = await fetch(API, {
                method: "POST",
                headers: {
                    "Authorization": "Bearer " + token
                },
                body: formData
            });

            const data = await res.json();

            if (data.success) {
                alert("Animal creado");
                e.target.reset();
                cargarAnimales();
            } else {
                alert("Error");
            }
        });

        /* ================= ESTADO INLINE ================= */
        async function cambiarEstado(id, estado) {
            await fetch(`${API}?id=${id}`, {
                method: "PUT",
                headers: {
                    "Authorization": "Bearer " + token,
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `estado=${estado}`
            });

            cargarAnimales();
        }

        cargarAnimales();
    </script>

</body>

</html>