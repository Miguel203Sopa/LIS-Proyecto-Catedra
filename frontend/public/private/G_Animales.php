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

            </div>

        </form>

    </div>

    <script>

        const API = "/api.php/animales";

        let editando = null;

        /* ================= CARGAR TABLA ================= */

        async function cargarAnimales() {

            try {

                const res = await fetch(API);

                const json = await res.json();

                const lista = json.data || [];

                const tbody =
                    document.querySelector(
                        "#tabla-animales tbody"
                    );

                tbody.innerHTML = "";

                lista.forEach(a => {

                    tbody.innerHTML += `
                        <tr>

                            <td>${a.id_animal}</td>

                            <td>
                                ${a.foto_url
                                    ? `
                                        <img
                                            src="${a.foto_url}"
                                            width="60"
                                            height="60"
                                            style="
                                                object-fit:cover;
                                                border-radius:10px;
                                            ">
                                      `
                                    : "Sin foto"}
                            </td>

                            <td>${a.nombre ?? ''}</td>
                            <td>${a.especie ?? ''}</td>
                            <td>${a.estado ?? ''}</td>
                            <td>${a.sexo ?? ''}</td>

                            <td class="d-flex gap-2">

                                <button
                                    class="btn btn-warning btn-sm"
                                    onclick="editarAnimal(${a.id_animal})">

                                    <i class="fa-solid fa-pen"></i>

                                </button>

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="eliminarAnimal(${a.id_animal})">

                                    <i class="fa-solid fa-trash"></i>

                                </button>

                            </td>

                        </tr>
                    `;
                });

            } catch (error) {

                console.error(error);

                alert("Error cargando animales");
            }
        }

        /* ================= AGREGAR HISTORIAL ================= */

        function addHistorial(
            tipo = "",
            descripcion = "",
            veterinario = ""
        ) {

            const container =
                document.getElementById(
                    "historial-container"
                );

            const row = document.createElement("div");

            row.classList.add(
                "row",
                "g-2",
                "mb-2"
            );

            row.innerHTML = `

                <div class="col-md-3">

                    <select
                        name="historial_tipo[]"
                        class="form-select">

                        <option value="">Tipo</option>

                        <option value="vacunacion"
                            ${tipo === "vacunacion"
                                ? "selected"
                                : ""}>

                            Vacunación

                        </option>

                        <option value="tratamiento"
                            ${tipo === "tratamiento"
                                ? "selected"
                                : ""}>

                            Tratamiento

                        </option>

                        <option value="control"
                            ${tipo === "control"
                                ? "selected"
                                : ""}>

                            Control

                        </option>

                        <option value="cirugia"
                            ${tipo === "cirugia"
                                ? "selected"
                                : ""}>

                            Cirugía

                        </option>

                    </select>

                </div>

                <div class="col-md-5">

                    <input
                        type="text"
                        name="historial_descripcion[]"
                        class="form-control"
                        placeholder="Descripción"
                        value="${descripcion}">

                </div>

                <div class="col-md-3">

                    <input
                        type="text"
                        name="historial_veterinario[]"
                        class="form-control"
                        placeholder="Veterinario"
                        value="${veterinario}">

                </div>

                <div class="col-md-1">

                    <button
                        type="button"
                        class="btn btn-danger"
                        onclick="this.parentElement.parentElement.remove()">

                        X

                    </button>

                </div>
            `;

            container.appendChild(row);
        }

        /* ================= LIMPIAR FORM ================= */

        function limpiarFormulario() {

            const form =
                document.getElementById("formAnimal");

            form.reset();

            document.getElementById(
                "historial-container"
            ).innerHTML = "";

            editando = null;

            document.querySelector(
                "#formAnimal button[type='submit']"
            ).innerHTML = `
                <i class="fa-solid fa-floppy-disk"></i>
                Guardar Animal
            `;
        }

        /* ================= CREAR / EDITAR ================= */

        document.getElementById("formAnimal")
            .addEventListener("submit", async (e) => {

            e.preventDefault();

            try {

                const form = e.target;

                const formData =
                    new FormData(form);

                let url = API;

                if (editando) {

                    url += `?id=${editando}`;
                }

                const res = await fetch(url, {
                    method: "POST",
                    body: formData
                });

                const json = await res.json();

                if (json.success) {

                    alert(
                        editando
                            ? "Animal actualizado correctamente"
                            : "Animal creado correctamente"
                    );

                    limpiarFormulario();

                    cargarAnimales();

                } else {

                    alert(
                        json.message ||
                        "Ocurrió un error"
                    );
                }

            } catch (error) {

                console.error(error);

                alert("Error enviando formulario");
            }
        });

        /* ================= EDITAR ================= */

        async function editarAnimal(id) {

            try {

                const res =
                    await fetch(`${API}?id=${id}`);

                const json = await res.json();

                const a = json.data;

                if (!a) {

                    alert("Animal no encontrado");

                    return;
                }

                editando = id;

                const form =
                    document.getElementById(
                        "formAnimal"
                    );

                form.nombre.value =
                    a.nombre ?? "";

                form.especie.value =
                    a.especie ?? "";

                form.fecha_nacimiento.value =
                    a.fecha_nacimiento ?? "";

                form.sexo.value =
                    a.sexo ?? "";

                form.estado.value =
                    a.estado ?? "";

                form.estado_salud.value =
                    a.estado_salud ?? "";

                form.descripcion.value =
                    a.descripcion ?? "";

                const container =
                    document.getElementById(
                        "historial-container"
                    );

                container.innerHTML = "";

                if (a.historial_medico) {

                    let historial =
                        a.historial_medico;

                    if (
                        typeof historial === "string"
                    ) {

                        historial =
                            JSON.parse(historial);
                    }

                    if (Array.isArray(historial)) {

                        historial.forEach(h => {

                            addHistorial(
                                h.tipo || "",
                                h.descripcion || "",
                                h.veterinario || ""
                            );
                        });
                    }
                }

                document.querySelector(
                    "#formAnimal button[type='submit']"
                ).innerHTML = `
                    <i class="fa-solid fa-pen"></i>
                    Actualizar Animal
                `;

                window.scrollTo({
                    top: document.body.scrollHeight,
                    behavior: "smooth"
                });

            } catch (error) {

                console.error(error);

                alert("Error cargando animal");
            }
        }

        /* ================= ELIMINAR ================= */

        async function eliminarAnimal(id) {

            const confirmar = confirm(
                "¿Deseas eliminar este animal?"
            );

            if (!confirmar) return;

            try {

                const res = await fetch(
                    `${API}?id=${id}`,
                    {
                        method: "DELETE"
                    }
                );

                const json = await res.json();

                if (json.success) {

                    alert("Animal eliminado");

                    cargarAnimales();

                } else {

                    alert(
                        json.message ||
                        "No se pudo eliminar"
                    );
                }

            } catch (error) {

                console.error(error);

                alert("Error eliminando animal");
            }
        }

        /* ================= INIT ================= */

        document.addEventListener(
            "DOMContentLoaded",
            cargarAnimales
        );

    </script>

</body>

</html>