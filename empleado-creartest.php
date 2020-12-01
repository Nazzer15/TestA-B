<?php
require './valida-acceso.php';

include('BD/conexionBD.php');

$id = $_SESSION["datos-usuario"]["empleadoId"];
$nombre = $_SESSION["datos-usuario"]["nombre"];
$apellido = $_SESSION["datos-usuario"]["apellido"];
$rol = $_SESSION["datos-usuario"]["rol"];
$testId = $_SESSION['testId'];

$consultaMedio = "SELECT medioId, nombreMedio FROM medio";

$campanaQuery = $mysql->query("SELECT campana.nombreCampana FROM campana, test WHERE campana.campanaId = test.campanaId and test.testId = '$testId[0]'");
$campanaNombre = mysqli_fetch_row($campanaQuery);

// echo $testId[0];
// echo $campanaNombre[0];

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

        ?>
        <div class="container">
            <!-- Form Llamada -->
            <div id="divLlamada" class="">
                <form id="formMedio">
                    <input type="hidden" value="<?php echo $testId[0] ?>" id="hiddenId" name="hiddenId" />
                    <div class="row" style="display: flex; justify-content: center;">
                        <div class="col-sm-10 main-div">
                            <div class="form-group row" style="margin-top: 10px;">
                                <label for="colFormLabel" class="col-sm-2 col-form-label text-left" style="margin-top: 7px; font-weight: normal;">Campaña:</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" value="<?php echo $campanaNombre[0] ?>" disabled />
                                </div>
                            </div>

                            <div class="form-group row" style="margin-top: 10px; margin-bottom: 25px;">
                                <label for="colFormLabel" class="col-sm-2 col-form-label text-left" style="margin-top: 7px; font-weight: normal;">Medio:</label>
                                <div class="col-sm-3">
                                    <!-- Aqui se haria un select dasdlos meses que tienen test -->
                                    <select type="text" class="form-control" id="medioId" name="medioId" required>
                                        <option value="1">Llamada</option>
                                        <option value="2">E-mail</option>
                                        <option value="3">WhatsApp</option>
                                        <option value="4">PPT Agencia</option>
                                        <option value="5">PPT Reunión</option>
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
                                            <input type="text" class="form-control-file col-md-6" id="file1" name="file1">
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
                                            <input type="text" class="form-control-file col-md-6" id="file2" name="file2">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="display: flex; justify-content: flex-end; padding-right: 85px; padding-bottom: 20px;">
                                <button type="button" class="btn btn-danger" onclick="cerrar()">Cerrar</button>
                                <input type="button" class="btn btn-success" id="btnAsignarMedio" value="Crear"></input>
                            </div>
                        </div>
                </form>
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