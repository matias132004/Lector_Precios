<?php require_once "application/views/static/Header.php"; ?>
<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <?php foreach ($productos_agrupados as $id_producto => $productos) : ?>
            <div class="col-lg-7">
                <div class="card shadow p-3 mb-5 bg-body rounded" style="background-color: white;">
                    <div class="card-body">
                        <?php $primer_producto = reset($productos); ?>
                        <h1 class="card-title"><strong></strong> <?php echo $primer_producto->nombre_producto; ?></h1>
                        <p class="card-text-cbarra"><strong></strong> <?php echo $primer_producto->cbarra; ?></p>

                        <?php if ($primer_producto->descripcionvisible === 't' && $primer_producto->descripcion != "") : ?>
                            <p class="card-text-cbarra"> <?php echo $primer_producto->descripcion; ?></p>
                        <?php endif; ?>
                        <h1 class="text-bg-danger card-text" style=" font-size: 4rem;"><strong>Precio(<?php echo $primer_producto->nombre_corto; ?>):</strong>
                            $<?php echo $primer_producto->total; ?></h1>
                        <?php if ($configuracion['precio_old_act'] === 't' && $primer_producto->precio_old > $primer_producto->total) : ?>
                            <p class="card-text precio_old" style="display: inline-block; border-radius:5%; font-size: 2rem;"><del><strong>Precio Anterior:$ <?php echo $primer_producto->precio_old; ?></strong></del></p>
                        <?php endif; ?>
                        <br>
                        <?php if ($configuracion['precio_old_act'] === 't' && $primer_producto->precio_old > $primer_producto->total) : ?>
                            <p class="text-bg-danger card-text" style="display: inline-block; border-radius:5%; font-size: 2rem;"><strong>Ahorro:$</strong><?php echo $primer_producto->precio_old - $primer_producto->total; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <?php if ($configuracion['venta_volumen'] === 't') : ?>
            <?php if (!empty($precio_volumen)) : ?>
                <div class="col-lg-5">
                    <div class="card shadow p-3 mb-5 bg-body rounded  bg-danger">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="idTabla" class="table table-bordered-lg">
                                    <thead>
                                        <tr>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Precio Unitario</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($precio_volumen as $precio) : ?>
                                            <tr>
                                                <td>desde <?= $precio['desde'] ?> productos hasta <?= $precio['hasta'] ?></td>
                                                <td>$<?= $precio['precio'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        <?php endif; ?>
    </div>


    <script>
        setTimeout(function() {
            window.location.href = '<?php echo base_url() ?>ControladorEscanear/index';
        }, <?php echo (int)($configuracion['tiempoespera']); ?>);
    </script>


    <?php if ($configuracion['dictado_precios'] === 't') : ?>
        <script>
            function speakText(text) {
                const speechSynthesis = window.speechSynthesis;
                const utterance = new SpeechSynthesisUtterance(text);
                speechSynthesis.speak(utterance);
            }

            function speakProductsAutomatically() {
                <?php foreach ($productos_agrupados as $id_producto => $productos) : ?>
                    <?php $primer_producto = reset($productos); ?>
                    <?php if ($configuracion['precio_old_act'] === 't' && $primer_producto->precio_old > $primer_producto->total) : ?>
                        speakText("Precio: <?php echo $primer_producto->total; ?> pesos. Ahorras: <?php echo $primer_producto->precio_old - $primer_producto->total; ?> pesos.");
                    <?php else : ?>
                        speakText("Precio: <?php echo $primer_producto->total; ?> pesos.");
                    <?php endif; ?>
                <?php endforeach; ?>
            }
            speakProductsAutomatically();
        </script>
    <?php endif; ?>