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

    <link rel="stylesheet" href="/assets/css/admin.css?v=<?= time() ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body>

<?php include __DIR__ . '/navbar.php'; ?>

<div class="panel-container">

    <h1>
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

    <h3>
        <i class="fa-solid fa-plus"></i>
        Registrar Adopción
    </h3>

    <form id="formAdopcion">

        <div class="row g-4 mt-2">

            <!-- animal -->
            <div class="col-md-6">

                <label class="form-label">
                    ID Animal
                </label>

                <input
                    type="number"
                    name="id_animal"
                    class="form-control"
                    required>

            </div>

            <!-- persona -->
            <div class="col-md-6">

                <label class="form-label">
                    ID Persona
                </label>

                <input
                    type="number"
                    name="id_persona"
                    class="form-control"
                    required>

            </div>

            <!-- estado -->
            <div class="col-md-6">

                <label class="form-label">
                    Estado
                </label>

                <select
                    name="estado"
                    class="form-select">

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

                <textarea
                    name="observaciones"
                    class="form-control"></textarea>

            </div>

            <!-- submit -->
            <div class="col-12">

                <button class="btn btn-success w-100 py-2">

                    <i class="fa-solid fa-floppy-disk"></i>

                    Guardar Adopción

                </button>

            </div>

        </div>

    </form>

</div>

<script>

    const API = "/api.php/adopciones";

    let editando = null;

    /* ================= LISTAR ================= */

    async function cargarAdopciones() {

        const res = await fetch(API);

        const lista = await res.json();

        const tbody =
            document.querySelector("#tabla-adopciones tbody");

        tbody.innerHTML = "";

        lista.forEach(a => {

            tbody.innerHTML += `
                <tr>

                    <td>${a.id_adopcion}</td>

                    <td>${a.id_animal}</td>

                    <td>${a.id_persona}</td>

                    <td>${a.estado}</td>

                    <td>${a.observaciones ?? ""}</td>

                    <td class="d-flex gap-2">

                        <button
                            class="btn btn-warning btn-sm"
                            onclick="editarAdopcion(${a.id_adopcion})">

                            <i class="fa-solid fa-pen"></i>

                        </button>

                        <button
                            class="btn btn-danger btn-sm"
                            onclick="eliminarAdopcion(${a.id_adopcion})">

                            <i class="fa-solid fa-trash"></i>

                        </button>

                    </td>

                </tr>
            `;
        });
    }

    /* ================= CREAR / EDITAR ================= */

    document.getElementById("formAdopcion")
        .addEventListener("submit", async (e) => {

        e.preventDefault();

        const form = e.target;

        const body = {

            id_animal: form.id_animal.value,
            id_persona: form.id_persona.value,
            estado: form.estado.value,
            observaciones: form.observaciones.value
        };

        let method = "POST";

        let url = API;

        if (editando) {

            method = "PUT";

            url += `/${editando}`;
        }

        const res = await fetch(url, {

            method,

            headers: {
                "Content-Type": "application/json"
            },

            body: JSON.stringify(body)
        });

        const json = await res.json();

        alert(json.msg || "Operación realizada");

        form.reset();

        editando = null;

        cargarAdopciones();
    });

    /* ================= EDITAR ================= */

    async function editarAdopcion(id) {

        const res = await fetch(`${API}/${id}`);

        const a = await res.json();

        editando = id;

        const form = document.getElementById("formAdopcion");

        form.id_animal.value = a.id_animal;

        form.id_persona.value = a.id_persona;

        form.estado.value = a.estado;

        form.observaciones.value =
            a.observaciones ?? "";

        window.scrollTo({
            top: document.body.scrollHeight,
            behavior: "smooth"
        });
    }

    /* ================= ELIMINAR ================= */

    async function eliminarAdopcion(id) {

        if (!confirm("¿Eliminar adopción?")) return;

        const res = await fetch(`${API}/${id}`, {

            method: "DELETE"
        });

        const json = await res.json();

        alert(json.msg);

        cargarAdopciones();
    }

    /* ================= INIT ================= */

    document.addEventListener(
        "DOMContentLoaded",
        cargarAdopciones
    );

</script>

</body>
</html>