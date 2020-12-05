<?php
    if(!isset($_POST["nomPro"]) || !isset($_POST["precio"]) || !isset($_POST["des"]) || !isset($_POST["marcPro"]) || !isset($_POST["foto"]) || !isset($_POST["modPro"])) {/*comprueba el valor de los campos si es vacio o nulo*/
        exit();
    }
    include_once "conexionBBDD.php";
    /*almacena los datos enviados por el formulario en variables*/
    $nomPro = $_POST["nomPro"];
    $precio = $_POST["precio"];
    $des = $_POST["des"];
    $marcPro = $_POST["marcPro"];
    $modPro = $_POST["modPro"];
    $foto = $_POST["foto"];
    $prin = $_POST["prin"];

    $sql = $conexion->prepare("INSERT INTO productos (nombre_producto, precio_producto, descripcion_producto, marca_producto, modelo_producto, foto_producto , principal) VALUES (?, ?, ?, ?, ?, ? ,?);");/*consulta para inserción de datos*/
    $resultado = $sql->execute([$nomPro, $precio, $des, $marcPro, $modPro, $foto, $prin]); /*ejecuta la sentencia*/

    if($resultado === TRUE)  {
        echo "Los datos se han introducido correctamente";
        header("Location: listaAdmin.php"); /*redirecciona a la página principal*/
    } else {
        echo "Algo salió mal";
    }
?>