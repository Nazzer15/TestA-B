<?php

class Cliente
{
    private $clienteId;
    private $calificacionId;
    private $sectorId;
    private $estadoClienteId;
    private $empleadoId;
    private $marca;
    private $nombreContacto;
    private $correo;
    private $nombreAdicional;
    private $correoAdicional;
    private $monto;
    private $estado;


    function Cliente()
    {
        $this->clienteId = "";
        $this->calificacionId = "";
        $this->sectorId = "";
        $this->estadoClienteId = "";
        $this->empleadoId = "";
        $this->marca = "";
        $this->nombreContacto = "";
        $this->correo = "";
        $this->nombreAdicional = "";
        $this->correoAdicional = "";
        $this->monto = "";
        $this->estado = "";
    }

    function getClienteId()
    {
        return $this->clienteId;
    }

    function getCalificacionId()
    {
        return $this->calificacionId;
    }

    function getSectorId()
    {
        return $this->sectorId;
    }

    function getEstadoClienteId()
    {
        return $this->estadoClienteId;
    }

    function getEmpleadoId()
    {
        return $this->empleadoId;
    }

    function getMarca()
    {
        return $this->marca;
    }

    function getNombreContacto()
    {
        return $this->nombreContacto;
    }

    function getCorreo()
    {
        return $this->correo;
    }

    function getNombreAdicional()
    {
        return $this->nombreAdicional;
    }

    function getCorreoAdicional()
    {
        return $this->correoAdicional;
    }

    function getMonto()
    {
        return $this->monto;
    }

    function getEstado()
    {
        return $this->estado;
    }

    function crearCalificacion($datos)
    {
        require './BD/ConexionBD.php';
        $cantidadLocales = (isset($_POST['cantidadLocales'])) ? $_POST['cantidadLocales'] : '';
        $sectorObjetivo = (isset($_POST['sectorObjetivo'])) ? $_POST['sectorObjetivo'] : '';
        $colaboradores = (isset($_POST['colaboradores'])) ? $_POST['colaboradores'] : '';
        $zona = (isset($_POST['zona'])) ? $_POST['zona'] : '';
        $reconocimiento = (isset($_POST['reconocimiento'])) ? $_POST['reconocimiento'] : '';
        $ventas = (isset($_POST['ventas'])) ? $_POST['ventas'] : '';
        $posicion = (isset($_POST['posicion'])) ? $_POST['posicion'] : '';
        $total = (int)$cantidadLocales + (int)$sectorObjetivo + (int)$colaboradores + (int)$zona + (int)$reconocimiento + (int)$ventas + (int)$posicion;

        $retorno = array();
        $consulta = "INSERT INTO calificacion(cantidadLocal,sectorObjetivo,colaboradores,zonaUbicacion,reconocimiento,ventas, posicreci, total)VALUES ($cantidadLocales,$sectorObjetivo,$colaboradores,$zona,$reconocimiento,$ventas,$posicion,$total)";

        //echo  $consulta;
        $resultado = $mysql->query($consulta);
        $id = $mysql->insert_id;

        if ($id > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }

    function crearCliente($datos, $id)
    {
        require './BD/ConexionBD.php';
        $nombreMarca = (isset($_POST['nombreMarca'])) ? $_POST['nombreMarca'] : '';
        $nombreContacto = (isset($_POST['nombreContacto'])) ? $_POST['nombreContacto'] : '';
        $sector = (isset($_POST['sector'])) ? $_POST['sector'] : '';

        $email = (isset($_POST['email'])) ? $_POST['email'] : '';
        $nombreAdicional = ($_POST['nombreAdicional']) ? $_POST['nombreAdicional'] : '';
        $emailAdicional = ($_POST['emailAdicional']) ? $_POST['emailAdicional'] : '';

        $retorno = array();
        $calificacionQuery = $mysql->query("SELECT MAX(calificacionId) FROM calificacion");
        $calificacionId = mysqli_fetch_row($calificacionQuery);




        $consulta = "INSERT INTO cliente(calificacionId,sectorId,estadoClienteId,empleadoId,marca,nombreContacto, correo, nombreAdicional, correoAdicional, monto, estado)VALUES ($calificacionId[0],$sector,1,$id,'$nombreMarca','$nombreContacto','$email','$nombreAdicional', '$emailAdicional', 0, 1)";

        echo  $consulta;
        $resultado = $mysql->query($consulta);
        $id = $mysql->insert_id;

        if ($id > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }

    function editarCliente($datos)
    {
        require './BD/ConexionBD.php';
        $marca = (isset($_POST['marcaE'])) ? $_POST['marcaE'] : '';
        $nombreContacto = (isset($_POST['nombreContactoE'])) ? $_POST['nombreContactoE'] : '';
        $correo = (isset($_POST['correoE'])) ? $_POST['correoE'] : '';
        $estado = (isset($_POST['estadoE'])) ? $_POST['estadoE'] : '';
        $monto = (isset($_POST['montoE'])) ? $_POST['montoE'] : '';
        $nombreContactoAdic = (isset($_POST['nombreContactoAdcE'])) ? $_POST['nombreContactoAdcE'] : '';
        $correoAdic = (isset($_POST['correoAdcE'])) ? $_POST['correoAdcE'] : '';

        $retorno = array();

        $consulta = "UPDATE cliente SET marca='$marca', nombreContacto='$nombreContacto', correo='$correo', estadoClienteId='$estado', monto='$monto',nombreAdicional='$nombreContactoAdic', correoAdicional='$correoAdic'  WHERE clienteId='$datos'";
        echo $consulta;
        $resultado = $mysql->query($consulta);
        if ($mysql->affected_rows > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }

    function eliminarCliente($datos)
    {
        require './BD/ConexionBD.php';

        //$id = (isset($_POST['idE'])) ? $_POST['idE'] : '';
        echo $datos;
        $consulta = "UPDATE cliente SET estado='0' WHERE clienteId= '$datos'";
        $resultado = $mysql->query($consulta);
        echo $consulta;
        if ($mysql->affected_rows > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }
}
