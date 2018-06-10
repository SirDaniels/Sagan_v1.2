<?php
    session_start();

    include ("config/config.inc.php");
    include ("config/biblioteca.php");

    $id = $_REQUEST['borrarcentro'];

    eliminarcentro($servidor, $usuarioBD, $contrasenyaBD, $bd, $id);

    $_SESSION['exito']=true;
     header("location: perfiladm.php?go=5");

?>

