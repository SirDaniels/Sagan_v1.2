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
include("navperfilpro.php");    
    ?>  
 
  <!-- Columna 1  -->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2 barra-izq">
            <div class="col-sm-14">
         <?php
            include("cardperfil.php");    
            ?>
        </div>
    </div>
      
  <!-- Columna 2  -->
    <div class="col-sm-10 colum2">
       
            
<!--         entre esto    -->
           
            
<!--            y eso -->
            
             <?php            
            
            
    if (isset($_SESSION['go'])) {
                
   
         
         if ( $_SESSION['go'] == 1){
                
             include('panelfiltroalu.php');
             
            if (isset($_SESSION['centro'])){
                
                // $curso=$_REQUEST['curso'];
                $centro=$_SESSION['centro'];
                $ciclo=$_SESSION['ciclo'];
                // $categoria=$_REQUEST['categoria']; 
             
             
              
                admalumnosfilpro($servidor, $usuarioBD, $contrasenyaBD, $bd, $ciclo, $centro);
                
                
                
                }  else {
                  admalumnospro($servidor, $usuarioBD, $contrasenyaBD, $bd);
            }
               
             $_SESSION['go'] = false;
               
           }
        
            
            
           if ( $_SESSION['go'] == 2){
            
                
            
               include('panelfiltropro.php');
            
            if (isset($_SESSION['curso'])){
                
                $curso=$_SESSION['curso'];
                $centro=$_SESSION['centro'];
                $ciclo=$_SESSION['ciclo'];
                $categoria=$_SESSION['categoria'];
                
               proyectosfiltradoinv($servidor, $usuarioBD, $contrasenyaBD, $bd,$curso,$centro,$ciclo,$categoria); 
                               
                
            }else {
                 proyectosinv($servidor, $usuarioBD, $contrasenyaBD, $bd);
            }
               $_SESSION['go'] = false;
           }
        
            
         if ( $_SESSION['go'] == 3){
              include('calendario.php');
              $_SESSION['go'] = false;
           }
        
            
     
            }              
            
            ?>
            
        </div>

    </div>    

    
      

   
</div>


    
      <!-- Footer  -->
<?php
    
          include("footer.php"); 
   
  
?>
 
  <script>
                
                $(document).ready(function(){
                    $('#calendario').fullCalendar({
                        header: {
                            left:'today, prev, next',
                            center:'title',
                            right:'month, agendaWeek, agendaDay'
                        },
                         
                        dayClick:function(date,jsEvent,view){
                            $('#txtFecha').val(date.format());
                            $('#modal').modal();
                            
                        },
                    
                        events:"http://localhost/sagan12/eventos.php",
                        
                        eventClick:function(calEvent,jsEvent,view){
                            $('#tituloEvento').html(calEvent.title);
//                            $('#txtFecha').val(date.format());
                            $('#txtId').val(calEvent.id);
                            $('#txtTitulo').val(calEvent.title);
                            $('#txtDescripcion').val(calEvent.descripcion);
                            $('#txtColor').val(calEvent.color);
                                               
//                            FechaHora = calEvent.star._i.split(" ");  
//                                $('#txtFecha').val(FechaHora[0]);
//                                $('#txtHora').val(FechaHora[1]);                    
                            
                             $('#modal').modal();
                        }
                       
                    
                     });
                });
                
                
</script>            





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

<script>
    $(document).ready( function () {
        $('#tablesagan').DataTable({
        "scrollX": true
        });        
    });    
</script>
</body>
</html>
