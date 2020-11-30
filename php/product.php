<?php
include_once "conexionBBDD.php";
if (!isset($_GET["id"])) {
    exit();
}
$id = $_GET["id"];

$sql = $conexion->prepare("SELECT * FROM productos WHERE idproductos = ?;");
$sql->execute([$id]);
$producto = $sql->fetch(PDO::FETCH_OBJ);
if ($producto === FALSE) {
    echo "<script>aler('error al leer el articulo')</script>";
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
    <link rel="stylesheet" href="../css/productos.css">
    <title>Página Producto</title>
</head>

<body>

    <div id="body" class="contenedorP">
        <div class="cabecera">
            <div class="nombre">
                <a href="./index.php"><img src="../fotos/Vsr parts/iconoPagina.png" alt="Página Principal"></a>
            </div>
            <div class="fila_botones">
                <a href="./principal.html">Página Principal</a>
                <a href="./tProducts.html">Todos los coches</a>
                <a href="./tProductoIndi.html">Accesorios</a>
            </div>
        </div>

        <div class="contenido">
            <?php
            include_once "conexionBBDD.php";/*inserta el codigo de la conexion*/
            $sqlw = $conexion->query("SELECT * FROM imagenes WHERE id_producto = ?;");
            $sqlw->execute([$id]);
            $fotos = $sqlw->fetchAll(PDO::FETCH_OBJ);/*ejecuta la busqueda y la guardamos en un array*/

            ?>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                    $contador = 0;
                    foreach ($fotos as $foto) {/*lo recorremos para generar una tabla con los datos*/
                        if ($contador == 0) {
                            # code...
                            echo "<li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>";
                        } else {
                            echo "<li data-target='#carouselExampleIndicators' data-slide-to='" . $contador . "'></li>";
                        }
                    }
                    ?>
                </ol>
                <div class="carousel-inner">
                    <?php
                    $contador = 0;
                    foreach ($fotos as $foto) {/*lo recorremos para generar una tabla con los datos*/
                        echo "<div class='carousel-item active'>";
                        echo "<img class='d-block w-100' src='' alt='First slide'>";
                        echo "</div>";
                    }
                    ?>


                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4"><?php echo $producto->nombre_producto; ?></h1>
                    <p class="h3"><?php echo $producto->precio_producto; ?></p>
                    <p class="lead"><?php echo $producto->descripcion_producto; ?></p>
                </div>
            </div>
            <form class="form-inline"><!--sin probar ni ver aun formulario envio correo-->
                <div class="form-group mx-sm-3 mb-2">
                    <label for="inputPassword2" class="sr-only">telefono o correo de contacto </label>
                    <input type="password" class="form-control" id="inputPassword2" placeholder="telefono o correo de contacto ">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
            </form>



        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../js/productos.js"></script>

</html>