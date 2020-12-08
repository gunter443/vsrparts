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
    <link rel="shortcut icon" href="../fotos/vsrLogo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../css/index.css">
    <title>Página Producto</title>
</head>

<body>

    <div id="body" class="contenedorP">
        <div class="cabecera">
            <div class="nombre">
                <a href="./index.php"><img src="../fotos/vsrLogo.jpg" alt="Página Principal">
                    <h5><strong>VSR Parts</strong></h5>
                </a>
            </div>
            <div class="fila_botones">
                <a href="./index.php">Página Principal</a>
                <a href="./productos.php">Todos los Productos</a>
                <a href="./contactanos.html">Contactanos</a>
            </div>
        </div>

        <div class="contenido">
            <?php
            include_once "conexionBBDD.php";/*inserta el codigo de la conexion*/
            if ($sqlw = $conexion->query("SELECT * FROM imagenes WHERE id_productos = $id;")) { //esto devuelce false y entonces todo da error, meter todo en un if esto dentro el resto else echo fallo en las fotos
                //$sql->execute([$id]); https://es.stackoverflow.com/questions/263721/fatal-error-call-to-a-member-function-fetch-all-on-boolean-in  mirar explicacion
                $fotos = $sqlw->fetchAll(PDO::FETCH_OBJ);/*ejecuta la busqueda y la guardamos en un array*/

            ?>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php
                        $contador = 0;
                        foreach ($fotos as $foto) {/*lo recorremos para generar una tabla con los datos*/
                            if ($contador == 0) {
                                echo "<li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>";
                            } else {
                                echo "<li data-target='#carouselExampleIndicators' data-slide-to='" . $contador . "'></li>";
                            }
                            $contador++;
                        }
                        ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                        $contador = 0;
                        foreach ($fotos as $foto) {/*lo recorremos para generar una tabla con los datos*/
                            if ($contador == 0) {
                                echo "<div class='carousel-item active'>";
                                echo "<img class='d-block' src='../fotos/Vsr parts/" . $foto->nombre . ".jpg' alt='First slide'>";
                                echo "</div>";
                            } else {
                                echo "<div class='carousel-item'>";
                                echo "<img class='d-block' src='../fotos/Vsr parts/" . $foto->nombre . ".jpg' alt='First slide'>";
                                echo "</div>";
                            }
                            $contador++;
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
            <?php
            } else {
                echo "error con las fotos";
            }
            ?>
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4"><?php echo $producto->nombre_producto; ?></h1>
                    <p class="h3 izquierda"><?php echo $producto->precio_producto; ?> &#8364</p>
                    <p class="lead"><?php echo $producto->descripcion_producto; ?></p>
                    <div class="espProduc">
                        <p class="btn btn-info"><?php echo $producto->marca_producto; ?></p>
                        <p class="btn btn-info"><?php echo $producto->modelo_producto; ?></p>
                    </div>
                </div>
            </div>
            <form class="form-inline" action='mailSimple.php' method="post" id='mailForm'>
                <!--sin probar ni ver aun formulario envio correo-->
                <div class="form-group mx-sm-3 mb-2">
                    <label for="email" class="sr-only">telefono o correo de contacto </label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="telefono o correo de contacto ">
                    <input type="hidden" value="<?php echo $producto->nombre_producto; ?>" id="productonombre" name="productonombre">
                    <input type="hidden" value="<?php echo $id; ?>" id="idpro" name="idpro">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Contacta con nosotros</button>
            </form>
            <div style="width: 100%; border: 1px solid black; margin: 5px; max-height: 600px; overflow-x: auto; box-sizing: border-box;">
                <div style="width: 100%;">
                    <form class="form-inline" action='guardComentario.php' method="post" id='mailForm'>
                        <label for="comen">telefono o correo de contacto </label>
                        <input type="hidden" value="<?php echo $id; ?>" id="idpro" name="idpro">
                        <input type="text" class="form-control" id="comen" name="comen" placeholder="Comenta sobre el producto">
                        <button type="submit" class="btn btn-primary mb-2">comenta</button>
                    </form>
                </div>
                <div style="width: 100%; ">
                    <?php
                    if ($sqlc = $conexion->query("SELECT * FROM comentarios WHERE id_productos = $id;")) {
                        $coments = $sqlc->fetchAll(PDO::FETCH_OBJ);
                        foreach ($coments as $foto) {
                            echo "<div style='width: 100%; margin: 10px; padding: 10px; border: 1px solid blue; border-radius: 10%;'>";
                            echo $foto->comentario;
                            echo "</div>";
                        }
                    } else {
                        echo "<p>no hay ningun comentario</p>";
                    }

                    ?>
                </div>
            </div>



        </div>
        <div class="pie">
            <p>VSR PARTS shop oficial</p>
            <p>2020 &copy</p>
        </div>
    </div>
    <span class="publicidad">
        <a href="https://www.ebay.es/usr/vsrparts"><img src="../fotos/ebay.png" alt="wallapop"></a>
        <a href="https://es.wallapop.com/user/vsrp-333289123"><img src="../fotos/wallapop.png" alt="wallapop"></a>
        <a href="https://instagram.com/vsr.parts?igshid=2qkxarawqez3"><img src="../fotos/insta.svg" alt=""></a>
    </span>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../js/product.js"></script>

</html>