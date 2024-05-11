<?php require_once "application/views/static/Header.php"; ?>

<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <!-- Colocar el card en el centro -->
        <div class="col-lg-6">
            <div class="card shadow p-3 mb-5 bg-body rounded" style="background-color: white;">
                <div class="card-body">
                    <h1 class="card-title text-center">Escaneé su producto</h1>
                </div>
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1"/>
                    </svg>

                    <form id="scanForm" action="<?php echo base_url() ?>ControladorPrecioUnico" method="post" class="">
                        <input type="text" name="cbarra" id="cbarra" class="" autofocus>
                    </form>

                </div>
                <div class="text-center mt-3">
                    <button type="button" class="btn btn-outline-primary" id="openKeyboardBtn">  
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-keyboard" viewBox="0 0 16 16">
                            <path d="M14 5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1zM2 4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"/>
                            <path d="M13 10.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm0-2a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm-5 0A.25.25 0 0 1 8.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 8 8.75zm2 0a.25.25 0 0 1 .25-.25h1.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-1.5a.25.25 0 0 1-.25-.25zm1 2a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm-5-2A.25.25 0 0 1 6.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 6 8.75zm-2 0A.25.25 0 0 1 4.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 4 8.75zm-2 0A.25.25 0 0 1 2.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 2 8.75zm11-2a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm-2 0a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm-2 0A.25.25 0 0 1 9.25 6h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 9 6.75zm-2 0A.25.25 0 0 1 7.25 6h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 7 6.75zm-2 0A.25.25 0 0 1 5.25 6h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 5 6.75zm-3 0A.25.25 0 0 1 2.25 6h1.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-1.5A.25.25 0 0 1 2 6.75zm0 4a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm2 0a.25.25 0 0 1 .25-.25h5.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-5.5a.25.25 0 0 1-.25-.25z"/>
                        </svg>
                    </button>
                </div>
            </div>  
        </div>

        <div class="col-lg-6 shadow virtual-keyboard rounded" style="display: none;">
            <div class="card shadow p-3 mb-5 bg-body rounded" style="background-color: white;">
                <div class="card-body">

                    <button type="button" class="btn btn-outline-danger btn-sm mb-3" id="closeKeyboardBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                            <path d="M7.5 1v7h1V1z"/>
                            <path d="M3 8.812a5 5 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812"/>
                        </svg>
                    </button>

                    <!-- Aquí van los botones del teclado numérico -->
                    <div class="row justify-content-center mt-3">
                        <div class="col-10">
                            <div class="row m-3 mb-3">
                                <div class="btn-group w-100">
                                    <button type="button" class="btn btn-secondary btn-lg col-4 mx-2" onclick="addToInput('7')">7</button>
                                    <button type="button" class="btn btn-secondary btn-lg col-4 mx-2" onclick="addToInput('8')">8</button>
                                    <button type="button" class="btn btn-secondary btn-lg col-4 mx-2" onclick="addToInput('9')">9</button>
                                </div>
                            </div>
                            <div class="row m-3 mb-3">
                                <div class="btn-group w-100">
                                    <button type="button" class="btn btn-secondary btn-lg col-4 mx-2" onclick="addToInput('4')">4</button>
                                    <button type="button" class="btn btn-secondary btn-lg col-4 mx-2" onclick="addToInput('5')">5</button>
                                    <button type="button" class="btn btn-secondary btn-lg col-4 mx-2" onclick="addToInput('6')">6</button>
                                </div>
                            </div>
                            <div class="row m-3 mb-3">
                                <div class="btn-group w-100">
                                    <button type="button" class="btn btn-secondary btn-lg col-4 mx-2" onclick="addToInput('1')">1</button>
                                    <button type="button" class="btn btn-secondary btn-lg col-4 mx-2" onclick="addToInput('2')">2</button>
                                    <button type="button" class="btn btn-secondary btn-lg col-4 mx-2" onclick="addToInput('3')">3</button>
                                </div>
                            </div>
                            <div class="row m-3 mb-3">
                                <div class="btn-group w-100">
                                    <button type="button" class="btn btn-outline-danger btn-lg col-4 mx-2" onclick="deleteLastCharacter()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="btn btn-secondary btn-lg col-4 mx-2" onclick="addToInput('0')">0</button>
                                    <button type="button" class="btn btn-outline-success btn-lg col-4 mx-2" onclick="addToInput('enter')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    setTimeout(function () {
        window.location.href = '<?php echo base_url() ?>ControladorEscanear/index';
    }, 100000);
</script>
<script>
    function startAutoFocus() {
        setInterval(function () {

            var input = document.getElementById('cbarra');
            input.focus(); // Hacer foco en el input

        }, 2000); // Cada 2000 milisegundos (2 segundos)
    }

    // Iniciar el enfoque automático al cargar la página
    startAutoFocus();
    function deleteLastCharacter() {
        var inputValue = document.getElementById('cbarra').value;
        document.getElementById('cbarra').value = inputValue.slice(0, -1);
    }

    document.getElementById('openKeyboardBtn').addEventListener('click', function () {
        // Muestra el teclado numérico
        document.querySelector('.virtual-keyboard').style.display = 'block';
    });

    document.getElementById('closeKeyboardBtn').addEventListener('click', function () {
        // Oculta el teclado numérico
        document.querySelector('.virtual-keyboard').style.display = 'none';
    });

    function addToInput(value) {
        if (value === 'enter') {
            // Aquí puedes realizar la acción correspondiente al presionar Enter
            document.getElementById('scanForm').submit(); // Ejemplo: enviar el formulario
        } else {
            document.getElementById('cbarra').value += value;
        }
    }

    function clearInput() {
        document.getElementById('cbarra').value = '';
    }
</script>

<?php require_once "application/views/static/Footer.php"; ?>
