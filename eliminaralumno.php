<?php
    session_start();
    include ("config/config.inc.php");
    include ("config/biblioteca.php");

    $id = $_REQUEST['borraralu'];

    eliminarcascade($servidor, $usuarioBD, $contrasenyaBD, $bd, $id);


    eliminaralumno($servidor, $usuarioBD, $contrasenyaBD, $bd, $id);

     $_SESSION['exito']=true;

     header("location: perfiladm.php?go=2");

?>

