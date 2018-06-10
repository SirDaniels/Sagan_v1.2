<?php 
function limpia_espacios($cadena){
	$cadena = str_replace(' ', '', $cadena);
	return $cadena;
}

function sanear_string($string)
{
 
    $string = trim($string);
 
    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );
 
    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );
 
    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );
 
    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );
 
    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );
 
    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );
 
    //Esta parte se encarga de eliminar cualquier caracter extraño
    $string = str_replace(' ', '', $string);
    
    $string = str_replace('"', '', $string ); 
    $string = str_replace(':', '', $string ); 
    $string = str_replace('.', '', $string ); 
    $string = str_replace(',', '', $string ); 
    $string = str_replace(';', '', $string );
	$string = str_replace('-', '', $string );
 
 
    return $string;
}


function recoge($var){
    if (isset($_REQUEST[$var])){
         $var = trim(strip_tags($_REQUEST[$var]));
        return $var;
    } 
}

function option($tabla, $servidor, $usuarioBD, $contrasenyaBD, $bd){
                       
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
    
    mysqli_set_charset($conex,"utf8");
    
    $seleccion = mysqli_select_db($conex, $bd); 
                                
    $consulta = "SELECT * FROM $tabla";
    
    $resultado2 = mysqli_query($conex, $consulta);
    
    while ($fila = mysqli_fetch_array($resultado2) ) {
        
         echo "<option value=\"".$fila[0]."\">".$fila[1]."</option>";

    }
                     
    mysqli_free_result($resultado2);
    mysqli_close($conex);
}

function sessionIni($resultado){

    $_SESSION['IDUsuario']      = $resultado[0];
    $_SESSION['Usuario']        = $resultado[1];
    $_SESSION['Password']       = $resultado[2];
    $_SESSION['email']          = $resultado[3];
    $_SESSION['Nombre']         = $resultado[4];
    $_SESSION['Imagen']         = $resultado[5];
    $_SESSION['UltimoAcceso']   = $resultado[6];
    $_SESSION['UsuarioIDaso']   = $resultado[7];
    $_SESSION['CicloFormativo'] = $resultado[8];
    $_SESSION['Rol']            = $resultado[9];
    $_SESSION['Centro']         = $resultado[10];
    
}

function mostrarSession(){
    echo"<p>".$_SESSION['IDUsuario']."</p>";
    echo"<p>".$_SESSION['Usuario']."</p>";
    echo"<p>".$_SESSION['Password']."</p>";
    echo"<p>".$_SESSION['email']."</p>";
    echo"<p>".$_SESSION['Nombre']."</p>";
    echo"<p>".$_SESSION['Imagen']."</p>";
    echo"<p>".$_SESSION['UltimoAcceso']."</p>";
    echo"<p>".$_SESSION['UsuarioIDaso']."</p>";
    echo"<p>".$_SESSION['CicloFormativo']."</p>";
    echo"<p>".$_SESSION['Rol']."</p>";
    echo"<p>".$_SESSION['Centro']."</p>";
}

function admadministradores($servidor, $usuarioBD, $contrasenyaBD, $bd){
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
    
     mysqli_set_charset($conex,"utf8");
    
    $seleccion = mysqli_select_db($conex, $bd); 
                                
    $consulta = "SELECT * FROM Usuarios WHERE Rol_IDRol = 1";
    
    $resultado2 = mysqli_query($conex, $consulta);
    
  echo "<div class=\"container-fluid \" id=\"colladm\" style=\"background-color:white;margin-bottom:25px;\">";

  echo "<h2>Administradores</h2> ";
   
  echo "<table id=\"tablesagan\" class=\"table\" style=\"width:100%;\">
    <thead class=\"thead-dark\">
      <tr>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Email</th>
        <th></th>
      </tr>
    </thead>
    <tbody>";
    
    while ($fila = mysqli_fetch_array($resultado2) ) {
        
         echo " <tr>
        <td>".$fila[1]."</td>
        <td>".$fila[4]."</td>
        <td>".$fila[3]."</td>";
        
        echo "<td>
            <form action=\"eliminaradm.php\" method=\"POST\">
       
                <input  type=\"hidden\" name=\"borraradm\" value=\"".$fila[0]."\"> 
            
                <input type=\"submit\" value=\"Eliminar\" class=\"btn btn-danger\">
            
            </form>
        </td>
      </tr>";    
    }
    
    
    echo "  </tbody>
    </table>
</div>";
                     
    mysqli_free_result($resultado2);
    mysqli_close($conex);
}

