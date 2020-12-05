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
    <link rel="shortcut icon" href="../fotos/icono.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/productos.css">
    <title>Página Productos</title>
</head>

<body>
    <div id="body" class="contenedorP">
        <div class="cabecera">
            <div class="nombre">
                <a href="./index.php"><img src="../fotos/Vsr parts/iconoPagina.png" alt="Página Principal"></a>
                <input id="search" type="text" placeholder="Search..">
            </div>
            <div class="fila_botones">
                <a href="./index.php">Página Principal</a>
                <a href="./productos.php">Todos los Productos</a>
                <a href="./contactanos.html">Contactanos</a>
            </div>
        </div>
        <div class="contenido">
        <div id="listcadars" class="d-flex flex-wrap">
        <!-- filstro buscador por jquery  https://www.w3schools.com/jquery/jquery_filters.asp -->
                <?php
                include_once "conexionBBDD.php";/*inserta el codigo de la conexion*/
                $sql = $conexion->query("SELECT * FROM productos;");
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
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../js/productos.js"></script>

</html>