<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Voluntarios</title>
  <link rel="stylesheet" href="/assets/css/styles.css">
  <link rel="stylesheet" href="/assets/css/donaciones.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      background: transparent;
    }
  </style>
</head>

<body>

  <section class="seccion-donar">
    <div class="donar-banner">
      <h1>Unete con nosotros</h1>
      <p>Cada ayuda contribuye a salvar a uno de estos angelitos que lo necesitan</p>
    </div>

    <div class="donar-contenedor">
      <div class="donar-grid">

 <div class="donar-grid">
      <div class="bloque-fin">
        <h2><strong>Uno mas de nosotros</strong></h2>
        <hr>
        <p>Para poder llevar a acabo nuestro meta de recatar a la mayor cantidad de animales en estado en abondono,
          contar con la mayor cantidad de personas posibles una prioridad para nosotros conoce la realidad del voluntariado con nosotros.
        </p>
      </div>
      <div class="bloque-info1">
        <img src="/assets/imagenes/Donation.png" alt="donaciones">
      </div>
      <div>
        <h2>La necesidad de ayudar</h2>
        <p>A pesar que en el pais no se lleve un control sobre la cantidad de animales en situacion de calle, se estima que mas
          de 100,000 animales viven en condiciones precarias en el pais.
        </p>
      </div>
    </div>
        <div class="bloque-info">
          <h2><i class="fa-solid fa-handshake-angle"></i> Únete con nosotros</h2>
          <hr>
          <div class="info-contenido">
            <p class="titulo"><strong>Únete al cambio</strong></p>
            <p class="descripcion">
              Puedes ser parte de nosotros y ayudar a los angelitos a tener mejores condiciones:
            </p>
            <ol class="lista-actividades">
              <li><i class="fa-solid fa-handshake-angle"></i> Limpiar zonas del refugio</li>
              <li><i class="fa-solid fa-handshake-angle"></i> Ordenar víveres</li>
              <li><i class="fa-solid fa-handshake-angle"></i> Bañar a los peluditos</li>
            </ol>
          </div>
          <div class="info-accion">
            <p><strong>¿Te gustaría unirte?</strong></p>
            <button id="btn-abrir-modal" class="btn btn-primary">Reguistrate</button>

              <dialog class="section" id="modal">

    <form id="formVoluntario">

        <div class="section-title">

            Información personal

        </div>

        <hr>

        <div class="grid-2">

            <!-- nombre -->

            <div class="field">

                <label>

                    Nombre
                    <span class="req">*</span>

                </label>

                <input
                    type="text"
                    name="nombre"
                    required
                    placeholder="Ingrese un nombre">

            </div>

            <!-- apellido -->

            <div class="field">

                <label>

                    Apellido
                    <span class="req">*</span>

                </label>

                <input
                    type="text"
                    name="apellido"
                    required
                    placeholder="Ingrese un apellido">

            </div>

            <!-- telefono -->

            <div class="field">

                <label>

                    Teléfono
                    <span class="req">*</span>

                </label>

                <input
                    type="tel"
                    name="telefono"
                    required
                    placeholder="7000-0000">

            </div>

            <!-- dui -->

            <div class="field">

                <label>

                    DUI

                </label>

                <input
                    type="text"
                    name="dui"
                    placeholder="00000000-0">

            </div>

            <!-- correo -->

            <div class="field span-2">

                <label>

                    Correo electrónico
                    <span class="req">*</span>

                </label>

                <input
                    type="email"
                    name="correo"
                    required
                    placeholder="correo@ejemplo.com">

            </div>

            <!-- password -->

            <div class="field">

                <label>

                    Contraseña

                </label>

                <input
                    type="password"
                    id="password"
                    required
                    placeholder="Contraseña segura">

            </div>

            <!-- confirmar -->

            <div class="field">

                <label>

                    Confirmar contraseña

                </label>

                <input
                    type="password"
                    id="confirmPassword"
                    required
                    placeholder="Repetir contraseña">

            </div>

            <!-- botones -->

            <div class="field span-2 d-flex gap-2 mt-3">

                <button
                    type="submit"
                    class="btn btn-primary">

                    Nuevo registro

                </button>

                <button
                    type="button"
                    class="btn btn-secondary"
                    id="btn-cerrar-modal">

                    Cancelar

                </button>

            </div>

        </div>

    </form>

</dialog>            
              
            <script src="/assets/js/modal.js"></script>
          </div>
        </div>

      </div>
    </div>

    <div class="donar-grid">
      <div class="bloque-fin">
        <h2><strong>Se un héroe</strong></h2>
        <hr>
        <p>Ayuda a estos angelitos a tener mejores condiciones en lo que encuentran un nuevo hogar.
          Puedes contactarnos e informarte más sobre las donaciones:
        </p>
        <ul>
          <li><a href="#"><span class="icon"><i class="fa-solid fa-phone"></i></span><span class="title"> Número
                telefónico: 2555-5555</span></a></li>
          <li><a href="#"><span class="icon"><i class="fa-solid fa-envelope"></i></span><span class="title">
                Correotemporal@gmail.com</span></a></li>
          <li><a href="#"><span class="icon"><i class="fa-brands fa-facebook"></i></span><span class="title">
                Facebook</span></a></li>
        </ul>
      </div>
      <div class="bloque-info1">
        <img src="/assets/imagenes/TioSam.png" alt="donaciones">
      </div>
    </div>
  </section>

  <script>
    // Carga el formulario en el iframe del Index padre
    function cargarFormulario() {
      if (window.parent && window.parent !== window) {
        window.parent.cargarPagina('formulario.php', null);
      }
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>

const API =
    "http://localhost:3001/api.php/personas";

document
    .getElementById("formVoluntario")
    .addEventListener("submit", async (e) => {

    e.preventDefault();

    try {

        const form = e.target;

        const password =
            document.getElementById("password").value;

        const confirmPassword =
            document.getElementById("confirmPassword").value;

        if (password !== confirmPassword) {

            alert("Las contraseñas no coinciden");

            return;
        }

        const body = {

            nombre:
                form.nombre.value,

            apellido:
                form.apellido.value,

            dui:
                form.dui.value,

            correo:
                form.correo.value,

            telefono:
                form.telefono.value
        };

        const res = await fetch(API, {

            method: "POST",

            headers: {
                "Content-Type": "application/json"
            },

            body: JSON.stringify(body)
        });

        const json = await res.json();

        if (json.success) {

            alert(
                "Registro realizado correctamente"
            );

            form.reset();

            modal.close();

        } else {

            alert(
                json.msg ||
                "Error registrando"
            );
        }

    } catch (error) {

        console.error(error);

        alert(
            "Error conectando al servidor"
        );
    }
});

</script>
</body>

</html>