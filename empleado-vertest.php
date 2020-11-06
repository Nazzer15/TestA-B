<?php
require './valida-acceso.php';

include('BD/conexionBD.php');

/*
$conexion = Conectar();

$consulta = "SELECT marca, sectorId, calificacionId, estadoClienteId, monto FROM cliente";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
*/
$nombre = $_SESSION["datos-usuario"]["nombre"];
$apellido = $_SESSION["datos-usuario"]["apellido"];
$rol = $_SESSION["datos-usuario"]["rol"];


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

            .dataTables_info{
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
            <div class="titlecontainer">
                <h1 class="title">Test <button id="btnNuevo" onclick="window.location='empleado-creartest.php'" style="background: transparent; border: none;"><i class="fas fa-plus-circle"></i></button></h1>
            </div>
            <div class="table-responsive">
                <table id="tablaCliente" class="table table-hover " style="width:100%;">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Mes</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Ganador</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        /*
                        foreach ($data as $dat) {
                            */
                        ?>
                            <tr>
                                <td class="text-center"><?php /*echo $dat['sectorId']*/ ?></td>
                                <td class="text-center"><?php /*echo $dat['calificacionId']*/ ?></td>
                                <td class="text-center"><?php /*echo $dat['estadoClienteId']*/ ?></td>
                                <td class="text-center"><?php /*echo $dat['estadoClienteId']*/ ?></td>
                                <!--
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-info btnEditar">Editar</button>
                                                <button class="btn btn-warning btnBorrar">Borrar</button>
                                            </div>
                                        </div>
                                    </td>
                                    -->
                            </tr>
                        <?php
                        /*}*/
                        ?>

                    </tbody>
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