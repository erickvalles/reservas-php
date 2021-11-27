<?php session_start();
if(!isset($_SESSION["usuario"])){
    header("Location:login.php");
}
?>
<?php include "./resources/layouts/header.php" ?>

<!-- Contenido -->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Crear nueva práctica de laboratorio</h3>
                <a href="listar_practicas.php" class="btn btn-xs btn-success">Ver prácticas</a>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form action="resources/pags/guardar_practica.php" method="post">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombre de la práctica</label>
                        <input type="text" class="form-control" placeholder="Ingresa el nombre de la práctica" name="nombre">
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Descripción de la práctica</label>
                        <textarea class="form-control" rows="3" placeholder="Ingresa todas las instrucciones" name="descripcion"></textarea>
                      </div>
                    </div>
                    
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <input type="submit" value="Guardar práctica" class="btn btn-success btn-block">
                    </div>
                  </div>
            </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                The footer of the card
            </div>
            <!-- /.card-footer -->
        </div>
    </div>
</div>
<!-- / .contenido -->

<?php include "./resources/layouts/footer.php" ?>

