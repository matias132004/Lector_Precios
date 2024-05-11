<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.min.css"> <!-- Corrección aquí -->
    <style>
        body {
            background-color: red;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-lg-6">
            <div class="card" style="width: 40rem; background-color: white;">
                <div class="card-body">
                    <h1 class="card-title text-center">No se encuentro el producto, intente nuevamente.</h1>
                </div>
                 </div>
             </div>
         </div>
     </div>
        <script>
            setTimeout(function () {
                window.location.href = '<?php echo base_url() ?>ControladorSumar/index';
            }, 2000);
        </script>
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    
</body>

</html>
