<?php
    include_once "conexionBBDD.php";
    $sql = $conexion->query("SELECT * FROM emple;");
    $personas = $sql->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <title>Gestión de Empleados</title>
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
            margin-left: 243px;
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
    <table border="2">
            <thead>
                <tr>
                    <th>idEmpleado</th>
                    <th>dniEmpleado</th>
                    <th>nombreEmpleado</th>
                    <th>apellidosEmpleado</th>
                    <th>telefonoEmpleado</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($personas as $persona) {?>
                <tr>
                    <td><?php echo $persona->idEmple ?></td>
                    <td><?php echo $persona->dniEmple ?></td>
                    <td><?php echo $persona->nomEmple ?></td>
                    <td><?php echo $persona->apellEmple ?></td>
                    <td><?php echo $persona->telEmple ?></td>
                    <td><a href="<?php echo "editar.php?id=" . $persona->idEmple ?>">Editar</a></td>
                    <td><a href="<?php echo "eliminar.php?id=" . $persona->idEmple ?>">Eliminar</a></td>
                </tr>
                <?php } ?>
            </tbody>
    </table>
    <br>
    <br>
    <h1>Introduce un empleado</h1>
    <div>
        <form action="./insertar.php" method="post">
            <label for="dni">D.N.I.<span>*</span></label>
            <input type="text" name="dni" id="dni" placeholder="D.N.I. del Empleado" pattern="[0-9A-Z]{9}" title="Formato de D.N.I. inválido" required>
            <br>
            <label for="nombre">Nombre<span>*</span></label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre del empleado" required>
            <br>
            <label for="apellidos">Apellidos<span>*</span></label>
            <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos del empleado" required>
            <br>
            <label for="telefono">Número de Teléfono</label>
            <input type="text" name="telefono" id="telefono" pattern="[0-9]{9}" title="Utiliza un número de 9 dígitos" placeholder="Teléfono de contacto">
            <br>
            <input type="submit" value="Añadir Empleado" id="btn">
        </form>
    </div>
</body>
</html>