<section class="form-simple">
<!--Formulario Registrate-->
    <div class="card form-index">

        <!--Header-->
        <div class="header pt-3 grey lighten-2">

            <div class="row d-flex justify-content-center reg" >
                <h2 class="deep-grey-text mt-3 mb-4 pb-1 mx-5">Regístrate</h2>
            </div>
        </div>
        <!--Header-->

        <div class="card-body mx-4 mt-2" style="padding-top: 0px;">
             <form action="insertar.php" method="POST">
                 
            <!--Body-->
            <div class="md-form">
                <label for="usuario" class="freg">Usuario:</label>
                <input type="text" required name="usuario" id="usuario" class="form-control">
                <br/>
                <label for="email" class="freg">e-mail:</label>
                <input type="email" required name="email" id="email" class="form-control">
                <br/>
                <label for="pass" class="freg">Contraseña:</label>
                <input type="password" required name="pass" id="pass" class="form-control">
                <br/>
                <label for="nombre" class="freg">Nombre Y Apellidos:</label>
                <input type="text" required name="nombre" id="nombre" class="form-control">
            </div>
              
            <div class="form-group">
                <br/>
                <label for="centro" class="freg">Centro Escolar</label>
                <select class="form-control" required id="centro" name="centro">
                    <?php
                 option('Centro', $servidor, $usuarioBD, $contrasenyaBD, $bd);
                    ?>
                </select>
            </div>          
            
                 
            <div class="form-group" class="freg">
                <label for="ciclo" class="freg">Ciclo Formativo:</label>
                <select class="form-control" required id="ciclo" name="ciclo">
                   <?php
                 option('CicloFormativo',$servidor, $usuarioBD, $contrasenyaBD, $bd);
                    ?>
                </select>
            </div>     

                 

            <div class="md-form pb-3">
            <div class="roe">
                <label class="freg">Rol:</label>
                <br/>
             </div>    
            <div class="row">
                <div class="col-sm-6 col-md-6" >
                  <label for="profesor" class="freg">Profesor:  
                       <input type="radio" required name="rol" id="profesor" value="3" >
                    </label>
                     </div>
                <div class="col-sm-6 col-md-6" >
                  <label for="alumno" class="freg" >Alumno:  
                      <input type="radio" required name="rol" id="alumno" value="2" >  
                    </label>
                    </div>
                  </div>  
            
                          
                
            </div>

            <div class="text-center mb-4">
                <input type="submit" class="btn btn-primary btn-block z-depth-2" value="Regístrate">
            </div>
         
                 
            </form>    
                 
        </div>

    </div>
    <!--/Form with header-->
<section/>