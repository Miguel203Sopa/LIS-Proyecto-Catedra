const API = "http://localhost:3001/api.php/solicitudes_voluntariado";

const tabla = document.getElementById("tablaSolicitudes");

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
                        onclick="cambiarEstado(${s.id_solicitud}, 'aprobado')">

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