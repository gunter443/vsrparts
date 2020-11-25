
<form action="busqueda.php">
    <input type="radio" name="busrad" value="id" > id
    <input type="radio" name="busrad" value="dni" > dni
    <input type="text" name="camp">
    <input type="submit" name="sum" value="buscar" >
</form>
<br>
<br>
       
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
                require_once "conexionBBDD.php";
                $conex = new Conet();
                $conexion=$conex->conectarse();
                $sql = $conexion->query("SELECT * FROM emple;");
                $personas = $sql->fetchAll(PDO::FETCH_OBJ);
                foreach($personas as $persona) {
                    echo '<tr><td>';
                    echo $persona->idEmple . "</td><td>";
                    echo $persona->dniEmple . "</td><td>";
                    echo $persona->nomEmple . "</td><td>";
                    echo $persona->apellEmple . "</td><td>";
                    echo $persona->telEmple . "</td>";
                    ?>
                    <td><a href="<?php echo "editar.php?id=" . $persona->idEmple; setcookie("ID", $persona->idEmple, time() + (86400))?>">Editar</a></td><!-- 86400 es 1 dia-->
                    <td><a href="<?php echo "eliminar.php?id=" . $persona->idEmple; setcookie("ID", $persona->idEmple, time() + (86400)) ?>">Eliminar</a></td>
                    <?php
                    echo '</tr>';
                }
                
            ?>
            </tbody>
    </table>