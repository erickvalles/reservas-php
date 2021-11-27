<?php session_start();
if(!isset($_SESSION["usuario"])){
    header("Location:login.php");
}
include_once "./connection/conn.php";

?>
<?php include "./resources/layouts/header.php" ?>

<!-- Contenido -->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de prácticas de laboratorio</h3>
                <a href="agregar_practicas.php" class="btn btn-xs btn-success">Agregar práctica</a>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Nombre</th>
                      <th>Descripción</th>
                      <th style="width: 40px">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      obtenerPracticas($conexion);
                    ?>
                    
                  </tbody>
                </table>
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

<?php

function obtenerPracticas($conn){
  $sql = "SELECT * FROM practicas";

  $resultado = mysqli_query($conn,$sql);
  if($resultado){
    if(mysqli_num_rows($resultado)>0){
      while($fila = mysqli_fetch_array($resultado)){
        $id = $fila['id'];
        $idEnconded = base64_encode($id);
        echo "<tr>
                <td>".$id."</td>
                <td>".$fila["nombre"]."</td>
                <td>".$fila["descripcion"]."</td>
                <td><a href='editar_practicas.php?id=".$idEnconded."'>Editar</a>
                <a href='eliminar_practicas.php?id=".$idEnconded."'>Eliminar</a>
                </td>
            </tr>";
      }
      //imprimo las filas en la tabla
    }else{
      echo "<tr>
                <td colspan='4'>No se encontraron resultados</td>
            </tr>";
    }
  }else{
    //imprimir que no hay prácticas/error
  }

}

?>