<?php session_start();
if(!isset($_SESSION["usuario"])){
    header("Location:login.php");
}
include_once "./connection/conn.php";

$idPractica = base64_decode($_GET["id"]);
//obtener la práctica por su id
$practica = getPracticaPorId($idPractica,$conexion);

function getPracticaPorId($id,$conn){
  $sql = "SELECT * FROM practicas where id='$id'";
  $resultado = mysqli_query($conn,$sql);
  if($resultado){
    if(mysqli_num_rows($resultado)>0){
      $practica = mysqli_fetch_object($resultado);
      return $practica;
    }else{
      return false;
    }
  }else{
    return false;
  }
}
?>
<?php include "./resources/layouts/header.php" ?>

<!-- Contenido -->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Editar práctica de laboratorio</h3>
                <a href="listar_practicas.php" class="btn btn-xs btn-success">Ver prácticas</a>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form action="resources/pags/modificar_practica.php" method="post">
              <input type="hidden" name="id" value="<?php echo base64_encode($practica->id) ?>">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombre de la práctica</label>
                        <input type="text"
                         class="form-control"
                         placeholder="Ingresa el nombre de la práctica"
                         name="nombre"
                         value="<?php echo $practica->nombre ?>"
                         >
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Descripción de la práctica</label>
                        <textarea 
                        class="form-control" 
                        rows="3" 
                        placeholder="Ingresa todas las instrucciones" 
                        name="descripcion"><?php echo $practica->descripcion ?></textarea>
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

