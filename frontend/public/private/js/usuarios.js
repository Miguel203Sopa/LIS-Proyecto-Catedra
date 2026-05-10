const API = "http://localhost:3001/api.php/usuarios";

const tabla = document.getElementById("tablaUsuarios");

const modal = document.getElementById("modalUsuario");

/* ================= INIT ================= */

window.onload = () => {
    cargarUsuarios();
};

/* ================= CARGAR ================= */

async function cargarUsuarios() {

    try {

        const res = await fetch(API);

        const json = await res.json();

        const usuarios = json.data || [];

        tabla.innerHTML = "";

        usuarios.forEach(usuario => {

            tabla.innerHTML += `
                <tr>

                    <td>${usuario.id_usuario}</td>

                    <td>
                        ${usuario.nombre}
                        ${usuario.apellido}
                    </td>

                    <td>${usuario.correo}</td>

                    <td>${usuario.firebase_uid ?? ''}</td>

                    <td>${usuario.rol}</td>

                    <td>
                        ${usuario.activo ? 'Sí' : 'No'}
                    </td>

                    <td class="acciones">

                        <button 
                            class="btn-editar"
                            onclick='editarUsuario(${JSON.stringify(usuario)})'>

                            Editar
                        </button>

                        <button 
                            class="btn-eliminar"
                            onclick='eliminarUsuario(${usuario.id_usuario})'>

                            Eliminar
                        </button>

                    </td>

                </tr>
            `;
        });

    } catch (error) {

        console.error(error);

        alert("Error cargando usuarios");
    }
}

/* ================= MODAL ================= */

function abrirModal() {

    document.getElementById("tituloModal").innerText =
        "Nuevo Usuario";

    limpiarFormulario();

    modal.showModal();
}

function cerrarModal() {
    modal.close();
}

function limpiarFormulario() {

    document.getElementById("id_usuario").value = "";

    document.getElementById("id_persona").value = "";

    document.getElementById("firebase_uid").value = "";

    document.getElementById("rol").value = "voluntario";

    document.getElementById("activo").value = "true";
}

/* ================= EDITAR ================= */

function editarUsuario(usuario) {

    document.getElementById("tituloModal").innerText =
        "Editar Usuario";

    document.getElementById("id_usuario").value =
        usuario.id_usuario;

    document.getElementById("id_persona").value =
        usuario.id_persona;

    document.getElementById("firebase_uid").value =
        usuario.firebase_uid ?? "";

    document.getElementById("rol").value =
        usuario.rol;

    document.getElementById("activo").value =
        usuario.activo ? "true" : "false";

    modal.showModal();
}

/* ================= GUARDAR ================= */

async function guardarUsuario() {

    try {

        const id =
            document.getElementById("id_usuario").value;

        const datos = {

            id_persona:
                document.getElementById("id_persona").value,

            firebase_uid:
                document.getElementById("firebase_uid").value,

            rol:
                document.getElementById("rol").value,

            activo:
                document.getElementById("activo").value === "true"
        };

        let url = API;

        let method = "POST";

        if (id) {

            url = `${API}/${id}`;

            method = "PUT";
        }

        const res = await fetch(url, {

            method: method,

            headers: {
                "Content-Type": "application/json"
            },

            body: JSON.stringify(datos)
        });

        const json = await res.json();

        if (!json.success) {

            alert(json.message);

            return;
        }

        alert(json.message);

        cerrarModal();

        cargarUsuarios();

    } catch (error) {

        console.error(error);

        alert("Error guardando usuario");
    }
}

/* ================= ELIMINAR ================= */

async function eliminarUsuario(id) {

    if (!confirm("¿Eliminar usuario?")) {
        return;
    }

    try {

        const res = await fetch(`${API}/${id}`, {
            method: "DELETE"
        });

        const json = await res.json();

        if (!json.success) {

            alert(json.message);

            return;
        }

        alert(json.message);

        cargarUsuarios();

    } catch (error) {

        console.error(error);

        alert("Error eliminando usuario");
    }
}