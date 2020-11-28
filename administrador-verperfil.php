<?php
require './valida-acceso.php';
include './BD/ConexionBD.php';
require './Clases/Empleado.php';
require './Clases/FuncionesPerfil.php';

$empleado = new Funciones();
$nombre = $_SESSION["datos-usuario"]["nombre"];
$id = $_SESSION["datos-usuario"]["empleadoId"];
$apellido = $_SESSION["datos-usuario"]["apellido"];
$cedula = $_SESSION["datos-usuario"]["cedula"];
$correo = $_SESSION["datos-usuario"]["correo"];
$rol = $_SESSION["datos-usuario"]["rol"];

?>

<!doctype html>
<html lang="es">

<head>
	<title>Perfil</title>
	<!-- Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<!-- //Meta-Tags -->
	<!-- Index-Page-CSS -->
	<link rel="stylesheet" href="assets/style.css" type="text/css" media="all">
	<!-- //Custom-Stylesheet-Links -->
	<!--fonts -->
	<!-- //fonts -->
	<script src="https://kit.fontawesome.com/122bb03e13.js" crossorigin="anonymous"></script>
	<!-- //Font-Awesome-File-Links -->
	<!-- Google fonts -->
	<link href="//fonts.googleapis.com/css?family=Quattrocento+Sans:400,400i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Mukta:200,300,400,500,600,700,800" rel="stylesheet">
	<!-- Google fonts -->

	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous"> -->
	
	<style>
		.container {
			width: 80%;
		}
	</style>
</head>

<body>

	<div class="container" style="background: red;">
		<div class="text-center test">
			<img src="assets/images/logo-blanco.png" class="logopng" />
		</div>
		<div class="card border-light mb-3" style="max-width: 18rem;">
			<div class="card-header">ID Usuario: <?php echo "#" . $id ?></div>
			<div class="card-body">
				<h5 class="card-title">Nombre:</h5>
				<p class="card-text"><?php echo $nombre . " " . $apellido ?></p>
			</div>
		</div>
		<div class="card border-light mb-3" style="max-width: 18rem;">
			<div class="card-body">
				<h5 class="card-title">Correo electrónico:</h5>
				<p class="card-text"><?php echo $correo ?></p>
			</div>
		</div>
		<div class="card border-light mb-3" style="max-width: 18rem;">
			<div class="card-body">
				<h5 class="card-title">Identificación:</h5>
				<p class="card-text"><?php echo $cedula ?></p>

			</div>
		</div>
		<div class="card border-light mb-3" style="max-width: 18rem;">
			<div class="card-body">
				<h5 class="card-title">Contraseña:</h5>
				<a href="cambiaContra.php" style=color:#1c73ff>Modificar contraseña</a>
			</div>
		</div>
		<!--
		<div class="container-card">
			<div class="card" style="width: 18rem;">
				<div class="card-header">
					<input type="text" readonly class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $nombre . " " . $apellido ?>">
				</div>
				<div class="form-group">
					<form action="procesarEmpleado.php" method="POST">
						<input type="hidden" class="form-control" name="cedula">
						<input type="text" readonly class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $nombre ?>">
						<input type="text" readonly class="form-control" name="nombre" placeholder="Apellido" value="<?php echo $apellido ?>">
						<input type="text" readonly class="form-control" name="correo" placeholder="Correo" value="<?php echo $correo ?>">
						<input type="text" readonly class="form-control" placeholder="Cedula" value="<?php echo $cedula ?>">
					</form>
				</div>
			</div>
		</div>
		-->
	</div>

	<script src="assets/jquery/dist/jquery.min.js"></script>
	<script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>