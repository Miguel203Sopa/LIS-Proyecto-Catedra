const API = "http://localhost:3001/api.php/adopciones";


    let editando = null;

    /* ================= LISTAR ================= */

    async function cargarAdopciones() {

        try {

            const res = await fetch(API);

            const json = await res.json();

            const lista = json.data || [];

            const tbody =
                document.querySelector(
                    "#tabla-adopciones tbody"
                );

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

        } catch (error) {

            console.error(error);

            alert("Error cargando adopciones");
        }
    }

    /* ================= LIMPIAR FORM ================= */

    function limpiarFormulario() {

        const form =
            document.getElementById(
                "formAdopcion"
            );

        form.reset();

        editando = null;

        document.querySelector(
            "#formAdopcion button[type='submit']"
        ).innerHTML = `
            <i class="fa-solid fa-floppy-disk"></i>
            Guardar Adopción
        `;
    }

    /* ================= CREAR / EDITAR ================= */

    document.getElementById("formAdopcion")
        .addEventListener("submit", async (e) => {

        e.preventDefault();

        try {

            const form = e.target;

            const body = {

                id_animal:
                    form.id_animal.value,

                id_persona:
                    form.id_persona.value,

                estado:
                    form.estado.value,

                observaciones:
                    form.observaciones.value
            };

            let method = "POST";

            let url = API;

            if (editando) {

                method = "PUT";

                url += `?id=${editando}`;
            }

            const res = await fetch(url, {

                method,

                headers: {
                    "Content-Type": "application/json"
                },

                body: JSON.stringify(body)
            });

            const json = await res.json();

            if (json.success) {

                alert(
                    editando
                        ? "Adopción actualizada"
                        : "Adopción creada"
                );

                limpiarFormulario();

                cargarAdopciones();

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

async function editarAdopcion(id) {

    try {

        const res =
            await fetch(`${API}?id=${id}`);

        const json =
            await res.json();

        const a =
            json.data;

        if (!a) {

            alert("Adopción no encontrada");

            return;
        }

        document.getElementById(
            "edit_id_adopcion"
        ).value = a.id_adopcion;

        document.getElementById(
            "edit_id_animal"
        ).value = a.id_animal;

        document.getElementById(
            "edit_id_persona"
        ).value = a.id_persona;

        document.getElementById(
            "edit_estado"
        ).value = a.estado;

        document.getElementById(
            "edit_observaciones"
        ).value =
            a.observaciones ?? "";

        document.getElementById(
            "modalEditarAdopcion"
        ).showModal();

    } catch (error) {

        console.error(error);

        alert("Error cargando adopción");
    }
}

    /* ================= ELIMINAR ================= */

    async function eliminarAdopcion(id) {

        const confirmar = confirm(
            "¿Deseas eliminar esta adopción?"
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

                alert("Adopción eliminada");

                cargarAdopciones();

            } else {

                alert(
                    json.message ||
                    "No se pudo eliminar"
                );
            }

        } catch (error) {

            console.error(error);

            alert("Error eliminando adopción");
        }
    }

    /* ================= INIT ================= */

    document.addEventListener(
        "DOMContentLoaded",
        cargarAdopciones
    );