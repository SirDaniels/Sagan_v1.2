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
include("navperfilalu.php");    
    ?>  
 
  <!-- Columna 1  -->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2 barra-izq">
            <div class="col-sm-14">
         <?php
            include("cardperfil.php");    
            ?>  
        </div>
    </div>
      
  <!-- Columna 2  -->
    <div class="col-sm-10 colum2">
        
                    
    <?php   
    if (isset($_SESSION['go'])) {
                
   
            
           if ( $_SESSION['go'] == 1){
           
              include('fsube.php'); 
             $_SESSION['go']=false;
               
            }
        
         if ( $_SESSION['go'] == 2){
               
           
             
             include('panelfiltro.php');
             
              
            if (isset($_SESSION['curso'])){
                
                $curso=$_SESSION['curso'];
                $centro=$_SESSION['centro'];
                $ciclo=$_SESSION['ciclo'];
                $categoria=$_SESSION['categoria'];
                
               proyectosfiltradoinv($servidor, $usuarioBD, $contrasenyaBD, $bd,$curso,$centro,$ciclo,$categoria); 
                               
                
            }else {
                 proyectosinv($servidor, $usuarioBD, $contrasenyaBD, $bd);
            }
               $_SESSION['go']=false;
           }
               
        
        
           
         if ( $_SESSION['go'] == 3){
              
                include('calendarioalu.php');
           }
            $_SESSION['go']=false;
          
         
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
            swal(\"Éxito\", \"Se ha registrado un nuevo usuario\",\"success\"); 
            });       
            </script>
            ";
            }
         $_SESSION['exito']=false;
      }
    if (isset($_SESSION['no-pdf'])){
            if ($_SESSION['no-pdf']){
                 echo " 
            <script>
            $(document).ready(function(){
            swal(\"ERROR\", \"Solo se pueden subir archivos .pdf\",\"error\"); 
            });       
            </script>
            ";
            }
         $_SESSION['no-pdf']=false;
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
