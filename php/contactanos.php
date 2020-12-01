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
    <link rel="stylesheet" href="../css/index.css">
    <title>Página Principal</title>
</head>

<body>
    <div id="body" class="contenedorP">
        <div class="cabecera">
            <div class="nombre">
                <a href="./index.php"><img src="../fotos/Vsr parts/iconoPagina.png" alt="Página Principal"></a>
            </div>
            <div class="fila_botones">
                <a href="./principal.html">Página Principal</a>
                <a href="./products.php">Todos los Productos</a>
                <a href="./contactanos.php">Contactanos</a>
            </div>
        </div>
        <div class="contenido">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../fotos/Vsr parts/pomos_a.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                    <h5>Pomos Rally Art</h5>
                    <p>Valido para todos los coches</p>
                </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../fotos/Vsr parts/Vsr parts/palanca_a.jpg" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                    <h5>palanca cambios</h5>
                    <p>Para BMW</p>
                </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../fotos/Vsr parts/junta_cul_a.jpg" alt="Third slide">
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
            <div>
                <!--aqui va la descripcion-->

            </div>
            <div>
                <!--php de crear targetas https://getbootstrap.com/docs/4.0/components/card/-->
            </div>            
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../js/index.js"></script>

</html>