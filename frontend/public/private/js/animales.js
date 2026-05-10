

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

