<?php
require_once __DIR__ . '/../../clases/Auth.php';
$usuario = Auth::user();
?>

<div class="navbar">
    <div class="logo">
        Panel Administrador
    </div>

    <div class="menu">
        <a href="dashboard.php">Inicio</a>
        <a href="animales.php">Animales</a>
        <a href="usuarios.php">Usuarios</a>

        <span class="usuario">
            <?php echo htmlspecialchars($usuario['nombre'] . ' ' . $usuario['apellido']); ?>
        </span>

        <a href="/logout.php" class="btn-logout" title="Cerrar sesión">
            <i class="fa-solid fa-right-from-bracket"></i>
        </a>
    </div>
</div>