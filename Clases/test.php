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
        $testId = $id;
        $medio = (isset($_POST['medioId'])) ? $_POST['medioId'] : '';
        $descripcion1 = (isset($_POST['descripcion1'])) ? $_POST['descripcion1'] : '';
        $descripcion2 = (isset($_POST['descripcion2'])) ? $_POST['descripcion2'] : '';
        $file1 = (isset($_POST['file1'])) ? $_POST['file1'] : '';
        $file2 = (isset($_POST['file2'])) ? $_POST['file2'] : '';

        $retorno = array();

        switch ($medio) {
            case 1:

                $medioLlamada = $mysql->query("SELECT medioLlamadaId FROM test WHERE testId = '$testId'");
                $idllamada = mysqli_fetch_row($medioLlamada);
                echo $idllamada[0];

                if ($idllamada[0] > 0) {
                    $medioQuery = $mysql->query("SELECT MAX(medioLlamadaId) FROM medioLlamada");
                    $medioLlamadaId = mysqli_fetch_row($medioQuery);

                    $updateTest = "UPDATE test SET medioLlamadaId = $medioLlamadaId[0] WHERE testId = '$testId'";
                    $mysql->query($updateTest);
                } else {
                    $consulta = "INSERT INTO mediollamada(medioNombre,descripcion1,descripcion2,imagen1,imagen2)"
                        . "VALUES ('Llamada','$descripcion1','$descripcion2','$file1','$file2')";
                    $mysql->query($consulta);
                    $id = $mysql->insert_id;

                    $medioQuery = $mysql->query("SELECT MAX(medioLlamadaId) FROM medioLlamada");
                    $medioLlamadaId = mysqli_fetch_row($medioQuery);

                    $updateTest = "UPDATE test SET medioLlamadaId = $medioLlamadaId[0] WHERE testId = '$testId'";
                    $mysql->query($updateTest);
                }
                break;

            case 2:

                $medioEmail = $mysql->query("SELECT medioEmailId FROM test WHERE testId = '$testId'");
                $idemail = mysqli_fetch_row($medioEmail);
                echo $idemail[0];

                if ($idemail[0] > 0) {
                    $medioQuery = $mysql->query("SELECT MAX(medioEmailId) FROM medioEmail");
                    $medioEmailId = mysqli_fetch_row($medioQuery);

                    $updateTest = "UPDATE test SET medioEmailId = $medioEmailId[0] WHERE testId = '$testId'";
                    $mysql->query($updateTest);
                } else {
                    $consulta = "INSERT INTO medioemail(medioNombre,descripcion1,descripcion2,imagen1,imagen2)"
                        . "VALUES ('Email','$descripcion1','$descripcion2','$file1','$file2')";
                    $mysql->query($consulta);
                    $id = $mysql->insert_id;

                    $medioQuery = $mysql->query("SELECT MAX(medioEmailId) FROM medioEmail");
                    $medioEmailId = mysqli_fetch_row($medioQuery);

                    $updateTest = "UPDATE test SET medioEmailId = $medioEmailId[0] WHERE testId = '$testId'";
                    $mysql->query($updateTest);
                    echo  $updateTest;
                }
                break;

            case 3:

                $medioWhats = $mysql->query("SELECT medioWhatsAppId FROM test WHERE testId = '$testId'");
                $idwhat = mysqli_fetch_row($medioWhats);
                echo $idwhat[0];

                if ($idwhat[0] > 0) {
                    $medioQuery = $mysql->query("SELECT MAX(medioWhatsAppId) FROM medioWhatsApp");
                    $medioWhatsAppId = mysqli_fetch_row($medioQuery);

                    $updateTest = "UPDATE test SET medioWhatsAppId = $medioWhatsAppId[0] WHERE testId = '$testId'";
                    $mysql->query($updateTest);
                } else {
                    $consulta = "INSERT INTO mediowhatsapp(medioNombre,descripcion1,descripcion2,imagen1,imagen2)"
                        . "VALUES ('WhatsApp','$descripcion1','$descripcion2','$file1','$file2')";
                    $mysql->query($consulta);
                    $id = $mysql->insert_id;

                    $medioQuery = $mysql->query("SELECT MAX(medioWhatsAppId) FROM mediowhatsapp");
                    $medioWhatsAppId = mysqli_fetch_row($medioQuery);

                    $updateTest = "UPDATE test SET medioWhatsAppId = $medioWhatsAppId[0] WHERE testId = '$testId'";
                    $mysql->query($updateTest);
                    echo  $updateTest;
                }
                break;

            case 4:

                $medioPPTAgen = $mysql->query("SELECT medioPPTAgenciaId FROM test WHERE testId = '$testId'");
                $idAgencia = mysqli_fetch_row($medioPPTAgen);
                echo $idAgencia[0];

                if ($idAgencia[0] > 0) {
                    $medioQuery = $mysql->query("SELECT MAX(medioPPTAgenciaId) FROM mediopptagencia");
                    $medioAgenciaId = mysqli_fetch_row($medioQuery);

                    $updateTest = "UPDATE test SET medioPPTAgenciaId = $medioAgenciaId[0] WHERE testId = '$testId'";
                    $mysql->query($updateTest);
                } else {
                    $consulta = "INSERT INTO mediopptagencia(medioNombre,descripcion1,descripcion2,file1,file2)"
                        . "VALUES ('PPT Agencia','$descripcion1','$descripcion2','$file1','$file2')";
                    $mysql->query($consulta);
                    $id = $mysql->insert_id;

                    $medioQuery = $mysql->query("SELECT MAX(medioPPTAgenciaId) FROM mediopptagencia");
                    $medioAgenciaId = mysqli_fetch_row($medioQuery);

                    $updateTest = "UPDATE test SET medioPPTAgenciaId = $medioAgenciaId[0] WHERE testId = '$testId'";
                    $mysql->query($updateTest);
                    echo  $updateTest;
                }
                break;

            case 5:

                $medioPPTReu = $mysql->query("SELECT medioPPTReunionId FROM test WHERE testId = '$testId'");
                $idReunion = mysqli_fetch_row($medioPPTReu);
                echo $idReunion[0];

                if ($idReunion[0] > 0) {
                    $medioQuery = $mysql->query("SELECT MAX(medioPPTReunionId) FROM mediopptreunion");
                    $medioReunionId = mysqli_fetch_row($medioQuery);

                    $updateTest = "UPDATE test SET medioPPTReunionId = $medioReunionId[0] WHERE testId = '$testId'";
                    $mysql->query($updateTest);
                } else {
                    $consulta = "INSERT INTO mediopptreunion(medioNombre,descripcion1,descripcion2,file1,file2)"
                        . "VALUES ('PPT Reunion','$descripcion1','$descripcion2','$file1','$file2')";
                    $mysql->query($consulta);
                    $id = $mysql->insert_id;

                    $medioQuery = $mysql->query("SELECT MAX(medioPPTReunionId) FROM mediopptreunion");
                    $medioReunionId = mysqli_fetch_row($medioQuery);

                    $updateTest = "UPDATE test SET medioPPTReunionId = $medioReunionId[0] WHERE testId = '$testId'";
                    $mysql->query($updateTest);
                    echo  $updateTest;
                }
                break;
        }


        /*
        if ($medio == 1) {
            $consulta = "INSERT INTO mediollamada(medioNombre,descripcion1,descripcion2,imagen1,imagen2)"
                . "VALUES ('Llamada','$descripcion1','$descripcion2','$file1','$file2')";
            $resultado = $mysql->query($consulta);
            $id = $mysql->insert_id;
        } elseif ($medio == 2) {
            $consulta = "INSERT INTO medioemail(medioNombre,descripcion1,descripcion2,imagen1,imagen2)"
                . "VALUES ('E-mail,'$descripcion1','$descripcion2','$file1','$file2')";
            $resultado = $mysql->query($consulta);
            $id = $mysql->insert_id;
        } elseif ($medio == 3) {
            $consulta = "INSERT INTO mediowhatsapp(medioNombre,descripcion1,descripcion2,imagen1,imagen2)"
                . "VALUES ('WhatsApp','$descripcion1','$descripcion2','$file1','$file2')";
            $resultado = $mysql->query($consulta);
            $id = $mysql->insert_id;
        } elseif ($medio == 4) {
            $consulta = "INSERT INTO mediopptagencia(medioNombre,file1,file2)"
                . "VALUES ('PPT Agencia','$file1','$file2')";
            $resultado = $mysql->query($consulta);
            $id = $mysql->insert_id;
        } elseif ($medio == 5) {
            $consulta = "INSERT INTO mediopptagencia(medioNombre,file1,file2)"
                . "VALUES ('PPT Agencia','$file1','$file2')";
            $resultado = $mysql->query($consulta);
            $id = $mysql->insert_id;
        }
        */

        //echo $consulta;
        // echo  $consulta;

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
