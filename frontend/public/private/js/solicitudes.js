const API = "http://localhost:3001/api.php/solicitudes_voluntariado";

const tabla = document.getElementById("tablaSolicitudes");

let solicitudActual = null;

window.onload = () => cargar();

async function cargar() {

    const res = await fetch(API);
    const json = await res.json();

    tabla.innerHTML = "";

    json.data.forEach(s => {

        let badge = "bg-warning";

        if (s.estado === "aprobado") {
            badge = "bg-success";
        }

        if (s.estado === "rechazado") {
            badge = "bg-danger";
        }

        tabla.innerHTML += `
            <tr>

                <td>${s.id_solicitud}</td>
                <td>${s.nombre} ${s.apellido}</td>
                <td>${s.dui}</td>
                <td>${s.correo}</td>
                <td>${s.telefono}</td>

                <td>
                    <span class="badge ${badge}">
                        ${s.estado}
                    </span>
                </td>

                <td>

                    ${s.estado !== "aprobado" ? `

                        <button
                            class="btn btn-success btn-sm"
                            onclick='abrirModal(${JSON.stringify(s)})'>

                            <i class="fa-solid fa-check"></i>

                        </button>

                        <button
                            class="btn btn-danger btn-sm"
                            onclick="cambiarEstado(${s.id_solicitud}, 'rechazado')">

                            <i class="fa-solid fa-xmark"></i>

                        </button>
                    ` : ""}
                </td>

            </tr>
        `;
    });
}

window.abrirModal = function (solicitud) {

    solicitudActual = solicitud;

    document.getElementById("correoUsuario").value =
        solicitud.correo;

    document.getElementById("password").value = "";

    document.getElementById("confirmPassword").value = "";

    document.getElementById("modalAprobacion").showModal();
};

async function confirmarAprobacion() {

    const password =
        document.getElementById("password").value.trim();

    const confirmPassword =
        document.getElementById("confirmPassword").value.trim();

    if (!password || !confirmPassword) {
        alert("Complete las contraseñas");
        return;
    }

    if (password !== confirmPassword) {
        alert("Las contraseñas no coinciden");
        return;
    }

    try {

        const res = await fetch(`${API}/aprobar`, {

            method: "POST",

            headers: {
                "Content-Type": "application/json"
            },

            body: JSON.stringify({

                id_solicitud:
                    solicitudActual.id_solicitud,

                correo:
                    solicitudActual.correo,

                password

            })
        });

        const json = await res.json();

        if (!json.success) {

            alert(json.message || "Error");

            return;
        }

        alert("Usuario aprobado correctamente");

        document
            .getElementById("modalAprobacion")
            .close();

        cargar();

    } catch (err) {

        console.error(err);

        alert("Error de Firebase");
    }
}

async function cambiarEstado(id, estado) {

    const res = await fetch(`${API}/${id}`, {

        method: "PUT",

        headers: {
            "Content-Type": "application/json"
        },

        body: JSON.stringify({ estado })
    });

    const json = await res.json();

    if (!json.success) {

        alert("Error actualizando estado");

        return;
    }

    cargar();
}