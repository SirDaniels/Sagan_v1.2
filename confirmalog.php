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
    
    $login = "SELECT * FROM Usuarios WHERE Usuario='$usuario' AND Password = '$pass' AND Rol_IDRol = 1 ";
    
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
            header("location: perfiladm.php");
        if($go==2)
            $_SESSION['go']=2;
            header("location: perfiladm.php");
        if($go==3)
            $_SESSION['go']=3;
            header("location: perfiladm.php");
        if($go==4)
            $_SESSION['go']=4;
            header("location: perfiladm.php");
        if($go==5)
            $_SESSION['go']=5;
            header("location: perfiladm.php");
         if($go==6)
            $_SESSION['go']=6;
            header("location: perfiladm.php");
         if($go==7)
            $_SESSION['go']=7;
            header("location: perfiladm.php");
    } else {
        header("location: index.php");

    }





    
?>

