<?php
class Campana
{

    private $campanaId;
    private $mesId;
    private $nombreCampana;

    function Test()
    {
        $this->campanaId = "";
        $this->mesId = "";
        $this->nombreCampana = "";
    }

    function getcampanaId()
    {
        return $this->campanaId;
    }

    function getmesId()
    {
        return $this->mesId;
    }

    function getnombreCampana()
    {
        return $this->nombreCampana;
    }

    function crearCampana($data)
    {
        require './BD/ConexionBD.php';
        $nombreCampana = (isset($_POST['nombreCampana'])) ? $_POST['nombreCampana'] : '';
        $mesId = (isset($_POST['mesIdCampana'])) ? $_POST['mesIdCampana'] : '';
        $idEmpleado = (isset($_POST['idEmpleado'])) ? $_POST['idEmpleado'] : '';
        $retorno = array();
        $consulta = "INSERT INTO campana(mesId,nombreCampana)VALUES ($mesId, '$nombreCampana')";
        //echo  $consulta;
        $mysql->query($consulta);
        $id = $mysql->insert_id;

        $campanaQuery = $mysql->query("SELECT MAX(campanaId) FROM campana");
        $campanaId = mysqli_fetch_row($campanaQuery);
        //echo $campanaId[0];

        //echo $idEmpleado;

        $insertTest = "INSERT INTO `test`(`campanaId`, `empleadoId`, `medioLlamadaId`, `medioEmailId`, `medioWhatsappId`, `medioPPTAgenciaId`, `medioPPTReunionId`, `estado`, `estadoLogico`) VALUES ($campanaId[0],$idEmpleado,null,null,null,null,null,'En proceso', 1)";
        echo $insertTest;
        $insertTestBd = $mysql->query($insertTest);
        

        if ($id > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }
    
}
