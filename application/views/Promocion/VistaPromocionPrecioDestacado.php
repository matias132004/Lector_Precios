<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promociones</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.min.css">
    <style>
         <?php $fila = $configuraciones; ?>
        /* Estilos personalizados para las tarjetas */
        body {
            margin: 0;
            padding: 0;
            color: <?php echo $fila->colorfuenteprincipal; ?>;
            overflow: hidden;
            position: relative;
            background-color:<?php echo $fila->colorprincipal; ?>;
            font-family: <?php echo $fila->nombre_fuente; ?>;
        }

        .super-oferta {
            background-color: <?php echo $fila->colorsecundario; ?>;
            padding: 10px;
            font-size: 60px;
            text-align: center;
            color: <?php echo $fila->colorfuentesecundario; ?>;
            opacity: 0;
            animation: fadeIn 0.3s forwards;
            animation: fadeIn 2s forwards;
        }

        .producto-info {
            padding: 20px;
            text-align: center;
            opacity: 0;
            animation: fadeOut 0.3s forwards;
            animation: fadeOut 3s forwards;
        }

        .producto-info.visible {
            animation: fadeIn 0.3s forwards;
            animation: fadeIn 2s forwards;
        }

        .card-title {
            position: relative;
            margin-top: 5px;
            font-size: 50px;
            margin-bottom: 10px;
            display: inline-block;
        }

        .card-title::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;

            height: 100%;
            background-color:  <?php echo $fila->colorsecundario; ?>;
            z-index: -1;
        }

        .card-title span {
            position: relative;
            color:  <?php echo $fila->colorfuentesecundario; ?>;
        }

        .card-text {
            font-size: 80px;
        }

        .producto-img {
            width: 30%;
            max-width: 30%;
            height: 30%;
            max-height: 30%;
            display: block;
            margin: 0 auto;
        }


        .small-price {
            font-size: 30px;
        }

        .small-ahorro {
            font-size: 30px;
            background-color:  <?php echo $fila->colorsecundario; ?>;
            color: <?php echo $fila->colorfuentesecundario; ?>;
            display: inline-block;
        }

        /* Estilo para el pie de página */
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 100px;
            background-color: <?php echo $fila->colorprincipal; ?>;
            z-index: 9999;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
        @media (orientation: portrait) {
            .producto-img {
                width: 120%;
                max-width: 120%;
                height: 120%;
                max-height: 120%;
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
    <div class="container">
        <div class="super-oferta">
            <h1 class="display-12"> <?php echo $fila->nombre; ?></h1>
        </div>
        <div class="producto-info">
            <h2 class="card-text"><span>${promocion.nombre_producto}</span></h2>
            ${parseFloat(promocion.precio_old) > parseFloat(promocion.total) ? `<h2 class="card-text small-price"><del>Precio Anterior: $${promocion.precio_old}</del></h2>` : ''}
            <h1 class="card-title" style="color:<?php echo $fila->colorfuentesecundario; ?>">Precio Oferta: $${promocion.total}</h1>
                    <br>
            ${parseFloat(promocion.precio_old) > parseFloat(promocion.total) ? `<p class="small-ahorro ">Ahorro: <span class="small-ahorro">$${parseFloat(promocion.precio_old) - parseFloat(promocion.total)}</span></p>` : ''}
            <img src="http://192.168.1.190/AdministradorLector/uploads/Promocion/${promocion.nombre_imagen || 'not_found.png'}" alt="Producto" class="producto-img img-fluid">
            <h2>${promocion.descripcion}</h2>
            <p class="small-price">Promoción válida hasta: ${fechaFinFormato}</p>
        </div>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = '<?php echo base_url() ?>ControladorPromocion/index';
        }, 100000); 
    </script>
    <script>
        var promociones = <?php echo json_encode($promociones); ?>;
        var currentIndex = 0;

        function cambiarPromocion() {
            var promocion = promociones[currentIndex];
            var fechaFin = new Date(promocion.fecha_fin);
            var fechaFinFormato = fechaFin.toLocaleDateString('es-ES', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });

            var productoInfo = document.querySelector('.producto-info');
            productoInfo.innerHTML = `
                    <h2 class="card-text"><span>${promocion.nombre_producto}</span></h2>
                    ${parseFloat(promocion.precio_old) > parseFloat(promocion.total) ? `<h2 class="card-text small-price"><del>Precio Anterior: $${promocion.precio_old}</del></h2>` : ''}
                    <h1 class="card-title" style="color: <?php echo $fila->colorfuentesecundario; ?>">Precio Oferta: $${promocion.total}</h1>
                    <br>
                    ${parseFloat(promocion.precio_old) > parseFloat(promocion.total) ? `<p class="card-text small-ahorro"">Ahorro: <span>$${parseFloat(promocion.precio_old) - parseFloat(promocion.total)}</span></p>` : ''}
                    <img src="http://192.168.1.190/AdministradorLector/uploads/Promocion/${promocion.nombre_imagen || 'not_found.png'}" alt="Producto" class="producto-img img-fluid">
                    <h2>${promocion.descripcion}</h2>
                    <p class="small-price">Promoción válida hasta: ${fechaFinFormato}</p>
                `;

            productoInfo.classList.add('visible');

            setTimeout(function() {
                productoInfo.classList.remove('visible');
            }, 8000);

            currentIndex = (currentIndex + 1) % promociones.length;
        }

        cambiarPromocion();

        setInterval(cambiarPromocion, 15000);

        setTimeout(function() {
            location.reload();
        }, 30 * 60 * 1000);
    </script>

    <script src="<?php echo base_url() ?>assets/js/jquery-3.6.4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
</body>

</html>