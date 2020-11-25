<?php
include_once "conexionBBDD.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <title>Inicio de sesión</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Open Sans', sans-serif;
            height: 100%;
            flex-direction: column;
        }
        
        form {
            border: 1px solid black;
            padding: 2%;
            display: grid;
            grid-column: auto;
        }
        label {
            font-weight: bolder;
            margin: 2%;
            font-size: 2vmin;
            display: inline-block;
        }
        #txtuser, #txtcontra {
            display: inline-block;
            margin: 2%;
        }
    </style>
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

</html>