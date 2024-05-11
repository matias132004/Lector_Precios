<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.min.css">
        <style>
            body {
                background-color: red;
            }

            .card-title{
                font-size: 70px;
            }
            .card-text {
                font-size: 60px;
            }
            .card-text-cbarra{
                font-size: 30px;
            }
            input{
                border: 0;
                outline: none;
                &:focus{
                    border: none;
                }
                &:active{
                    border: none;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right mb-6">
                    <a href="<?php echo base_url() ?>ControladorSumar/eliminarListaProvisional" class="btn btn-danger btn-lg">Salir</a>
                </div>


                <div class="col-lg-6">
                    <div class="card" style="width: 40rem; background-color: white; margin-top:30px">
                        <div class="card-body">
                            <h1 class="card-text-cbarra text-center">Escanee su producto</h1>
                        </div>
                        <div class="text-center">
                            <form id="scanForm" action="<?php echo base_url() ?>ControladorSumar/sumar" method="post" class="">
                                <input type="text" name="cbarra" id="cbarra" class="transparent-input" autofocus>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <?php if (isset($productos_temporales) && !empty($productos_temporales)): ?>
                        <div class="card" style="width: 40rem; background-color: white; margin-top:30px">
                            <div class="card-body">
                                <h1 class="card-title text-center">Productos Escaneados</h1>
                                <table id="tablaProductos" class="table">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyProductos">
                                        <?php
                                        $total = 0;
                                        foreach ($productos_temporales as $producto):
                                            $total += $producto['precio']; 
                                            ?>
                                            <tr>
                                                <td><?php echo $producto['nombre']; ?></td>
                                                <td><?php echo $producto['precio']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2"><strong>Total:</strong></td>
                                            <td id="total">$<?php echo number_format($total, 2); ?></td> 
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <script>
            setInterval(function () {
                document.getElementById('cbarra').focus();
            }, 2000);
        </script>
        <script>
            window.onload = function () {
                document.getElementById('cbarra').focus();
            };
        </script>
        <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    </body>
</html>
