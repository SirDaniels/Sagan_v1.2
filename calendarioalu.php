 
<div id="calendario" style="background-color: #E6ECFA; margin-top:30px; margin-bottom: 30px"></div> 
                <script>
                
                $(document).ready(function(){
                    $('#calendario').fullCalendar({
                        header: {
                            left:'today, prev, next',
                            center:'title',
                            right:'month, agendaWeek, agendaDay'
                        },
//                         
//                        dayClick:function(date,jsEvent,view){
//                            $('#txtFecha').val(date.format());
//                            $('#modal').modal();
//                            
//                        },
                    
                        events:"http://localhost/sagan12/eventos.php",
                        
                        eventClick:function(calEvent,jsEvent,view){
                            $('#tituloEvento').html(calEvent.title);
                            
                            $('#txtId').val(calEvent.id);
                            $('#txtTitulo').val(calEvent.title);
                            $('#txtDescripcion').val(calEvent.descripcion);
                            $('#txtColor').val(calEvent.color);
//                            $('#txtHora').val(calEvent.start);   
                            $('#FechaHora').val(calEvent.start);  
                            
//,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,, VOLVER A MIRAR ,,,,,,,,,,,,,//
//                            
//                            FechaHora = calEvent.star._i.split(" ");  
//                                $('#txtFecha').val(FechaHora[0]);
//                                $('#txtHora').val(FechaHora[1]);                    
//                            
                             $('#modal').modal();
                        }
                       
                    
                     });
                });
                
                
                </script>
            
            <!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloEvento">Agregar Exposición</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        
          
          <input type="hidden" id="txtId" name="txtId" />
<!--            Fecha: <input type="text" id="txtFecha" name="txtFecha" />-->
          
<!--          <div class="form row">-->
            <div class="form-gorup col-md-12">
                    <label>Título : </label>
                    <input type="text" id="txtTitulo" name="txtTitulo" class="form-control" placeholder="Título del evento" readonly/>
                </div>
                <div class="form-gorup col-md-12">
                    <label>Hora : </label>
                    <input type="text" id="FechaHora" name="txtHora" class="form-control" readonly/>
                </div> 
<!--            </div>      -->
          <br/>
         <div class="form-gorup "> 
         <label>Descripción : </label>
             <textarea id="txtDescripcion" name="txtDescripcion" row="5" class="form-control" readonly></textarea>
<!--          <p>Color: <input type="color" id="#txtColor" name="txtColor" /></p>-->
          </div>
<!--          <p>Color: <input type="color" id="#txtColor" name="txtColor" /></p>-->
      </div>
        
        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      
      </div>
    </div>
  </div>
</div>
            
            <script>
                var NuevoEvento;
                $('#btnAgregar').click(function(){
                    recolectarDatosGUI();
                    enviarInformacion('agregar',NuevoEvento); 
//                    $('#calendario').fullCalendar('renderEvent',NuevoEvento);
                   
                });
                $('#btnEliminar').click(function(){
                    recolectarDatosGUI();
                    enviarInformacion('eliminar',NuevoEvento); 
//                    $('#calendario').fullCalendar('renderEvent',NuevoEvento);
                   
                });
                $('#btnModificar').click(function(){
                    recolectarDatosGUI();
                    enviarInformacion('modificar',NuevoEvento); 
//                    $('#calendario').fullCalendar('renderEvent',NuevoEvento);
                   
                });
                
                function recolectarDatosGUI(){
                         
                   NuevoEvento={ 
                        id:$('#txtId').val(),
                        title:$('#txtTitulo').val(),
                        start:$('#txtFecha').val()+" "+$('#txtHora').val(),
                        color:"#000000",
                        descripcion:$('#txtDescripcion').val(),
                        textColor:"#FFFFFF",
                        end:$('#txtFecha').val()+" "+$('#txtHora').val()
                    };
                    
                }
                function enviarInformacion(accion,objEvento){
                  
                    $.ajax({
                        type:'POST',
                        url:'eventos.php?accion='+accion,
                        data:objEvento,
                        succes:function(msg){
                            if(msg){       
                                $('#calendario').fullCalendar('refetchEvents');
                                 $("#modal").modal('toggle');
                            }else {
                                
                            }
                         }
                        , error:function(){
                            alert(' Acción realizada con Éxito ');                    
                            $('#calendario').fullCalendar('refetchEvents');
                                 $("#modal").modal('toggle');
                         }   
                           
                           
                    })
                };
            
            </script>
                    
               <!-- Modal 