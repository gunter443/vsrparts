<?php
    if(!isset($_POST["id"]) || !isset($_POST["nombre"])) {/*comprueba el valor de los campos si es vacio o nulo*/
        exit();
    }
    include_once "conexionBBDD.php";
    /*almacena los datos enviados por el formulario en variables*/
    
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];

    $sql = $conexion->prepare("INSERT INTO imagenes (id_productos, nombre) VALUES (?, ?);");/*consulta para inserción de datos*/
    $resultado = $sql->execute([$id, $nombre]); /*ejecuta la sentencia*/


    if($resultado === TRUE) {
        echo "Se han guardado los cambios";
        header("Location: index.php");
    } else {
        echo "Error al guardar los datos";
    }
?>