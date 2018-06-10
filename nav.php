 <!-- Barra Superior Index-->
<nav class="navbar navbar-expand-md navbar-dark bg-nav">
    
    <div class="ml-4 mr-auto order-0">
        <a class="navbar-brand mx-auto" href="#">
            <img src="imagenes/logonegro.png" alt="logo" style="width:80px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    
   <form class="navbar-form navbar-right" action="login.php" method="post">
    <div class="navbar-collapse collapse order-1 dual-collapse2 order-md-0">
         
             <div class="form-group">
                
                     <label class="text-white ml-2" for="usuario">Usuario</label>
         
               </div>
            <div class="form-group"> 
                     <input type="text" class="form-control ml-2" placeholder="Usuario" id="usr" name="usuario"> 
                </div>
             <div class="form-group">    
                     <label class="text-white ml-4" for="password">Contraseña</label>
         
              </div>
             <div class="form-group">  
                     <input type="password" class="form-control ml-2"  placeholder="Contraseña" id="password" name="pass">
              </div>
            
             <div class="form-group">  
                    <button class="btn btn-primary ml-4" type="submit">Login</button>
              </div> 
            
       </div>  
        </form>
    
     <form class="navbar-form navbar-right" action="perfilinv.php">
    <div class="navbar-collapse collapse order-1 dual-collapse2 order-md-0">      
            
             <div class="form-group">
                    <label class="text-white ml-2" for="password">O entra como </label>
               </div>
            
             <div class="form-group">
                      <button class="btn btn-primary ml-2" type="submit">Invitado</button>

                </div>
            
       </div>  
        </form>     
     
    
</nav>    