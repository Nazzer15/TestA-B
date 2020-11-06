<?php

class Empleado {

    private $empleadoId;
    private $objetivoExpectativaId;
    private $objetivoRealId;
    private $cedula;
    private $nombre;
    private $correo;
    private $contrasena;
    private $estado;
    private $rol;

    function Empleado() {
        $this->empleadoId = "";
        $this->objetivoExpectativaId = "";
        $this->objetivoRealId = "";
        $this->cedula = "";
        $this->nombre = "";
        $this->correo = "";
        $this->contrasena = "";
        $this->estado = "";
        $this->rol = "";
    }

    function getEmpleadoId() {
        return $this->empleadoId;
    }

    function getObjetivoExpectativaId() {
        return $this->objetivoExpectativaId;
    }

    function getObjetivoRealId() {
        return $this->objetivoRealId;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function getEstado() {
        return $this->estado;
    }

    function getRol() {
        return $this->rol;
    }

    function Login($datos) {
        require "./BD/ConexionBD.php";
        $retorno = array();

        $query = "SELECT * FROM empleado WHERE correo='";
        $query .= $datos["email"] . "'AND contrasena='" . $datos["password"] . "'";

        $resultado = $mysql->query($query);

        if ($resultado->num_rows > 0) {
            $retorno["valido"] = true;
            //$retorno["datos"]= $resultado->fetch_assoc();

            session_start();
            $_SESSION["datos-usuario"] = $resultado->fetch_assoc();
            //  var_dump($Usuario);/*muestra los elementos de una variable arreglo*/
            //Abrir sesion
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }

    function CrearUsuario($datos) {
        require './BD/ConexionBD.php';
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
        $apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
        $correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';
        $cedula = (isset($_POST['cedula'])) ? $_POST['cedula'] : '';
        $rol = (isset($_POST['rol'])) ? $_POST['rol'] : '';

        $retorno = array();
        $consulta = "INSERT INTO empleado(cedula,nombre,apellido,correo,contrasena,estado,rol )VALUES ('$cedula','$nombre','$apellido','$correo','default',1,'$rol')";

        //echo $consulta;
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

    function EditaUser($datos) {
        require './BD/ConexionBD.php';
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
        $apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
        $correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';
        $rol = (isset($_POST['rol'])) ? $_POST['rol'] : '';
       
        $retorno = array();

        $consulta = "UPDATE empleado SET nombre='$nombre',apellido='$apellido',correo='$correo',rol='$rol' WHERE empleadoId='$datos'";
        $resultado = $mysql->query($consulta);
        echo $consulta;
         if ($mysql->affected_rows > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }

    function EliminaUser($datos) {
        require './BD/ConexionBD.php';

        //$id = (isset($_POST['id'])) ? $_POST['id'] : '';
        echo $datos;
        $consulta = 'DELETE FROM empleado where empleadoId= '.$datos.'';
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
