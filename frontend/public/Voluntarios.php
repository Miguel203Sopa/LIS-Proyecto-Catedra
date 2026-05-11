<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voluntarios</title>

    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/voluntarios.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <section class="voluntarios-page">
        <section class="hero-voluntarios">
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1>Cambia la vida de un angelito</h1>
                <p>
                    Cada voluntario representa una nueva oportunidad
                    para perros y gatos que han sufrido abandono,
                    maltrato o enfermedad.
                </p>
                <button class="btn btn-primary btn-lg" id="btn-hero-voluntario">
                    <i class="fa-solid fa-handshake-angle"></i>
                    Quiero ayudar
                </button>
            </div>
        </section>

        <section class="contenedor-voluntarios">
            <div class="intro-grid">
                <div class="intro-card">
                    <i class="fa-solid fa-paw"></i>
                    <h3>Rescate animal</h3>
                    <p>
                        Participa en jornadas de rescate,
                        alimentación y recuperación
                        de animales vulnerables.
                    </p>
                </div>

                <div class="intro-card">
                    <i class="fa-solid fa-house-medical"></i>
                    <h3>Apoyo en refugio</h3>
                    <p>
                        Ayuda en limpieza,
                        organización,
                        cuidado y recreación
                        dentro del refugio.
                    </p>
                </div>
                <div class="intro-card">
                    <i class="fa-solid fa-bullhorn"></i>
                    <h3>Concientización</h3>
                    <p>
                        Sé parte de campañas
                        educativas y eventos
                        para promover la adopción responsable.
                    </p>
                </div>
            </div>
        </section>

        <section class="galeria-section">
            <div class="galeria-texto">
                <h2>Un pequeño acto puede cambiarlo todo</h2>
                <p>
                    Nuestros voluntarios son el corazón
                    de cada rescate, tratamiento y adopción.
                    Gracias a ellos, muchos animales
                    han encontrado esperanza.
                </p>
            </div>
            <div class="galeria-grid">
                <img src="uploads/anuel.png" alt="Anuel">
                <img src="uploads/cami.png" alt="Cami">
                <img src="uploads/oreo.png" alt="Oreo">
                <img src="uploads/malcon.png" alt="Malcon">
            </div>
        </section>

        <section class="cta-section">
            <div class="cta-box">
                <h2>Sé parte del cambio</h2>
                <p>
                    Tu tiempo,
                    empatía y dedicación
                    pueden transformar vidas.
                </p>
                <button class="btn btn-primary btn-lg" id="btn-abrir-modal">
                    Registrarme como voluntario
                </button>
            </div>
        </section>
    </section>

    <dialog id="modalVoluntario">
        <form id="formVoluntario">
            <div class="modal-header-custom">
                <h2>
                    <i class="fa-solid fa-handshake-angle"></i>
                    Solicitud de voluntariado
                </h2>
            </div>

            <div class="grid-form">
                <div class="field">
                    <label>Nombre *</label>
                    <input type="text" name="nombre" required>
                </div>

                <div class="field">
                    <label>Apellido *</label>
                    <input type="text" name="apellido" required>
                </div>

                <div class="field">
                    <label>Teléfono *</label>
                    <input type="tel" name="telefono" required>
                </div>

                <div class="field">
                    <label>DUI *</label>
                    <input type="text" name="dui" required>
                </div>

                <div class="field full">
                    <label>Correo electrónico *</label>
                    <input type="email" name="correo" required>
                </div>

                <div class="field full">
                    <label>¿Por qué deseas ayudar?</label>
                    <textarea name="motivacion" rows="5"></textarea>
                </div>

            </div>

            <div class="acciones-modal">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-paper-plane"></i>
                    Enviar solicitud
                </button>

                <button type="button" class="btn btn-secondary" id="btn-cerrar-modal">
                    Cancelar
                </button>
            </div>
        </form>
    </dialog>
    <script src="/assets/js/voluntarios.js"></script>

</body>

</html>