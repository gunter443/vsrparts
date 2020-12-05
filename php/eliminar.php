<?php
    if(!isset($_GET["id"])) {
        exit();
    }
    $id = $_GET["id"];
    include_once "conexionBBDD.php";
    $sql = $conexion->prepare("DELETE FROM productos WHERE idproductos = ?;");
    $resultado = $sql->execute([$id]);

    if($resultado === TRUE) {
        echo "Se eliminó correctamente";
        header("Location: listaAdmin.php");
    } else {
        echo("<script>alert('error al eliminar el producto');
        window.location.href='./listaAdmin.php';</script>");
    }
?>