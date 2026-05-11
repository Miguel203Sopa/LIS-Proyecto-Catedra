<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("Location: /private/dashboard.php");
    exit;
}

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $data = [
        "correo" => $email,
        "password" => $password
    ];

    $options = [
        "http" => [
            "header" => "Content-Type: application/json",
            "method" => "POST",
            "content" => json_encode($data),
            "ignore_errors" => true
        ]
    ];

    $context = stream_context_create($options);

    $response = file_get_contents(
        "http://localhost:3001/api.php/auth/login",
        false,
        $context
    );

    if ($response !== false) {

        $result = json_decode($response, true);

        if ($result && isset($result['success']) && $result['success']) {

            require_once __DIR__ . '/../clases/Session.php';
            Session::login($result['usuario']);

            header("Location: /private/dashboard.php");
            exit;
        }
    }

    $error = "Correo o contraseña incorrectos";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Fundación Somos Ángeles - Login</title>
    <link rel="shortcut icon" href="/imagenes/Puppy.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/inicio.css">

</head>

<body>
    <div class="container">
        <div class="form-box login">
            <form method="POST">
                <h1>
                    <i class="fa-solid fa-paw"></i>
                    Login
                </h1>
                <p>Bienvenido nuevamente</p>
                <hr>

                <?php if ($error): ?>

                    <div class="alert alert-danger">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger text-center">
                        <?php
                        switch ($_GET['error']) {
                            case 'sesion':
                                echo "Debes iniciar sesión para acceder al panel.";
                                break;
                            case 'permiso':
                                echo "No tienes permisos para acceder a esa sección.";
                                break;
                        }
                        ?>
                    </div>
                <?php endif; ?>

                <div class="input-box">
                    <input type="email" name="email" placeholder="Ingrese su correo" required>
                    <i class="fa-solid fa-envelope"></i>
                </div>

                <div class="input-box">
                    <input type="password" name="password" placeholder="Ingrese contraseña" required>
                    <i class="fa-solid fa-lock"></i>
                </div>

                <button type="submit" class="btn">
                    <i class="fa-solid fa-right-to-bracket"></i>Iniciar sesión
                </button>

                <div class="ingresar">
                    <a href="index.php">
                        <i class="fa-solid fa-arrow-left"></i>Volver al inicio
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>