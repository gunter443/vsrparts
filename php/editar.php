<?php
if (!isset($_GET["id"])) {
    exit();
}
$id = $_GET["id"];
include_once "conexionBBDD.php";
$sql = $conexion->prepare("SELECT * FROM productos WHERE idproductos = ?;");
$sql->execute([$id]);
$productos = $sql->fetch(PDO::FETCH_OBJ);
if ($productos === FALSE) {
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
    <link rel="shortcut icon" href="../fotos/vsrLogo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../css/editarpro.css">
    <title>Editar datos</title>
</head>

<body>
    <div id="body" class="contenedorP">
        <h1>Editar Empleado</h1>
        <div>
            <form action="./guardarDatos.php" method="post">
                <input type="hidden" value="<?php echo $productos->idproductos; ?>" name="id">
                <div class="form-group row">
                <label for="nomPro">Nombre Producto<span>*</span></label>
                <input type="text" value="<?php echo $productos->nombre_producto; ?>" name="nomPro" id="nomPro" title="Nombre Producto" required>
                </div><div class="form-group row">
                <label for="precio">Precio<span>*</span></label>
                <input type="number" value="<?php echo $productos->precio_producto; ?>" name="precio" id="precio" required>
                </div><div class="form-group row">
                <label for="des">Descricion<span>*</span></label>
                <textarea type="text" value="<?php echo $productos->descripcion_producto; ?>" name="des" id="des" required><?php echo $productos->descripcion_producto; ?></textarea>
                </div><div class="form-group row">
                <label for="marcPro">Marca</label>
                <input type="text" value="<?php echo $productos->marca_producto; ?>" name="marcPro" id="marcPro">
                </div><div class="form-group row">
                <label for="modPro">Modelos</label>
                <input type="text" value="<?php echo $productos->modelo_producto; ?>" name="modPro" id="modPro">
                </div><div class="form-group row">
                <label for="foto">Foto Principal</label>
                <input type="text" value="<?php echo $productos->foto_producto; ?>" name="foto" id="foto">
                </div><div class="form-group row">
                <label for="prin">Favorito</label>
                <input type="text" value="<?php echo $productos->principal; ?>" name="prin" id="prin" pattern="[0-1]{1}">
                </div>
                <input type="submit" value="Guardar cambios" id="btn">
            </form>
            <!-- formulario de 1 campo invisible y un campo visible para añadir nombre fotos, y una lista para ver los añadidos-->
        </div>

        <br>
        <br>
        <div class="tablafotos">
            <button id="addfoto">añadir nombre foto</button>
            <input type="hidden" class="idProducto" value="<?php echo $productos->idproductos; ?>"/>
            <table >
                <thead>
                    <tr>
                        <th>nombre foto</th>
                    </tr>
                </thead>
                <tbody id="tabla">
                    <?php
                    include_once "conexionBBDD.php";/*inserta el codigo de la conexion*/
                    $sql = $conexion->query("SELECT * FROM imagenes WHERE id_productos = $id;");
                    $fotos = $sql->fetchAll(PDO::FETCH_OBJ);/*ejecuta la busqueda y la guardamos en un array*/
                    foreach ($fotos as $foto) {/*lo recorremos para generar una tabla con los datos*/
                        echo '<tr><td>';
                        echo $foto->nombre  . "</td>";
                    ?>
                        <td><a class="btn btn-warning" href="<?php echo "eliminarfoto.php?id=" . $foto->id_img . "&idpro=" . $foto->id_productos ?>">Eliminar</a></td> <!-- en el td, envía el id del empleado para poder eliminarlo-->
                    <?php
                        echo '</tr>';
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../js/editarProducto.js"></script>

</html>