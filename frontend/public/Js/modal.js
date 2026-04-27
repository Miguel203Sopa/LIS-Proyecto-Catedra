const btnabrir = document.querySelector("#btn-abrir-modal");
const btncerrar = document.querySelector("#btn-cerrar-modal");

const modal = document.querySelector("#modal");

btnabrir.addEventListener("click",()=>
{
    modal.showModal();
}
)

btncerrar.addEventListener("click",()=>
{
    modal.close();
}
)