<?php
require_once __DIR__ . '/../../clases/Auth.php';
Auth::check();

$usuario = Auth::user();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel Admin</title>

    <link rel="shortcut icon" href="/assets/imagenes/Puppy.png">
    <link rel="stylesheet" href="/assets/css/admin.css?v=<?= time() ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body>

    <?php include __DIR__ . '/navbar.php'; ?>

    <div class="panel-container">
        <div class="bienvenida">
            ¡Hola, <?= htmlspecialchars($usuario['nombre'] . ' ' . $usuario['apellido']); ?>!
        </div>

        <div class="grid">
            <a href="G_Animales.php" class="card-btn">
                <i class="fas fa-paw"></i>
                <div>Gestionar animales del refugio</div>
            </a>

            <a href="G_Usuarios.php" class="card-btn">
                <i class="fas fa-users-cog"></i>
                <div>Gestionar usuarios del sistema</div>
            </a>

            <a href="G_Voluntariado.php" class="card-btn">
                <i class="fas fa-handshake-angle"></i>
                <div>Ver solicitudes de voluntariado</div>
            </a>

            <a href="G_Adopcion.php" class="card-btn">
                <i class="fas fa-heart-circle-check"></i>
                <div>Ver solicitudes de adopción</div>
            </a>
        </div>
    </div>

</body>
</html>