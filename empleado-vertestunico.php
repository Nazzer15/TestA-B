<?php
require './valida-acceso.php';

include('BD/conexionBD.php');


$nombre = $_SESSION["datos-usuario"]["nombre"];
$apellido = $_SESSION["datos-usuario"]["apellido"];
$rol = $_SESSION["datos-usuario"]["rol"];

$consultaMedio = "SELECT medioId, nombreMedio FROM medio";
$consultaMes = "SELECT mesId, nombreMes FROM mes";
$testId = $_SESSION['testId'];
echo $testId;

?>
<?php if ($rol == "empleado") { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Test A/B</title>
        <link rel="stylesheet" href="assets/bootstrap.css" />
        <link rel="stylesheet" href="assets/styleLay.css" />
        <link rel="stylesheet" href="assets/page4.css" />
        <link rel="stylesheet" href="assets/datatables/datatables.min.css">
        <link rel="stylesheet" href="assets/datatables/DataTables-1.10.22/css/dataTables.bootstrap4.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/70fed1eb1e.js" crossorigin="anonymous"></script>

        <style>
            /* Ocultar div */

            .title_test {
                color: #70ccd1;
                text-transform: uppercase;
                font-family: 'Bebas Neue', cursive;
                font-size: 3em;
            }

            .header_title {
                color: #333;
                text-transform: uppercase;
                font-family: 'Bebas Neue', cursive;
                font-size: 2.2em;
            }

            .side_title {
                color: #333;
                font-size: 1.2em;
            }

            .switch {
                position: relative;
                display: inline-block;
                width: 52px;
                height: 22px;
            }

            /* Hide default HTML checkbox */
            .switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }

            /* The slider */
            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                -webkit-transition: .4s;
                transition: .4s;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 18px;
                width: 18px;
                top: 2px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
            }

            input:checked+.slider {
                background-color: #70ccd1;
            }

            input:focus+.slider {
                box-shadow: 0 0 1px #70ccd1;
            }

            input:checked+.slider:before {
                -webkit-transform: translateX(26px);
                -ms-transform: translateX(26px);
                transform: translateX(26px);
            }

            /* Rounded sliders */
            .slider.round {
                border-radius: 34px;
            }

            .slider.round:before {
                border-radius: 50%;
            }

            .box_image {
                background-color: #70ccd1;
                height: 100%;
                width: 100%;
                margin-top: 50px;
            }
        </style>

    </head>

    <body>

        <!-- Header - Layout -->
        <?php
        include './includes/emplayout.php';
        $medios = mysqli_query($mysql, $consultaMedio);
        $meses = mysqli_query($mysql, $consultaMes);
        ?>

        <div class="container">
            <div class="row" style="display: flex; justify-content: center; height: auto;">
                <div class="col-sm-9">
                    <h1 class="title_test" style="margin-bottom: 10px;">Hotel La fortuna san carlos</h1>
                    <ul class="list-inline" style="margin-bottom: 10px;">
                        <li class="list-inline-item header_title">TEST A</li>
                        <li class="list-inline-item side_title" style="margin-left: 20px;">Ricardo Ortiz</li>
                        <li class="list-inline-item side_title" style="margin-left: 20px;">rortiz@hlfsancarlos.com</li>
                    </ul>
                    <div class="row" style="border-top: 1px solid #333; padding-top: 20px;">
                        <div class="col-8 col-sm-6" style="padding-left: 0%; padding-right: 0%;">
                            <div class="col-sm-3" style="margin-top: 10px;">
                                <p>¿Se realizó?</p>
                            </div>
                            <div class="col-sm-3" style="margin-top: 10px;">
                                <label class="switch">
                                    <input type="checkbox" id="contratacion">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="col-sm-3" style="margin-top: 10px;">
                                <p>¿Se reunió?</p>
                            </div>
                            <div class="col-sm-3" style="margin-top: 10px;">
                                <label class="switch">
                                    <input type="checkbox" id="reunion">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="form-group box" style="margin-top: 10px;">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="28"><?php  ?></textarea>
                            </div>
                        </div>
                        <div class="col-4 col-sm-6">
                            <div class="box_image">
                                <img src="assets/images/background-login.png" style="width: 100%;height: 100%;">
                            </div>
                        </div>

                        <div class="col-sm-12" style="margin-top:30px; margin-bottom: 30px; display: flex; justify-content: flex-end;">
                            <button type="submit" class="btn btn-success">Regresar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="assets/jquery/dist/jquery.min.js"></script>
        <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" charset="utf8" src="assets/datatables/datatables.js"></script>
        <script src="assets/Scripts/main.js"></script>

    </body>

    </html>
<?php } else { ?>

<?php header('Location:administrador.php');
}
?>