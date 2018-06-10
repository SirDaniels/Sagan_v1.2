<?php
    session_start();
    include ("config/config.inc.php");
    include ("config/biblioteca.php");
    
    $centro=$_SESSION['centro']=$_REQUEST['centro'];
    $curso=$_SESSION['curso']=$_REQUEST['curso'];
    $ciclo=$_SESSION['ciclo']=$_REQUEST['ciclo'];
    $categoria=$_SESSION['categoria']=$_REQUEST['categoria'];
    
     $usuario=$_SESSION['Usuario'];
     $pass= $_SESSION['Password'];
    
    //conexion
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);

    
    
    //seleccion bd
    
    $seleccion = mysqli_select_db($conex, $bd);
    
    //insert
    
    $login = "SELECT * FROM Usuarios WHERE Usuario='$usuario' AND Password = '$pass' AND Rol_IDRol = 2 ;";
    
    $resultado1 = mysqli_query($conex, $login);
   // $numreg=mysqli_affected_rows($conex);

    $fila = mysqli_fetch_array($resultado1);
    
    if (mysqli_affected_rows($conex)) {
       $go=$_REQUEST['go'];
    } else {
        $go = false;
    }

    //Iniciando Session
    sessionIni($fila);
    
    // cerrando
    
    mysqli_free_result($resultado1);
    mysqli_close($conex);
    
    
    //redireccionando
    
    if ($go) {
        if($go==1)
            $_SESSION['go']=1;
            header("location: perfilalu.php");
        if($go==2)
            $_SESSION['go']=2;
            header("location: perfilalu.php");
        if($go==3)
            $_SESSION['go']=3;
            header("location: perfilalu.php");
    } else {
        header("location: index.php");

    }





    
?>

