<?php require_once "application/views/static/Header.php"; ?>

<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <?php foreach ($productos_agrupados as $id_producto => $productos): ?>
            <div class="col-lg-6">
                <div class="card shadow p-3 mb-5 bg-body rounded" style="background-color: white;">
                    <div class="card-body">
                        <?php $primer_producto = reset($productos); ?>
                        <h1 class="card-title"><strong></strong> <?php echo $primer_producto->nombre_producto; ?></h1>
                        <p class="card-text-cbarra"><strong></strong> <?php echo $primer_producto->cbarra; ?></p>
                        <br>
                        <h1 class="text-bg-danger card-text" style="font-size: 4rem;"><strong>Precio(<?php echo $primer_producto->nombre_corto; ?>):</strong>
                            $<?php echo $primer_producto->total; ?></h1>
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

<script>
<?php if ($configuracion['dictado_precios'] === 't') : ?>
        function speakText(text) {
            const speechSynthesis = window.speechSynthesis;
            const utterance = new SpeechSynthesisUtterance(text);
            speechSynthesis.speak(utterance);
        }



        function speakProductsAutomatically() {
    <?php foreach ($productos_agrupados as $id_producto => $productos): ?>
        <?php $primer_producto = reset($productos); ?>
                speakText(" Precio: <?php echo $primer_producto->total; ?> pesos.");
    <?php endforeach; ?>
        }


        speakProductsAutomatically();
    </script>
<?php endif; ?>
 