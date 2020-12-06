<?php
include_once "conexionBBDD.php";
session_start();
if (!$_SESSION['sesion']) {
    header("location:inicio.php");
}
//$sql = $conexion->query("SELECT * FROM productos;"); /*ejecuta el select para mostrar los datos desde el inicio de la página*/
//$personas = $sql->fetchAll(PDO::FETCH_OBJ);
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
    <link rel="stylesheet" href="../css/listaAdmin.css">
    <title>lista Productos adiministrador </title>
</head>

<body>
    <div id="body" class="contenedorP">
        <div class="cabecera">
            <div class="nombre">
                <a href="./index.php"><img src="../fotos/Vsr parts/iconoPagina.png" alt="Página Principal"></a>                
                <button id="cerrarses" class="mini">Cerrar sesion</button>
            </div>
        </div>
        <div class="contenido">
            <h1>Introduce un empleado</h1>
            <div class="formularioadd">
                <form action="./insertar.php" method="post">
                <div class="form-group row">
                    <label for="nomPro">Nombre Producto<span>*</span></label>
                    <input class="form-control" type="text" name="nomPro" id="nomPro" placeholder="nombre producto" title="Nombre Producto" required>
                </div>
                <div class="form-group row">
                    <label for="precio">Precio<span>*</span></label>
                    <input class="form-control" type="number" name="precio" id="precio" placeholder="Precio" required>
                </div>
                <div class="form-group row">
                    <label for="des">Descricion<span>*</span></label>
                    <textarea class="form-control" type="text" name="des" id="des" rows="4" placeholder="Descricion" required></textarea>
                </div>
                <div class="form-group row">
                    <label for="marcPro">Marca</label>
                    <input class="form-control" type="text" name="marcPro" id="marcPro"  placeholder="Valido para Marca">
                </div>
                <div class="form-group row">
                    <label for="modPro">Modelos</label>
                    <input class="form-control" type="text" name="modPro" id="modPro"  placeholder="Valido para Modelos">
                </div>
                <div class="form-group row">
                    <label for="foto">Foto Principal</label>
                    <input class="form-control" type="text" name="foto" id="foto"  placeholder="Nombre foto principal">
                </div>
                <div class="form-group row">
                    <label for="prin">Favorito</label>
                    <input class="form-control" type="text" name="prin" id="prin" pattern="[0-1]{1}"  placeholder="Favorito">
                </div>
                    <input type="submit" value="Añadir Producto" id="btn">
                </form>
            </div>
            <br>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>idproductos</th>
                        <th>nombre_producto</th>
                        <th>precio_producto</th>
                        <th>descripcion_producto</th>
                        <th>marca_producto</th>
                        <th>modelo_producto</th>
                        <th>foto_producto</th>
                        <th>principal</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once "conexionBBDD.php";/*inserta el codigo de la conexion*/
                    $sql = $conexion->query("SELECT * FROM productos;");
                    $productos = $sql->fetchAll(PDO::FETCH_OBJ);/*ejecuta la busqueda y la guardamos en un array*/
                    foreach ($productos as $producto) {/*lo recorremos para generar una tabla con los datos*/
                        echo '<tr><td>';
                        echo $producto->idproductos  . "</td><td>";
                        echo $producto->nombre_producto . "</td><td>";
                        echo $producto->precio_producto . "</td><td>";
                        echo $producto->descripcion_producto . "</td><td>";
                        echo $producto->marca_producto . "</td><td>";
                        echo $producto->modelo_producto . "</td><td>";
                        echo $producto->foto_producto . "</td><td>";
                        echo $producto->principal . "</td>";
                    ?>
                        <td><a href="<?php echo "editar.php?id=" . $producto->idproductos ?>">Editar</a></td> <!-- en el td, envía el id del empleado para poder editarlo-->
                        <td><a href="<?php echo "eliminar.php?id=" . $producto->idproductos ?>">Eliminar</a></td> <!-- en el td, envía el id del empleado para poder eliminarlo-->
                    <?php
                        echo '</tr>';
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="pie">
        <p>VSR PARTS shop oficial</p>
        <p>2020 &copy</p>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../js/listaAdmin.js"></script>

</html>