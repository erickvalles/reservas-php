<?php
include_once "../../connection/conn.php";
include_once "../Utilerias.class.php";

$usuario = $_POST["usuario"];
$password = $_POST["password"];

if(Utilerias::parametrosSonCorrectos([$_POST["usuario"],$_POST["password"]])){
    if(validarUsuario($usuario,md5($password),$conexion)){
        session_start();
        $_SESSION["usuario"]=$usuario;
        //$_SESSION["rol"]=
        header("Location:../../index.php");
        echo "Bienvenido Erick!";
    }else{
        echo "Nunca he visto a ese tipo";
    }
}else{
    echo "Error en los datos ingresados";
}




function validarUsuario($user,$pwd,$conn){
    $sql = "SELECT * FROM usuario WHERE usuario='$user' AND password='$pwd'";
    $resultado = mysqli_query($conn,$sql);
    if($resultado){
        if(mysqli_num_rows($resultado)>0){
            return true;
        }else{
            return false;
        }
    }

    
}







?>