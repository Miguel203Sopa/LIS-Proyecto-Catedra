const API = "http://localhost:3001/api.php/usuarios";

const tabla =
    document.getElementById("tablaUsuarios");

window.onload = () => {
    cargarUsuarios();
};

/* ================= LISTAR ================= */

async function cargarUsuarios() {

    try {

        const res = await fetch(API);

        const json = await res.json();

        tabla.innerHTML = "";

        json.data.forEach(usuario => {

            tabla.innerHTML += `
                <tr>

                    <td>${usuario.id_usuario}</td>

                    <td>
                        ${usuario.nombre ?? ''} 
                        ${usuario.apellido ?? ''}
                    </td>

                    <td>${usuario.correo ?? ''}</td>

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

    } catch (error) {

        console.error(error);

        alert("Error cargando usuarios");
    }
}

/* ================= EDITAR ================= */

function editarUsuario(usuario) {

    document.getElementById(
        "contenedorFormUsuario"
    ).style.display = "block";

    document.getElementById("id_usuario").value =
        usuario.id_usuario;

    document.getElementById("rol").value =
        usuario.rol;

    document.getElementById("activo").value =
        usuario.activo ? "true" : "false";

    document.getElementById(
        "contenedorPassword"
    ).style.display = "none";

    window.scrollTo({
        top: document.body.scrollHeight,
        behavior: "smooth"
    });
}

/* ================= CERRAR FORM ================= */

function cerrarFormulario() {

    document.getElementById(
        "contenedorFormUsuario"
    ).style.display = "none";
}

/* ================= GUARDAR ================= */

async function guardarUsuario() {

    try {

        const id =
            document.getElementById("id_usuario").value;

        const data = {

            rol:
                document.getElementById("rol").value,

            activo:
                document.getElementById("activo").value === "true"
        };

        const res = await fetch(`${API}/${id}`, {

            method: "PUT",

            headers: {
                "Content-Type": "application/json"
            },

            body: JSON.stringify(data)
        });

        const json = await res.json();

        if (!json.success) {

            alert("Error actualizando usuario");

            return;
        }

        alert("Usuario actualizado");

        cerrarFormulario();

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

            alert("Error eliminando usuario");

            return;
        }

        alert("Usuario eliminado");

        cargarUsuarios();

    } catch (error) {

        console.error(error);

        alert("Error eliminando usuario");
    }
}

/* ================= PASSWORD ================= */

function abrirPassword(id) {

    document.getElementById(
        "contenedorPassword"
    ).style.display = "block";

    document.getElementById(
        "contenedorFormUsuario"
    ).style.display = "none";

    document.getElementById(
        "password_user_id"
    ).value = id;

    document.getElementById(
        "password"
    ).value = "";

    document.getElementById(
        "confirmPassword"
    ).value = "";

    window.scrollTo({
        top: document.body.scrollHeight,
        behavior: "smooth"
    });
}

function cerrarPassword() {

    document.getElementById(
        "contenedorPassword"
    ).style.display = "none";
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

    cerrarPassword();
}