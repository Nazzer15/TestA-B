<?php
require './valida-acceso.php';
include './BD/ConexionBD.php';
$nombre = $_SESSION["datos-usuario"]["nombre"];
$apellido = $_SESSION["datos-usuario"]["apellido"];
$rol = $_SESSION["datos-usuario"]["rol"];
$vista = "Select empleado.nombre, cliente.marca ,sectores.nombreSector, cliente.nombreContacto, cliente.correo, calificacion.total, mes.nombreMes, cliente.tipoTest From empleado,sectores,cliente,calificacion, mes,campana,testab WHERE cliente.estado=1 AND empleado.empleadoId=cliente.empleadoId AND sectores.sectorId=cliente.sectorId AND cliente.calificacionId=calificacion.calificacionId AND testab.clienteId=cliente.clienteId AND campana.campanaId = testab.campanaId AND mes.mesId = campana.mesId";
?>
<?php if ($rol == "administrador") { ?>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Test A/B</title>
        <link rel="stylesheet" href="assets/bootstrap.css" />
        <link rel="stylesheet" href="assets/styleLay.css" />
        <link rel="stylesheet" href="assets/page3.css" />
        <link rel="stylesheet" href="assets/administrador.css" />
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/datatables/datatables.min.css" />
        <link rel="stylesheet" href="assets/datatables/DataTables-1.10.22/css/dataTables.bootstrap4.min.css" />
        <script src="https://kit.fontawesome.com/122bb03e13.js" crossorigin="anonymous"></script>



    </head>
    <style>
        table.dataTable.no-footer {
            border-bottom: none;
        }
    </style>

    <body>
        <?php
        include './includes/adminlayout.php';
        $resultado = mysqli_query($mysql, $vista);
        ?>

        <div class="posiblesclientes">

            <h1 id="title">Posibles Clientes</h1>

        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="tablaclientes" class="table table-hover" style="width:100%; background: transparent;">
                            <thead class="text-center">
                                <tr>




                                    <th class="text-center">Encargado</th>


                                    <th class="text-center">Marca</th>
                                    <th class="text-center">Sector</th>
                                    <th class="text-center">Contacto</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Calificacion</th>
                                    <th class="text-center">Test</th>
                                    <th class="text-center">A/B Utilizado</th>




                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($resultado as $result) {


                                ?>
                                    <tr class="text-center" style="background:transparent;">

                                        <td><a class="nombrelink"><?php echo $result["nombre"] ?></a></td>


                                        <td><?php echo $result["marca"] ?></td>
                                        <td> <?php echo utf8_encode($result["nombreSector"]) ?></td>

                                        <td> <?php echo $result["nombreContacto"] ?></td>
                                        <td> <?php echo $result["correo"] ?></td>
                                        <td> <?php echo $result["total"] ?></td>
                                        <td> <?php echo $result["nombreMes"] ?></td>
                                        <td> <?php echo $result["tipoTest"] ?></td>




                                    </tr>

                                <?php
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>


        <script src="assets/jquery/dist/jquery-3.3.1.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script src="assets/popper/popper.min.js"></script>
        <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="assets/Scripts/administrador.js"></script>
        <!-- datatables JS -->
        <script type="text/javascript" src="assets/datatables/datatables.min.js"></script>
        <!-- Validaciones -->


    </body>

    </html>
<?php } else { ?>

<?php
    header('Location:empleado.php');
}
?>