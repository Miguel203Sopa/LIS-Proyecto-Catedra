const API = "http://localhost:3001/api.php/solicitudes_voluntariado";

const tabla = document.getElementById("tablaSolicitudes");

let solicitudSeleccionada = null;

window.onload = () => cargar();

async function cargar() {

    const res = await fetch(API);
    const json = await res.json();

    tabla.innerHTML = "";

    json.data.forEach(s => {

        tabla.innerHTML += `
            <tr>
                <td>${s.id_solicitud}</td>
                <td>${s.nombre} ${s.apellido}</td>
                <td>${s.dui}</td>
                <td>${s.correo}</td>
                <td>${s.telefono}</td>

                <td>
                    <span class="badge bg-warning">
                        ${s.estado}
                    </span>
                </td>

                <td>

                    <button class="btn btn-success btn-sm"
                        onclick="abrirAprobacion(${s.id_solicitud}, '${s.correo}')">
                        <i class="fa-solid fa-check"></i>
                    </button>

                    <button class="btn btn-danger btn-sm"
                        onclick="cambiarEstado(${s.id_solicitud}, 'rechazado')">
                        <i class="fa-solid fa-xmark"></i>
                    </button>

                </td>
            </tr>
        `;
    });
}

window.abrirAprobacion = function (id, correo) {

    solicitudSeleccionada = id;

    document.getElementById("correoVoluntario").value = correo;
    document.getElementById("passwordVoluntario").value = "";

    document.getElementById("modalVoluntario").showModal();
};

window.confirmarAprobacion = async function () {

    const correo = document.getElementById("correoVoluntario").value;
    const password = document.getElementById("passwordVoluntario").value;

    if (!password) {
        alert("Ingresa una contraseña");
        return;
    }

    await fetch(`${API}/aprobar`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            id: solicitudSeleccionada,
            correo,
            password
        })
    });

    document.getElementById("modalVoluntario").close();
    cargar();
};

async function cambiarEstado(id, estado) {

    await fetch(`${API}/${id}`, {
        method: "PUT",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ estado })
    });

    cargar();
}