<!doctype html>
<html lang="es">

<head>
    <title>Cambiar contraseña</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/style.css" type="text/css" media="all">
    <script src="https://kit.fontawesome.com/122bb03e13.js" crossorigin="anonymous"></script>
    <link href="//fonts.googleapis.com/css?family=Quattrocento+Sans:400,400i,700,700i" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Mukta:200,300,400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/bootstrap.css" />

</head>

<body>
    <?php
    /*
    if(isset($_POST['editar'])){
        include './BD/ConexionBD.php';
        $contraActual = $mysqli->mysqli_real_escape_string($_POST['contraActual']);
        $contraNueva = $mysqli->mysqli_real_escape_string($_POST['contraNueva']);
        $contraConf = $mysqli->mysqli_real_escape_string($_POST['confirmarContra']);

        $contraActual = md5($contraActual);
        $contraActual = md5($contraActual);
        $contraActual = md5($contraActual);

        $sql = $mysqli->query("SELECT contrasena from empleado where empleadoId = '".$_SESSION['empleadoId']."'");
        $row = $sql->fetch_array();

        if($row['contrasena'] == $contraActual){

        }else{
            echo "Contraseña actual no coincide";
        }
    }
    */
    ?>
    <div class="container">
        <div class="text-center">
            <img src="assets/images/logo-blanco.png" class="logopng" />
        </div>
        <form method="post">
            <div class="col-md-12" style="margin-top: 30px; justify-content: center; display: flex;">
                <div class="col-md-6">
                    <div class="form-group" >
                        <input type="password" class="form-control" name="contraActual" placeholder="Contraseña actual" style="margin-top: 22px;">
                    </div>
                    <div class="form-group" >

                        <input type="password" class="form-control" name="contraNueva" placeholder="Nueva contraseña" style="margin-top: 22px;">
                    </div>
                    <div class="form-group" >

                        <input type="password" class="form-control" name="confirmarContra" placeholder="Confirmar contraseña" style="margin-top: 22px;">
                    </div>
                    <br />
                    <div style="display: flex; justify-content: center;">
                        <button type="editar" name="editar" class="btn btn-success">Editar</button>
                    </div>
                </div>
            </div>

        </form>
    </div>

    <script src="assets/jquery/dist/jquery.min.js"></script>
    <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

</body>

</html>