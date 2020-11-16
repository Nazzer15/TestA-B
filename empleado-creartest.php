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
            <!-- Form Llamada -->
            <div id="divLlamada" class="">
                <form id="formLlamada">
                    <div class="row" style="display: flex; justify-content: center;">
                        <div class="col-sm-10 main-div">
                            <div class="form-group row" style="margin-top: 15px;">
                                <label for="colFormLabel" class="col-sm-2 col-form-label text-left" style="margin-top: 7px; font-weight: normal;">Nombre campaña:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="colFormLabel">
                                </div>

                            </div>


                            <div class="form-group row" style="margin-top: 10px;">
                                <label for="colFormLabel" class="col-sm-2 col-form-label text-left" style="margin-top: 7px; font-weight: normal;">Mes campaña:</label>
                                <div class="col-sm-3">
                                    <!-- Aqui se haria un select dasdlos meses que tienen test -->
                                    <select type="text" class="form-control" id="mes" required>
                                        <?php foreach ($meses as $mes) { ?>
                                            <option value="<?php echo $mes["mesId"] ?>"><?php echo utf8_encode($mes['nombreMes']) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row" style="margin-top: 10px; margin-bottom:50px;">
                                <label for="colFormLabel" class="col-sm-2 col-form-label text-left" style="margin-top: 7px; font-weight: normal;">Medio:</label>
                                <div class="col-sm-3">
                                    <!-- Aqui se haria un select dasdlos meses que tienen test -->
                                    <select type="text" class="form-control" id="mes" required>
                                        <?php foreach ($medios as $medio) { ?>
                                            <option value="<?php echo $medio["medioId"] ?>"><?php echo utf8_encode($medio['nombreMedio']) ?></option>
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
                                            <textarea class="form-control box-input" id="" rows="22"></textarea>
                                        </div>
                                        <div class="form-group col-md-10 div-file">
                                            <label class="col-md-2 text-file" for="exampleFormControlFile1">Imagen</label>
                                            <input type="file" class="form-control-file col-md-6" id="file" accept="image/*">
                                        </div>
                                    </div>
                                </div>

                                <!-- Test B -->
                                <div class="col-8 col-sm-6">
                                    <div class="titlecontainer">
                                        <h1 class="title" style="border-bottom: none;">Test B</h1>
                                        <div class="form-group">
                                            <label for="">Descripción</label>
                                            <textarea class="form-control box-input" id="" rows="22"></textarea>
                                        </div>
                                        <div class="form-group col-md-10 div-file">

                                            <label class="col-md-2 text-file" for="exampleFormControlFile1">Imagen</label>
                                            <input type="file" class="form-control-file col-md-6" id="file" accept="image/*">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="display: flex; justify-content: flex-end; padding-right: 85px; padding-bottom: 20px;">
                                <button type="button" class="btn btn-danger" onclick="cerrar()">Cerrar</button>
                                <input type="submit" class="btn btn-success" value="Crear"></input>
                            </div>
                </form>
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