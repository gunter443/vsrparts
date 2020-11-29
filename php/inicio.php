<?php
require_once "conexionBBDD.php";
$conex = new Conet();
$conexion=$conex->conectarse();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../fotos/icono.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/inicio.css">
    <title>Inicio de sesión</title>
</head>

<body>
    <h1>Inicia Sesión</h1>
    <form action="loginUsers.php" method="post">
        <label for="usuario">Nombre de usuario</label>
        <input type="text" name="usuario" id="txtuser" placeholder="Nombre de usuario" autofocus required>
        <label for="contra">Contraseña</label>
        <input type="password" name="contra" id="txtcontra" placeholder="Contraseña del usuario" required>
        <br>
        <input type="submit" value="Iniciar Sesión" id="btnSesion" name="btnsession">
    </form>
</body>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="../js/inicio.js"></script>
</html>