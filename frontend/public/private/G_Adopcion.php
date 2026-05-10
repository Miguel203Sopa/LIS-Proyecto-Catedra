<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Admin - Adopciones</title>
    <link rel="stylesheet" href="/assets/css/admin.css?v=<?= time() ?>">
</head>

<body>
    <?php include __DIR__ . '/navbar.php'; ?>
    <div id="content-body" class="container">
        <div class="contenedor-cristal">
            <h1>Control de Adopciones</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Adopción</th>
                        <th>ID Animal</th>
                        <th>ID Persona</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</body>

</html>