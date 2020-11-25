<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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

        }</style>
</head>
<body>
    <p><a href="index.php"> atras </a></p>
       
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
            <?php
                include_once "conexionBBDD.php";
                $sql = $conexion->query("SELECT * FROM emple ;");
                $var = $_GET["camp"];
                if ($_GET["busrad"] == "id")
                    $sql = $conexion->query("SELECT * FROM emple WHERE idEmple = $var;");
                else
                    $sql = $conexion->query("SELECT * FROM emple WHERE dniEmple = $var;");
                
                $personas = $sql->fetchAll(PDO::FETCH_OBJ);
                foreach($personas as $persona) {
                    echo '<tr><td>';
                    echo $persona->idEmple . "</td><td>";
                    echo $persona->dniEmple . "</td><td>";
                    echo $persona->nomEmple . "</td><td>";
                    echo $persona->apellEmple . "</td><td>";
                    echo $persona->telEmple . "</td>";
                    ?>
                    <td><a href="<?php echo "editar.php?id=" . $persona->idEmple ?>">Editar</a></td>
                    <td><a href="<?php echo "eliminar.php?id=" . $persona->idEmple ?>">Eliminar</a></td>
                    <?php
                    echo '</tr>';
                }
                
            ?>
            </tbody>
    </table>
    
</body>
</html>