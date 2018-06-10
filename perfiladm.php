<?php
    session_start();
    include ("config/config.inc.php");
    include ("config/biblioteca.php");
     
    
?>

<!DOCTYPE html>
<html>
    
<?php
include("head.php");    
    ?>
    
<body >
      <!-- Nav  -->
<?php
include("navperfiladm.php");    
    ?>  
 
  <!-- Columna 1  -->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2 barra-izq">
            <div class="col-sm-14">
         <?php
            include("cardperfiladm.php");    
         ?>  
        </div>
    </div>
      
  <!-- Columna 2  -->
    <div class="col-sm-10 colum2" >
       
          
            
            <?php            
            
            
    if (isset($_SESSION['go'])) {
                
   
            
           if ( $_SESSION['go']== 1){
           
               
             admadministradores($servidor, $usuarioBD, $contrasenyaBD, $bd);
             
            }
        
         if ( $_SESSION['go'] == 2){
               
             $go=2;   
             
             include('panelfiltroaluadm.php');
             
            if (isset($_SESSION['centro'])){
                
                // $curso=$_REQUEST['curso'];
                $centro=$_SESSION['centro'];
                $ciclo=$_SESSION['ciclo'];
                // $categoria=$_REQUEST['categoria']; 
             
             
              
                admalumnosfil($servidor, $usuarioBD, $contrasenyaBD, $bd, $ciclo, $centro);
                
                
                
                }  else {
                  admalumnos($servidor, $usuarioBD, $contrasenyaBD, $bd);
            }
               
         
               
           }
        
           
         if ( $_SESSION['go'] == 3){
              
               admprofesores($servidor, $usuarioBD, $contrasenyaBD, $bd);
               
           }
            
            
           if ( $_SESSION['go'] == 4){
            
               $go=4;   
            
               include('panelfiltroadm.php');
            
            if (isset($_SESSION['curso'])){
                
                $curso=$_SESSION['curso'];
                $centro=$_SESSION['centro'];
                $ciclo=$_SESSION['ciclo'];
                $categoria=$_SESSION['categoria'];
                
               proyectosfiltrado($servidor, $usuarioBD, $contrasenyaBD, $bd,$curso,$centro,$ciclo,$categoria); 
                               
                
            }else {
                 proyectos($servidor, $usuarioBD, $contrasenyaBD, $bd);
            }
               
           }
        
            
         if (  $_SESSION['go'] == 5){
              
               admCentros($servidor, $usuarioBD, $contrasenyaBD, $bd);
               
           }
        
            
         if (  $_SESSION['go'] == 6){
               admCiclos($servidor, $usuarioBD, $contrasenyaBD, $bd);
               
           }
        
            if (  $_SESSION['go'] == 7){
                    
                include('fRegistrateadm.php');
           }
         
        }         
                        
            
            ?>
            
            
       
    </div>
    
      

   </div>
</div>
      <!-- Footer  -->
<?php
    include("footer.php"); 
?>
     <?php 
      if (isset($_SESSION['exito'])){
            if ($_SESSION['exito']){
                 echo " 
            <script>
            $(document).ready(function(){
            swal(\"Eliminado\", \"Se ha eliminado un elemento \",\"error\"); 
            });       
            </script>
            ";
            }
         $_SESSION['exito']=false;
      }
      ?>
<script>
    $(document).ready( function () {
        $('#tablesagan').DataTable({
        "scrollX": true
        });        
    });    
</script>    
</body>
</html>
