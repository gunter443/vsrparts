<?php

    require_once "conexionBBDD.php";
    session_start();
    /*hacer if si la cookie sigue true si no, ejecutar lo de abajo*/

    if(isset($_POST['btnsession'])) {
        if($_POST['usuario'] != "" && $_POST['contra'] != "") {
            $username = $_POST['usuario'];
            $passuser = $_POST['contra'];

            $passencrypt = md5($passuser); //Encriptación de la contraseña con MD5

            $sql = $conexion->prepare("SELECT * FROM usuarios WHERE nomUser = '$username' AND contraUser = '$passencrypt'");
            $sql->execute();
            $arrayUsuarios = $sql->fetch(PDO::FETCH_ASSOC);

            if($arrayUsuarios['nomUser'] == $username && $arrayUsuarios['contraUser'] == $passencrypt) {
                $_SESSION['sesion']="dog";
                setcookie("nombre", $username, time()+(86400));
                $_SESSION['nombre'] = $username;
                header("Location: index.php");

            } else {
                echo("<script>alert('Usuario y/o contraseña incorrecto(s)');
                window.location.href='./index.php';</script>");
                
                //header("Location: inicio.php");
            }
            
            //if($arrayUsuarios['nomUser'] == $username)
            /*if(count($arrayUsuarios) == 1){
                $_SESSION['nombreUsuario'] = $username;
                echo "Hola " . $username;
            }*/
        }
    }
?>