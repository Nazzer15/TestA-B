<?php

    Class Funciones{
        private $empleadoId;
        private $objetivoExpectativaId;
        private $objetivoRealId;
        private $cedula;
        private $nombre;
        private $correo;
        private $contrasena;
        private $estado;
        private $rol;

        public function __construct()
        {
            $this->empeladoId = 0;
            $this->objetivoExpectativaId = 0;
            $this->objetivoRealId = 0;
            $this->cedula = 0;
            $this->nombre = "";
            $this->correo = "";
            $this->contrasena = "";
            $this->rol = "";
        }

        function findEmpleado($cedula){
            require '/BD/ConexionBD';
            $retorno = array();
            $query = "SELECT nombre, correo, cedula from empleado where cedula = '". $cedula."'";
            $search = $mysql->query($query);
            if($search->num_rows > 0){
                $empleado = $search -> fetch_assoc();
                $retorno["valido"] = true;
                $retorno["data"] = $empleado;
            }else{
                $retorno["valido"] = false;
            }
            return $retorno;
        }

        function actualizar($data = array()){
            require '/BD/ConexionBD';
            $retorno = array();
            $query = "UPDATE empleado Set";
            $query .= "nombre = '".$data["nombre"]."',";
            $query .= "cedula = '".$data["cedula"]."',";
            $query .= "correo = '".$data["correo"]."',";
            $query .= "WHERE cedula = '".$data["cedula"]."'";
            $search = $mysql->query($query);
            if ($mysql->affected_rows > 0) {
                    $retorno ["valido"] = true;
            }else{
                $retorno["valido"]=false;
            }
            return $retorno;
        }
    }
?>