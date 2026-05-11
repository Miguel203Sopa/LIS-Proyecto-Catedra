<dialog id="modalUsuario">

    <h2 id="tituloModal">
        Usuario
    </h2>

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

<!-- MODAL PASSWORD -->

<dialog id="modalPassword">

    <h2>
        Cambiar Contraseña
    </h2>

    <input type="hidden" id="password_user_id">

    <div class="form-group">
        <label>Nueva contraseña</label>

        <input
            type="password"
            id="password">
    </div>

    <div class="form-group">
        <label>Confirmar contraseña</label>

        <input
            type="password"
            id="confirmPassword">
    </div>

    <div class="acciones-modal">

        <button onclick="cambiarPassword()">
            Cambiar
        </button>

        <button onclick="cerrarPassword()">
            Cancelar
        </button>

    </div>

</dialog>