<?php
    if(!isset($_GET["id"])) {
        exit();
    }
    $id = $_GET["id"];
    $idpro = $_GET["idpro"];
    include_once "conexionBBDD.php";
    $sql = $conexion->prepare("DELETE FROM imagenes WHERE id_img = ?;");
    $resultado = $sql->execute([$id]);

    if($resultado === TRUE) {
        echo "Se eliminó correctamente";
        header("Location: editar.php?id=". $idpro);
    } else {
        echo("<script>alert('error al eliminar el foto');
        window.location.href='./listaAdmin.php';</script>");
    }
?>