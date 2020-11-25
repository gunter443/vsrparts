<?php
    if(!isset($_POST["dni"]) || !isset($_POST["nombre"]) || !isset($_POST["apellidos"]) || !isset($_POST["telefono"])) {/*comprueba el valor de los campos si es vacio o nulo*/
        exit();
    }

    include_once "conexionBBDD.php";
    /*almacena los datos enviados por el formulario en variables*/
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];

    $sql = $conexion->prepare("INSERT INTO emple (dniEmple, nomEmple, apellEmple, telEmple) VALUES (?, ?, ?, ?);");/*consulta para inserción de datos*/
    $resultado = $sql->execute([$dni, $nombre, $apellidos, $telefono]); /*ejecuta la sentencia*/

    if($resultado === TRUE)  {
        echo "Los datos se han introducido correctamente";
        header("Location: index.php"); /*redirecciona a la página principal*/
    } else {
        echo "Algo salió mal";
    }
?>