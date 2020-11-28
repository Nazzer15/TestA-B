<?php
require './valida-acceso.php';
include './BD/conexionBD.php';

$nombre = $_SESSION["datos-usuario"]["nombre"];
$apellido = $_SESSION["datos-usuario"]["apellido"];
$rol = $_SESSION["datos-usuario"]["rol"];
$id = $_SESSION["datos-usuario"]["empleadoId"];

$cliente = "SELECT clienteId, marca, nombreContacto, correo, sectores.nombreSector, calificacion.total, estadocliente.estadoNombre , monto, nombreAdicional, correoAdicional FROM cliente, sectores, calificacion, estadocliente where empleadoId=$id AND cliente.estado = 1 AND sectores.sectorId=cliente.sectorId AND estadocliente.estadoClienteId=cliente.estadoClienteId AND calificacion.calificacionId=cliente.calificacionId";
$sector = "SELECT sectorId, nombreSector FROM sectores ORDER BY nombreSector ASC";
$estadoCliente = "SELECT estadoClienteId, estadoNombre FROM estadoCliente";



?>
<?php if ($rol == "empleado") { ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Test A/B</title>
        <link rel="stylesheet" href="assets/bootstrap.css" />
        <link rel="stylesheet" href="assets/styleLay.css" />
        <link rel="stylesheet" href="assets/page4.css" />
        <link rel="stylesheet" href="assets/starrr.css" />
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

            #tablaCliente_wrapper {
                overflow: auto;
            }

            #tablaCliente_wrapper {
                margin-top: 15px;
            }

            .inputE {
                height: 34px;
                padding: 6px 12px;
                font-size: 14px;
                line-height: 1.42857143;
                color: #555;
                background-color: #fff;
                background-image: none;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            #nombreContacto-error,
            #nombreMarca-error,
            label#email-error {
                width: 100%;
                color: red;
                text-align: end;
                height: 0px;
                margin: 0 auto;
                padding: 0;
            }

            

            .labelE {
                width: 34%
            }

            .fa-star:before {
                color: #70ccd1;
                margin: 5px;
            }

            .fa.fa-star-o:before {
                margin: 5px;
            }

            
        </style>

    </head>

    <body>

        <!-- Header - Layout -->
        <?php
        include './includes/emplayout.php';
        $resultado = mysqli_query($mysql, $cliente);
        $sectores = mysqli_query($mysql, $sector);
        $estado = mysqli_query($mysql, $estadoCliente);
        ?>


        <!-- Tabla -->
        <div class="container" style="width: 80%;">
            <div class="titlecontainer">
                <h1 class="title">Clientes <button id="btnNuevoCliente" href="" style="background: transparent; border: none;"><i class="fas fa-plus-circle"></i></button></h1>
            </div>
            <div class="table-responsive">
                <table id="tablaCliente" class="table table-hover " style="width:100%;">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center hidden">ID</th>
                            <th class="text-center">Marca</th>
                            <th class="text-center hidden">Nombre Contacto</th>
                            <th class="text-center hidden">Correo</th>
                            <th class="text-center">Sector</th>
                            <th class="text-center">Calificación</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Monto Agencia</th>

                            <th class="text-center hidden">Test</th>
                            <th class="text-center hidden">A/B utilizado</th>
                            <th class="text-center hidden">Nombre Adicional</th>
                            <th class="text-center hidden">Correo Adicional</th>


                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($resultado as $result) {
                        ?>
                            <tr style="background: transparent;">
                                <td class="text-center hidden"><?php echo $result['clienteId'] ?></td>
                                <td class="text-center"><?php echo $result['marca'] ?></td>
                                <td class="text-center hidden"><?php echo $result['nombreContacto'] ?></td>
                                <td class="text-center hidden"><?php echo $result['correo'] ?></td>
                                <td class="text-center"><?php echo utf8_encode($result['nombreSector']) ?></td>
                                <td class="text-center"><?php echo $result['total'] ?></td>
                                <td class="text-center"><?php echo utf8_encode($result['estadoNombre']) ?></td>
                                <td class="text-center"><?php echo $result['monto'] ?></td>
                                <td class="text-center hidden"><?php echo "ejemplo" ?></td>
                                <td class="text-center hidden"><?php echo "test" ?></td>
                                <td class="text-center hidden"><?php echo $result['nombreAdicional'] ?></td>
                                <td class="text-center hidden"><?php echo $result['correoAdicional'] ?></td>
                                <td>
                                    <div class="text-center">
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditarC">Editar</button>
                                            <button class="btn btn-danger btnBorrar">Borrar</button>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        <?php
                        }
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
                            <h4 class="col-sm-8" style="font-weight: normal;">Exigencias generales:</h4></br>
                            <div class="col-sm-12 row">
                                </br>
                                <div style="padding-bottom: 50px;">
                                    <label class="col-sm-4  " for="cantidadLocales" style="font-weight: normal; padding-left: 50px;" title="Cantidad de locales que dispone la empresa">Cantidad de Locales</label>
                                    <div class=" col-sm-8  text-center">
                                        <div id="estrellas">
                                            <input type="hidden" id="cantidadLocales" name="cantidadLocales" value="">
                                        </div>
                                    </div>
                                </div>


                                <div style="padding-bottom: 50px;">
                                    <label class="col-sm-4  " for="sectorObjetivo" style="font-weight: normal; padding-left: 50px;">Sector Objetivo</label>
                                    <div class="col-sm-8  text-center">
                                        <div id="estrellasSO">
                                            <input type="hidden" id="sectorObjetivo" name="sectorObjetivo" value="">

                                        </div>
                                    </div>
                                </div>


                                <div style="padding-bottom: 50px;">
                                    <label class="col-sm-4" for="colaboradores" style="font-weight: normal; padding-left: 50px;">Colaboradores</label>
                                    <div class="col-sm-8 text-center">
                                        <div id="estrellasCO">
                                            <input type="hidden" id="colaboraciones" name="colaboraciones" value="">

                                        </div>
                                    </div>
                                </div>
                                <div style="padding-bottom: 50px;">
                                    <label class="col-sm-4" for="zona" style="font-weight: normal; padding-left: 50px;">Zona / Ubicación</label>
                                    <div class="col-sm-8 text-center">
                                        <div id="estrellasZO">
                                            <input type="hidden" id="zona" name="zona" value="">

                                        </div>
                                    </div>
                                </div>
                                <div style="padding-bottom: 50px;">
                                    <label class="col-sm-4" for="reconocimiento" style="font-weight: normal; padding-left: 50px;">Reconocimiento de marca</label>
                                    <div class="col-sm-8 text-center">
                                        <div id="estrellasRM">
                                            <input type="hidden" id="reconocimiento" name="reconocimiento" value="">

                                        </div>
                                    </div>
                                </div>
                                <div style="padding-bottom: 50px;">
                                    <label class="col-sm-4" for="ventas" style="font-weight: normal; padding-left: 50px;">Venta directa a consumidor</label>
                                    <div class="col-sm-8 text-center">
                                        <div id="estrellasVD">
                                            <input type="hidden" id="ventas" name="ventas" value="">

                                        </div>
                                    </div>
                                </div>
                                <div style="padding-bottom: 50px;">
                                    <label class="col-sm-4" for="posicion" style="font-weight: normal; padding-left: 50px;">Posición crecimiento</label>
                                    <div class="col-sm-8 text-center">
                                        <div id="estrellasPC">
                                            <input type="hidden" id="posicion" name="posicion" value="">

                                        </div>
                                    </div>
                                </div>
                                <div style="padding-bottom: 50px;">

                                    <div class="rating">
                                        <input class="form-control" type="hidden" id="total" name="total">
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-12 hidden" id="puntos">
                                <h4 class="text-center" style="font-size: 1.5em; padding-top: 50px; font-weight: bold; ">Total:
                                    <span id="totalView"></span>
                                </h4>
                                <h4 class="col-md-12 text-center" style="font-size: 1.5em; padding-top: 25px; font-weight: bold; ">Este cliente NO cumple con el perfil
                                    <?/*php  Variable total de la calificacion  */?>
                                </h4>
                            </div>

                        </div>

                    </form>

                    <div class="modal-footer" style="border: none;">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelarCalifi" onclick="location.reload()">Cerrar</button>
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
                                <label for="nombreMarca" class="col-sm-3 col-form-label is-valid" style="font-weight: normal;">Nombre marca:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nombreMarca" id="nombreMarca" required>
                                </div>

                            </div>
                            <div class="form-group row" style="margin-bottom: 30px;">
                                <div style="padding-bottom: 70px;">
                                    <label for="nombreContacto" class="col-sm-3 col-form-label" style="font-weight: normal;">Nombre contacto:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nombreContacto" id="nombreContacto" required>
                                    </div>
                                </div>
                                <div style="padding-bottom: 70px;">
                                    <label for="sector" class="col-sm-3 col-form-label" style="font-weight: normal;">Sector:</label>
                                    <div class="col-sm-8">
                                        <select name="sector" class="form-control" id="sector" required>
                                            <?php foreach ($sectores as $sec) { ?>
                                                <option value="<?php echo $sec["sectorId"] ?>"><?php echo utf8_encode($sec['nombreSector']) ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div style="padding-bottom: 70px;">
                                    <label for="email" class="col-sm-3 col-form-label" style="font-weight: normal;">E-mail contacto:</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" name="email" id="email" required>
                                    </div>
                                </div>

                                <!-- Contacto adicional -->
                                <div style="padding-bottom: 50px;" class="titlecontainer body__container col-sm-12">
                                    <h4><button type="button" id="btnOtroContacto" href="" style="border: none; background: transparent; color: #70ccd1;"><i class="fas fa-plus-circle"></i></button>Añadir otro contacto</h4>
                                </div>
                                <div class="adicionalDiv hiddenDiv col-sm-12">
                                    <div style="padding-bottom: 70px;">
                                        <label for="nombreAdicional" class="col-sm-3 col-form-label" style="font-weight: normal;">Nombre adicional:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="nombreAdicional" id="nombreAdicional">
                                        </div>
                                    </div>
                                    <div style="padding-bottom: 70px;">
                                        <label for="emailAdicional" class="col-sm-3 col-form-label" style="font-weight: normal;">E-mail adicional:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="emailAdicional" id="emailAdicional">
                                        </div>
                                        <input type="hidden" value="<?php echo $id ?>" id="empleadoId" name="empleadoId">
                                    </div>
                                    <div style="padding-bottom: 20x;" class="col-sm-12">
                                        <h4><button type="button" id="btnOtroContactoCerrar" href="" style="border: none; background: transparent; color: #70ccd1;"><i class="fa fa-minus" aria-hidden="true"></i></button>Cerrar</h4>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnCancelar" onclick='location.reload()'>Cerrar</button>
                        <button type="button" class="btn btn-success" id="btnCrearCliente">Crear</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Editar cliente -->
        <div class="modal" id="modalEditarCliente" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header mb-3" style="margin-bottom: 30px;">
                        <h5 class="modal-title text-center">Editar Cliente</h5>
                    </div>
                    <form id="formEditarCliente" method="post" action="">
                        <div style="padding-bottom: 50px;">
                            <label class="col-sm-6 col-xs-6 text-center col-form-label labelE" for="marcaE" style="font-weight: normal;">Marca</label>
                            <input class="col-sm-5 col-xs-5 inputE" id="marcaE" type="text" name="marcaE" required />
                        </div>
                        <div style="padding-bottom: 50px;">
                            <label class="col-sm-6 col-xs-6 text-center labelE" for="nombreContactoE" style="font-weight: normal;">Nombre Contacto</label>
                            <input class="col-sm-5 col-xs-5 inputE" id="nombreContactoE" type="text" name="nombreContactoE" required />
                        </div>
                        <div style="padding-bottom: 50px;">
                            <label class="col-sm-6 col-xs-6 text-center labelE" for="correoE" style="font-weight: normal;">Correo</label>
                            <input class="col-sm-5 col-xs-5 inputE" id="correoE" name="correoE" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required />
                        </div>
                        <div style="padding-bottom: 50px;">
                            <label class="col-sm-6 col-xs-6 text-center labelE" for="estadoE" style="font-weight: normal;">Estado</label>
                            <select class="col-sm-5 col-xs-5 inputE estadoEditar" name="estadoE" id="estadoE" required>
                                <?php foreach ($estado as $est) { ?>
                                    <option value="<?php echo $est["estadoClienteId"] ?>"><?php echo utf8_encode($est['estadoNombre']) ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div style="padding-bottom: 50px;">
                            <label class="col-sm-6 col-xs-6 text-center labelE" for="montoE" style="font-weight: normal;">Monto</label>
                            <input class="col-sm-5 col-xs-5 inputE" id="montoE" name="montoE" type="number" />
                        </div>
                        <div style="padding-bottom: 50px;">
                            <label class="col-sm-6 col-xs-6 text-center labelE" for="nombreContactoE" style="font-weight: normal;">Nombre Adicional</label>
                            <input class="col-sm-5 col-xs-5 inputE" id="nombreContactoAdcE" type="text" name="nombreContactoAdcE" />
                        </div>
                        <div style="padding-bottom: 50px;">
                            <label class="col-sm-6 col-xs-6 text-center labelE" for="correoE" style="font-weight: normal;">Correo Adicional</label>
                            <input class="col-sm-5 col-xs-5 inputE" id="correoAdcE" name="correoAdcE" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />
                        </div>
                        <input type="hidden" id="idE" name="idE" value="">
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="cerrarC" data-dismiss="modal" onclick="location.reload();">Cerrar</button>
                        <button type="button" id="btnEditarCliente" name="btnEditarCliente" class="btn btn-success" onclick="location.reload();">Editar</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="assets/jquery/dist/jquery.min.js"></script>
        <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script type="text/javascript" charset="utf8" src="assets/datatables/datatables.js"></script>
        <script src="assets/Scripts/main.js"></script>
        <script src="assets/Scripts/cliente.js"></script>
        <script src="assets/Scripts/starrr.js"></script>


    </body>

    </html>
<?php } else { ?>

<?php header('Location:administrador.php');
}
?>