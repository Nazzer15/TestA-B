<?php
require './valida-acceso.php';

include('BD/conexionBD.php');


$nombre = $_SESSION["datos-usuario"]["nombre"];
$apellido = $_SESSION["datos-usuario"]["apellido"];
$rol = $_SESSION["datos-usuario"]["rol"];
//hola

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
        <link rel="stylesheet" href="assets/page3.css" />
        <link rel="stylesheet" href="assets/datatables/datatables.min.css">
        <link rel="stylesheet" href="assets/datatables/DataTables-1.10.22/css/dataTables.bootstrap4.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/70fed1eb1e.js" crossorigin="anonymous"></script>

        <style>
            .title {
                color: #70ccd1;
                text-transform: uppercase;
                font-family: 'Bebas Neue', cursive;
                font-size: 2em;
                border-bottom: 1px solid gray;
                padding-bottom: 13px;
            }

            .dataTables_info {
                display: none;
            }
        </style>

    </head>

    <body>

        <!-- Header - Layout -->
        <?php
        include './includes/emplayout.php';
        ?>


        <!-- Tabla -->
        <div class="container" style="width: 80%;">
            <div class="col-md-12" style="border-bottom: 1px solid #333;">
                <div class="col-md-6" style="padding-left: 0%;">
                    <h1 style="color: #70ccd1; font-size: 2em; font-family: 'Bebas Neue', cursive; margin-bottom: 12px;">Objetivo <button id="btnNuevo" onclick="window.location='empleado-crearobjetivo.php'"><i class="fas fa-plus-circle"></i></button></h1>
                </div>
                <div class="col-md-6 text-right" style="font-size: 17px;">
                    <a>Ver historial completo 2020</a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="tablaObjetivo" class="table table-hover">

                    <tr>

                        <th scope="row"></th>

                        <th>Enero</th>

                        <th>Febrero</th>

                        <th>Marzo</th>

                        <th>Abril</th>

                        <th>Mayo</th>

                        <th>Junio</th>

                        <th class="text-center tableTitle"><a>Fin del semestre</a></th>



                    </tr>

                    <tr>

                        <th class="tableTitle">Meta</th>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                    </tr>

                    <tr>

                        <th class="tableTitle">Meta acumulada</th>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                    </tr>

                    <tr>

                        <th class="tableTitle">% de crecimiento</th>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                    </tr>

                    <tr>

                        <th class="tableTitle">Incremental x mes</th>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                    </tr>

                    <tr>

                        <td><br></td>
                        <td><br></td>
                        <td><br></td>
                        <td><br></td>
                        <td><br></td>
                        <td><br></td>
                        <td><br></td>
                    </tr>

                    <tr>

                        <th class="tableTitle">Real venta</th>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                    </tr>

                    <tr>

                        <th class="tableTitle">Real acumulado</th>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                    </tr>

                    <tr>

                        <th class="tableTitle">% de crecimiento</th>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                    </tr>

                    <tr>

                        <th class="tableTitle">Incremental x mes</th>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>

                        <td>$$$$$</td>
                    </tr>

                </table>
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