function admalumnosfil($servidor, $usuarioBD, $contrasenyaBD, $bd, $ciclo, $centro){
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
    
    $seleccion = mysqli_select_db($conex, $bd); 
     mysqli_set_charset($conex,"utf8");
                                
   // $consulta = "SELECT * FROM Usuarios WHERE Rol_IDRol = 2";
    
     $consulta = "SELECT * FROM Usuarios WHERE CicloFormativo_IDCicloFormativo = $ciclo AND Rol_IDRol = 2 AND Centro_IDCentro = $centro ";
    
    
    $resultado2 = mysqli_query($conex, $consulta);
    
  echo "<div class=\"container-fluid\" id=\"collalu\" style=\"background-color:white;margin-bottom:25px;\">";

  echo "<h2>Alumnos</h2> ";
      
  echo "<table id=\"tablesagan\" class=\"table\" style=\"width:100%;\">
    <thead class=\"thead-dark\">
      <tr>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Centro</th>
        <th>Ciclo Formativo</th>

        <th></th>
      </tr>
    </thead>
    <tbody>";
    
    while ($fila = mysqli_fetch_array($resultado2) ) {
        
         echo " <tr>
        <td>".$fila[1]."</td>
        <td>".$fila[4]."</td>
        <td>".$fila[3]."</td>";
        
        
     $consultaCentro = "SELECT * FROM Centro WHERE IDCentro = $fila[10]";

        
     $consultaCiclo = "SELECT * FROM CicloFormativo WHERE IDCicloFormativo = $fila[8]";

     $resultado3 = mysqli_query($conex, $consultaCiclo);
     $resultado4 = mysqli_query($conex, $consultaCentro);

     $filaCiclo = mysqli_fetch_array($resultado3);
     $filaCentro = mysqli_fetch_array($resultado4);

        
        
    echo "<td>".$filaCentro[1]."</td>";
    echo "<td>".$filaCiclo[2]."</td>";
        
//    echo "<td>
//    <a href=\"\" class=\"btn btn-primary\">Eliminar</a>    
//    </td>
//      </tr>";
        
        
       echo "<td>
      <form action=\"eliminaralumno.php\" method=\"POST\">
       
           <input  type=\"hidden\" name=\"borraralu\" value=\"".$fila[0]."\"> 
            
            <input type=\"submit\" value=\"Eliminar\" class=\"btn btn-danger\">
            
         </form>
    </td>
      </tr>";    

    }
    
    
    echo "  </tbody>
    </table>
</div>";
    
    mysqli_free_result($resultado2);
//    mysqli_free_result($resultado3);
//    mysqli_free_result($resultado4);

    mysqli_close($conex);
}

function admalumnosfilpro($servidor, $usuarioBD, $contrasenyaBD, $bd, $ciclo, $centro){
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
    
    $seleccion = mysqli_select_db($conex, $bd); 
     mysqli_set_charset($conex,"utf8");
                                
   // $consulta = "SELECT * FROM Usuarios WHERE Rol_IDRol = 2";
    
     $consulta = "SELECT * FROM Usuarios WHERE CicloFormativo_IDCicloFormativo = $ciclo AND Rol_IDRol = 2 AND Centro_IDCentro = $centro ";
    
    
    $resultado2 = mysqli_query($conex, $consulta);
    
  echo "<div class=\"container-fluid\" id=\"collalu\" style=\"background-color:white;margin-bottom:25px;\">";

  echo "<h2>Alumnos</h2> ";
      
  echo "<table id=\"tablesagan\" class=\"table\" style=\"width:100%;\">
    <thead class=\"thead-dark\">
      <tr>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Centro</th>
        <th>Ciclo Formativo</th>

        
      </tr>
    </thead>
    <tbody>";
    
    while ($fila = mysqli_fetch_array($resultado2) ) {
        
         echo " <tr>
        <td>".$fila[1]."</td>
        <td>".$fila[4]."</td>
        <td>".$fila[3]."</td>";
        
        
     $consultaCentro = "SELECT * FROM Centro WHERE IDCentro = $fila[10]";

        
     $consultaCiclo = "SELECT * FROM CicloFormativo WHERE IDCicloFormativo = $fila[8]";

     $resultado3 = mysqli_query($conex, $consultaCiclo);
     $resultado4 = mysqli_query($conex, $consultaCentro);

     $filaCiclo = mysqli_fetch_array($resultado3);
     $filaCentro = mysqli_fetch_array($resultado4);

        
        
    echo "<td>".$filaCentro[1]."</td>";
    echo "<td>".$filaCiclo[2]."</td>";
        
//    echo "<td>
//    <a href=\"\" class=\"btn btn-primary\">Eliminar</a>    
//    </td>
//      </tr>";
        
        
     
   
    echo "</tr>";    

    }
    
    
    echo "  </tbody>
    </table>
</div>";
    
    mysqli_free_result($resultado2);
//    mysqli_free_result($resultado3);
//    mysqli_free_result($resultado4);

    mysqli_close($conex);
}

