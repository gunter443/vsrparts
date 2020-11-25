<?php
require_once "conexionBBDD.php";
$conex = new Conet();
$conexion=$conex->conectarse();
session_start();
if (!$_SESSION['sesion']) {
    header("location:inicio.php");
} else {
    if (!isset($_GET["id"])) {
        exit();
    }
    $id = $_GET["id"];

    $sql = $conexion->prepare("SELECT * FROM emple WHERE idEmple = ?;");
    $sql->execute([$id]);
    $persona = $sql->fetch(PDO::FETCH_OBJ);
    if ($persona === FALSE) {
        echo "No existe ningun empleado con ese ID";
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <title>Editar Datos</title>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }

        h1 {
            margin: auto;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            margin: auto;
        }

        th {
            text-align: center;
            padding: 1%;
            width: 160px;
        }

        td {
            text-align: center;
        }

        div {
            width: 600px;
            margin: auto;

        }

        form {
            width: 400px;
            margin: auto;
            border: 1px solid black;
        }

        label {
            font-weight: bolder;
            width: 160px;
            margin: 2%;
            display: inline-block;
        }

        #dni,
        #nombre,
        #apellidos,
        #telefono {
            display: inline-block;
            margin: 2%;
        }

        #btn {
            margin-left: 220px;
            margin-top: 2%;
            margin-bottom: 2%;
        }

        span {
            color: red;
            font-weight: bolder;
        }
    </style>
</head>

<body>
    <h1>Editar Empleado</h1>
    <div>
        <form action="./guardarDatos.php" method="post">
            <input type="hidden" value="<?php echo $persona->idEmple; ?>" name="id">
            <label for="dni">D.N.I.<span>*</span></label>
            <input type="text" value="<?php echo $persona->dniEmple; ?>" name="dni" id="dni" placeholder="D.N.I. del Empleado" pattern="[0-9A-Z]{9}" title="Formato de D.N.I. inválido" required>
            <br>
            <label for="nombre">Nombre<span>*</span></label>
            <input type="text" value="<?php echo $persona->nomEmple; ?>" name="nombre" id="nombre" placeholder="Nombre del empleado" required>
            <br>
            <label for="apellidos">Apellidos<span>*</span></label>
            <input type="text" value="<?php echo $persona->apellEmple; ?>" name="apellidos" id="apellidos" placeholder="Apellidos del empleado" required>
            <br>
            <label for="telefono">Número de Teléfono</label>
            <input type="text" value="<?php echo $persona->telEmple; ?>" name="telefono" id="telefono" pattern="[0-9]{9}" title="Utiliza un número de 9 dígitos" placeholder="Teléfono de contacto">
            <br>
            <input type="submit" value="Guardar Cambios" id="btn">
        </form>
    </div>
    <br>
    <br>

</body>

</html>