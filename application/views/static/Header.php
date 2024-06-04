<?php include('application/config/routes.php'); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lector Precios</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.min.css">
    <style>
        body {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            height: 100vh;
            overflow: hidden;
            margin: 0;
            background-image: url(<?php echo base_url() ?>/assets/images/fondo_datamaule.jpg);
        }

        .navbar {
            height: 80px;
        }

        #supermercadoTitle {
            font-size: 2em;
            color: black;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            white-space: nowrap;
        }

        .fade-out {
            animation: fadeOut 5s forwards;
        }

        .fade-in {
            animation: fadeIn 5s forwards;
            opacity: 0;
        }

        @keyframes fadeOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }

            to {
                transform: translateX(-100%);
                opacity: 0;
            }
        }

        @keyframes fadeIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url() ?>ControladorMenu/index">
                <?php if (!empty($img_logo)) : ?>
                    <?php foreach ($img_logo as $logo) : ?>
                        <img src="<?php echo $url_Aministrador ?>uploads/DatosLocal/<?php echo $logo->nombre; ?>" alt="Mi Logo" class="img-fluid" style="max-width: 60px;">
                    <?php endforeach; ?>
                <?php endif; ?>
            </a>
            <?php $fila = $datosLocal ?>
            <h3 id="supermercadoTitle" class="fade-out">
                <?php echo $fila['nombre_local'] . ' - ' . $fila['descripcion'] ?>
            </h3>
        </div>
    </nav>
    <?php if (!empty($imagenes) && isset($configuracion['imagen_act']) && $configuracion['imagen_act'] === 't') : ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const imagenesFondo = [
                    <?php foreach ($imagenes as $imagen) : ?> '<?php echo $url_Aministrador . "/uploads/DatosLocal/" . $imagen->nombre; ?>',
                    <?php endforeach; ?>
                ];

                let currentIndex = 0;
                const bodyElement = document.body;
                const titleElement = document.getElementById('supermercadoTitle');

                function changeBackgroundImage() {
                    // Cambia la imagen de fondo
                    bodyElement.style.backgroundImage = `url(${imagenesFondo[currentIndex]})`;
                    currentIndex = (currentIndex + 1) % imagenesFondo.length;
                }

                // Cambia la imagen de fondo cada 3 segundos
                setInterval(changeBackgroundImage, 3000);
            });
        </script>
    <?php endif; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const titleElement = document.getElementById('supermercadoTitle');
            const titleText = titleElement.innerText.split('');

            function animateText() {
                titleElement.classList.remove('fade-out');
                titleElement.classList.add('fade-in');
                titleElement.innerText = '';

                let index = 0;
                const intervalId = setInterval(function() {
                    if (index >= titleText.length) {
                        clearInterval(intervalId);
                        setTimeout(function() {
                            titleElement.classList.remove('fade-in');
                            titleElement.classList.add('fade-out');
                            setTimeout(animateText, 1000); // Restart animation after delay
                        }, 7000);
                        return;
                    }

                    if (titleText[index] !== ' ') {
                        titleElement.innerText += titleText[index];
                    } else {
                        titleElement.innerHTML += '&nbsp;';
                    }
                    index++;
                }, 140);
            }

            animateText();
        });
    </script>
</body>

</html>