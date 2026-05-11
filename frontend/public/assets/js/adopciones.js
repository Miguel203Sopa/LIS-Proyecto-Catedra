const API_URL = "/api.php/animales";

let animales = [];
let animalSeleccionado = null;

const grid = document.querySelector(".row");
const modal = document.getElementById("modalAdopcion");
const form = document.getElementById("formAdopcion");

document.addEventListener("DOMContentLoaded", async () => {
    await cargarAnimales();
    configurarFiltros();
    configurarModal();
});

/* ================= CARGAR ANIMALES ================= */

async function cargarAnimales() {
    const res = await fetch(API_URL);
    const json = await res.json();

    if (!json.success) return;

    animales = json.data;
    renderAnimales(animales);
}

/* ================= RENDER CARDS ================= */

function renderAnimales(lista) {
    grid.innerHTML = "";

    lista.forEach(animal => {
        const col = document.createElement("div");
        col.className = "col-12 col-md-4 mb-4";

        col.innerHTML = `
        <div class="flip-card">
            <div class="flip-inner">
                <div class="front text-center">
                    <img src="${animal.foto_url}" class="img-container">
                    <h3>${animal.nombre}</h3>
                    <span>Género: ${animal.sexo}</span><br>
                    <span>Edad: ${calcularEdad(animal.fecha_nacimiento)}</span><br>
                    <span>Estado: ${animal.estado}</span>
                </div>
                <div class="back text-center d-flex flex-column justify-content-center">
                    <h3>${animal.nombre}</h3>
                    <img src="${animal.foto_url}" class="card__img-back">
                    <span>${animal.descripcion ?? ""}</span>
                    <button class="btn btn-primary mt-2 btn-adoptar" data-id="${animal.id_animal}">
                        Adoptar
                    </button>
                </div>
            </div>
        </div>`;

        grid.appendChild(col);
    });

    document.querySelectorAll(".btn-adoptar").forEach(btn => {
        btn.addEventListener("click", e => {
            const id = e.target.dataset.id;
            animalSeleccionado = animales.find(a => a.id_animal == id);
            modal.showModal();
        });
    });
}

/* ================= FILTROS ================= */

function configurarFiltros() {
    document.querySelectorAll(".menu-bar a").forEach(link => {
        link.addEventListener("click", e => {
            e.preventDefault();

            const filtro = e.target.textContent.trim().toLowerCase();

            let filtrados = animales;

            if (filtro === "perro" || filtro === "gato") {
                filtrados = animales.filter(a =>
                    a.especie.toLowerCase() === filtro
                );
            }

            if (filtro === "macho" || filtro === "hembra") {
                filtrados = animales.filter(a =>
                    a.sexo.toLowerCase() === filtro
                );
            }

            renderAnimales(filtrados);
        });
    });
}

/* ================= MODAL ================= */

function configurarModal() {
    document.getElementById("btn-cerrar-adopcion").addEventListener("click", () => {
        modal.close();
    });

    form.addEventListener("submit", async e => {
        e.preventDefault();

        const data = Object.fromEntries(new FormData(form).entries());

        const payload = {
            ...data,
            id_animal: animalSeleccionado.id_animal
        };

        const res = await fetch("/api.php/adopciones", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(payload)
        });

        const json = await res.json();

        alert(json.message);

        form.reset();
        modal.close();
    });
}

/* ================= UTIL ================= */

function calcularEdad(fecha) {
    if (!fecha) return "N/A";
    const diff = Date.now() - new Date(fecha).getTime();
    const edad = new Date(diff).getUTCFullYear() - 1970;
    return edad + " años";
}