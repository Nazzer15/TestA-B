<?php
session_start();
if (!isset($_SESSION["datos-usuario"])){
    header("Location:index.php");
}

