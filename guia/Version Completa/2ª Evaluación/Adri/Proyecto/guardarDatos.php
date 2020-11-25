<?php
    if (!isset($_POST["id"]) || !isset($_POST["dni"]) || !isset($_POST["nombre"]) || !isset($_POST["apellidos"]) || !isset($_POST["telefono"])) {
        exit();
    }
    include_once "conexionBBDD.php";
    $id = $_POST["id"];
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];

    $sql = $conexion->prepare("UPDATE emple SET dniEmple = ?, nomEmple = ?, apellEmple = ?, telEmple = ? WHERE idEmple = ?;");
    $resultado = $sql->execute([$dni, $nombre, $apellidos, $telefono, $id]);

    if($resultado === TRUE) {
        echo "Se han guardado los cambios";
        header("Location: index.php");
    } else {
        echo "Error al guardar los datos";
    }
?>