//este index solo es de prueba q se imprimen bien los datos  q estan en la base


<?php
// index.php

// Solo necesitas llamar al Modelo, el Modelo ya llama a la Conexion
require_once 'FundacionModel.php';

$fundacion = new FundacionModel();
$animales = $fundacion->listarAnimales();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fundación de Rescate</title>
</head>
<body>
    <h1>ANIMALES</h1>
    <ul>
        <?php foreach ($animales as $a): ?>
            <li>
                <strong><?= htmlspecialchars($a['nombre']) ?></strong> 
                (<?= htmlspecialchars($a['especie']) ?> - <?= htmlspecialchars($a['raza']) ?>)
                [Estado: <?= htmlspecialchars($a['estado']) ?>]
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
