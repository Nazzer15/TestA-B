<?php
require './valida-acceso.php';
include './BD/ConexionBD.php';
$empleados = "SELECT empleadoId,cedula,nombre,apellido,correo,estado,rol,llamadas,reuniones,llamadas,contrataciones from empleado where rol='empleado'";
$nombre = $_SESSION["datos-usuario"]["nombre"];
$apellido = $_SESSION["datos-usuario"]["apellido"];
$rol = $_SESSION["datos-usuario"]["rol"];
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
        <link rel="stylesheet" href="assets/admin-verempleados.css" />
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/datatables/datatables.min.css" />
        <link rel="stylesheet" href="assets/datatables/DataTables-1.10.22/css/dataTables.bootstrap4.min.css" />.
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script src="https://kit.fontawesome.com/122bb03e13.js" crossorigin="anonymous"></script>



    </head>
    <style>
        #cedula-error,
        #nombre-error,
        #apellido-error,
        #correo-error,
        #nombree-error,
        #apellidoe-error,
        #correoe-error {
            color: red;
            width: 25%;
            text-align: end;
            margin: 0 auto;
            height: 0px;
        }

        td:hover {
            cursor: pointer;
            text-decoration: none;
        }

        table.dataTable tbody tr {
            background: transparent;
        }

        .body__container {
            margin: 0 auto;
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
        
    </style>

    <body>
        <?php
        include './includes/adminlayout.php';
        $resultado = mysqli_query($mysql, $empleados);
        ?>

        <div class="container">

            <div class="body__container">
                <div class="titlecontainer">
                    <h1>Usuarios <button type="button" id="btn-agrega-empleado" style="background: transparent; border: none; color:#70ccd1"><i class="fas fa-plus-circle"></i></button></h1>
                </div>

                <div class="usuarios">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table id="tablausuarios" class="table table-hover" style="width:100%; background: transparent;">
                                        <thead class="text-center">
                                            <tr>


                                                <th style="display:none">Id</th>
                                                <th style="display:none">cedula</th>

                                                <th class="text-center">Nombre</th>


                                                <th class="text-center">Apellido</th>
                                                <th style="display:none">correo</th>
                                                <th style="display:none">rol</th>
                                                <th style="display:none">contrataciones</th>
                                                <th style="display:none">reuniones</th>
                                                <th style="display:none">llamadas</th>


                                                <th class="text-center">Acciones</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($resultado as $result) { if($result["estado"]==1){

                                            ?>
                                                <tr class="text-center">
                                                    <td style="display:none">
                                                        <div id="ID_empleado"> <?php echo $result["empleadoId"] ?></div>
                                                    </td>
                                                    <td style="display:none"><a><?php echo $result["cedula"] ?></a></td>
                                                    <td><a class="nombrelink"><?php echo $result["nombre"] ?></a></td>


                                                    <td><?php echo $result["apellido"] ?></td>
                                                    <td style="display:none"> <?php echo $result["correo"] ?></td>

                                                    <td style="display:none"> <?php echo $result["rol"] ?></td>
                                                    <td style="display:none"> <?php echo $result["contrataciones"] ?></td>
                                                    <td style="display:none"> <?php echo $result["reuniones"] ?></td>
                                                    <td style="display:none"> <?php echo $result["llamadas"] ?></td>


                                                    <td>
                                                        <div class="text-center ">
                                                            <div class="btn-group">

                                                                <button class="btn btn-warning btnEditar">Editar</button>



                                                                <button class="btn btn-danger btnEliminar">Eliminar</button>





                                                            </div>
                                                        </div>

                                                    </td>

                                                </tr>

                                            <?php }else{} } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="pantalla">
                    <div class="pantalla-top">
                        <div class="icon-user">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="pantalla-top-info">
                            <p id="fullnamecontainer"></p>
                            <p id="emailholder"></p>
                        </div>
                    </div>
                    <div class="pantalla-bottom">
                        <div class="caja ">
                            <h4>Contrataciones</h4>
                            <p><strong id="contratacionesholder"></strong></p>
                        </div>
                        <div class="caja">
                            <h4>Reuniones</h4>
                            <p><strong id="reunionesholder"></strong></p>
                        </div>
                        <div class="caja">
                            <h4>Llamadas</h4>
                            <p><strong id="llamadasholder"></strong></p>
                        </div>
                    </div>
                </div>
            </div>




        </div>

        <!--Large modal Agregar Empleado-->
        <div class="modal" id="modalUsuario" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header mb-3" style="margin-bottom: 30px;">
                        <h5 class="modal-title text-center"></h5>
                    </div>
                    <form id="formUsuario" method="post" action="">
                        <div style="padding-bottom: 50px;">
                            <label class="col-md-6 text-center " for="cedula" style="font-weight: normal;">Cédula</label>
                            <input class="col-md-4 inputE" id="cedula" type="number" name="cedula" required minlength="9" maxlength="9" />
                            <input type="hidden" id="id" name="id" value="">
                        </div>
                        <div style="padding-bottom: 50px;">
                            <label class="col-md-6 text-center " for="nombre" style="font-weight: normal;">Nombre</label>
                            <input class="col-md-4 inputE" id="nombre" type="text" name="nombre" required pattern="[a-zA-Z ]+" />
                        </div>
                        <div style="padding-bottom: 50px;">
                            <label class="col-md-6 text-center " for="apellido" style="font-weight: normal;">Apellido</label>
                            <input class="col-md-4 inputE" id="apellido" name="apellido" type="text" required pattern="[a-zA-Z ]+" />
                        </div>
                        <div style="padding-bottom: 50px;">
                            <label class="col-md-6 text-center " for="correo" style="font-weight: normal;">Correo</label>
                            <input class="col-md-4 inputE" id="correo" name="correo" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required />
                        </div>
                        <div style="padding-bottom: 70px;">
                            <label for="colFormLabel" class="col-md-6 col-form-label text-center" style="font-weight: normal;">Rol:</label>
                            <div class="col-md-4" style="padding: 0;">
                                <select name="rol" class="form-control" id="rol" style="width: 100%;">
                                    <option value="empleado">Empleado</option>
                                    <option value="administrador">Administrador</option>

                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="cerrar" data-dismiss="modal" onclick="location.reload();">Cerrar</button>
                        <button type="button" id="btnGuardar" name="btnGuardar" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--modal editar-->
        <div class="modal" id="modalEditar" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header mb-3" style="margin-bottom: 30px;">
                        <h5 class="modal-title text-center"></h5>
                    </div>
                    <form id="formEditar" method="post" action="">
                        <div style="padding-bottom: 50px;">
                            <label class="col-md-6 text-center " for="cedula" style="font-weight: normal;">Cedula</label>
                            <input class="col-md-4" id="cedulae" type="number" name="cedula" required minlength="9" maxlength="9" />
                            <input type="hidden" id="ide" name="id" value="">
                        </div>
                        <div style="padding-bottom: 50px;">
                            <label class="col-md-6 text-center " for="nombre" style="font-weight: normal;">Nombre</label>
                            <input class="col-md-4 inputE" id="nombree" type="text" name="nombre" required pattern="[a-zA-Z]+" />
                        </div>
                        <div style="padding-bottom: 50px;">
                            <label class="col-md-6 text-center " for="apellido" style="font-weight: normal;">Apellido</label>
                            <input class="col-md-4 inputE" id="apellidoe" name="apellido" type="text" required pattern="[a-zA-Z]+" />
                        </div>
                        <div style="padding-bottom: 50px;">
                            <label class="col-md-6 text-center " for="correo" style="font-weight: normal;">Correo</label>
                            <input class="col-md-4 inputE" id="correoe" name="correo" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required />
                        </div>
                        <div style="padding-bottom: 70px;">
                            <label for="colFormLabel" class="col-md-6 col-form-label text-center" style="font-weight: normal;">Rol:</label>
                            <div class="col-md-4" style="padding: 0;">
                                <select name="rol" class="form-control" id="role" style="width: 100%;">
                                    <option value="empleado">Empleado</option>
                                    <option value="administrador">Administrador</option>

                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="cerrare" data-dismiss="modal" onclick="location.reload();">Cerrar</button>
                        <button type="button" id="btnEditarBack" name="btnEditarBack" class="btn btn-success">Editar</button>
                    </div>
                </div>
            </div>
        </div>




        <!-- jQuery, Popper.js, Bootstrap JS -->
        <script src="assets/jquery/dist/jquery-3.3.1.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script src="assets/popper/popper.min.js"></script>
        <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="assets/Scripts/Usuario.js"></script>
        <!-- datatables JS -->
        <script type="text/javascript" src="assets/datatables/datatables.min.js"></script>
        <!-- Validaciones -->

    </body>

    </html>

<?php } else { ?>

<?php
    header('Location:empleado.php');
}
