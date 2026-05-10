const API = "http://localhost:3001/api.php/usuarios";

const tabla = document.getElementById("tablaUsuarios");

const modal = document.getElementById("modalUsuario");

window.onload = () => {
    cargarUsuarios();
};

async function cargarUsuarios() {

    const res = await fetch(API);

    const usuarios = await res.json();

    tabla.innerHTML = "";

    usuarios.forEach(usuario => {

        tabla.innerHTML += `
            <tr>

                <td>${usuario.id_usuario}</td>

                <td>${usuario.id_persona}</td>

                <td>${usuario.firebase_uid ?? ''}</td>

                <td>${usuario.rol}</td>

                <td>
                    ${usuario.activo ? 'Sí' : 'No'}
                </td>

                <td>

                    <button onclick='editarUsuario(${JSON.stringify(usuario)})'>
                        Editar
                    </button>

                    <button onclick='eliminarUsuario(${usuario.id_usuario})'>
                        Eliminar
                    </button>

                </td>

            </tr>
        `;
    });
}

function abrirModal() {

    document.getElementById("tituloModal").innerText = "Nuevo Usuario";

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

function editarUsuario(usuario) {

    document.getElementById("tituloModal").innerText = "Editar Usuario";

    document.getElementById("id_usuario").value = usuario.id_usuario;

    document.getElementById("id_persona").value = usuario.id_persona;

    document.getElementById("firebase_uid").value = usuario.firebase_uid;

    document.getElementById("rol").value = usuario.rol;

    document.getElementById("activo").value = usuario.activo;

    modal.showModal();
}

async function guardarUsuario() {

    const id = document.getElementById("id_usuario").value;

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

    if (id) {

        await fetch(`${API}/${id}`, {

            method: "PUT",

            headers: {
                "Content-Type": "application/json"
            },

            body: JSON.stringify(datos)
        });

    } else {

        await fetch(API, {

            method: "POST",

            headers: {
                "Content-Type": "application/json"
            },

            body: JSON.stringify(datos)
        });
    }

    cerrarModal();

    cargarUsuarios();
}

async function eliminarUsuario(id) {

    if (!confirm("¿Eliminar usuario?")) {
        return;
    }

    await fetch(`${API}/${id}`, {
        method: "DELETE"
    });

    cargarUsuarios();
}