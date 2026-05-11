<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Inicio</title>

  <link rel="stylesheet" href="/assets/css/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      background: transparent;
    }

    .hero-slide {
      min-height: 75vh;
      display: flex;
      align-items: center;
    }

    .hero-text h1 {
      font-size: 2.5rem;
      font-weight: 800;
      color: #1f2d3d;
    }

    .hero-text h2 {
      font-size: 1.3rem;
      color: #2e4ead;
      margin-top: 8px;
    }

    .hero-text p {
      margin-top: 12px;
      color: #444;
      line-height: 1.6;
    }

    .hero-img img {
      width: 100%;
      max-width: 420px;
      border-radius: 18px;
      box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    }

    .carousel-indicators [data-bs-target] {
      background-color: #2e4ead;
    }

    .badge-soft {
      display: inline-block;
      padding: 6px 10px;
      background: rgba(46,78,173,0.1);
      color: #2e4ead;
      border-radius: 10px;
      font-size: 12px;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>

<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">

  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2"></button>
  </div>

  <div class="carousel-inner">

    <!-- SLIDE 1 -->
    <div class="carousel-item active">
      <div class="container hero-slide">
        <div class="row align-items-center">

          <div class="col-md-6 hero-text">
            <span class="badge-soft">Rescate y rehabilitación</span>
            <h1>Perros sin hogar, una segunda oportunidad</h1>
            <h2>Refugio de animales en El Salvador</h2>
            <p>
              Rescatamos animales en situación de abandono, los rehabilitamos y les devolvemos la confianza que perdieron.
              Cada uno tiene una historia, y cada historia puede cambiar.
            </p>
          </div>

          <div class="col-md-6 text-center hero-img">
            <img src="/uploads/nena.png" alt="Rescate">
          </div>

        </div>
      </div>
    </div>

    <!-- SLIDE 2 -->
    <div class="carousel-item">
      <div class="container hero-slide">
        <div class="row align-items-center">

          <div class="col-md-6 hero-text">
            <span class="badge-soft">Impacto real</span>
            <h1>Adoptar no cambia una vida… cambia dos</h1>
            <h2>La tuya y la suya</h2>
            <p>
              Cada adopción libera espacio para salvar otro animal.
              Lo que para ti es un compañero, para ellos es una nueva oportunidad de vivir sin miedo.
            </p>
          </div>

          <div class="col-md-6 text-center hero-img">
            <img src="/uploads/mimi.png" alt="Impacto">
          </div>

        </div>
      </div>
    </div>

    <!-- SLIDE 3 -->
    <div class="carousel-item">
      <div class="container hero-slide">
        <div class="row align-items-center">

          <div class="col-md-6 hero-text">
            <span class="badge-soft">Adopción</span>
            <h1>Encuentra a tu compañero ideal</h1>
            <h2>Ellos están listos para un hogar</h2>
            <p>
              Conoce a nuestros peluditos, revisa su historia y da el paso.
              Adoptar no es solo llevarte una mascota, es abrir una familia.
            </p>
          </div>

          <div class="col-md-6 text-center hero-img">
            <img src="/uploads/dottyto.png" alt="Adopción">
          </div>

        </div>
      </div>
    </div>

  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>