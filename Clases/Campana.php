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

        $retorno = array();
        $consulta = "INSERT INTO campana(mesId,nombreCampana)VALUES ($mesId, '$nombreCampana')";

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
}
