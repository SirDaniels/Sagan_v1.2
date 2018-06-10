<?php
    session_start();
    include ("config/config.inc.php");
    include ("config/biblioteca.php");
   
?>

<!DOCTYPE html>
<html>
    
<?php include("head.php"); ?>
    
<body >
  <!-- Nav  -->
<?php
include("nav.php");    
    ?>  
 
  <!-- Columna 1  -->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-8 col-md-8" >
        
       <img src="imagenes/velez.jpeg" class="img-velez" >
<!--           <img src="imagenes/cosmo.png" class="img-velez-2">-->
<!--         <img src="imagenes/velez.jpeg" class="img-velez" >-->

    </div>
      
  <!-- Columna 2  -->
    <div class="col-sm-4 col-md-4">
      <?php
        include("fregistrate.php");    
        ?> 
    </div>    
      
    </div>
</div>
    
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
      </div>
      <div class="modal-body">
        <p>Inserta la contraseña de profesor</p>
          <input id="passpro" type="password" >
          <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="siprofesor()">Aceptar</button>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="noprofesor()">Close</button>
      </div>
    
    
      </div>
  </div> 
    
    </div>
      
   <!-- Footer  --> 
<?php
    include("footer.php"); 
?>
  <?php 
      if (isset($_SESSION['no-log'])){
            if ($_SESSION['no-log']){
                 echo " 
            <script>
            $(document).ready(function(){
            swal(\"Este usuario no existe\", \"El usuario o contraseña no es correcto\",\"error\"); 
            });       
            </script>
            ";
            }
         $_SESSION['no-log']=false;
      }
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
    
        if (isset($_SESSION['no-reg'])){
            if ($_SESSION['no-reg']){
          echo " 
            <script>
            $(document).ready(function(){
            swal(\"Error\", \"Algo ha ido mal, inténtalo de nuevo más tarde\",\"error\"); 
            });       
            </script>
            ";
           $_SESSION['no-reg']=false;
            }
        }
    
      ?>
<script>
    
    $(document).ready(function(){
        $('#profesor').change( function() {
            $('#myModal').modal({backdrop: 'static', keyboard: false});   
        });
    });
    
  
        function noprofesor() {
        $('#alumno').prop('checked', true);
        }
   
        function siprofesor() {
            var passpro = $('#passpro').val();
            
            console.log(passpro);
            
            if (passpro == 'profesor'){
                $('#profesor').prop('checked', true);
            }else{
                $('#alumno').prop('checked', true);
            }
        }
        
</script>
</body>
</html>
