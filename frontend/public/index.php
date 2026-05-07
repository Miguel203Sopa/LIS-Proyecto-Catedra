<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Fundacion de Proteccion animales Somos Angeles</title>
  <link rel="shortcut icon" href="/Imagenes/Puppy.png">
  <link rel="stylesheet" href="/Css/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .main_container {
      padding: 0 !important;
      overflow: hidden;
    }
    .content-frame {
      width: 100%;
      height: calc(100vh - 60px);
      border: none;
      display: block;
    }
  </style>
</head>
<body>

<div class="wrapper">

  <div class="top_navbar">
    <div class="hamburger">
      <div class="one"></div>
      <div class="two"></div>
      <div class="three"></div>
    </div>
    <div class="top_menu">
      <div class="logo">
        <img src="Imagenes/Screenshot 2026-02-08 184854.png">
      </div>
      <ul>
        <li>
          <a href="#" class="icon">
            <i class="fa-solid fa-gear"></i>
          </a>
        </li>
        <li>
          <a href="#" class="icon">
            <i class="fas fa-bell"></i>
          </a>
        </li>
        <li>
          <a href="#" class="icon">
            <i class="fa-solid fa-user"
               data-bs-toggle="popover"
               data-bs-html="true"
               data-bs-content="<a href='login.php'>Usuario</a><br><a href='#'>Iniciar sesión</a>">
            </i>
          </a>
        </li>
      </ul>
    </div>
  </div>

  <div class="sidebar">
    <ul>
      <li id="nav-inicio">
        <a href="#" onclick="cargarPagina('inicio.php', 'nav-inicio')">
          <span class="icon"><i class="fa-solid fa-house"></i></span>
          <span class="title">Principal</span>
        </a>
      </li>
      <li id="nav-voluntarios">
        <a href="#" onclick="cargarPagina('Voluntarios.php', 'nav-voluntarios')">
          <span class="icon"><i class="fa-solid fa-handshake-angle"></i></span>
          <span class="title">Voluntarios</span>
        </a>
      </li>
      <li id="nav-adopciones">
        <a href="#" onclick="cargarPagina('Adopciones.php', 'nav-adopciones')">
          <span class="icon"><i class="fas fa-dog"></i></span>
          <span class="title">Adopciones</span>
        </a>
      </li>
      <li id="nav-donaciones">
        <a href="#" onclick="cargarPagina('Donaciones.php', 'nav-donaciones')">
          <span class="icon"><i class="fas fa-hand-holding-heart"></i></span>
          <span class="title">Donaciones</span>
        </a>
      </li>
    </ul>
  </div>

  <div class="main_container">
    <iframe
      id="content-frame"
      class="content-frame"
      src="inicio.php"
      title="Contenido principal">
    </iframe>
  </div>

</div>

<script>
  document.querySelector(".hamburger").addEventListener("click", function () {
    document.querySelector(".wrapper").classList.toggle("sidebar-collapse");
  });

  function cargarPagina(url, navId) {
    document.getElementById('content-frame').src = url;

    document.querySelectorAll('.sidebar ul li').forEach(function(li) {
      li.querySelector('a').classList.remove('active');
    });

    const li = document.getElementById(navId);
    if (li) li.querySelector('a').classList.add('active');

    return false;
  }

  window.addEventListener('DOMContentLoaded', function() {
    document.querySelector('#nav-inicio a').classList.add('active');
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
  const popoverList = [...popoverTriggerList].map(el => new bootstrap.Popover(el));
</script>

</body>
</html>
