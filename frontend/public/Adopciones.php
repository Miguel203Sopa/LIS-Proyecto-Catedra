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
        <img src="/assets/imagenes/Dog example.png" alt="Perro feliz">
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

          <br>

          <ul>

            <li>
              <a href="#"><i class="fa-solid fa-paw"></i> Mascota</a>
              <div class="sub-menu">
                <ul>
                  <li><a href="#">Perro</a></li>
                  <li><a href="#">Gato</a></li>
                </ul>
              </div>
            </li>

            <li>
              <a href="#"><i class="fa-solid fa-mars-and-venus"></i> Género</a>
              <div class="sub-menu">
                <ul>
                  <li><a href="#">Macho</a></li>
                  <li><a href="#">Hembra</a></li>
                </ul>
              </div>
            </li>

            <li>
              <a href="#"><i class="fa-solid fa-ruler"></i> Tamaño</a>
              <div class="sub-menu">
                <ul>
                  <li><a href="#">Pequeño</a></li>
                  <li><a href="#">Mediano</a></li>
                  <li><a href="#">Grande</a></li>
                </ul>
              </div>
            </li>

            <li>
              <a href="#"><i class="fa-solid fa-calendar"></i> Edad</a>
              <div class="sub-menu">
                <ul>
                  <li><a href="#">0 - 3 años</a></li>
                  <li><a href="#">3 - 7 años</a></li>
                  <li><a href="#">7 - 10 años</a></li>
                </ul>
              </div>
            </li>

          </ul>

        </div>

      </div>

      <!-- tarjetas -->
      <div class="container py-5">

        <div class="row justify-content-center">

          <div class="col-lg-9">

            <div class="row">

              <!-- Ficha 1 -->
              <div class="col-12 col-md-4 mb-4">
                <div class="flip-card">
                  <div class="flip-inner">

                    <div class="front text-center">
                      <img src="/assets/imagenes/Dog example.png" class="img-container">
                      <h3>Rafalito</h3>
                      <span>Género: Hembra</span><br>
                      <span>Edad: 4 años</span><br>
                      <span>Tamaño: Mediano</span>
                    </div>

                    <div class="back text-center d-flex flex-column justify-content-center">
                      <h3>Rafalito</h3>
                      <img src="/assets/imagenes/Dog example.png" class="card__img-back">
                      <span>Vacunas: Completas</span>
                      <span>Salud: Estable</span>
                      <span>Historia: Rescatada de abandono</span>
                      <button class="btn btn-outline-dark mt-2">Adoptar</button>
                    </div>

                  </div>
                </div>
              </div>

              <!-- Ficha 2 -->
              <div class="col-12 col-md-4 mb-4">
                <div class="flip-card">
                  <div class="flip-inner">

                    <div class="front text-center">
                      <img src="/assets/imagenes/Dog 3.png" class="img-container">
                      <h3>Rocky</h3>
                      <span>Género: Macho</span><br>
                      <span>Edad: 8 años</span><br>
                      <span>Tamaño: Mediano</span>
                    </div>

                    <div class="back text-center d-flex flex-column justify-content-center">
                      <h3>Rocky</h3>
                      <img src="/assets/imagenes/Dog 3.png" class="card__img-back">
                      <span>Vacunas: Completas</span>
                      <span>Salud: Estable</span>
                      <span>Historia: Rescatado en calle</span>
                      <button class="btn btn-outline-dark mt-2">Adoptar</button>
                    </div>

                  </div>
                </div>
              </div>

              <!-- Ficha 3 -->
              <div class="col-12 col-md-4 mb-4">
                <div class="flip-card">
                  <div class="flip-inner">

                    <div class="front text-center">
                      <img src="/assets/imagenes/Dog2.png" class="img-container">
                      <h3>Rafita</h3>
                      <span>Género: Hembra</span><br>
                      <span>Edad: 2 años</span><br>
                      <span>Tamaño: Grande</span>
                    </div>

                    <div class="back text-center d-flex flex-column justify-content-center">
                      <h3>Rafita</h3>
                      <img src="/assets/imagenes/Dog2.png" class="card__img-back">
                      <span>Vacunas: Completas</span>
                      <span>Salud: Recuperada</span>
                      <span>Historia: Rescate reciente</span>
                      <button class="btn btn-outline-dark mt-2">Adoptar</button>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>

  </section>
  <dialog id="modalAdopcion">
    <form id="formAdopcion">

      <h3 style="text-align:center;">Solicitud de adopción</h3>

      <div class="field">
        <label>Nombre</label>
        <input name="nombre" required>
      </div>

      <div class="field">
        <label>Apellido</label>
        <input name="apellido" required>
      </div>

      <div class="field">
        <label>DUI</label>
        <input name="dui" required>
      </div>

      <div class="field">
        <label>Teléfono</label>
        <input name="telefono" required>
      </div>

      <div class="field full">
        <label>Correo</label>
        <input name="correo" type="email" required>
      </div>

      <div class="field full">
        <label>Motivo de adopción</label>
        <textarea name="motivo"></textarea>
      </div>

      <div class="acciones-modal">
        <button class="btn btn-primary">Enviar</button>
        <button type="button" class="btn btn-secondary" id="btn-cerrar-adopcion">Cancelar</button>
      </div>

    </form>
  </dialog>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>