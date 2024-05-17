<?php require_once "application/views/static/Header.php"; ?>
<style>
.text-bg-danger {
    background-color: red;
    color: white; /* Asegúrate de que el texto sea legible sobre el fondo rojo */
    padding: 5px 10px; /* Ajusta el padding según sea necesario */
 /* Agrega cualquier otra propiedad de estilo que desees */
}
</style>
<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <?php foreach ($productos_agrupados as $id_producto => $productos): ?>
            <div class="col-lg-6">
                <div class="card shadow p-3 mb-5 bg-body rounded" style="background-color: white;">
                    <div class="card-body">
                        <?php $primer_producto = reset($productos); ?>
                        <h1 class="card-title"><strong></strong> <?php echo $primer_producto->nombre_producto; ?></h1>
                        <p class="card-text-cbarra"><strong></strong> <?php echo $primer_producto->cbarra; ?></p>

                        <?php if ($primer_producto->descripcionvisible === 't' && $primer_producto->descripcion != "" ): ?>
                            <p class="card-text-cbarra"> <?php echo $primer_producto->descripcion; ?></p>
                        <?php endif; ?>
                        <h1 class="text-bg-danger card-text" style=" font-size: 4rem;"><strong>Precio(<?php echo $primer_producto->nombre_corto; ?>):</strong>
                            $<?php echo $primer_producto->total; ?></h1>
                            <?php if ($configuracion['precio_old_act'] === 't' && $primer_producto->precio_old > $primer_producto->total): ?>
                            <p class="card-text precio_old" style="display: inline-block; border-radius:5%; font-size: 2rem;"><del><strong>Precio Anterior:$ <?php echo $primer_producto->precio_old; ?></strong></del></p>
                        <?php endif; ?>
                        <br>
                        <?php if ($configuracion['precio_old_act'] === 't' && $primer_producto->precio_old > $primer_producto->total): ?>
                            <p class="text-bg-danger card-text" style="display: inline-block;    border-radius:40%; font-size: 2rem;"><strong>Ahorro:$</strong><?php echo $primer_producto->precio_old - $primer_producto->total; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    setTimeout(function () {
        window.location.href = '<?php echo base_url() ?>ControladorEscanear/index';
    }, 8000);
</script>

<?php if ($configuracion['dictado_precios'] === 't') : ?>
    <script>
        function speakText(text) {
            const speechSynthesis = window.speechSynthesis;
            const utterance = new SpeechSynthesisUtterance(text);
            speechSynthesis.speak(utterance);
        }

        function speakProductsAutomatically() {
            <?php foreach ($productos_agrupados as $id_producto => $productos): ?>
                <?php $primer_producto = reset($productos); ?>
                <?php if ($configuracion['precio_old_act'] === 't' && $primer_producto->precio_old > $primer_producto->total): ?>
                    speakText("Precio: <?php echo $primer_producto->total; ?> pesos. Ahorras: <?php echo $primer_producto->precio_old - $primer_producto->total; ?> pesos.");
                <?php else: ?>
                    speakText("Precio: <?php echo $primer_producto->total; ?> pesos.");
                <?php endif; ?>
            <?php endforeach; ?>
        }
        speakProductsAutomatically();
    </script>
<?php endif; ?>
