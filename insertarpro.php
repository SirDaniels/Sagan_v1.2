<?php
    session_start();
    include ("config/config.inc.php");
    include ("config/biblioteca.php");
   

     $titulo=recoge('titulo');
     $descripcion=recoge('descripcion');
     $ciclo=recoge('ciclo');
     $categoria=recoge('categoria');
     $curso=recoge('curso');
     $enlace=recoge('enlace');
     $date = date('Y-m-d H:i:s');

    $aux1 = $_FILES['docmemoria']['name'];
    $aux2 = $_FILES['docmemoria']['tmp_name'];
    $tipo_archivo = $_FILES['docmemoria']['type'];

    
    if ( $tipo_archivo != ''){
        if (!(strpos($tipo_archivo, "pdf"))){
        $_SESSION['no-pdf']=true;
        header("location: perfilalu.php");
            exit();
        } 
    }

    


    $aux3 = $_FILES['docexpo']['name'];
    $aux4 = $_FILES['docexpo']['tmp_name']; 
    $tipo_archivo2 = $_FILES['docexpo']['type'];

 if ( $tipo_archivo2 != ''){
        if (!(strpos($tipo_archivo2, "pdf"))){
        $_SESSION['no-pdf']=true;
        header("location: perfilalu.php");
            exit();
        } 
    }
   
//if (!(strpos($tipo_archivo, "pdf") || strpos($tipo_archivo2, "pdf")) ) {
//   	echo "La extensión o el tamaño de los archivos no es correcta. "; 
//    
//}else{ 
//   	
//} 
       
if($aux1 != ''){
    $docmemoria=sanear_string($date."-".$aux1);
     $guardado=$aux2;
     $memoenlace = "archivos/".$docmemoria;
}else{
    $docmemoria=sanear_string($aux1);
     $guardado=$aux2;
     $memoenlace = "archivos/".$docmemoria;
}


if($aux3 != ''){
     $docexpo=sanear_string($date."-".$aux3);
     $guardado2=$aux4;
     $expoenlace = "archivosexpo/".$docexpo;
}else{
     $docexpo=sanear_string($aux3);
     $guardado2=$aux4;
     $expoenlace = "archivosexpo/".$docexpo;
}



//     $docmemoria=sanear_string($date."-".$aux1);
//     $guardado=$aux2;
//     $memoenlace = "archivos/".$docmemoria;
//
//     $docexpo=sanear_string($date."-".$aux3);
//     $guardado2=$aux4;
//     $expoenlace = "archivosexpo/".$docexpo;

    
     $usuario= $_SESSION['IDUsuario'];
     $usuariorel=$_SESSION['UsuarioIDaso'];
    
//   $rol=$_SESSION['rol']=recoge('rol');;
    
    //conexion
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
    mysqli_set_charset($conex,"utf8");
    
    
    //seleccion bd
    
    $seleccion = mysqli_select_db($conex, $bd);
    
    //insert
    
    $insert = "INSERT INTO Proyectos VALUES (NULL,'$titulo', '$descripcion', '$memoenlace', '$expoenlace', '$enlace', NULL, '$date', '$ciclo', '$categoria', NULL, '$usuario', '$usuariorel', '$curso' );";

//INSERT INTO Proyectos VALUES (1,'SAGAN, Aplicación Web de Gestión de Proyectos Integrados de Ciclos Formativos ','Implementar una aplicación web que permita la gestión de los proyectos integrados que entregan los alumnos de ciclos formativos del IES Luis Vélez de Guevara.','/proyecto/docmemoria','/expo/docexpo','http:\\github.com',NULL,NULL,2,2,1,3,2,1);


    $resultado1 = mysqli_query($conex, $insert);


if(!file_exists('archivos')){
	mkdir('archivos',0777,true);
	if(file_exists('archivos')){
		if(move_uploaded_file($guardado, 'archivos/'.$docmemoria)){
			echo "Archivo guardado con exito";
		}else{
			echo "Archivo no se pudo guardar";
		}
	}
}else{
	if(move_uploaded_file($guardado, 'archivos/'.$docmemoria)){
		echo "Archivo guardado con exito";
	}else{
		echo "Archivo no se pudo guardar";
	}    
} 


if(!file_exists('archivosexpo')){
	mkdir('archivosexpo',0777,true);
	if(file_exists('archivosexpo')){
		if(move_uploaded_file($guardado2, 'archivosexpo/'.$docexpo)){
			echo "Archivo guardado con exito";
		}else{
			echo "Archivo no se pudo guardar";
		}
	}
}else{
	if(move_uploaded_file($guardado2, 'archivosexpo/'.$docexpo)){
		echo "Archivo guardado con exito";
	}else{
		echo "Archivo no se pudo guardar";
	}    
} 

    
    if ($resultado1) {
        $go = true;
    } else {
        $go = false;
    }
    
  
   if ($resultado1)
      $_SESSION['exito']=true;

    // cerrando
    
    mysqli_close($conex);
    
    
//    Redireccionando  MENSAJE
    
    if ($go) {
        header("location: perfilalu.php");
    } else {
        header("location: index.php");

    }

















//$nombre=$_FILES['archivo']['name'];
//$guardado=$_FILES['archivo']['tmp_name'];
//
//if(!file_exists('archivos')){
//	mkdir('archivos',0777,true);
//	if(file_exists('archivos')){
//		if(move_uploaded_file($guardado, 'archivos/'.$nombre)){
//			echo "Archivo guardado con exito";
//		}else{
//			echo "Archivo no se pudo guardar";
//		}
//	}
//}else{
//	if(move_uploaded_file($guardado, 'archivos/'.$nombre)){
//		echo "Archivo guardado con exito";
//	}else{
//		echo "Archivo no se pudo guardar";
//	}    
//


?>