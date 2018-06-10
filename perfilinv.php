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
    
<body>
      <!-- Nav  -->
<?php
include("navperfilinv.php");    
    ?>  
 
  <!-- Columna 1  -->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-1 bg-danger">
            <div class="col-sm-14">
         <?php
          //  include("cardperfilinv.php");    
            ?>  
        </div>
    </div>
      
  <!-- Columna 2  -->
    <div class="col-sm-12">
        <div class="col-sm-12 mt-3">
            
            
            <?php
            
            include('panelfiltroinv.php');
            
            if (isset($_REQUEST['curso'])){
                
                $curso=$_REQUEST['curso'];
                $centro=$_REQUEST['centro'];
                $ciclo=$_REQUEST['ciclo'];
                $categoria=$_REQUEST['categoria'];
                
               proyectosfiltradoinv($servidor, $usuarioBD, $contrasenyaBD, $bd,$curso,$centro,$ciclo,$categoria); 
                               
                
            }else {
                 proyectosinv($servidor, $usuarioBD, $contrasenyaBD, $bd);
            }
           
            
            ?>
<!--            <a href="#" class="btn btn-primary">Ver Proyectos</a>-->
            
            
        </div>
    </div>
    
      

   </div>
</div>
      <!-- Footer  -->
<?php
    include("footer.php"); 
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
