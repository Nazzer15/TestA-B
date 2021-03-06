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

$id = $_SESSION["datos-usuario"]["empleadoId"];
$nombre = $_SESSION["datos-usuario"]["nombre"];
$apellido = $_SESSION["datos-usuario"]["apellido"];
$rol = $_SESSION["datos-usuario"]["rol"];
//$test = "SELECT testId, campana.nombreCampana,medio.nombreMedio,cliente.marca,tipoab,descripcion1,descripcion2,file1,file2,ppt1,ppt2 from testab,campana,cliente,medio, empleado where empleado.empleadoId='$id' and cliente.estado='1' and campana.campanaId=testab.campanaId and medio.medioId=testab.medioId and cliente.clienteId=testab.clienteId";
$test = "SELECT test.testId, campana.nombreCampana,test.empleadoId,mes.nombreMes,test.estado from test,campana,mes where test.empleadoId='$id' and campana.campanaId=test.campanaId and mes.mesId=campana.mesId AND test.estadologico=1";
$consultaMes = "SELECT mesId, nombreMes FROM mes";

// $Consultacampana = "SELECT campana.campanaId , campana.nombreCampana, mes.nombreMes FROM campana, mes WHERE mes.mesId = campana.mesId";

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

            table.dataTable tbody tr {
                background-color: transparent;
            }
        </style>

    </head>

    <body>

        <!-- Header - Layout -->
        <?php
        include './includes/emplayout.php';
        $resultado = mysqli_query($mysql, $test);
        $meses = mysqli_query($mysql, $consultaMes);
        //$campana = mysqli_query($mysql, $Consultacampana);

        ?>


        <!-- Tabla -->
        <div class="container" style="width: 80%;">
            <div class="titlecontainer">
                <h1 class="title">Test <button id="btnNuevo" style="background: transparent; border: none;"><i class="fas fa-plus-circle"></i></button></h1>
            </div>
            <div class="table-responsive">
                <table id="tablaTest" class="table table-hover " style="width:100%;">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center">ID test</th>
                            <th class="text-center">Campaña</th>
                            <th class="text-center">ID Empleado</th>
                            <th class="text-center">Mes</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($resultado as $result) {
                            /*  $campana="SELECT nombreCampana FROM campana where campanaId='".$result["campanaId"]."'";
                            $medio="SELECT nombreMedio FROM campana where medioId='".$result["medioId"]."'";
                            $cliente="SELECT marca FROM campana where clienteId='".$result["clienteId"]."'";
                            $campanaN= mysqli_query($mysql, $campana);
                            $medioN = mysqli_query($mysql, $medio);
                            $clienteN = mysqli_query($mysql, $cliente);*/
                            //print_r ($campanaN);
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $result['testId'] ?></td>
                                <td class="text-center"><?php echo $result["nombreCampana"] ?></td>
                                <td class="text-center"><?php echo $result['empleadoId'] ?></td>
                                <td class="text-center"><?php echo $result["nombreMes"] ?></td>
                                <td class="text-center"><?php echo $result["estado"] ?></td>

                                <td>
                                    <div class="text-center">
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnAsignar">Asignar</button>
                                            <button class="btn btn-danger btnBorrar">Borrar</button>
                                            <button class="btn btn-info btnVerT" onclick="window.location='empleado-vertestunico.php'">Ver</button>
                                        </div>
                                    </div>
                                </td>

                                <input type="hidden" id="idTest" name="idTest" value="">
                                <input type="hidden" id="campana" name="campana" value="">
                            </tr>

                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>




        <!-- Modal Crear Test -->
        <div class="modal" id="modalCampana" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center">Crear campaña</h5>
                    </div>
                    <div class="modal-body">
                        <form id="formCampana">
                            <input type="hidden" value="<?php echo $id ?>" name="idEmpleado" id="idEmpleado">
                            <div class="form-group row" style="margin-bottom: 30px;">
                                <label for="nombreMarca" class="col-sm-3 col-form-label is-valid" style="font-weight: normal;">Nombre de la campaña:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nombreCampana" id="nombreCampana" required>
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom: 30px;">
                                <label for="nombreMarca" class="col-sm-3 col-form-label is-valid" style="font-weight: normal;">Mes:</label>
                                <div class="col-sm-8">
                                    <select type="text" class="form-control" id="mesIdCampana" name="mesIdCampana" required>
                                        <?php foreach ($meses as $mes) { ?>
                                            <option value="<?php echo $mes["mesId"] ?>"><?php echo utf8_encode($mes['nombreMes']) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnCancelar" onclick='location.reload()'>Cerrar</button>
                        <button type="button" class="btn btn-success" id="btnCrearCampana">Crear</button>
                    </div>
                </div>
            </div>
        </div>


        <!--Large modal Editar Test-->
        <div class="modal" id="modalEditarTest" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center">Editar Test</h5>
                    </div>
                    <form id="formEditarTest">
                        <div class="modal-body">
                            <input type="hidden" id="idE" name="idE" value="" />
                            <h4 class="col-sm-8" style="font-weight: normal;">Test A:</h4></br>
                            <div class="col-sm-12 row">
                                </br>
                                <div style="padding-bottom: 50px;">
                                    <label class="col-sm-4  " for="descripcion1" style="font-weight: normal; padding-left: 50px;">Descripción:</label>
                                    <div class=" col-sm-8  text-center">
                                        <textarea type="text" class="form-control box-input" id="descripcion1" name="descripcion1" rows="6" style="background: transparent;" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group col-md-10 div-file" style="margin-top: 25px;">
                                    <label class="col-sm-4 text-file" for="file1" style="padding-left: 40px; font-weight: normal;">Imagen:</label>
                                    <input type="file" class="form-control-file col-sm-8" id="file1" name="file1" style="padding-left: 55px;">
                                </div>
                            </div>
                            <h4 class="col-sm-8" style="font-weight: normal; margin-top: 25px;">Test B:</h4></br>
                            <div class="col-sm-12 row">
                                </br>
                                <div style="padding-bottom: 50px;">
                                    <label class="col-sm-4  " for="cantidadLocales" style="font-weight: normal; padding-left: 50px;">Descripción:</label>
                                    <div class=" col-sm-8  text-center">
                                        <textarea type="text" class="form-control box-input" id="descripcion2" name="descripcion2" rows="6" style="background: transparent;" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group col-md-10 div-file" style="margin-top: 25px;">
                                    <label class="col-sm-4 text-file" for="exampleFormControlFile1" style="padding-left: 40px; font-weight: normal;">Imagen:</label>
                                    <input type="file" class="form-control-file col-sm-8" id="file2" name="file2" style="padding-left: 55px;">
                                </div>
                            </div>

                            <div class="form-group col-md-10 row" style="margin-top: 30px;">
                                <label for="colFormLabel" class="col-sm-4 col-form-label text-left" style="margin-top: 7px; font-weight: normal; padding-left: 50px;">Test Ganador:</label>
                                <div class="col-sm-4">
                                    <!-- Aqui se haria un select dasdlos meses que tienen test -->
                                    <select type="text" class="form-control" id="test" name="test" required style="margin-left: 50px;">
                                        <option></option>
                                        <option>A</option>
                                        <option>B</option>
                                    </select>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </form>

                    <div class="modal-footer" style="border: none;">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelarCalifi" onclick="location.reload()">Cerrar</button>
                        <button type="button" class="btn btn-success" id="btnEditarTest">Editar</button>
                    </div>
                </div>
            </div>
        </div>


        <script src="assets/jquery/dist/jquery.min.js"></script>
        <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script type="text/javascript" charset="utf8" src="assets/datatables/datatables.js"></script>
        <script src="assets/Scripts/test.js"></script>

    </body>

    </html>
<?php } else { ?>

<?php header('Location:administrador.php');
}
?>