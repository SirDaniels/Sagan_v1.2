 
<div id="calendario" style="background-color: #E6ECFA; margin-top:30px; margin-bottom: 30px"></div> 
            
            
            <!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloEvento" >Agregar Exposición</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        
          
          <input type="hidden" id="txtId" name="txtId" />
            Fecha: <input type="text" id="txtFecha" name="txtFecha" />
          
          <div class="form row">
            <div class="form-gorup col-md-8">
                <label>Título : </label>
                 <input type="text" id="txtTitulo" name="txtTitulo" class="form-control" placeholder="Título del evento"/>
                </div>
                <div class="form-gorup col-md-4">
                    <label>Hora : </label>
          <input type="text" id="txtHora" name="txtHora" value="10:30" class="form-control"/>
          </div> 
            </div>      
         <div class="form-gorup "> 
         <label>Descripción : </label>
             <textarea id="txtDescripcion" name="txtDescripcion" row="3" class="form-control"></textarea>
<!--          <p>Color: <input type="color" id="#txtColor" name="txtColor" /></p>-->
          </div>
<!--          <p>Color: <input type="color" id="#txtColor" name="txtColor" /></p>-->
      </div>
        
        
      <div class="modal-footer">
            <button type="button" id="btnAgregar" class="btn btn-primary">Agregar</button>  
            <button type="button" id="btnModificar" class="btn btn-warning">Modificar</button>  
            <button type="button" id="btnEliminar" class="btn btn-danger">Borrar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      
      </div>
    </div>
  </div>
</div>
  
                    
               <!-- Modal 