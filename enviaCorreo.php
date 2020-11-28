<?php
include('BD/conexionBD.php');

if (isset($_POST['email'])) {
    $correo = $_POST['email'];
    $asunto = "Recuperar contraseña";
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    // Create email headers
    $headers .= 'From: ' . "testabphp@gmail.com" . "\r\n" .
        'Reply-To: ' . "testabphp@gmail.com" . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    //to,subject,msg,headers    
    $msg = '<html><body>';
    $msg .= '<p>Saludos usuario:</p>';
    $msg .= '<p>Si olvidaste tu contraseña, por favor ingresa a la siguiente dirección: </p>';
    $msg .= '<a href="http://localhost/testa-b-proyecto/cambiaContra.php">Cambiar Contraseña</a>';
    $msg .= '</body></html>';
    
    mail($correo, $asunto, $msg, $headers);

    echo "Correo enviado";
}
