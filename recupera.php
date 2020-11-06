<?php
/* Codigo sin modificar */
function enviarEmail($email, $nombre, $asunto, $cuerpo)
{

	require_once 'PHPMailer/PHPMailerAutoload.php';

	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tipo de seguridad'; //Modificar
	$mail->Host = 'dominio'; //Modificar
	$mail->Port = puerto; //Modificar

	$mail->Username = 'correo emisor'; //Modificar
	$mail->Password = 'password de correo emisor'; //Modificar

	$mail->setFrom('correo emisor', 'nombre de correo emisor'); //Modificar
	$mail->addAddress($email, $nombre);

	$mail->Subject = $asunto;
	$mail->Body    = $cuerpo;
	$mail->IsHTML(true);

	if ($mail->send())
		return true;
	else
		return false;
}

?>
<!doctype html>
<html lang="es">

<head>
	<title>TestA/B</title>
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
	<script src="assets/jquery/dist/jquery.min.js"></script>
	<script src="assets/Scripts/Usuario.js"> </script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>
	<section>
		<div class="layer">
			<div class="content-w3ls">
				<div class="text-center test">
					<img src="assets/images/logo-blanco.png" class="logopng" />
				</div>
				<div class="content-bottom">
				</div>
			</div>
			<div class="bottom-grid1">
			</div>

			<div class="container" style="display: flex; justify-content: center;">
				<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-info">
						<div class="title-container text-center">
							<h1>Recuperar contraseña</h1>
						</div>

						<div style="padding-top:30px" class="panel-body">


							<form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">

								<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input id="email" type="email" class="form-control" name="email" placeholder="Ingrese su correo" required>
								</div>

								<div style="margin-top:10px" class="form-group">
									<div class="wthree-field">
										<input type="hidden" name="accion" value="login">
										<button type="button" id="btn_login" name="btn_login" class="btn">Enviar</button>
									</div>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
	</section>
</body>

</html>