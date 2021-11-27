<?php
include_once "../Utilerias.class.php";
include_once "../../connection/conn.php";

if(Utilerias::parametrosSonCorrectos([$_POST["nombre"],$_POST["descripcion"]])){
    //guardar la práctica
    if(guardarPractica($_POST["nombre"],$_POST["descripcion"],$conexion)){
        header('Location:../../listar_practicas.php');
    }else{
        echo "error insertando la práctica";
    }
}else{
    echo "Dejaste campos vacíos";//utilizando variables de sesión
}


function guardarPractica($nombrePractica,$descripcionPractica,$conn){
    $sql = "INSERT INTO practicas(nombre,descripcion) VALUES('$nombrePractica','$descripcionPractica')";

    if(mysqli_query($conn,$sql)){
        return true;
    }else{
        return false;
    }

}


?>