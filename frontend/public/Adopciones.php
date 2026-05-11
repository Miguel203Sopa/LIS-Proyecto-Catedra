<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Adopciones</title>
  <link rel="stylesheet" href="/assets/css/styles.css">
  <link rel="stylesheet" href="/assets/css/Adopciones.css?v=<?= time() ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <section class="Adopcines">
    <div class="contenedor1">
      <div class="conte1-texto1">
        <h1>Encuentra a tu compañero ideal</h1>
        <h2><strong>Adopciones de peluditos</strong></h2>
        <p>
          Cada uno de nuestros rescatados tiene una historia única.
          Hoy solo les falta una cosa: un hogar donde volver a confiar.
        </p>
      </div>

      <div class="imagen">
        <img src="/uploads/negrita.png">
      </div>
    </div>

    <div class="contenedor2">
      <div class="conte2">
        <br>
        <h2>Una misión que cambia vidas</h2>
        <hr>
        <p>
          Adoptar no es solo llevarte una mascota,
          es abrirle la puerta a una nueva vida.
          En esta sección podrás conocer a nuestros peluditos,
          su historia y el proceso para darles un hogar seguro.
        </p>
        <br>

        <div class="contenedorjr">

          <h3>Requisitos para adoptar</h3>
          <br>
          <p>
            Cada adopción es un compromiso de amor y responsabilidad.
            Por eso necesitamos asegurarnos de que cada peludito llegue al lugar correcto.
          </p>

          <ol class="lista-iconos">
            <li><i class="fa-solid fa-heart"></i> El adoptante debe ser mayor de edad.</li>
            <li><i class="fa-solid fa-heart"></i> Contar con un espacio seguro y adecuado.</li>
            <li><i class="fa-solid fa-heart"></i> Completar el formulario de adopción.</li>
            <li><i class="fa-solid fa-heart"></i> Tener estabilidad económica para su cuidado.</li>
            <li><i class="fa-solid fa-heart"></i> Los datos serán verificados por la fundación.</li>
          </ol>

        </div>

        <!-- filtros -->
        <div class="menu-bar">
          <ul>
            <li><a href="#" data-type="especie" data-value="perro">Perros</a></li>
            <li><a href="#" data-type="especie" data-value="gato">Gatos</a></li>
            <li><a href="#" data-type="sexo" data-value="macho">Macho</a></li>
            <li><a href="#" data-type="sexo" data-value="hembra">Hembra</a></li>
            <li><a href="#" id="resetFiltros">Reset</a></li>
          </ul>
        </div>
      </div>

      <!-- tarjetas -->
      <div class="container py-5">
        <div class="row justify-content-center">
          <div class="col-lg-9">
            <div class="row" id="lista-animales">
            </div>
          </div>
        </div>
      </div>

  </section>
  <dialog id="modalAdopcion">
    <form id="formAdopcion">

      <h2 style="text-align:center;">Solicitud de adopción</h2>

      <input type="text" name="nombre" placeholder="Nombre" required>
      <input type="text" name="apellido" placeholder="Apellido" required>
      <input type="text" name="dui" placeholder="DUI" required>
      <input type="email" name="correo" placeholder="Correo" required>
      <input type="tel" name="telefono" placeholder="Teléfono" required>

      <div style="display:flex; gap:10px; justify-content:center; margin-top:10px;">
        <button type="submit">Enviar</button>
        <button type="button" onclick="modalAdopcion.close()">Cancelar</button>
      </div>

    </form>
  </dialog>
  <script src="/assets/js/adopciones.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>