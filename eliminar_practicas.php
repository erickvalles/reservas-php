<?php

include_once "connection/conn.php";
$id = base64_decode($_GET["id"]);

if(eliminar($id,$conexion)){
    header("Location:listar_practicas.php");
}else{
    echo "Hubo un error";
}


function eliminar($id,$conn){
    $sql = "DELETE FROM practicas WHERE id='$id'";
    if(mysqli_query($conn,$sql)){
        return true;
    }else{
        return false;
    }
}


?>