function eliminaralumno($servidor, $usuarioBD, $contrasenyaBD, $bd, $id){
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
    
    $seleccion = mysqli_select_db($conex, $bd); 
     mysqli_set_charset($conex,"utf8");
                                
    
     $consulta = "DELETE FROM Usuarios WHERE IDUsuarios = $id";
    
    
    $resultado2 = mysqli_query($conex, $consulta);
    
     
    mysqli_free_result($resultado2);
//    mysqli_free_result($resultado3);
//    mysqli_free_result($resultado4);

    mysqli_close($conex);
}
function eliminarcascade($servidor, $usuarioBD, $contrasenyaBD, $bd, $id){
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
    
    $seleccion = mysqli_select_db($conex, $bd); 
     mysqli_set_charset($conex,"utf8");
                                
    
     $consulta = "SELECT DocMemoria, DocExpo FROM Proyectos WHERE IDProyectos = $id";
    
 
    
    
    
    $resultado2 = mysqli_query($conex, $consulta);
    
   while ( $fila = mysqli_fetch_array($resultado2) ) {
    
       unlink($fila[0]);
       unlink($fila[1]);
       
   };
    
     
    mysqli_free_result($resultado2);
//    mysqli_free_result($resultado3);
//    mysqli_free_result($resultado4);

    mysqli_close($conex);
}

function eliminaradm($servidor, $usuarioBD, $contrasenyaBD, $bd, $id){
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
    
    $seleccion = mysqli_select_db($conex, $bd); 
     mysqli_set_charset($conex,"utf8");
                                
    
     $consulta = "DELETE FROM Usuarios WHERE IDUsuarios = $id";
    
    
    $resultado2 = mysqli_query($conex, $consulta);
    
     
    mysqli_free_result($resultado2);
//    mysqli_free_result($resultado3);
//    mysqli_free_result($resultado4);

    mysqli_close($conex);
}

