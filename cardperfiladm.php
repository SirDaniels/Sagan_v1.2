<div class="container">
  <h2 class="title-h2"><?php echo $_SESSION['Usuario']; ?></h2>
  <div class="card" style="width:100%">
    <img class="card-img-top" src="imagenes/img_avatar1.png" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title"><?php echo $_SESSION['Nombre']?></h4> 
        <a class="btn btn-primary " href="confirmalog.php?go=7">Nuevo Admin</a>

<!--      <a href="#" class="btn btn-primary">Ver Proyecto</a>  -->
    </div>
  </div>
  <br>
</div>    