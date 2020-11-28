<?php
/*Aqui se realizan el proceso de las operaciones*/
include "./Clases/test.php";
include "./Clases/Campana.php";

$accion = $_POST["accionTest"];

$test = new Test();
$campana = new Campana();

switch ($accion) {

    case "crearTest":
        $id = $_POST["empleadoId"];
        $resultado = $test->CrearTest($_POST, $id);
        break;
    case "editarTest":
        $id = $_POST['idE'];
        echo $id;
        $resultado = $test->editarTest($id);
        break;
    case "eliminarTest":
        $id = $_POST["idE"];
        $resultado = $test->eliminarTest($id);
        break;
    case "crearCampana":
        $resultado = $campana->CrearCampana($_POST);
        break;
    case "verTest":
        $id = $_POST['idE'];
        $_SESSION['testId'] = [$id];
        header("location: empleado-vertestunico.php");
        break;
    default:
        break;
}
echo json_encode($resultado);
