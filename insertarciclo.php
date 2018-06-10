<?php

    include ("config/config.inc.php");
    include ("config/biblioteca.php");
    
    
     $nombre=recoge('nombre');
     $siglas=recoge('siglas');
    
    //conexion
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);

    
    
    //seleccion bd
    
    $seleccion = mysqli_select_db($conex, $bd);
    
    //insert
    
    $insert = "INSERT INTO CicloFormativo VALUES (NULL,'$nombre', '$siglas');";
    
    $resultado1 = mysqli_query($conex, $insert);
  
    // cerrando
    
    mysqli_close($conex);
    
    
    //Redireccionando  MENSAJE
    
   
    header("location: perfiladm.php?go=6");
   
    
?>