function admalumnos($servidor, $usuarioBD, $contrasenyaBD, $bd){
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
    
    $seleccion = mysqli_select_db($conex, $bd); 
     mysqli_set_charset($conex,"utf8");
                                
    $consulta = "SELECT * FROM Usuarios WHERE Rol_IDRol = 2";
    
//     $consulta = "SELECT * FROM Usuarios WHERE CicloFormativo_IDCicloFormativo = $ciclo AND Rol_IDRol = 2 AND Centro_IDCentro = $centro ";
//    
    
    $resultado2 = mysqli_query($conex, $consulta);
    
  echo "<div class=\"container-fluid\" id=\"collalu\" style=\"background-color:white;margin-bottom:25px;\">";

  echo "<h2>Alumnos</h2> ";
      
  echo "<table id=\"tablesagan\" class=\"table\" style=\"width:100%;\">
    <thead class=\"thead-dark\">
      <tr>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Centro</th>
        <th>Ciclo Formativo</th>

        <th></th>
      </tr>
    </thead>
    <tbody>";
    
    while ($fila = mysqli_fetch_array($resultado2) ) {
        
         echo " <tr>
        <td>".$fila[1]."</td>
        <td>".$fila[4]."</td>
        <td>".$fila[3]."</td>";
        
        
     $consultaCentro = "SELECT * FROM Centro WHERE IDCentro = $fila[10]";

        
     $consultaCiclo = "SELECT * FROM CicloFormativo WHERE IDCicloFormativo = $fila[8]";

     $resultado3 = mysqli_query($conex, $consultaCiclo);
     $resultado4 = mysqli_query($conex, $consultaCentro);

     $filaCiclo = mysqli_fetch_array($resultado3);
     $filaCentro = mysqli_fetch_array($resultado4);

        
        
    echo "<td>".$filaCentro[1]."</td>";
    echo "<td>".$filaCiclo[2]."</td>";
//        
//    echo "<td><a href=\"\" class=\"btn btn-primary\">Eliminar</a></td>
//      </tr>";
//
//    }
        
          echo "<td>
      <form action=\"eliminaralumno.php\" method=\"POST\">
       
           <input  type=\"hidden\" name=\"borraralu\" value=\"".$fila[0]."\"> 
            
            <input type=\"submit\" value=\"Eliminar\" class=\"btn btn-danger\">
            
         </form>
    </td>
      </tr>";    
        
  }  
    
    echo "  </tbody>
    </table>
</div>";
    
    mysqli_free_result($resultado2);
    //mysqli_free_result($resultado3);
    //mysqli_free_result($resultado4);

    mysqli_close($conex);

    }

function admalumnospro($servidor, $usuarioBD, $contrasenyaBD, $bd){
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
    
    $seleccion = mysqli_select_db($conex, $bd); 
     mysqli_set_charset($conex,"utf8");
                                
    $consulta = "SELECT * FROM Usuarios WHERE Rol_IDRol = 2";
    
//     $consulta = "SELECT * FROM Usuarios WHERE CicloFormativo_IDCicloFormativo = $ciclo AND Rol_IDRol = 2 AND Centro_IDCentro = $centro ";
//    
    
    $resultado2 = mysqli_query($conex, $consulta);
    
  echo "<div class=\"container-fluid\" id=\"collalu\" style=\"background-color:white;margin-bottom:25px;\">";

  echo "<h2>Alumnos</h2> ";
      
  echo "<table id=\"tablesagan\" class=\"table\" style=\"width:100%;\">
    <thead class=\"thead-dark\">
      <tr>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Centro</th>
        <th>Ciclo Formativo</th>

      </tr>
    </thead>
    <tbody>";
    
    while ($fila = mysqli_fetch_array($resultado2) ) {
        
         echo " <tr>
        <td>".$fila[1]."</td>
        <td>".$fila[4]."</td>
        <td>".$fila[3]."</td>";
        
        
     $consultaCentro = "SELECT * FROM Centro WHERE IDCentro = $fila[10]";

        
     $consultaCiclo = "SELECT * FROM CicloFormativo WHERE IDCicloFormativo = $fila[8]";

     $resultado3 = mysqli_query($conex, $consultaCiclo);
     $resultado4 = mysqli_query($conex, $consultaCentro);

     $filaCiclo = mysqli_fetch_array($resultado3);
     $filaCentro = mysqli_fetch_array($resultado4);

        
        
    echo "<td>".$filaCentro[1]."</td>";
    echo "<td>".$filaCiclo[2]."</td>";
//        
//    echo "<td><a href=\"\" class=\"btn btn-primary\">Eliminar</a></td>
//      </tr>";
//
//    }
        
          echo "</tr>";    
        
  }  
    
    echo "  </tbody>
    </table>
</div>";
    
    mysqli_free_result($resultado2);
    //mysqli_free_result($resultado3);
    //mysqli_free_result($resultado4);

    mysqli_close($conex);

    }

