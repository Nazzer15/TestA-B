<?php
/*Aqui se realizan el proceso de las operaciones*/
include "./Clases/Empleado.php";
$accion=$_POST["accion"];
$empleado = new Empleado();
switch ($accion){
case "login":
    $resultado= $empleado->Login($_POST);
    break;
case "crear-usuario":
    $resultado=$empleado->CrearUsuario($_POST);
    break;
case "edita-usuario":
    $id = $_POST["id"];
    $resultado=$empleado->EditaUser($id);
    break;
case "elimina-usuario":
    $id = $_POST["id"];
    $resultado=$empleado->EliminaUser($id);
    break;
case "logout":
    session_start();
    session_destroy();
    header("Location:index.php");

    break;
    default :
    break;
}
echo json_encode($resultado);