<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Voluntarios</title>

    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/donaciones.css">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>

        body {

            margin: 0;
            padding: 0;
            background: transparent;
        }

        dialog {

            border: none;
            border-radius: 16px;
            padding: 25px;
            width: 600px;
            max-width: 95%;
        }

        dialog::backdrop {

            background: rgba(0,0,0,0.5);
        }

        .grid-2 {

            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .span-2 {

            grid-column: span 2;
        }

        .field {

            display: flex;
            flex-direction: column;
        }

        .field input,
        .field textarea {

            padding: 10px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }

        .section-title {

            font-size: 24px;
            font-weight: bold;
        }

    </style>

</head>

<body>

<section class="seccion-donar">

    <div class="donar-banner">

        <h1>Únete con nosotros</h1>

        <p>
            Cada ayuda contribuye a salvar a uno de estos angelitos
            que lo necesitan
        </p>

    </div>

    <div class="donar-contenedor">

        <div class="donar-grid">

            <div class="donar-grid">

                <div class="bloque-fin">

                    <h2>
                        <strong>Uno más de nosotros</strong>
                    </h2>

                    <hr>

                    <p>
                        Para poder llevar a cabo nuestra meta de rescatar
                        a la mayor cantidad de animales en abandono,
                        contar con voluntarios es una prioridad.
                    </p>

                </div>

                <div class="bloque-info1">

                    <img
                        src="/assets/imagenes/Donation.png"
                        alt="donaciones">

                </div>

                <div>

                    <h2>La necesidad de ayudar</h2>

                    <p>
                        Se estima que más de 100,000 animales viven
                        en condiciones precarias en el país.
                    </p>

                </div>

            </div>

            <div class="bloque-info">

                <h2>

                    <i class="fa-solid fa-handshake-angle"></i>
                    Únete con nosotros

                </h2>

                <hr>

                <div class="info-contenido">

                    <p class="titulo">

                        <strong>Únete al cambio</strong>

                    </p>

                    <p class="descripcion">

                        Puedes ser parte de nosotros y ayudar
                        a los angelitos a tener mejores condiciones:

                    </p>

                    <ol class="lista-actividades">

                        <li>
                            <i class="fa-solid fa-handshake-angle"></i>
                            Limpiar zonas del refugio
                        </li>

                        <li>
                            <i class="fa-solid fa-handshake-angle"></i>
                            Ordenar víveres
                        </li>

                        <li>
                            <i class="fa-solid fa-handshake-angle"></i>
                            Bañar a los peluditos
                        </li>

                    </ol>

                </div>

                <div class="info-accion">

                    <p>
                        <strong>¿Te gustaría unirte?</strong>
                    </p>

                    <button
                        id="btn-abrir-modal"
                        class="btn btn-primary">

                        Registrarte

                    </button>

                    <!-- ================= MODAL ================= -->

                    <dialog id="modal">

                        <form id="formVoluntario">

                            <div class="section-title">

                                Información personal

                            </div>

                            <hr>

                            <div class="grid-2">

                                <!-- nombre -->

                                <div class="field">

                                    <label>

                                        Nombre *

                                    </label>

                                    <input
                                        type="text"
                                        name="nombre"
                                        required>

                                </div>

                                <!-- apellido -->

                                <div class="field">

                                    <label>

                                        Apellido *

                                    </label>

                                    <input
                                        type="text"
                                        name="apellido"
                                        required>

                                </div>

                                <!-- telefono -->

                                <div class="field">

                                    <label>

                                        Teléfono *

                                    </label>

                                    <input
                                        type="tel"
                                        name="telefono"
                                        required>

                                </div>

                                <!-- dui -->

                                <div class="field">

                                    <label>

                                        DUI *

                                    </label>

                                    <input
                                        type="text"
                                        name="dui"
                                        required>

                                </div>

                                <!-- correo -->

                                <div class="field span-2">

                                    <label>

                                        Correo electrónico *

                                    </label>

                                    <input
                                        type="email"
                                        name="correo"
                                        required>

                                </div>

                                <!-- motivacion -->

                                <div class="field span-2">

                                    <label>

                                        ¿Por qué deseas ayudar?

                                    </label>

                                    <textarea
                                        name="motivacion"
                                        rows="4"></textarea>

                                </div>

                                <!-- botones -->

                                <div
                                    class="field span-2 d-flex gap-2 mt-3">

                                    <button
                                        type="submit"
                                        class="btn btn-primary">

                                        Enviar solicitud

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

                </div>

            </div>

        </div>

    </div>

</section>

<script src="/assets/js/voluntarios.js"></script>

</body>
</html>