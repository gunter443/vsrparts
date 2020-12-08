<?php
include_once "conexionBBDD.php";
//session_start();
//if (!$_SESSION['sesion']) {
//   header("location:inicio.php");
//}
//$sql = $conexion->query("SELECT * FROM emple;"); /*ejecuta el select para mostrar los datos desde el inicio de la página*/
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
    <link rel="shortcut icon" href="../fotos/vsrLogo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../css/index.css">
    <title>Página Principal</title>
</head>

<body>
    <div id="body" class="contenedorP">
        <div class="cabecera">
            <div class="nombre">
                <a href="./index.php"><img src="../fotos/vsrLogo.jpg" alt="Página Principal"> <h5><strong>VSR Parts</strong></h5></a>
            </div>
            <div class="fila_botones">
                <a href="./principal.html">Página Principal</a>
                <a href="./productos.php">Todos los Productos</a>
                <a href="./contactanos.html">Contactanos</a>
            </div>
        </div>
        <div class="contenido">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block " src="../fotos/Vsr parts/pomos_a.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Pomos Rally Art</h5>
                            <p>Valido para todos los coches</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block " src="../fotos/Vsr parts/palanca_a.jpg" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>palanca cambios</h5>
                            <p>Para BMW</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block " src="../fotos/Vsr parts/junta_cul_a.jpg" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Junta culata</h5>
                            <p>Para BMW 325I</p>
                        </div>
                    </div>
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
            <div style="width: 100%;">
                <!--aqui va la descripcion-->
                <p style="font-size: 2vmin; padding: 15px;">Aqui os presentamos nuestra pagina oficial de productos  de VSR 
                Parts aqui puedes encontrar todos nuestros productos, puedes hacer tu pedido en esta pagina a traves del botón 
                "contacta con nosotros"   y nosotros nos pondremos en contacto con usted lo antes posible y si te interesa 
                cualquiera de nuestros productos, y prefieres otro sistema de compra a la derecha de todas las paginas
                 tendras un acceso a nuestros productos en ebay y wallapop que ya contienen su propio sistema de pago y
                  envios.\n Te damos todas las posibilidades y comodidades para la compra de cualquiera de 
                  nuestros productos.  \n Si quieres mas informacion sobre los productos envios o montaje de los
                   productos, no dudes en contactarnos.</p>
            </div>
            
            <div style="width: 100%;"><h5>Catalogo de Productos Estrella</h5></div>
            <div id="listcadars" class="d-flex flex-wrap">
                
                <?php
                include_once "conexionBBDD.php";/*inserta el codigo de la conexion*/
                $sql = $conexion->query("SELECT * FROM productos WHERE principal = '1';");
                $productFa = $sql->fetchAll(PDO::FETCH_OBJ);/*ejecuta la busqueda y la guardamos en un array*/
                foreach ($productFa as $produc) {/*lo recorremos para generar una tabla con los datos*/
                    echo "<div class='cardtamaño'><a href='product.php?id=" . $produc->idproductos . "'>
                    <div class='card' style='width: 18rem';>" .
                        "   <img class='card-img-top' src='../fotos/Vsr parts/" . $produc->foto_producto . ".jpg' alt='Card image cap'>" .
                        "   <div class='card-body'>";
                    echo "<h5 class='card-title'>" . $produc->nombre_producto . "</h5>";
                    echo "<p class='card-text'> De " . $produc->marca_producto . " Modelos " . $produc->modelo_producto . " </p>";
                    echo "</div>
                    </div></a></div>";
                }

                ?>
                <!--php de crear targetas https://getbootstrap.com/docs/4.0/components/card/-->
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
<script src="../js/index.js"></script>

</html>