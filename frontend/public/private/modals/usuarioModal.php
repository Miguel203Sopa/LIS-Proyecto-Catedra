<dialog id="modalUsuario">

    <h2 id="tituloModal">Nuevo Usuario</h2>

    <input type="hidden" id="id_usuario">

    <div class="form-group">
        <label>ID Persona</label>
        <input type="number" id="id_persona">
    </div>

    <div class="form-group">
        <label>Firebase UID</label>
        <input type="text" id="firebase_uid">
    </div>

    <div class="form-group">
        <label>Rol</label>

        <select id="rol">
            <option value="admin">Admin</option>
            <option value="voluntario">Voluntario</option>
        </select>
    </div>

    <div class="form-group">
        <label>Activo</label>

        <select id="activo">
            <option value="true">Sí</option>
            <option value="false">No</option>
        </select>
    </div>

    <div class="acciones-modal">

        <button onclick="guardarUsuario()">
            Guardar
        </button>

        <button onclick="cerrarModal()">
            Cancelar
        </button>

    </div>

</dialog>