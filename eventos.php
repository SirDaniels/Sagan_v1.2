<?php
header('Content-Type: application/json');
    include('config/config.inc.php');
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
    $seleccion = mysqli_select_db($conex, $bd); 
    if (isset($_REQUEST['accion']))
        $accion=$_REQUEST['accion'];
    else
        $accion='leer';
    switch($accion){
        case 'agregar':
          //  echo "Instruccion agregar";
       
              $title=$_POST['title'];
              $descripcion=$_POST['descripcion'];
              $color=$_POST['color'];
              $textColor=$_POST['textColor'];
              $start=$_POST['start'];
              $end=$_POST['end'];
            
            
            $consulta = "INSERT INTO Exposicion VALUES (NULL, '$title', '$descripcion', '$color', '$textColor', '$start' , '$end' )";
       
    
            $resultado2 = mysqli_query($conex, $consulta);
              
            echo json_encode($resultado2);
            
            mysqli_free_result($resultado2);
            mysqli_close($conex);
       
            break;
        case 'eliminar':
             //echo "Instruccion eliminar";
       
            if (isset($_POST['id'])) {
                
                $id = $_POST['id'];
                $sentencia = "DELETE FROM Exposicion WHERE id = $id ";
               
            $resultado2 = mysqli_query($conex, $sentencia);
            
            echo json_encode($resultado2);
                
            mysqli_free_result($resultado2);
            mysqli_close($conex);
            }
     
            break;
        case 'modificar':
           //  echo "Instruccion modificar";
             if (isset($_POST['id'])) {
                
                $id = $_POST['id'];
                $title = $_POST['title'];
                $descripcion = $_POST['descripcion']; 
                $color = $_POST['color']; 
              //  $textcolor = $_POST['textColor'];
                $start = $_POST['start'];
                $end = $_POST['end'];
                 
                $sentencia = "UPDATE Exposicion SET title='$title', descripcion='$descripcion', color='$color', start='$start', end='$end' WHERE id = '$id' ";
               
                $resultado2 = mysqli_query($conex, $sentencia);
            
                echo json_encode($resultado2);
                 
                 mysqli_free_result($resultado2);
                 mysqli_close($conex); 
            }
     
            break;
        default: 
            $consulta = "SELECT * FROM Exposicion";
    
            $resultado2 = mysqli_query($conex, $consulta);
            
//            $num = mysqli_num_rows($resultado2);
//            
//            $i=1;
//            while ($fila = mysqli_fetch_assoc($resultado2) ) { 
//                if ($i==$num) {
//                         echo "[".json_encode($fila)."]";
//                    }else {
//                    echo "[".json_encode($fila)."],";
//                    }
//               $i++;
//                
//            }  
            
            
            
            $fila = mysqli_fetch_all($resultado2,MYSQLI_ASSOC)  ;
             echo json_encode($fila);      
            
//            
            
//      
//            $fila = mysqli_fetch_assoc($resultado2)  ;
//             echo "[".json_encode($fila)."]";      
//            
////            
            mysqli_free_result($resultado2);
            mysqli_close($conex);

            break;
    }
//
//    $consulta = "SELECT * FROM Exposicion";
//    
//    $resultado2 = mysqli_query($conex, $consulta);

//    header('Content-Type: application/json');
//
//    $pdo=new PDO("msql:dbname=sagan;host=127.0.0.1","root","root");
//        
//    $sentenciaSQL = $pdo->prepare("SELECT * FROM Exposicion");
//
//    $sentenciaSQL->execute();
//
//    $resultado2 = $sentenciaSQL->fetcAll(PDO::FETCH_ASSOC);
    
//    $fila = mysqli_fetch_assoc($resultado2) ;
//        
//    echo "[".json_encode($fila)."]";



//
//while ($fila = mysqli_fetch_assoc($resultado2) ) { 
//    echo "[".json_encode($fila)."]";
//
//    }
    
?>

