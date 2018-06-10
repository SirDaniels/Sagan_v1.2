<?php
    session_start();
    include ("config/config.inc.php");
    include ("config/biblioteca.php");
    
     $usuario=recoge('usuario');
     $pass=recoge('pass');

    //conexion
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);

    //seleccion bd
    
    $seleccion = mysqli_select_db($conex, $bd);
    
    //insert
    

    if ($pass=="admin") {
        $login = "SELECT * FROM Usuarios WHERE Usuario='$usuario' AND Password='$pass';";

        $resultado1 = mysqli_query($conex, $login);

        $fila = mysqli_fetch_array($resultado1);    
        
        if (mysqli_affected_rows($conex)) {
                $go = true;
            } else {
                $go = false;
                $_SESSION['no-log']=true;
            }
        
    }else{
        $login = "SELECT * FROM Usuarios WHERE Usuario='$usuario' ;";

        $resultado1 = mysqli_query($conex, $login);

        $fila = mysqli_fetch_array($resultado1);

        if(password_verify($pass, $fila['Password'])){
            $go = true;
        } else{
            $go = false;
            $_SESSION['no-log']=true;
        }
    }




   
         
//
//    if (mysqli_affected_rows($conex)) {
//        $go = true;
//    } else {
//        $go = false;
//        $_SESSION['no-log']=true;
//        
//    }

    //Iniciando Session
    sessionIni($fila);
    
    // cerrando
    
    mysqli_free_result($resultado1);
    mysqli_close($conex);
    
    
    //redireccionando
    
    if ($go) {
        if($_SESSION['Rol']==1)
            header("location: perfiladm.php");
        if($_SESSION['Rol']==2)
            header("location: perfilalu.php");
        if($_SESSION['Rol']==3)
            header("location: perfilpro.php");
    } else {
        header("location: index.php");

    }





    
?>

