<?php
include_once "../Utilerias.class.php";
include_once "../../connection/conn.php";

if(Utilerias::parametrosSonCorrectos([$_POST["id"],$_POST["nombre"],$_POST["descripcion"]])){
    //actualizamos la práctica
    if(editarPractica(base64_decode($_POST["id"]),$_POST["nombre"],$_POST["descripcion"],$conexion)){
        header("location:../../listar_practicas.php");
    }else{
        echo "ocurrió un error";
    }
}else{

    echo "datos vacíos";
}

function editarPractica($id,$nombre,$descripcion,$conn){
    $sql = "UPDATE practicas SET nombre='$nombre', descripcion='$descripcion' WHERE id = $id";

    if(mysqli_query($conn,$sql)){
        return true;
    }else{
        return false;
    }
    
}


?>