<?php
require './valida-acceso.php';
include './BD/conexionBD.php';

$nombre = $_SESSION["datos-usuario"]["nombre"];
$apellido = $_SESSION["datos-usuario"]["apellido"];
$rol = $_SESSION["datos-usuario"]["rol"];
$id = $_SESSION["datos-usuario"]["empleadoId"];


$consultaMes = "SELECT mesId, nombreMes FROM mes";

?>
<?php if ($rol == "empleado") { ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Test A/B</title>
        <link rel="stylesheet" href="assets/bootstrap.css" />
        <link rel="stylesheet" href="assets/styleLay.css" />
        <link rel="stylesheet" href="assets/page4.css" />
        <link rel="stylesheet" href="assets/datatables/datatables.min.css">
        <link rel="stylesheet" href="assets/datatables/DataTables-1.10.22/css/dataTables.bootstrap4.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/70fed1eb1e.js" crossorigin="anonymous"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        <link rel="stylesheet" href="assets/resultadosempleados.css" />
        <style>
            title {
                color: #70ccd1;
                text-transform: uppercase;
                font-family: 'Bebas Neue', cursive;
                font-size: 2em;
                border-bottom: 1px solid gray;
                padding-bottom: 13px;
            }

            .subtittle {
                color: #70ccd1;
                font-size: 17px;
                font-weight: bold;
            }

            .container {
                width: 80%;
            }

            .tittlePorcent {
                color: gray;
            }

            .porcent {
                color: #70ccd1;
                font-family: 'Bebas Neue', cursive;
            }

            #labelmu {
                margin-top: 15px;
                width: 100%;

                text-align: center;
            }

            .contenedor-graficos {

                width: 100%;
            }

            .highcharts-figure,
            .highcharts-data-table table {
                min-width: 310px;
                width: 90%;
                margin: 1em auto;
            }

            .highcharts-data-table thead tr,
            .highcharts-data-table tr:nth-child(even) {
                background: transparent;
            }

            .highcharts-data-table tr:hover {
                background: transparent;
            }

            .highcharts-figure {
                margin: 150px auto;
            }

            .contenedor-graficospastel {
                width: 100%;
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;
                margin-top: -100px;
            }

            .graficosleft,
            .graficosright {
                width: 40%;
                margin: 0 auto;

            }

            @media(max-width:700px) {
                .contenedor-graficospastel {
                    flex-direction: column;


                }

                .graficosleft,
                .graficosright {

                    margin: -95px auto;
                }
            }
        </style>

    </head>

    <body>

        <!-- Header - Layout -->
        <?php
        include './includes/emplayout.php';
        $meses = mysqli_query($mysql, $consultaMes);
        ?>


        <div class="container">
            <div class="row" style="">
                <div class="col-sm-12" style="">
                    <h1 class="title">Resultados</h1>
                    <div class="col-sm-2" style="margin-top: 15px; padding: 0%;">
                        <p style="margin-top: 5px;">Resumen mensual</p>
                    </div>
                    <div class="col-sm-3" style="margin-top: 15px; padding: 0%;">
                        <select type="text" class="form-control" id="mesIdCampana" name="mesIdCampana" required>
                            <?php foreach ($meses as $mes) { ?>
                                <option value="<?php echo $mes["mesId"] ?>"><?php echo utf8_encode($mes['nombreMes']) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <div class="container justify-content-center" style="margin-top: 20px;">
            <div class="row">
                <div class="col-6 col-md-4 col-sm-4 text-center">
                    <p class="subtittle">Contrataciones</p>
                    <strong class="subtittle">0</strong>
                </div>
                <div class="col-6 col-md-4 col-sm-4 text-center">
                    <p class="subtittle">Reuniones</p>
                    <strong class="subtittle">0</strong>
                </div>
                <div class="col-6 col-md-4 col-sm-4 text-center">
                    <p class="subtittle">Llamadas</p>
                    <strong class="subtittle">0</strong>
                </div>
            </div>

        </div>
        <div class="container justify-content-center" style="margin-top: 20px;">
            <div class="row">
                <div class="col-6 col-md-4 col-sm-4 text-center">
                    <p class="subtittle">E-mails</p>
                    <strong class="subtittle">0</strong>
                </div>
                <div class="col-6 col-md-4 col-sm-4 text-center">
                    <p class="subtittle">WhatsApp</p>
                    <strong class="subtittle">0</strong>
                </div>
                <div class="col-6 col-md-4 col-sm-4 text-center">
                    <p class="subtittle">Presentación</p>
                    <strong class="subtittle">0</strong>
                </div>
            </div>
        </div>

        <div class="container" style="margin-top: 20px; width: 80%;">
            <div class="row">
                <div class="col-md-6" style="">
                    <p>Medios más utilizados <span style="color: #70ccd1;">Mes</span></p>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4" style="display: flex; justify-content: space-between; margin-top: 10px;">
                        <div class="col">
                            <p class="tittlePorcent">Llamada</p>
                            <p class="text-center porcent">100%</p>
                        </div>
                        <div class="col">
                            <p class="tittlePorcent">E-mail</p>
                            <p class="text-center porcent">30%</p>
                        </div>
                        <div class="col">
                            <p class="tittlePorcent">WhatsApp</p>
                            <p class="text-center porcent">5%</p>
                        </div>
                        <div class="col">
                            <p class="tittlePorcent">PPT</p>
                            <p class="text-center porcent">40%</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="">
                    <p>Medios más utilizados <span style="color: #70ccd1;">2020</span></p>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4" style="display: flex; justify-content: space-between; margin-top: 10px;">
                        <div class="col">
                            <p class="tittlePorcent">Llamada</p>
                            <p class="text-center porcent">100%</p>
                        </div>
                        <div class="col">
                            <p class="tittlePorcent">E-mail</p>
                            <p class="text-center porcent">30%</p>
                        </div>
                        <div class="col">
                            <p class="tittlePorcent">WhatsApp</p>
                            <p class="text-center porcent">5%</p>
                        </div>
                        <div class="col">
                            <p class="tittlePorcent">PPT</p>
                            <p class="text-center porcent">40%</p>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="container" style="margin-top: 20px; width: 80%; width: 100%;">
                    <figure class="highcharts-figure">
                        <div id="graficoefectividadtests"></div>

                    </figure>
                </div>

                <div class="container" style="margin-top: 20px; width: 80%; width: 100%;">
                    <figure class="highcharts-figure">
                        <div id="graficoefectividadcumplimientoobjetivos"></div>

                    </figure>
                </div>

                <div class="col-md-6" style="">
                    <figure class="highcharts-figure">
                        <div id="piesectoresmasseleccionadosmes"></div>

                    </figure>
                </div>
                <div class="col-md-6" style="">
                    <figure class="highcharts-figure">
                        <div id="piesectoresmasseleccionadosano"></div>

                    </figure>
                </div>

                <div class="col-md-6" style="">
                    <figure class="highcharts-figure">
                        <div id="comparativosector-medios-mes"></div>

                    </figure>
                </div>
                <div class="col-md-6" style="">
                    <figure class="highcharts-figure">
                        <div id="comparativosector-medios-ano"></div>

                    </figure>
                </div>



            </div>
        </div>







        <script src="assets/jquery/dist/jquery.min.js"></script>
        <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script type="text/javascript" charset="utf8" src="assets/datatables/datatables.js"></script>

        <script src="assets/Scripts/resultadocliente.js"></script>
      


    </body>

    </html>
<?php } else { ?>

<?php header('Location:administrador.php');
}
?>