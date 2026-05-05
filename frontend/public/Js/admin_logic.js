document.addEventListener("DOMContentLoaded", function() {
    // 1. SEGURIDAD: Verificar si es Admin
    const userRole = localStorage.getItem("userRole");
    const contentBody = document.getElementById("content-body");

    if (userRole === "admin") {
        if (contentBody) contentBody.style.display = "block";
        cargarDatosSegunPagina();
    } else {
        alert("Acceso denegado. Se requieren permisos de administrador.");
        window.location.href = "login.html";
    }

    // 2. LÓGICA DE MODALES (Abrir/Cerrar)
    const btnOpen = document.querySelector(".btn-open-modal");
    const modal = document.getElementById("modal-form");
    
    if (btnOpen && modal) {
        btnOpen.onclick = () => modal.classList.remove("hidden");
        // Cerrar si se hace clic fuera del formulario
        window.onclick = (event) => {
            if (event.target == modal) modal.classList.add("hidden");
        }
    }
});

// 3. CARGA DE DATOS DESDE LA API (PHP)
async function cargarDatosSegunPagina() {
    const path = window.location.pathname;
    let endpoint = "";
    let tablaCuerpo = document.querySelector("tbody");

    // Identificar qué datos cargar según el nombre del archivo
    if (path.includes("admin_animales")) endpoint = "animales";
    else if (path.includes("admin_voluntarios")) endpoint = "usuarios";
    else if (path.includes("admin_adopciones")) endpoint = "adopciones";

    if (!endpoint || !tablaCuerpo) return;

    try {
        // Fetch a tu API que corre en el puerto 3001
        const response = await fetch(`http://localhost:3001/api.php/${endpoint}`);
        const datos = await response.json();

        tablaCuerpo.innerHTML = ""; // Limpiar tabla de ejemplo

        datos.forEach(item => {
            const fila = document.createElement("tr");
            fila.innerHTML = generarFilaHTML(endpoint, item);
            tablaCuerpo.appendChild(fila);
        });
    } catch (error) {
        console.error("Error cargando datos:", error);
    }
}

// 4. GENERADOR DE FILAS SEGÚN EL CRUD
function generarFilaHTML(tipo, item) {
    if (tipo === "animales") {
        return `
            <td>${item.nombre}</td>
            <td>${item.especie}</td>
            <td>${item.sexo}</td>
            <td><span class="badge-${item.estado}">${item.estado}</span></td>
            <td>
                <button onclick="editar(${item.id_animal})">Editar</button>
                <button onclick="eliminar(${item.id_animal})">Eliminar</button>
            </td>`;
    } 
    
    if (tipo === "usuarios") {
        return `
            <td>${item.id_usuario}</td>
            <td>${item.id_persona}</td>
            <td>${item.rol}</td>
            <td>${item.activo ? 'Activo' : 'Inactivo'}</td>
            <td>
                <button onclick="editarUser(${item.id_usuario})">Editar</button>
            </td>`;
    }

    if (tipo === "adopciones") {
        return `
            <td>${item.id_adopcion}</td>
            <td>${item.id_animal}</td>
            <td>${item.id_persona}</td>
            <td>${item.estado}</td>
            <td>
                <button onclick="verDetalles(${item.id_adopcion})">Detalles</button>
            </td>`;
    }
}
