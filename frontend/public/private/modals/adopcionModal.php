<!-- ================= MODAL EDITAR ADOPCIÓN ================= -->

<dialog id="modalEditarAdopcion" class="modal-adopcion">

    <div class="modal-header-adopcion">

        <h2>
            <i class="fa-solid fa-pen"></i>
            Editar Adopción
        </h2>

        <button
            type="button"
            class="btn-cerrar-modal"
            onclick="cerrarModalAdopcion()">

            <i class="fa-solid fa-xmark"></i>

        </button>

    </div>

    <form id="formEditarAdopcion">

        <input
            type="hidden"
            id="edit_id_adopcion">

        <div class="grid-modal">

            <!-- ID ANIMAL -->

            <div class="campo-modal">

                <label>ID Animal</label>

                <input
                    type="number"
                    id="edit_id_animal"
                    required>

            </div>

            <!-- ID PERSONA -->

            <div class="campo-modal">

                <label>ID Persona</label>

                <input
                    type="number"
                    id="edit_id_persona"
                    required>

            </div>

            <!-- ESTADO -->

            <div class="campo-modal span-2">

                <label>Estado</label>

                <select id="edit_estado">

                    <option value="en proceso">
                        En proceso
                    </option>

                    <option value="aprobada">
                        Aprobada
                    </option>

                    <option value="rechazada">
                        Rechazada
                    </option>

                </select>

            </div>

            <!-- OBSERVACIONES -->

            <div class="campo-modal span-2">

                <label>Observaciones</label>

                <textarea
                    id="edit_observaciones"
                    rows="5"></textarea>

            </div>

        </div>

        <div class="acciones-modal-adopcion">

            <button
                type="submit"
                class="btn btn-success">

                <i class="fa-solid fa-floppy-disk"></i>
                Guardar cambios

            </button>

            <button
                type="button"
                class="btn btn-secondary"
                onclick="cerrarModalAdopcion()">

                <i class="fa-solid fa-ban"></i>
                Cancelar

            </button>

        </div>

    </form>

</dialog>

<!-- ================= ESTILOS ================= -->

<style>

.modal-adopcion {

    border: none;
    border-radius: 18px;
    padding: 0;
    width: 700px;
    max-width: 95%;
    background: #ffffff;
    box-shadow: 0 10px 35px rgba(0,0,0,0.25);
    overflow: hidden;
}

.modal-adopcion::backdrop {

    background: rgba(0,0,0,0.6);
}

.modal-header-adopcion {

    display: flex;
    justify-content: space-between;
    align-items: center;

    padding: 20px 25px;

    background: linear-gradient(
        135deg,
        #0d6efd,
        #0b5ed7
    );

    color: white;
}

.modal-header-adopcion h2 {

    margin: 0;
    font-size: 24px;
}

.btn-cerrar-modal {

    border: none;
    background: transparent;
    color: white;
    font-size: 22px;
    cursor: pointer;
}

.grid-modal {

    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;

    padding: 25px;
}

.campo-modal {

    display: flex;
    flex-direction: column;
}

.campo-modal label {

    font-weight: 600;
    margin-bottom: 8px;
    color: #333;
}

.campo-modal input,
.campo-modal select,
.campo-modal textarea {

    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 12px;
    font-size: 15px;
    transition: 0.2s;
}

.campo-modal input:focus,
.campo-modal select:focus,
.campo-modal textarea:focus {

    outline: none;
    border-color: #0d6efd;
    box-shadow: 0 0 8px rgba(13,110,253,0.25);
}

.span-2 {

    grid-column: span 2;
}

.acciones-modal-adopcion {

    display: flex;
    justify-content: flex-end;
    gap: 12px;

    padding: 20px 25px;

    border-top: 1px solid #eee;
    background: #fafafa;
}

</style>