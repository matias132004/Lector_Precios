<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lector de Precios</title>
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.min.css">
        <style>
            body {
                /* Definir el degradado */
                display: flex;
                justify-content: center;
                align-items: center;
            }

            /* Estilo para los cards */
            .card {
                transition: transform 0.3s;
                border-radius: 10%;
                box-shadow: 10px 5px 5px grey;
            }

            /* Estilo para el SVG */
            .svg-transparent {
                transition: opacity 0.3s;
            }

            /* Estilo para el card activo */
            .card-active {
                transform: scale(1.1);
            }

            /* Estilo para el SVG en el card activo */
            .card-active .svg-transparent {
                color: #f12711;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <div class="card" onmouseover="growCard(this)" onmouseout="shrinkCards()">
                        <div class="card-body text-center">
                            <!-- SVG para el icono de escáner -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" class="bi bi-box-arrow-in-down svg-transparent" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1z"/>
                            <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                            </svg>
                            <h5 class="card-title mt-2">Escáner</h5>
                            <?php if ($configuracion['scaner'] === 't') { ?>
                            <a href="<?php echo base_url() ?>ControladorEscanear/index" class="stretched-link"></a> <!-- Mantener la funcionalidad del enlace -->
                            <?php } else { ?>
                                <a href="#" class="stretched-link" onclick="openModal2(); return false;"></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card" onmouseover="growCard(this)" onmouseout="shrinkCards()">
                        <div class="card-body text-center">
                            <!-- SVG para el icono de promoción -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" class="bi bi-cart-check svg-transparent" viewBox="0 0 16 16">
                            <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                            </svg>
                            <h5 class="card-title mt-2">Promoción</h5>
                            <?php if ($configuracion['promocion_act'] === 't') { ?>
                                <a href="<?php echo base_url() ?>ControladorPromocion/index" class="stretched-link"></a>
                            <?php } else { ?>
                                <a href="#" class="stretched-link" onclick="openModal(); return false;"></a>
                            <?php } ?>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 mt-3"> <!-- Nuevo card para cerrar sesión -->
                    <div class="card" onmouseover="growCard(this)" onmouseout="shrinkCards()">
                        <div class="card-body text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" class="bi bi-power svg-transparent" viewBox="0 0 16 16">
                            <path d="M7.5 1v7h1V1z"/>
                            <path d="M3 8.812a5 5 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812"/>
                            </svg>
                            <h5 class="card-title mt-2">Cerrar Sesión</h5>
                            <a href="<?php echo base_url() ?>ControladorLogin/logout" class="stretched-link"></a> <!-- Mantener la funcionalidad del enlace -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Contratación del Modulo Promociones</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Para Adquirir este servicio, Contacte a 9 40676939. o ingrese a nuestra pagina web.
                    </div>
                    <div class="modal-footer">
                        <a href="https://datamaule.cl/"><button class="btn btn-outline-success">Ir a la pagina web.</button></a>
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Contratación del Modulo de escaner de productos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Para Adquirir este servicio, Contacte a 9 40676939. o ingrese a nuestra pagina web.
                    </div>
                    <div class="modal-footer">
                        <a href="https://datamaule.cl/"><button class="btn btn-outline-success">Ir a la pagina web.</button></a>
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openModal() {
            $('#myModal').modal('show');
        }
    </script>
       <script>
        function openModal2() {
            $('#myModal2').modal('show');
        }
    </script>

    <script>
        function growCard(card) {
            // Agregar la clase 'card-active' al card sobre el cual se pasa el mouse
            card.classList.add('card-active');
            // Obtener todos los cards
            const cards = document.querySelectorAll('.card');
            // Iterar sobre los cards y reducir su tamaño excepto el card activo
            cards.forEach(function (element) {
                if (element !== card) {
                    element.style.transform = 'scale(0.9)';
                }
            });
        }

        function shrinkCards() {
            // Remover la clase 'card-active' de todos los cards
            const cards = document.querySelectorAll('.card');
            cards.forEach(function (element) {
                element.classList.remove('card-active');
                element.style.transform = 'scale(1)';
            });
        }
    </script>

    <script src="<?php echo base_url() ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>/dist/js/adminlte.min.js"></script>
</body>
</html>