function admprofesores($servidor, $usuarioBD, $contrasenyaBD, $bd){
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
    
    $seleccion = mysqli_select_db($conex, $bd); 
     mysqli_set_charset($conex,"utf8");
                                
    $consulta = "SELECT * FROM Usuarios WHERE Rol_IDRol = 3";
    
    $resultado2 = mysqli_query($conex, $consulta);
    
  echo "<div class=\"container-fluid\" id=\"collpro\" style=\"background-color:white;margin-bottom:25px;\">";

  echo "<h2>Profesores</h2> ";

  echo "<table id=\"tablesagan\" class=\"table\" style=\"width:100%;\">
    <thead class=\"thead-dark\">
      <tr>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Centro</th>
        <th></th>
      </tr>
    </thead>
    <tbody>";
    
    while ($fila = mysqli_fetch_array($resultado2) ) {
        
         echo " <tr>
        <td>".$fila[1]."</td>
        <td>".$fila[4]."</td>
        <td>".$fila[3]."</td>";
        
    $consultaCentro = "SELECT * FROM Centro WHERE IDCentro = $fila[10]"; 
    $resultado4 = mysqli_query($conex, $consultaCentro);
    $filaCentro = mysqli_fetch_array($resultado4);

         echo "<td>".$filaCentro[1]."</td>";

        
           echo "<td>
      <form action=\"eliminarprofe.php\" method=\"POST\">
       
           <input  type=\"hidden\" name=\"borrarpro\" value=\"".$fila[0]."\"> 
            
            <input type=\"submit\" value=\"Eliminar\" class=\"btn btn-danger\">
            
         </form>
    </td>
      </tr>";    
    }
    
    
    echo "  </tbody>
    </table>
</div>";
                     
    mysqli_free_result($resultado2);
    mysqli_close($conex);
}

function admCentros($servidor, $usuarioBD, $contrasenyaBD, $bd){
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
    
    $seleccion = mysqli_select_db($conex, $bd); 
                                
     mysqli_set_charset($conex,"utf8");
    
    $consulta = "SELECT * FROM Centro";
    
    $resultado2 = mysqli_query($conex, $consulta);
    
  echo "<div class=\"container-fluid\" id=\"collcentro\" style=\"background-color:white;margin-bottom:25px;\">";

  echo "<h2>Centros</h2> ";
   
  echo "<table id=\"tablesagan\" class=\"table\" style=\"width:100%;\">
    <thead class=\"thead-dark\">
      <tr>
        <th>Centro</th>
        <th></th>
      </tr>
    </thead>
    <tbody>";
    
    while ($fila = mysqli_fetch_array($resultado2) ) {
        
         echo " <tr>
        <td>".$fila[1]."</td>";
       
        echo "<td>
            <form action=\"eliminarcentro.php\" method=\"POST\">
       
           <input  type=\"hidden\" name=\"borrarcentro\" value=\"".$fila[0]."\"> 
            
            <input type=\"submit\" value=\"Eliminar\" class=\"btn btn-danger\">
            
         </form>
    </td>
      </tr>";    

    }
    
    echo "  </tbody>
    </table>
</div>";
                     
    mysqli_free_result($resultado2);
    mysqli_close($conex);
}

function admCiclos($servidor, $usuarioBD, $contrasenyaBD, $bd){
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
    
    $seleccion = mysqli_select_db($conex, $bd); 
     mysqli_set_charset($conex,"utf8");
                                
    $consulta = "SELECT * FROM CicloFormativo";
    
    $resultado2 = mysqli_query($conex, $consulta);
    
//    $fila = mysqli_fetch_array($resultado2);
                               
  echo "<div class=\"container-fluid \" id=\"collciclo\" style=\"background-color:white;margin-bottom:25px;\">";

    
    //insertar boton que collapse un pequeño pormulario y en el submit enviar a insertarciclo.php
    
  echo "<h2>Ciclos Formativos
    </h2> ";
   
   
  echo "<table id=\"tablesagan\" class=\"table\" style=\"width:100%;\">
    <thead class=\"thead-dark\">
      <tr>
        <th>Ciclo</th>
        <th>Siglas</th>
        <th></th>        
      </tr>
    </thead>
    <tbody>";
    
    while ($fila = mysqli_fetch_array($resultado2) ) {
        
         echo " <tr>
        <td>".$fila[1]."</td>
        <td>".$fila[2]."</td>
        ";
        
         echo "<td>
      <form action=\"eliminarciclo.php\" method=\"POST\">
       
           <input  type=\"hidden\" name=\"borrarciclo\" value=\"".$fila[0]."\"> 
           
           <input type=\"submit\" value=\"Eliminar\" class=\"btn btn-danger\">
            
         </form>
    </td>
      </tr>";    

    }
    
    echo "  </tbody>
    </table>
</div>";
                     
    mysqli_free_result($resultado2);
    mysqli_close($conex);
}

