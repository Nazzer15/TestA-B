<?php
require './valida-acceso.php';

include('BD/conexionBD.php');


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

            #tablaCliente_wrapper{
                overflow: auto;
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
                <h1 class="title">Clientes <button id="btnNuevo" href=""><i class="fas fa-plus-circle"></i></button></h1>
            </div>
            <div class="table-responsive">
                <table id="tablaCliente" class="table table-hover " style="width:100%;">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center">Marca</th>
                            <th class="text-center">Sector</th>
                            <th class="text-center">Calificación</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Monto</th>
                            <th class="text-center">Test</th>
                            <th class="text-center">A/B utilizado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //foreach ($data as $dat) {
                        ?>
                            <tr>
                                <td class="text-center"><?php //echo $dat['marca'] ?></td>
                                <td class="text-center"><?php /*echo $dat['sectorId']*/ ?></td>
                                <td class="text-center"><?php /*echo $dat['calificacionId']*/ ?></td>
                                <td class="text-center"><?php /*echo $dat['estadoClienteId']*/ ?></td>
                                <td class="text-center"><?php //echo $dat['monto'] ?></td>
                                <td class="text-center"><?php /*echo $dat['test'] */ ?></td>
                                <td class="text-center"><?php /*echo $dat['abutilizado']*/ ?></td>
                                <td class="text-center"><?php /*echo $dat['abutilizado']*/ ?></td>
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
                        //}
                        ?>

                    </tbody>
                </table>
            </div>
        </div>

        


        <!--Large modal Calificacion-->
        <div class="modal" id="modalCalificacion" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center">Calificación</h5>
                    </div>
                    <form id="formCalificacion">
                        <div class="modal-body">
                            <div class="form-group row" style="margin-bottom: 30px;">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Nombre marca:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="colFormLabel">
                                </div>
                            </div>

                            <h4 class="col-sm-8">Exigencias generales:</h4></br>

                            <div class="col-sm-12 row">
                                </br>
                                <div style="padding-bottom: 50px;">
                                    <label class="col-sm-6 col-xs-6 text-center " for="customRange2">Cantidad de Locales</label>
                                    <div class="col-sm-4 col-xs-4 ">
                                        <input type="range" min="0" max="5" value="0" id="customRange3" />
                                    </div>
                                </div>
                                <div style="padding-bottom: 50px;">
                                    <label class="col-md-6 col-xs-6 text-center " for="customRange2">Sector Objetivo</label>
                                    <div class="col-sm-4 col-xs-4 ">
                                        <input type="range" min="0" max="5" value="0" id="customRange3" />
                                    </div>
                                </div>
                                <div style="padding-bottom: 50px;">
                                    <label class="col-md-6 col-xs-6 text-center " for="customRange2">Colaboradores</label>
                                    <div class="col-sm-6 col-xs-6 ">
                                        <div class="rating">
                                            <input type="radio" id=""><label for=""></label>
                                            <input type="radio" id=""><label for=""></label>
                                            <input type="radio" id=""><label for=""></label>
                                            <input type="radio" id=""><label for=""></label>
                                            <input type="radio" id=""><label for=""></label>
                                        </div>
                                    </div>
                                </div>
                                <div style="padding-bottom: 50px;">
                                    <label class="col-md-6 col-xs-6 text-center " for="customRange2">Zona / Ubicacion</label>
                                    <div class="col-sm-6 col-xs-6 ">
                                        <div class="rating">
                                            <input type="radio" id=""><label for=""></label>
                                            <input type="radio" id=""><label for=""></label>
                                            <input type="radio" id=""><label for=""></label>
                                            <input type="radio" id=""><label for=""></label>
                                            <input type="radio" id=""><label for=""></label>
                                        </div>
                                    </div>
                                </div>
                                <div style="padding-bottom: 50px;">
                                    <label class="col-md-6 col-xs-6 text-center " for="customRange2">Reconocimiento de marca</label>
                                    <div class="col-sm-6 col-xs-6 ">
                                        <div class="rating">
                                            <input type="radio" id=""><label for=""></label>
                                            <input type="radio" id=""><label for=""></label>
                                            <input type="radio" id=""><label for=""></label>
                                            <input type="radio" id=""><label for=""></label>
                                            <input type="radio" id=""><label for=""></label>
                                        </div>
                                    </div>
                                </div>
                                <div style="padding-bottom: 50px;">
                                    <label class="col-md-6 col-xs-6 text-center " for="customRange2">Venta directa a consumidor</label>
                                    <div class="col-sm-6 col-xs-6 ">
                                        <div class="rating">
                                            <input type="radio" id=""><label for=""></label>
                                            <input type="radio" id=""><label for=""></label>
                                            <input type="radio" id=""><label for=""></label>
                                            <input type="radio" id=""><label for=""></label>
                                            <input type="radio" id=""><label for=""></label>
                                        </div>
                                    </div>
                                </div>
                                <div style="padding-bottom: 50px;">
                                    <label class="col-md-6 col-xs-6 text-center " for="customRange2">Posición crecimiento</label>
                                    <div class="col-sm-6 col-xs-6 ">
                                        <div class="rating">
                                            <input type="radio" id=""><label for=""></label>
                                            <input type="radio" id=""><label for=""></label>
                                            <input type="radio" id=""><label for=""></label>
                                            <input type="radio" id=""><label for=""></label>
                                            <input type="radio" id=""><label for=""></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <h4 class="text-center" style="font-size: 1.5em; padding-top: 50px; font-weight: bold; ">Total
                                        <?/*php  Variable total de la calificacion  */?>
                                    </h4>
                                    <h4 class="col-md-12 text-center" style="font-size: 1.5em; padding-top: 25px; font-weight: bold; ">Este cliente NO cumple con el perfil
                                        <?/*php  Variable total de la calificacion  */?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer" style="border: none;">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-success" id="btnSiguiente">Siguiente</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Large modal Cliente-->
        <div class="modal" id="modalCliente" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center">Crear cliente</h5>
                    </div>
                    <div class="modal-body">
                        <form id="formCliente">
                            <div class="form-group row" style="margin-bottom: 30px;">
                                <div style="padding-bottom: 70px;">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">Nombre contacto:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="colFormLabel">
                                    </div>
                                </div>
                                <div style="padding-bottom: 70px;">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">Sector:</label>
                                    <div class="col-sm-8">
                                        <select name="sector" class="form-control" id="colFormLabel">
                                            <option value="salud">Salud</option>
                                            <option value="entrenimiento">Entretenimiento</option>
                                            <option value="finanzas">Finanzas y seguros</option>
                                            <option value="Tiendadepartamental">Tienda departamentales</option>
                                            <option value="bienesConsumo">Bienes de consumo</option>
                                            <option value="turismo">Turismo</option>
                                            <option value="baresRestaurantes">Bares y restaurantes</option>
                                            <option value="deportesOcio">Deporte y ocio</option>
                                            <option value="agriculturaGanaderia">Agricultura y ganadería</option>
                                            <option value="comercioElectronico">Comercio electrónico</option>
                                            <option value="construccion">Construcción</option>
                                            <option value="construccionTelecomunicaciones">Tecnología y telecomunicaciones</option>
                                            <option value="productosEspecializados">Productos especializados</option>
                                        </select>
                                    </div>
                                </div>
                                <div style="padding-bottom: 70px;">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">e-mail contacto:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="colFormLabel">

                                    </div>
                                </div>

                                <!-- Contacto adicional -->
                                <div style="padding-bottom: 50px;" class="titlecontainer body__container col-sm-12">
                                    <h4><button type="button" id="btnOtroContacto" href="" style="border: none; background: transparent; color: #70ccd1;"><i class="fas fa-plus-circle"></i></button>Añadir otro contacto</h4>
                                </div>
                                <div class="adicionalDiv hiddenDiv col-sm-12">
                                    <div style="padding-bottom: 70px;">
                                        <label for="colFormLabel" class="col-sm-3 col-form-label">nombre adicional:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="colFormLabel">
                                        </div>
                                    </div>
                                    <div style="padding-bottom: 70px;">
                                        <label for="colFormLabel" class="col-sm-3 col-form-label">e-mail adicional:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="colFormLabel">
                                        </div>
                                    </div>
                                    <div style="padding-bottom: 20x;" class="col-sm-12">
                                        <h4><button type="button" id="btnOtroContactoCerrar" href="" style="border: none; background: transparent; color: #70ccd1;"><i class="fa fa-minus" aria-hidden="true"></i></button>Cerrar</h4>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnCancelar">Cerrar</button>
                        <button type="button" class="btn btn-success">Crear</button>
                    </div>
                </div>
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