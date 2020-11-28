<?php

class Test
{

    private $testId;
    private $campanaN;
    private $empleadoId;
    private $medioId;
    private $clienteId;

    private $descripcion1;
    private $descripcion2;
    private $file1;
    private $file2;
    private $ppt1;
    private $ppt2;
    private $mesId;

    function Test()
    {
        $this->testId = "";
        $this->campanaN = "";
        $this->empleadoId = "";
        $this->medioId = "";
        $this->clienteId = "";

        $this->descripcion1 = "";
        $this->descripcion2 = "";
        $this->file1 = "";
        $this->file2 = "";
        $this->ppt1 = "";
        $this->ppt2 = "";
        $this->mesId = "";
    }

    function getTestId()
    {
        return $this->testId;
    }

    function getCampanaN()
    {
        return $this->campanaN;
    }

    function getEmpleadoId()
    {
        return $this->empleadoId;
    }

    function getMedioId()
    {
        return $this->medioId;
    }

    function getClienteId()
    {
        return $this->clienteId;
    }


    function getDescripcion1()
    {
        return $this->descripcion1;
    }

    function getDescripcion2()
    {
        return $this->descripcion2;
    }

    function getFile1()
    {
        return $this->file1;
    }
    function getfile2()
    {
        return $this->file2;
    }
    function getPpt1()
    {
        return $this->ppt1;
    }
    function getPpt2()
    {
        return $this->ppt2;
    }
    function getMesId()
    {
        return $this->mesId;
    }

    function CrearTest($datos, $id)
    {
        require './BD/ConexionBD.php';
        $campanaN = (isset($_POST['campanaN'])) ? $_POST['campanaN'] : '';
        $empleadoId = (isset($_POST['empleadoId'])) ? $_POST['empleadoId'] : '';
        $medioId = (isset($_POST['medioId'])) ? $_POST['medioId'] : '';
        $clienteId = (isset($_POST['clienteId'])) ? $_POST['clienteId'] : '';
        $descripcion1 = (isset($_POST['descripcion1'])) ? $_POST['descripcion1'] : '';
        $descripcion2 = (isset($_POST['descripcion2'])) ? $_POST['descripcion2'] : '';
        $file1 = (isset($_POST['file1'])) ? $_POST['file1'] : '';
        $file2 = (isset($_POST['file2'])) ? $_POST['file2'] : '';
        $ppt1 = (isset($_POST['ppt1'])) ? $_POST['ppt1'] : '';
        $ppt2 = (isset($_POST['ppt2'])) ? $_POST['ppt2'] : '';
        $mesId = (isset($_POST['mesId'])) ? $_POST['mesId'] : '';

        if ($descripcion1 != "") {
            $tipoab = "A";
        } else {
            $tipoab = "B";
        }
        $retorno = array();
        /*$insert="INSERT INTO campana(mesId,nombreCampana) VALUES ($mesId,$campanaN) where  ";
        $insert1=$mysql->query($insert);

        $extraer="SELECT campanaId from campana where nombreCampana='$campanaN' and mesId='$mesId'";
        $campanaId=$mysql->query($extraer);
        echo $campanaId;
        $campanaId=$campanaId[0];*/
        $consulta = "INSERT INTO testab(campanaId,empleadoId,medioId,clienteId,tipoab,descripcion1,descripcion2,file1,file2, estado )"
            . "VALUES ('$campanaN','$id','$medioId','$clienteId','$tipoab','$descripcion1','$descripcion2','$file1','$file2', 1)";

        //echo $consulta;
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


    function EditarTest($datos)
    {
        require './BD/ConexionBD.php';

        $descripcion1 = (isset($_POST['descripcion1'])) ? $_POST['descripcion1'] : '';
        $descripcion2 = (isset($_POST['descripcion2'])) ? $_POST['descripcion2'] : '';
        $file1 = (isset($_POST['file1'])) ? $_POST['file1'] : '';
        $file2 = (isset($_POST['file2'])) ? $_POST['file2'] : '';


        $retorno = array();

        $consulta = "UPDATE testab SET descripcion1='$descripcion1',descripcion2='$descripcion2',file1='$file1',file2='$file2' WHERE testId='$datos'";
        $resultado = $mysql->query($consulta);
        echo $consulta;
        if ($mysql->affected_rows > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }

    function EliminarTest($datos)
    {
        require './BD/ConexionBD.php';

        //$id = (isset($_POST['id'])) ? $_POST['id'] : '';

        $consulta = "UPDATE testab SET estado='0' WHERE testId= '$datos'";
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