function proyectos($servidor, $usuarioBD, $contrasenyaBD, $bd){
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
    
    $seleccion = mysqli_select_db($conex, $bd); 
     mysqli_set_charset($conex,"utf8");
                                
    $consulta = "SELECT * FROM Proyectos";
    
    $resultado2 = mysqli_query($conex, $consulta);
    
  echo "<div class=\"container-fluid \" id=\"collciclo\" style=\"background-color:white;margin-bottom:25px;\">";

  echo "<h2>Proyectos</h2> ";
   
  echo "<table id=\"tablesagan\" class=\"table\" style=\"width:100%;\">
    <thead class=\"thead-dark\">
      <tr>
        <th>Alumno</th>
        <th>Título</th>
        <th>Descripción</th>
        <th>DocMemoria</th>
        <th>DocExpo</th>
        <th>Enlace</th>
        <th></th>
        
      </tr>
    </thead>
    <tbody>";
    
    while ($fila = mysqli_fetch_array($resultado2) ) {
        
         $consultaalu = "SELECT * FROM Usuarios WHERE IDUsuarios = $fila[11]"; 
         $resultado3 = mysqli_query($conex, $consultaalu);
         $filaalu = mysqli_fetch_array($resultado3);

       
        
        
         echo " <tr>
        <td>".$filaalu[4]."</td>
        <td>".$fila[1]."</td>
        <td>".$fila[2]."</td>";
        
         if ($fila[3] != 'archivos/' && $fila[3] != NULL )
            echo " <td><a href=\"".$fila[3]."\"><img src=\"imagenes/pdf.png\" alt=\"docExpo\"/></a></td>";
        else
            echo "<td></td>";
         if ($fila[4] != 'archivosexpo/' && $fila[4] != NULL )
            echo " <td><a href=\"".$fila[4]."\"><img src=\"imagenes/pdf.png\" alt=\"docExpo\"/></a></td>";
        else
            echo "<td></td>";
        
        if ($fila[5] <> '')
            echo " <td><a href=\"".$fila[5]."\"><img src=\"imagenes/github.png\" alt=\"Github\"/></a></td>";
        else
            echo "<td></td>";
             
        echo "<td>
      <form action=\"eliminarproyecto.php\" method=\"POST\">
       
           <input  type=\"hidden\" name=\"borrarproyecto\" value=\"".$fila[0]."\"> 
            
            <input type=\"submit\" value=\"Eliminar\" class=\"btn btn-danger\">
            
         </form>
    </td>
      </tr>";    
    

    }
    
    echo "  </tbody>
    </table>
</div>";
                     
    mysqli_free_result($resultado2);
  

    mysqli_close($conex);
}

 //falta filtro por centro
