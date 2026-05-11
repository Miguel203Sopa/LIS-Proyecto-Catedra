const API = "http://localhost:3001/api.php/usuarios";

const tabla =
    document.getElementById("tablaUsuarios");

const modal =
    document.getElementById("modalUsuario");

const modalPassword =
    document.getElementById("modalPassword");

window.onload = () => {
    cargarUsuarios();
};

/* ================= LISTAR ================= */

async function cargarUsuarios() {

    const res = await fetch(API);

    const json = await res.json();

    tabla.innerHTML = "";

    json.data.forEach(usuario => {

        tabla.innerHTML += `
            <tr>

                <td>${usuario.id_usuario}</td>

                <td>${usuario.id_persona}</td>

                <td>${usuario.firebase_uid}</td>

                <td>${usuario.rol}</td>

                <td>
                    ${usuario.activo ? 'Activo' : 'Inactivo'}
                </td>

                <td>

                    <button
                        class="btn btn-warning btn-sm"
                        onclick='editarUsuario(${JSON.stringify(usuario)})'>

                        <i class="fa-solid fa-pen"></i>

                    </button>

                    <button
                        class="btn btn-primary btn-sm"
                        onclick='abrirPassword(${usuario.id_usuario})'>

                        <i class="fa-solid fa-key"></i>

                    </button>

                    <button
                        class="btn btn-danger btn-sm"
                        onclick='eliminarUsuario(${usuario.id_usuario})'>

                        <i class="fa-solid fa-trash"></i>

                    </button>

                </td>

            </tr>
        `;
    });
}

/* ================= MODAL ================= */

function abrirModal() {

    document.getElementById("tituloModal").innerText =
        "Nuevo Usuario";

    document.getElementById("id_usuario").value = "";
    document.getElementById("id_persona").value = "";
    document.getElementById("firebase_uid").value = "";
    document.getElementById("rol").value = "voluntario";
    document.getElementById("activo").value = "true";

    modal.showModal();
}

function cerrarModal() {
    modal.close();
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
        usuario.firebase_uid;

    document.getElementById("rol").value =
        usuario.rol;

    document.getElementById("activo").value =
        usuario.activo ? "true" : "false";

    modal.showModal();
}

/* ================= GUARDAR ================= */

async function guardarUsuario() {

    const id =
        document.getElementById("id_usuario").value;

    const data = {

        id_persona:
            document.getElementById("id_persona").value,

        firebase_uid:
            document.getElementById("firebase_uid").value,

        rol:
            document.getElementById("rol").value,

        activo:
            document.getElementById("activo").value === "true"
    };

    let method = "POST";

    let url = API;

    if (id) {

        method = "PUT";

        url += `/${id}`;
    }

    const res = await fetch(url, {

        method,

        headers: {
            "Content-Type": "application/json"
        },

        body: JSON.stringify(data)
    });

    const json = await res.json();

    if (!json.success) {
        alert("Error");
        return;
    }

    alert("Usuario guardado");

    cerrarModal();

    cargarUsuarios();
}

/* ================= ELIMINAR ================= */

async function eliminarUsuario(id) {

    if (!confirm("¿Eliminar usuario?")) return;

    const res = await fetch(`${API}/${id}`, {
        method: "DELETE"
    });

    const json = await res.json();

    if (!json.success) {

        alert("Error eliminando");

        return;
    }

    alert("Usuario eliminado");

    cargarUsuarios();
}

/* ================= PASSWORD ================= */

function abrirPassword(id) {

    document.getElementById("password_user_id").value =
        id;

    document.getElementById("password").value = "";
    document.getElementById("confirmPassword").value = "";

    modalPassword.showModal();
}

function cerrarPassword() {
    modalPassword.close();
}

async function cambiarPassword() {

    const pass =
        document.getElementById("password").value;

    const confirm =
        document.getElementById("confirmPassword").value;

    if (pass !== confirm) {

        alert("Las contraseñas no coinciden");

        return;
    }

    alert(
        "Aquí luego conectarás Firebase Admin SDK"
    );

    cerrarPassword();
}