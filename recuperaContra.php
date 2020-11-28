<!doctype html>
<html lang="es">

<head>
	<title>Olvidar contraseña</title>
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

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

</head>



<body>
	<div class="layer">
		<div class="content-w3ls">
			<div class="text-center test">
				<img src="assets/images/logo-blanco.png" class="logopng" />
			</div>
			<br />
			<h1>Recuperar contraseña</h1>
			<br />
			<div class="content-bottom">
				<form method="post">
					<div class="field-group">
						<div class="wthree-field">
							<input class="placeholder" name="email" type="email" id="email" placeholder="Email" required="">
						</div>
					</div>
					<div class="wthree-field">
						<input type="submit" name="enviar">
					</div>
				</form>
				<?php
				include('BD/conexionBD.php');
				include("enviaCorreo.php");
				?>
			</div>
		</div>
	</div>
</body>

</html>