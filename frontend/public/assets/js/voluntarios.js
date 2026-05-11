const API =
    "http://localhost:3001/api.php/solicitudes_voluntariado";

const modal =
    document.getElementById("modalVoluntario");

const btnAbrir =
    document.getElementById("btn-abrir-modal");

const btnHero =
    document.getElementById("btn-hero-voluntario");

const btnCerrar =
    document.getElementById("btn-cerrar-modal");

const form =
    document.getElementById("formVoluntario");

/* ================= ABRIR ================= */

btnAbrir.addEventListener("click", () => {

    modal.showModal();

});

btnHero.addEventListener("click", () => {

    modal.showModal();

});

/* ================= CERRAR ================= */

btnCerrar.addEventListener("click", () => {

    modal.close();

});

/* ================= ENVIAR ================= */

form.addEventListener("submit", async (e) => {

    e.preventDefault();

    const btnSubmit =
        form.querySelector("button[type='submit']");

    btnSubmit.disabled = true;

    btnSubmit.innerHTML =
        `<i class="fa-solid fa-spinner fa-spin"></i> Enviando...`;

    try {

        const formData =
            new FormData(form);

        const data =
            Object.fromEntries(formData.entries());

        const res = await fetch(API, {

            method: "POST",

            headers: {
                "Content-Type": "application/json"
            },

            body: JSON.stringify(data)

        });

        const json =
            await res.json();

        if (!json.success) {

            alert(json.message ||
                "Error enviando solicitud");

            return;
        }

        alert(
            "Solicitud enviada correctamente"
        );

        form.reset();

        modal.close();

    } catch (error) {

        console.error(error);

        alert(
            "Error de conexión con el servidor"
        );

    } finally {

        btnSubmit.disabled = false;

        btnSubmit.innerHTML =
            `<i class="fa-solid fa-paper-plane"></i>
            Enviar solicitud`;

    }

});