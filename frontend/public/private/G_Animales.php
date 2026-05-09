<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inventario de Animales</title>
    <link rel="stylesheet" href="/assets/css/admin.css?v=<?= time() ?>">
</head>

<body class="Adopciones">
    <main class="container">
        <div class="contenedor-cristal">
            <header class="d-flex justify-content-between align-items-center mb-4">
                <h1>Inventario de Animales</h1>
                <button type="button" class="btn btn-primary"
                    onclick="document.getElementById('modal-form').classList.remove('hidden')">Registrar
                    Rescate</button>
            </header>

            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Sexo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tabla-animales">
                </tbody>
            </table>

            <div id="modal-form" class="hidden mt-4 p-4 border-top">
                <form id="form-animales" onsubmit="guardarNuevo(event)">
                    <h2>Ficha del Animal</h2>
                    <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre" required>
                    <input type="text" name="especie" class="form-control mb-2" placeholder="Especie" required>
                    <select name="sexo" class="form-select mb-2">
                        <option value="macho">Macho</option>
                        <option value="hembra">Hembra</option>
                    </select>
                    <textarea name="estado_salud" class="form-control mb-2" placeholder="Salud"></textarea>
                    <textarea name="descripcion" class="form-control mb-3" placeholder="Descripción"></textarea>
                    <button type="submit" class="btn btn-success">Guardar Registro</button>
                    <button type="button" class="btn btn-secondary"
                        onclick="document.getElementById('modal-form').classList.add('hidden')">Cancelar</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>