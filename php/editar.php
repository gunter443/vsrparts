<?php
if (!isset($_GET["id"])) {
    exit();
}
$id = $_GET["id"];
include_once "conexionBBDD.php";
$sql = $conexion->prepare("SELECT * FROM productos WHERE idproductos = ?;");
$sql->execute([$id]);
$productos = $sql->fetch(PDO::FETCH_OBJ);
if ($persona === FALSE) {
    echo "No existe ningun empleado con ese ID";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="../fotos/icono.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/index.css">
    <title>Editar datos</title>
</head>

<body>
    <h1>Editar Empleado</h1>
    <div>
        <form action="./guardarDatos.php" method="post">
            <input type="hidden" value="<?php echo $productos->idproductos; ?>" name="id">
            <label for="nomPro">Nombre Producto<span>*</span></label>
            <input type="text" value="<?php echo $productos->nombre_producto; ?>" name="nomPro" id="nomPro" pattern="[A-Z]" title="Nombre Producto" required>
            <br>
            <label for="precio">Precio<span>*</span></label>
            <input type="text" value="<?php echo $productos->precio_producto; ?>" name="precio" id="precio" pattern="[0-9]" required>
            <br>
            <label for="des">Descricion<span>*</span></label>
            <textarea type="text" value="<?php echo $productos->descripcion_producto; ?>" name="des" id="des" required></textarea>
            <br>
            <label for="marcPro">Marca</label>
            <input type="text" value="<?php echo $productos->marca_producto; ?>" name="marcPro" id="marcPro">
            <br>
            <label for="modPro">Modelos</label>
            <input type="text" value="<?php echo $productos->modelo_producto; ?>" name="modPro" id="modPro">
            <br>
            <label for="foto">Foto Principal</label>
            <input type="text" value="<?php echo $productos->foto_producto; ?>" name="foto" id="foto">
            <br>
            <label for="prin">Favorito</label>
            <input type="text" value="<?php echo $productos->principal; ?>" name="prin" id="prin" pattern="[0-1]{1}">
            <br>
            <input type="submit" value="Guardar cambios" id="btn">
        </form>
<!-- formulario de 1 campo invisible y un campo visible para añadir nombre fotos, y una lista para ver los añadidos-->
    </div>
    <br>
    <br>
    <?php include "./tabla.php" ?>
</body>

</html>