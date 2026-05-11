<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (isset($_SESSION['usuario'])) {

    header("Location: /private/dashboard.php");
    exit;
}

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email =
        trim($_POST['email'] ?? '');

    $password =
        trim($_POST['password'] ?? '');

    $data = [
        "correo" => $email,
        "password" => $password
    ];

    $options = [

        "http" => [

            "header" =>
                "Content-Type: application/json\r\n",

            "method" => "POST",

            "content" =>
                json_encode($data),

            "ignore_errors" => true
        ]
    ];

    $context =
        stream_context_create($options);

    /* ================= URL CORRECTA ================= */

    $response =
        @file_get_contents(
            "http://backend/api.php/auth/login",
            false,
            $context
        );

    /* ================= ERROR CONEXION ================= */

    if ($response === false) {

        $errorInfo =
            error_get_last();

        die("<pre>" .
            print_r($errorInfo, true) .
            "</pre>");
    }

    /* ================= RESPUESTA ================= */

    $result =
        json_decode($response, true);

    if (
        $result &&
        isset($result['success']) &&
        $result['success']
    ) {

        require_once __DIR__ . '/../clases/Session.php';

        Session::login(
            $result['usuario']
        );

        header("Location: /private/dashboard.php");
        exit;
    }

    /* ================= ERROR LOGIN ================= */

    $error =
        $result['message']
        ?? 'Correo o contraseña incorrectos';
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>
        Fundación Somos Ángeles - Login
    </title>

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

                <div class="input-box">

                    <input type="email" name="email" placeholder="Ingrese su correo" required>

                    <i class="fa-solid fa-envelope"></i>

                </div>

                <div class="input-box">

                    <input type="password" name="password" placeholder="Ingrese contraseña" required>

                    <i class="fa-solid fa-lock"></i>

                </div>

                <button type="submit" class="btn">

                    <i class="fa-solid fa-right-to-bracket"></i>

                    Iniciar sesión

                </button>
                <a href="index.php" class="btn bg-secondary back-inline" style="margin-top: 10px;">
                    <i class="fa-solid fa-arrow-left"></i> Volver
                </a>

            </form>

        </div>

    </div>

</body>

</html>