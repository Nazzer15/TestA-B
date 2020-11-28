<?php
require './valida-acceso.php';

include('BD/conexionBD.php');

$id = $_SESSION["datos-usuario"]["empleadoId"];
$nombre = $_SESSION["datos-usuario"]["nombre"];
$apellido = $_SESSION["datos-usuario"]["apellido"];
$rol = $_SESSION["datos-usuario"]["rol"];

$consultaMedio = "SELECT medioId, nombreMedio FROM medio";
$consultaMes = "SELECT mesId, nombreMes FROM mes";
$consultaCliente = "SELECT clienteId, marca FROM cliente";
$consultaCampana = "SELECT campanaId, nombreCampana FROM campana";


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
            #nombreCampana-error {
                color: red;
                margin: 0;
                padding: 0;
                text-align: right;
                width: 100%;
            }
        </style>

    </head>

    <body>

        <!-- Header - Layout -->
        <?php
        include './includes/emplayout.php';
        $medios = mysqli_query($mysql, $consultaMedio);
        $meses = mysqli_query($mysql, $consultaMes);
        $clientes = mysqli_query($mysql, $consultaCliente);
        $campanas = mysqli_query($mysql, $consultaCampana);
        ?>
        <div class="container">
            <!-- Form Llamada -->
            <div id="divLlamada" class="">
                <form id="formLlamada">
                    <div class="row" style="display: flex; justify-content: center;">
                        <div class="col-sm-10 main-div">
                            <div class="form-group row" style="margin-top: 10px; margin-bottom:10px;">
                                <div class="col-sm-3">
                                    <input type="button" class="btn btn-success" id="mostrarCampana" value="Crear Campaña" style="margin-left: 0px;"></input>
                                </div>
                            </div>

                            <div class="form-group row" style="margin-top: 10px;">
                                <label for="colFormLabel" class="col-sm-2 col-form-label text-left" style="margin-top: 7px; font-weight: normal;">Selecciona la campaña:</label>
                                <div class="col-sm-3">
                                    <!-- Aqui se haria un select dasdlos meses que tienen test -->
                                    <select type="text" class="form-control" id="campanaN" name="campanaN" required>
                                        <?php foreach ($campanas as $campana) { ?>
                                            <option value="<?php echo $campana["campanaId"] ?>"><?php echo utf8_encode($campana['nombreCampana']) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <input type="hidden" id="empleadoId" name="empleadoId" value="<?php echo $id ?>">
                            </div>

                            <div class="form-group row" style="margin-top: 10px; ">
                                <label for="colFormLabel" class="col-sm-2 col-form-label text-left" style="margin-top: 7px; font-weight: normal;">Medio:</label>
                                <div class="col-sm-3">
                                    <!-- Aqui se haria un select dasdlos meses que tienen test -->
                                    <select type="text" class="form-control" id="medioId" name="medioId" required>
                                        <?php foreach ($medios as $medio) { ?>
                                            <option value="<?php echo $medio["medioId"] ?>"><?php echo utf8_encode($medio['nombreMedio']) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row" style="margin-top: 10px;">
                                <label for="colFormLabel" class="col-sm-2 col-form-label text-left" style="margin-top: 7px; margin-bottom:30px; font-weight: normal;">Cliente:</label>
                                <div class="col-sm-3">
                                    <!-- Aqui se haria un select dasdlos clientes que tienen test -->
                                    <select type="text" class="form-control" id="clienteId" name="clienteId" required>
                                        <?php foreach ($clientes as $cliente) { ?>
                                            <option value="<?php echo $cliente["clienteId"] ?>"><?php echo utf8_encode($cliente['marca']) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>




                            <div class="row div-ab" style="border-top: 1px solid #333; padding-top: 30px;">
                                <!-- Test A -->
                                <div class="col-8 col-sm-6">
                                    <div class="titlecontainer">
                                        <h1 class="title" style="border-bottom: none;">Test A</h1>
                                        <div class="form-group">
                                            <label for="">Descripción</label>
                                            <textarea class="form-control box-input" id="descripcion1" name="descripcion1" rows="22" required></textarea>
                                        </div>
                                        <div class="form-group col-md-10 div-file">
                                            <label class="col-md-2 text-file" for="exampleFormControlFile1">Imagen</label>
                                            <input type="file" class="form-control-file col-md-6" id="file1" name="file1">
                                        </div>
                                    </div>
                                </div>

                                <!-- Test B -->
                                <div class="col-8 col-sm-6">
                                    <div class="titlecontainer">
                                        <h1 class="title" style="border-bottom: none;">Test B</h1>
                                        <div class="form-group">
                                            <label for="">Descripción</label>
                                            <textarea class="form-control box-input" id="descripcion2" name="descripcion2" rows="22" required></textarea>
                                        </div>
                                        <div class="form-group col-md-10 div-file">

                                            <label class="col-md-2 text-file" for="exampleFormControlFile1">Imagen</label>
                                            <input type="file" class="form-control-file col-md-6" id="file2" name="file2">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="display: flex; justify-content: flex-end; padding-right: 85px; padding-bottom: 20px;">
                                <button type="button" class="btn btn-danger" onclick="cerrar()">Cerrar</button>
                                <input type="button" class="btn btn-success" id="btnCrearTest" value="Crear" onclick="window.location='empleado-vertest.php'"></input>
                            </div>
                </form>
            </div>



            <div class="modal" id="modalCampana" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center">Crear campaña</h5>
                        </div>
                        <div class="modal-body">
                            <form id="formCampana">
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
        </div>
        <script src="assets/jquery/dist/jquery.min.js"></script>
        <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script type="text/javascript" charset="utf8" src="assets/datatables/datatables.js"></script>
        <script src="assets/Scripts/test.js"></script>

    </body>

    </html>
    <script>
        function cerrar() {
            location.href = "empleado-vertest.php";
        }
    </script>
<?php } else { ?>

<?php header('Location:administrador.php');
}
?>