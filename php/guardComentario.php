<?php
    if(!isset($_POST["idpro"]) || !isset($_POST["comen"])) {/*comprueba el valor de los campos si es vacio o nulo*/
        exit();
    }
    include_once "conexionBBDD.php";
    /*almacena los datos enviados por el formulario en variables*/
    
    $id = $_POST["idpro"];
    $comentario = $_POST["comen"];

    $sql = $conexion->prepare("INSERT INTO comentarios (id_productos, comentario) VALUES (?, ?);");/*consulta para inserción de datos*/
    $resultado = $sql->execute([$id, $comentario]); /*ejecuta la sentencia*/


    if($resultado === TRUE) {
        header("Location: product.php?id=". $id);
    } else {
        echo "Error al guardar los datos";
    }
?>