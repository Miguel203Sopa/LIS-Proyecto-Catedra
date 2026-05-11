const API = "http://localhost:3001/api.php";

let animalSeleccionado = null;

const modal = document.getElementById("modalAdopcion");
const form = document.getElementById("formAdopcion");

window.abrirAdopcion = function (id) {
    animalSeleccionado = id;
    modal?.showModal();
};

if (modal) {
    modal.addEventListener("click", e => {
        if (e.target === modal) modal.close();
    });
}

if (form) {
    form.addEventListener("submit", async e => {
        e.preventDefault();

        const data = Object.fromEntries(new FormData(form).entries());
        data.id_animal = animalSeleccionado;

        try {
            const res = await fetch(`${API}/adopciones`, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(data)
            });

            const json = await res.json();

            alert(json.message);

            if (json.success) {
                form.reset();
                modal.close();
            }

        } catch (err) {
            console.error(err);
        }
    });
}

document.addEventListener("DOMContentLoaded", cargarAnimales);

async function cargarAnimales() {
    const res = await fetch(`${API}/animales`);
    const json = await res.json();

    const contenedor = document.getElementById("lista-animales");
    contenedor.innerHTML = "";

    json.data.forEach(a => {
        contenedor.innerHTML += `
      <div class="col-12 col-md-4 mb-4 animal-card"
        data-sexo="${a.sexo.toLowerCase()}"
        data-especie="${a.especie.toLowerCase()}">

        <div class="flip-card">
          <div class="flip-inner">

            <div class="front text-center">
              <img src="${a.foto_url}" class="img-container">
              <h3>${a.nombre}</h3>
              <span>${a.sexo}</span>
              <span>${a.estado}</span>
            </div>

            <div class="back text-center d-flex flex-column justify-content-center">
              <h3>${a.nombre}</h3>
              <img src="${a.foto_url}" class="card__img-back">
              <p>${a.descripcion ?? ""}</p>

              <button class="btn btn-dark mt-2"
                onclick="abrirAdopcion(${a.id_animal})">
                Adoptar
              </button>
            </div>

          </div>
        </div>

      </div>
    `;
    });

    activarFiltros();
}

let filtros = {
    especie: null,
    sexo: null
};

function activarFiltros() {

    const botones = document.querySelectorAll(".menu-bar a[data-type]");
    const reset = document.getElementById("resetFiltros");
    const cards = document.querySelectorAll(".animal-card");

    botones.forEach(btn => {

        btn.addEventListener("click", e => {
            e.preventDefault();

            const tipo = btn.dataset.type;
            const valor = btn.dataset.value;

            filtros[tipo] = (filtros[tipo] === valor) ? null : valor;

            actualizarUI(botones);
            aplicarFiltros(cards);
        });

    });

    if (reset) {
        reset.addEventListener("click", e => {
            e.preventDefault();

            filtros.especie = null;
            filtros.sexo = null;

            actualizarUI(botones);
            cards.forEach(c => c.style.display = "");
        });
    }
}

function aplicarFiltros(cards) {

    cards.forEach(card => {

        const sexo = card.dataset.sexo;
        const especie = card.dataset.especie;

        const okSexo = !filtros.sexo || filtros.sexo === sexo;
        const okEspecie = !filtros.especie || filtros.especie === especie;

        card.style.display = (okSexo && okEspecie) ? "" : "none";
    });
}

function actualizarUI(botones) {

    botones.forEach(btn => {

        const tipo = btn.dataset.type;
        const valor = btn.dataset.value;

        if (filtros[tipo] === valor) {
            btn.classList.add("active-filter");
        } else {
            btn.classList.remove("active-filter");
        }

    });
}