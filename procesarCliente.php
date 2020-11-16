<?php
/*Aqui se realizan el proceso de las operaciones*/
include "./Clases/Cliente.php";

$accion = $_POST["accionCliente"];

$cliente = new Cliente();


switch ($accion) {

    case "crearCalificacion":
        $resultado = $cliente->crearCalificacion($_POST);
        break;

    case "crearCliente":
        $id = $_POST['empleadoId'];
        $resultado = $cliente->crearCliente($_POST, $id);
        break;
    case "editarCliente":
        $id = $_POST['idE'];
        echo $id;
        $resultado = $cliente->editarCliente($id);
        break;
    case "eliminarCliente":
        $id = $_POST["idE"];
        $resultado = $cliente->eliminarCliente($id);
        break;

    default:
        break;
}
echo json_encode($resultado);
