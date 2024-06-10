<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promociones</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.min.css">
    <style>
        <?php $fila = $configuraciones; ?>

        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: <?php echo $fila->colorprincipal; ?>;
            font-family: <?php echo $fila->nombre_fuente; ?>;
        }

        .producto-info {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 2s;
        }

        .producto-info.visible {
            opacity: 1;
        }

        .producto-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <div class="producto-info visible">
        <img src="" alt="Producto" class="producto-img">
    </div>

    <script>
        var promociones = <?php echo json_encode($promociones); ?>;
        var currentIndex = 0;
        var productoInfo = document.querySelector('.producto-info');
        var productoImg = document.querySelector('.producto-img');

        function cambiarPromocion() {
            if (promociones.length === 0) return;

            var promocion = promociones[currentIndex];
            var imagenUrl = 'http://192.168.1.90/AdministradorLector/uploads/Promocion/' + (promocion.nombre || 'not_found.png');

            productoInfo.classList.remove('visible');
            setTimeout(function() {
                productoImg.src = imagenUrl;
                productoInfo.classList.add('visible');
            }, 2000);

            currentIndex = (currentIndex + 1) % promociones.length;
        }

        cambiarPromocion();
        setInterval(cambiarPromocion, <?php echo $fila->tiempoespera; ?>);

        setTimeout(function() {
            location.reload();
        }, 30 * 60 * 1000);
    </script>

    <script src="<?php echo base_url() ?>assets/js/jquery-3.6.4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
</body>
</html>
