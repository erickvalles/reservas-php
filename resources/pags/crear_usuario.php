<?php
session_start();
include_once "../Utilerias.class.php";
include_once "../../connection/conn.php";

if(Utilerias::parametrosSonCorrectos([$_POST['usuario'],$_POST["password"],$_POST['confirm-password']])){
    $usuario = $_POST["usuario"];
    $pass = $_POST["password"];
    $passowordConfirmation = $_POST["confirm-password"];
    if($pass==$passowordConfirmation){
        //verificar si el nombre de usuario no está en uso
        if(sePuedeUtilizarElUsuario($usuario,$conexion)){
            //insertamos el usuario
            if(crearUsuario($usuario,md5($pass),$conexion)){
                unset($_SESSION["errores"]);
                unset($_SESSION["mensaje_error"]);
                header("Location:../../login.php");
            }else{
                setError("Ocurrió un problema en el registro");
            }
        }else{
            setError("Usuario ya registrado");
        }
    }else{
        
        setError("Las contraseñas no coinciden");
    }
}else{
    return "Dejó campos incorrectos";
}

function setError($mensajeError){
    $_SESSION["errores"] = true;
    $_SESSION["mensaje_error"]=$mensajeError;
    header("Location:../../registrar.php");
}

function crearUsuario($nombreUsuario,$password,$conn){
    $sql = "INSERT INTO usuario(usuario,password) VALUES ('$nombreUsuario','$password')";
    if(mysqli_query($conn,$sql)){
        return true;
    }else{
        return false;
    }
}


function sePuedeUtilizarElUsuario($nombreUsuario,$conn){
    $sql = "SELECT * FROM usuario where usuario = '$nombreUsuario'";//buscamos si el usuario está ocupado

    $resultado = mysqli_query($conn,$sql);

    if($resultado){
        if(mysqli_num_rows($resultado)>0){//el usuario ya está en uso
            return false;//no lo puede utilizar
        }else{
            return true;//el usuario está disponible y lo comunicamos
        }
    }
}

?>