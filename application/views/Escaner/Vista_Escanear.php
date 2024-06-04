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
                        <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1" />
                    </svg>

                    <form id="scanForm" action="<?php echo base_url() ?>ControladorPrecioUnico" method="post" class="">
                        <input type="text" name="cbarra" id="cbarra" class="" autofocus>
                    </form>

                </div>
                <div class="text-center mt-3">
                    <button type="button" class="btn btn-outline-primary" id="openKeyboardBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-keyboard" viewBox="0 0 16 16">
                            <path d="M14 5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1zM2 4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z" />
                            <path d="M13 10.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm0-2a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm-5 0A.25.25 0 0 1 8.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 8 8.75zm2 0a.25.25 0 0 1 .25-.25h1.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-1.5a.25.25 0 0 1-.25-.25zm1 2a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm-5-2A.25.25 0 0 1 6.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 6 8.75zm-2 0A.25.25 0 0 1 4.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 4 8.75zm-2 0A.25.25 0 0 1 2.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 2 8.75zm11-2a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm-2 0a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm-2 0A.25.25 0 0 1 9.25 6h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 9 6.75zm-2 0A.25.25 0 0 1 7.25 6h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 7 6.75zm-2 0A.25.25 0 0 1 5.25 6h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 5 6.75zm-3 0A.25.25 0 0 1 2.25 6h1.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-1.5A.25.25 0 0 1 2 6.75zm0 4a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm2 0a.25.25 0 0 1 .25-.25h5.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-5.5a.25.25 0 0 1-.25-.25z" />
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
                            <path d="M7.5 1v7h1V1z" />
                            <path d="M3 8.812a5 5 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812" />
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
                                        <svg fill="currentColor"  width="40" height="40"version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 489.425 489.425" xml:space="preserve">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g>
                                                    <g>
                                                        <path d="M122.825,394.663c17.8,19.4,43.2,30.6,69.5,30.6h216.9c44.2,0,80.2-36,80.2-80.2v-200.7c0-44.2-36-80.2-80.2-80.2h-216.9 c-26.4,0-51.7,11.1-69.5,30.6l-111.8,121.7c-14.7,16.1-14.7,40.3,0,56.4L122.825,394.663z M29.125,233.063l111.8-121.8 c13.2-14.4,32-22.6,51.5-22.6h216.9c30.7,0,55.7,25,55.7,55.7v200.6c0,30.7-25,55.7-55.7,55.7h-217c-19.5,0-38.3-8.2-51.5-22.6 l-111.7-121.8C23.025,249.663,23.025,239.663,29.125,233.063z"></path>
                                                        <path d="M225.425,309.763c2.4,2.4,5.5,3.6,8.7,3.6s6.3-1.2,8.7-3.6l47.8-47.8l47.8,47.8c2.4,2.4,5.5,3.6,8.7,3.6s6.3-1.2,8.7-3.6 c4.8-4.8,4.8-12.5,0-17.3l-47.9-47.8l47.8-47.8c4.8-4.8,4.8-12.5,0-17.3s-12.5-4.8-17.3,0l-47.8,47.8l-47.8-47.8 c-4.8-4.8-12.5-4.8-17.3,0s-4.8,12.5,0,17.3l47.8,47.8l-47.8,47.8C220.725,297.263,220.725,304.962,225.425,309.763z"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </button>
                                    <button type="button" class="btn btn-secondary btn-lg col-4 mx-2" onclick="addToInput('0')">0</button>
                                    <button type="button" class="btn btn-outline-success btn-lg col-4 mx-2" onclick="addToInput('enter')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
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
    setTimeout(function() {
        window.location.href = '<?php echo base_url() ?>ControladorEscanear/index';
    }, 100000);
</script>
<script>
    function startAutoFocus() {
        setInterval(function() {

            var input = document.getElementById('cbarra');
            input.focus(); // Hacer foco en el input

        }, 2000); // Cada 2000 milisegundos (2 segundos)
    }

    // Iniciar el enfoque automático al cargar la página
    startAutoFocus();

    function deleteLastCharacter() {
        var inputValue = document.getElementById('cbarra').value;
        document.getElementById('cbarra').value = inputValue.slice(0,  b);
    }

    document.getElementById('openKeyboardBtn').addEventListener('click', function() {
        // Muestra el teclado numérico
        document.querySelector('.virtual-keyboard').style.display = 'block';
    });

    document.getElementById('closeKeyboardBtn').addEventListener('click', function() {
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

    function deleteLastCharacter() {
        var inputValue = document.getElementById('cbarra').value;
        document.getElementById('cbarra').value = inputValue.slice(0, -1);
    }

</script>

<?php require_once "application/views/static/Footer.php"; ?>