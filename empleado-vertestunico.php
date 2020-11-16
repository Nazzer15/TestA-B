<?php
require './valida-acceso.php';

include('BD/conexionBD.php');


$nombre = $_SESSION["datos-usuario"]["nombre"];
$apellido = $_SESSION["datos-usuario"]["apellido"];
$rol = $_SESSION["datos-usuario"]["rol"];

$consultaMedio = "SELECT medioId, nombreMedio FROM medio";
$consultaMes = "SELECT mesId, nombreMes FROM mes";


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
        </style>

    </head>

    <body>

        <!-- Header - Layout -->
        <?php
        include './includes/emplayout.php';
        $medios = mysqli_query($mysql, $consultaMedio);
        $meses = mysqli_query($mysql, $consultaMes);
        ?>
        
        <div class="container" style="width: 80%;">
            <div class="row">
                <div class="col-9 justify-content-center">.col-9</div>
                <div class="col-4 justify-content-center">.col-4<br>Since 9 + 4 = 13 &gt; 12, this 4-column-wide div gets wrapped onto a new line as one contiguous unit.</div>
                <div class="col-6 justify-content-center">.col-6<br>Subsequent columns continue along the new line.</div>
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