<section class="form-simple">
<!--Formulario Registrate-->
    <div class="card form-index">

        <!--Header-->
        <div class="header pt-3 grey lighten-2">

            <div class="row d-flex justify-content-center freg" style="font-size: 40px; font-style: italic;">
                <h3 class="deep-grey-text mt-3 mb-4 pb-1 mx-5">Sube tu proyecto</h3>
            </div>

        </div>
        <!--Header-->

        <div class="card-body mx-4 mt-2">
             <form action="insertarpro.php" method="POST" enctype="multipart/form-data">
                 
            <!--Body-->
            <div class="md-form">
                <label for="titulo" class="freg">Título</label>
                <input type="text" required name="titulo" id="titulo" class="form-control">
                <br/>
                <label for="descripcion" class="freg">Descripción</label>
                <input type="textarea" required name="descripcion" id="descripcion" class="form-control">
                <br/>

            </div>            
                 
            <div class="form-group">
                <label for="ciclo" class="freg">Ciclo Formativo:</label>
                <select class="form-control" required id="ciclo" name="ciclo">
                   <?php
                 option('CicloFormativo',$servidor, $usuarioBD, $contrasenyaBD, $bd);
                    ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="categoria" class="freg">Categoría</label>
                <select class="form-control" required id="categoria" name="categoria">
                   <?php
                 option('Categoria',$servidor, $usuarioBD, $contrasenyaBD, $bd);
                    ?>
                </select>
            </div>      
                 
             <div class="form-group">
                <label for="curso" class="freg">CursoEscolar</label>
                <select class="form-control" required id="curso" name="curso">
                   <?php
                 option('CursoEscolar',$servidor, $usuarioBD, $contrasenyaBD, $bd);
                    ?>
                </select>
            </div>          
            <div class="form-group">
                <label for="docmemoria" class="freg">Documento Memoria</label>
                <input type="file" name="docmemoria" id="docmemoria" class="form-control">
            </div>  
                 
            <div class="form-group">
                <label for="docexpo" class="freg">Documento Exposición</label>
                <input type="file" name="docexpo" id="docexpo" class="form-control">
            </div>  
                 
            <div class="form-group">
                <label for="enlace" class="freg">Enlace a Github</label>
                <input type="text" name="enlace" id="enlace" class="form-control">
            </div>  

            <div class="text-center mb-4">
                <input type="submit" class="btn btn-primary btn-block z-depth-2" value="Subir">
            </div>
    
            </form>    
                 
        </div>

    </div>
    <!--/Form with header-->
<section/>