function proyectosfiltrado($servidor, $usuarioBD, $contrasenyaBD, $bd, $curso, $centro, $ciclo, $categoria){
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
    
    $seleccion = mysqli_select_db($conex, $bd);
     mysqli_set_charset($conex,"utf8");
                                
    $consulta = "SELECT * FROM Proyectos WHERE CursoEscolar_idCursoEscolar = $curso AND CicloFormativo_IDCicloFormativo = $ciclo AND Categoria_IDCategoria = $categoria";
    
    $resultado2 = mysqli_query($conex, $consulta);
    
  echo "<div class=\"container-fluid \" id=\"collciclo\" style=\"background-color:white;margin-bottom:25px;\">";

  echo "<h2>Proyectos</h2> ";
   
  echo "<table id=\"tablesagan\" class=\"table\" style=\"width:100%;\">
    <thead class=\"thead-dark\">
      <tr>
        <th>Alumno</th>
        <th>Título</th>
        <th>Descripción</th>
        <th>DocMemoria</th>
        <th>DocExpo</th>
        <th>Enlace</th>
        <th></th>
        
      </tr>
    </thead>
    <tbody>";
    
    while ($fila = mysqli_fetch_array($resultado2) ) {
        
         $consultaalu = "SELECT * FROM Usuarios WHERE IDUsuarios = $fila[11]"; 
         $resultado3 = mysqli_query($conex, $consultaalu);
         $filaalu = mysqli_fetch_array($resultado3);

         echo " <tr>
        <td>".$filaalu[4]."</td>
        <td>".$fila[1]."</td>
        <td>".$fila[2]."</td>";
        
         if ($fila[3] != 'archivos/' && $fila[3] != NULL )
            echo " <td><a href=\"".$fila[3]."\"><img src=\"imagenes/pdf.png\" alt=\"docMemoria\"/></a></td>";
        else
            echo "<td></td>";
        
         if ($fila[4] != 'archivosexpo/' && $fila[4] != NULL )
            echo " <td><a href=\"".$fila[4]."\"><img src=\"imagenes/pdf.png\" alt=\"docExpo\"/></a></td>";
        else
            echo "<td></td>";
        
        if ($fila[5] <> '')
            echo " <td><a href=\"".$fila[5]."\"><img src=\"imagenes/github.png\" alt=\"Github\"/></a></td>";
        else
            echo "<td></td>";
             
        
        echo "<td>
      <form action=\"eliminarproyecto.php\" method=\"POST\">
       
           <input  type=\"hidden\" name=\"borrarproyecto\" value=\"".$fila[0]."\"> 
            
            <input type=\"submit\" value=\"Eliminar\" class=\"btn btn-danger\">
            
         </form>
    </td>
      </tr>";    
    }
    
    echo "  </tbody>
    </table>
</div>";
                     
    mysqli_free_result($resultado2);
    //mysqli_free_result($resultado3);

    mysqli_close($conex);
} 


function proyectosinv($servidor, $usuarioBD, $contrasenyaBD, $bd){
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
    
    $seleccion = mysqli_select_db($conex, $bd); 
     mysqli_set_charset($conex,"utf8");
                                
    $consulta = "SELECT * FROM Proyectos";
    
    $resultado2 = mysqli_query($conex, $consulta);
    
  echo "<div class=\"container-fluid \" id=\"collciclo\" style=\"background-color:white;margin-bottom:25px;\">";

  echo "<h2>Proyectos</h2> ";
   
  echo "<table id=\"tablesagan\" class=\"table\" style=\"width:100%;\">
    <thead class=\"thead-dark\">
      <tr>
        <th>Alumno</th>
        <th>Título</th>
        <th>Descripción</th>
        <th>DocMemoria</th>
        <th>DocExpo</th>
        <th>Enlace</th>
        
        
      </tr>
    </thead>
    <tbody>";
    
    while ($fila = mysqli_fetch_array($resultado2) ) {
        
         $consultaalu = "SELECT * FROM Usuarios WHERE IDUsuarios = $fila[11]"; 
         $resultado3 = mysqli_query($conex, $consultaalu);
         $filaalu = mysqli_fetch_array($resultado3);

       
        
        
         echo " <tr>
        <td>".$filaalu[4]."</td>
        <td>".$fila[1]."</td>
        <td>".$fila[2]."</td>";
        
         if ($fila[3] != 'archivos/' && $fila[3] != NULL )
            echo " <td><a href=\"".$fila[3]."\"><img src=\"imagenes/pdf.png\" alt=\"docExpo\"/></a></td>";
        else
            echo "<td></td>";
         if ($fila[4] != 'archivosexpo/' && $fila[4] != NULL)
            echo " <td><a href=\"".$fila[4]."\"><img src=\"imagenes/pdf.png\" alt=\"docExpo\"/></a></td>";
        else
            echo "<td></td>";
        
        if ($fila[5] <> '')
            echo " <td><a href=\"".$fila[5]."\"><img src=\"imagenes/github.png\" alt=\"Github\"/></a></td>";
        else
            echo "<td></td>";
             
          
      echo "</tr>";    
    

    }
    
    echo "  </tbody>
    </table>
</div>";
                     
    mysqli_free_result($resultado2);
   // mysqli_free_result($resultado3);

    mysqli_close($conex);
}

 //falta filtro por centro
