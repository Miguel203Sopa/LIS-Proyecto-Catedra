const btnAbrir =
    document.querySelector("#btn-abrir-modal");

const btnCerrar =
    document.querySelector("#btn-cerrar-modal");

const modal =
    document.querySelector("#modal");

/* ================= ABRIR ================= */

if (btnAbrir && modal) {

    btnAbrir.addEventListener("click", () => {

        modal.showModal();
    });
}

/* ================= CERRAR ================= */

if (btnCerrar && modal) {

    btnCerrar.addEventListener("click", () => {

        modal.close();
    });
}

/* ================= CERRAR CLICK AFUERA ================= */

if (modal) {

    modal.addEventListener("click", (e) => {

        const rect =
            modal.getBoundingClientRect();

        const dentro =
            (
                e.clientX >= rect.left &&
                e.clientX <= rect.right &&
                e.clientY >= rect.top &&
                e.clientY <= rect.bottom
            );

        if (!dentro) {

            modal.close();
        }
    });
}