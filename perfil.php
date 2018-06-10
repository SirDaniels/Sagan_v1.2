<?php
    session_start();
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
include("navperfil.php");    
    ?>  
 
  <!-- Columna 1  -->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-4 bg-danger">
            <div class="col-sm-14">
         <?php
            include("cardperfil.php");    
            ?>  
        </div>
    </div>
      
  <!-- Columna 2  -->
    <div class="col-sm-8">
        <div class="col-sm-8">
          <h3>Panel Principal </h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
          <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            
            <?php
            mostrarSession();
            ?>
            
            
        </div>
    </div>
    
      

   </div>
</div>
      <!-- Footer  -->
<?php
    include("footer.php"); 
?>
</body>
</html>
