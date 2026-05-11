<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Donaciones</title>

  <link rel="stylesheet" href="/assets/css/styles.css">
  <link rel="stylesheet" href="/assets/css/donaciones.css?v=<?= time() ?>">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <section class="donaciones-page">

    <section class="hero-donaciones">
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <h1>Tu ayuda salva vidas</h1>
        <p>
          Cada donación permite alimentar, rescatar y dar atención médica
          a animales en situación de abandono.
        </p>
      </div>
    </section>

    <section class="contenedor-donaciones">

      <div class="donacion-grid">

        <div class="donacion-card">
          <i class="fa-solid fa-hand-holding-heart"></i>
          <h3>Donaciones bancarias</h3>

          <div class="cuenta">
            <strong>Banco Agrícola</strong>
            <p>Cuenta de ahorros: 003100XXXXXX</p>
          </div>

          <div class="cuenta">
            <strong>Banco Cuscatlán</strong>
            <p>Cuenta corriente: 012XXXXXXXX</p>
          </div>

          <p class="footer-text">A nombre de: Fundación Somos Ángeles</p>
        </div>

        <div class="donacion-card">
          <i class="fa-solid fa-box-open"></i>
          <h3>Donaciones en especie</h3>

          <p>
            Puedes donar alimento, medicinas o artículos de limpieza directamente en nuestro refugio.
          </p>

          <p><strong>Dirección:</strong></p>
          <p>Ahuachapán, municipio El Refugio, colonia El Ángel.</p>
        </div>

      </div>

      <div class="donacion-final">

        <div class="donacion-texto">
          <h2>Sé un héroe</h2>
          <p>
            Cada aporte, por pequeño que sea, ayuda a mejorar la vida de un animal que lo necesita.
          </p>

          <ul>
            <li><i class="fa-solid fa-phone"></i>7682-8728</li>
            <li><i class="fa-solid fa-envelope"></i><a href="mailto:SomosAngelesFundacion20@gmail.com">SomosAngelesFundacion20@gmail.com</a></li>
            <li><i class="fa-brands fa-facebook"></i><a href="https://www.facebook.com/people/Fundacion-de-Proteccion-Animal-Somos-Angeles/100064739051366/" target="_blank">Facebook</a></li>
          </ul>
        </div>

        <div class="donacion-img">
          <img src="/assets/imagenes/PinkBank.png" alt="donaciones">
        </div>

      </div>

    </section>

  </section>

</body>

</html>