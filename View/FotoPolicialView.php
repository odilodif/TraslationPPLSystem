<script src="./View/js/ppl/ppl.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="./View/css/datatables/dataTables.bootstrap.min.css">
<script src="./View/css/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

<style>
    .video-wrap{
        margin-bottom: 5px;
    }
    .container-global{

        display: flex;
    }
    .container-names-complete{       
        border: 1px solid #ddd;
        height:500px;
        overflow-x: scroll;
        overflow-y: scroll;
    }
    .container-photo-police{
        border: 1px solid #ddd;
        width: 90%;
    }
    .video-wrap{
        display: flex;
        border: 1px solid #ddd;
    }
    .wrap-table{
        margin: 15px;
    }
    .wrap-table tr td{
        padding: 5px;
    }
</style>
<div class="container-global">
    <div class="container-photo-police"  >
        <h3>Toma de Foto SNAI</h3>
        <!—Aquí el video embebido de la webcam -->
        <div class="video-wrap">
            <video id="video" playsinline autoplay></video>
            <div class="wrap-table">
                <table>
                    <tr><td> <label for="dni" class="">Prontuario</label></td><td><input type="text" class="" id="dni" name="dni"></td></tr>
                    <tr><td><label for="nombre" class="">Nombres:</label></td><td><input type="text" class="" id="nombre" name="nombre"></td></tr>
                    <tr><td><label for="apellido" class="">Apellidos:</label></td><td><input type="text" class="" id="apellido" name="apellido"></td></tr>
                    <tr><td><label for="fnac" class="">F. Nac.:</label></td><td><input type="input" class="" id="fnac" name="fnac"></td></tr>
                    <tr><td><label for="sexo" class="">Sexo:</label></td><td><input type="text" class="" id="apellido" name="apellido"></td></tr>
                </table>             
            </div>
        </div>
        <!—El elemento canvas -->
        <div class="controller">
            <button id="btnFront">Frontal</button>
            <button id="btnPLeft">Perfil.Izquierdo</button>
            <button id="btnPRight">Perfil.Derecho</button>
        </div>
        <!—Botón de captura -->
        <canvas id="cnvsFront"  width="240" height="200"></canvas>
        <canvas id="cnvsLeft"  width="240" height="200"></canvas>
        <canvas id="cnvsRight"  width="240" height="200"></canvas>
    </div>
    <div class="container-names-complete">
        <table id="tblPPLList" class="table table-striped table-bordered" style="width:100%;font-size: 10px">
            <thead>
                <tr>
                    <th>&nbsp;&nbsp;&nbsp;</th>
                    <th>Foto</th>
                    <th>Prontuario</th>
                    <th>Cédula</th>
                    <th>Nombres</th>
                    <th>Apellidos</th> 
                    <th>Estado</th>
                    <th>Centro</th>
                    <th>Sexo</th>

                </tr>
            </thead>
            <tbody>

            </tbody>

        </table>

    </div> 
    <span id="errorMsg"></span>
</div>

<script>
    'use strict';

    const video = document.getElementById('video');
    const btnFront = document.getElementById("btnFront");
    const btnLeft = document.getElementById("btnPLeft");
    const cnvsFront = document.getElementById('cnvsFront');
    const cnvsLeft = document.getElementById('cnvsLeft');
    const cnvsRight = document.getElementById('cnvsRight');
    const errorMsgElement = document.getElementById('errorMsg');

    const constraints = {
        audio: false,
        video: {
            width: 240, height: 200
        }
    };

    // Acceso a la webcam
    async function init() {
        try {
            const stream = await navigator.mediaDevices.getUserMedia(constraints);
            handleSuccess(stream);
        } catch (e) {
             console.error(e);
        }
    }
    // Correcto!
    function handleSuccess(stream) {
        window.stream = stream;
        video.srcObject = stream;
    }
    // Load init
    init();
    // Dibuja la imagen
    var cntxtFront = cnvsFront.getContext('2d');
    var cntxtLeft = cnvsLeft.getContext('2d');
    var cntxtRight = cnvsRight.getContext('2d');
    btnFront.addEventListener("click", function () {
        cntxtFront.drawImage(video, 0, 0, 240, 200);
    });

    btnLeft.addEventListener("click", function () {
        cntxtLeft.drawImage(video, 0, 0, 240, 200);
    })

    btnPRight.addEventListener("click", function () {
        cntxtRight.drawImage(video, 0, 0, 240, 200);
    })
</script>
<script>
    $(document).ready(function () {
        listPPL();
    });
</script>