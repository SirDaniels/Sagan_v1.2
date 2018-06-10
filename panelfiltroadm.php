<div class="card filtro">
  <div class="card-header filtro-head">
    Filtros :
  </div>
  <div class="card-body">
   <form action="confirmalog.php?go=4" method="post">
    <div class="row">  
       <div class="col-sm-6 col-md-6">
               
            <label for="ciclo">Ciclo Formativo:</label>
                <select class="form-control" required id="ciclo" name="ciclo">
                   <?php
                 option('CicloFormativo',$servidor, $usuarioBD, $contrasenyaBD, $bd);
                    ?>
                </select>
            <label for="categoria">Categoría</label>
                <select class="form-control" required id="categoria" name="categoria">
                    <?php
                 option('Categoria', $servidor, $usuarioBD, $contrasenyaBD, $bd);
                    ?>
                </select>
        
            
       </div>
       <div class="col-sm-6 col-md-6">
             <label for="curso">Curso Escolar</label>
                <select class="form-control" required id="curso" name="curso">
                    <?php
                 option('CursoEscolar', $servidor, $usuarioBD, $contrasenyaBD, $bd);
                    ?>
                </select>
       
             <label for="centro">Centro Escolar</label>
                <select class="form-control" required id="centro" name="centro">
                    <?php
                 option('Centro', $servidor, $usuarioBD, $contrasenyaBD, $bd);
                    ?>
                </select>
            
          
       </div>
    </div> 
       
        <div class="row">  
       <div class="col-sm-6 col-md-6">
           <input type="submit" class="btn btn-primary btn-block z-depth-2 mt-2" value="Filtrar">
            </div>
        <div class="col-sm-6 col-md-6">
             <a class="btn btn-success btn-block z-depth-2 mt-2" href="confirmalog.php?go=4" >Ver Todos</a>
            </div>
       </div>
       
      </form>
      
        
  </div>
</div>
