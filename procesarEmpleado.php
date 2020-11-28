<?php
    require '/Clases/FuncionesPerfil.php';
    $empleado = new funciones();
    $accion = $_POST["accion"];
    switch ($accion) {
        case 'actualizarEmpleado':
            $resultado = $empleado->actualizar($_POST);
            if($resultado["valido"]){
                echo "Empleado actualizados";
            }else{
                echo "Error actualizando";
            }
            break;
        
        default:
            # code...
            break;
    }
?>