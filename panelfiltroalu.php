<div class="card filtro">
  <div class="card-header filtro-head">
    Filtros :
  </div>
  <div class="card-body">
   <form action="confirmalogpro.php?go=1" method="post">
  <div class="row">  
       <div class="col-sm-6 col-md-6">
              <label for="ciclo">Ciclo Formativo:</label>
                <select class="form-control" required id="ciclo" name="ciclo">
                   <?php
                        option('CicloFormativo',$servidor, $usuarioBD, $contrasenyaBD, $bd);
                    ?>
                </select>
          
         
        </div>
            
        <div class="col-sm-6 col-md-6">
                <label for="centro">Centro Escolar</label>
                    <select class="form-control" required id="centro" name="centro">
                        <?php
                            option('Centro', $servidor, $usuarioBD, $contrasenyaBD, $bd);
                        ?>
                    </select>
                  <br>
                
             
        </div>
   
        
       </div>
       
       
 <div class="row">  
       <div class="col-sm-6 col-md-6">
          <input type="submit" class="btn btn-primary btn-block z-depth-2 mt-2" value="Filtrar">
     </div>
       <div class="col-sm-6 col-md-6">
           <a class="btn btn-success btn-block z-depth-2 mt-2" href="confirmalogpro.php?go=1">Ver Todos</a>
     </div>
</div>
       
      </form>
      
       
  </div>
</div>
