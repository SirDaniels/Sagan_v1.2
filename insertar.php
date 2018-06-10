<?php
    session_start();
    include ("config/config.inc.php");
    include ("config/biblioteca.php");
    
     $usuario=recoge('usuario');
     $email=recoge('email');

     $pass=recoge('pass');
     $passHash = password_hash($pass, PASSWORD_BCRYPT);
   
     $nombre=recoge('nombre');
     $centro=recoge('centro');
    
     $rol=$_SESSION['rol']=recoge('rol');;
    
    //conexion
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);

    
    
    //seleccion bd
    
    $seleccion = mysqli_select_db($conex, $bd);
         mysqli_set_charset($conex,"utf8");

    //insert
    
    $insert = "INSERT INTO Usuarios VALUES (NULL,'$usuario', '$passHash','$email', '$nombre' , NULL, NULL, 1, 1, '$rol', '$centro');";
    
    $resultado1 = mysqli_query($conex, $insert);
    
   if ($resultado1){
       $_SESSION['exito']=true;
   }  
   elseif ($resultado1==NULL){
       $_SESSION['no-reg']=true;
   }
        
    // cerrando
    
    mysqli_close($conex);
    
    
    //Redireccionando  
    
   
   
        header("location: index.php");

    
    
?>

