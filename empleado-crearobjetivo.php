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



            .labelText {
                color: #333;
                font-size: 18px;
                
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
                    <h1 style="color: #70ccd1; font-size: 2em; font-family: 'Bebas Neue', cursive; margin-bottom: 12px;">Crear Objetivo</h1>
                </div>

            </div>

            <div class="col-md-12">
                <form>
                    <div class="form-group row" style="margin-top: 25px;">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-center labelText">Selecciona el mes: </label>
                        <div class="form-group col-sm-4" style="display: flex; justify-content: center;">

                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>Enero</option>
                                <option>Febrero</option>
                                <option>Marzo</option>
                                <option>Abril</option>
                                <option>Mayo</option>
                            </select>
                        </div>
                    </div>



                    <div class="form-group row" style="margin-top: 25px;">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-center labelText">Meta: </label>
                        <div class="col-sm-4" style="display: flex; justify-content: center;">
                            <input type="number" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-top: 25px;">
                        <label for="inputPassword3" class="col-sm-4 col-form-label text-center labelText">Meta acumulada: </label>
                        <div class="col-sm-4" style="display: flex; justify-content: center;">
                            <input type="number" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-top: 25px;">
                        <label for="inputPassword3" class="col-sm-4 col-form-label text-center labelText">% de crecimiento: </label>
                        <div class="col-sm-4" style="display: flex; justify-content: center;">
                            <input type="number" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-top: 25px;">
                        <label for="inputPassword3" class="col-sm-4 col-form-label text-center labelText">Incremental x mes: </label>
                        <div class="col-sm-4" style="display: flex; justify-content: center; margin-bottom: 50px;">
                            <input type="number" class="form-control" id="inputEmail3">
                        </div>
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