function proyectosfiltradoinv($servidor, $usuarioBD, $contrasenyaBD, $bd, $curso, $centro, $ciclo, $categoria){
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
    
    $seleccion = mysqli_select_db($conex, $bd); 
     mysqli_set_charset($conex,"utf8");
                                
    $consulta = "SELECT * FROM Proyectos WHERE CursoEscolar_idCursoEscolar = $curso AND CicloFormativo_IDCicloFormativo = $ciclo AND Categoria_IDCategoria = $categoria";
    
    $resultado2 = mysqli_query($conex, $consulta);
    
  echo "<div class=\"container-fluid \" id=\"collciclo\" style=\"background-color:white;margin-bottom:25px;\">";

  echo "<h2>Proyectos</h2> ";
   
  echo "<table id=\"tablesagan\" class=\"table\" style=\"width:100%;\">
    <thead class=\"thead-dark\">
      <tr>
        <th>Alumno</th>
        <th>Título</th>
        <th>Descripción</th>
        <th>DocMemoria</th>
        <th>DocExpo</th>
        <th>Enlace</th>
       
        
      </tr>
    </thead>
    <tbody>";
    
    while ($fila = mysqli_fetch_array($resultado2) ) {
        
         $consultaalu = "SELECT * FROM Usuarios WHERE IDUsuarios = $fila[11]"; 
         $resultado3 = mysqli_query($conex, $consultaalu);
         $filaalu = mysqli_fetch_array($resultado3);

         echo " <tr>
        <td>".$filaalu[4]."</td>
        <td>".$fila[1]."</td>
        <td>".$fila[2]."</td>";
        
         if ($fila[3] <> '')
            echo " <td><a href=\"".$fila[3]."\"><img src=\"imagenes/pdf.png\" alt=\"docExpo\"/></a></td>";
        else
            echo "<td></td>";
        
         if ($fila[4] <> '')
            echo " <td><a href=\"".$fila[4]."\"><img src=\"imagenes/pdf.png\" alt=\"docExpo\"/></a></td>";
        else
            echo "<td></td>";
        
        if ($fila[5] <> '')
            echo " <td><a href=\"".$fila[5]."\"><img src=\"imagenes/github.png\" alt=\"Github\"/></a></td>";
        else
            echo "<td></td>";
             
      echo"</tr>";    
    }
    
    echo "  </tbody>
    </table>
</div>";
                     
    mysqli_free_result($resultado2);
    //mysqli_free_result($resultado3);

    mysqli_close($conex);
} 


function eliminarproyecto($servidor, $usuarioBD, $contrasenyaBD, $bd, $id){
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
    
    $seleccion = mysqli_select_db($conex, $bd); 
     mysqli_set_charset($conex,"utf8");
                                
    
     $consulta = "DELETE FROM Proyectos WHERE IDProyectos = $id";
    
    
    $resultado2 = mysqli_query($conex, $consulta);
    
     
    mysqli_free_result($resultado2);
//    mysqli_free_result($resultado3);
//    mysqli_free_result($resultado4);

    mysqli_close($conex);
}


function eliminarciclo($servidor, $usuarioBD, $contrasenyaBD, $bd, $id){
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
    
    $seleccion = mysqli_select_db($conex, $bd); 
     mysqli_set_charset($conex,"utf8");
                                
    
     $consulta = "DELETE FROM CicloFormativo WHERE IDCicloFormativo = $id";
    
    
    $resultado2 = mysqli_query($conex, $consulta);
    
     
    mysqli_free_result($resultado2);
//    mysqli_free_result($resultado3);
//    mysqli_free_result($resultado4);

    mysqli_close($conex);
}

function eliminarcentro($servidor, $usuarioBD, $contrasenyaBD, $bd, $id){
    
    $conex = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
    
    $seleccion = mysqli_select_db($conex, $bd); 
     mysqli_set_charset($conex,"utf8");
                                
    
     $consulta = "DELETE FROM Centro WHERE IDCentro = $id";
    
    
    $resultado2 = mysqli_query($conex, $consulta);
    
     
    mysqli_free_result($resultado2);
//    mysqli_free_result($resultado3);
//    mysqli_free_result($resultado4);

    mysqli_close($conex);
}
?>