<?php
    if(!isset($_GET["id"])) {
        exit();
    }
    $id = $_GET["id"];
    include_once "conexionBBDD.php";
    $sql = $conexion->prepare("DELETE FROM emple WHERE idEmple = ?;");
    $resultado = $sql->execute([$id]);

    if($resultado === TRUE) {
        echo "Se eliminó correctamente";
        header("Location: index.php");
    } else {
        echo "Error al eliminar el empleado";
    }
?>