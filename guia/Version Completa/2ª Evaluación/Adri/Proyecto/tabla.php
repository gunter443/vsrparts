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
                include_once "conexionBBDD.php";/*inserta el codigo de la conexion*/
                $sql = $conexion->query("SELECT * FROM emple;");
                $personas = $sql->fetchAll(PDO::FETCH_OBJ);/*ejecuta la busqueda y la guardamos en un array*/ 
                foreach($personas as $persona) {/*lo recorremos para generar una tabla con los datos*/
                    echo '<tr><td>';
                    echo $persona->idEmple . "</td><td>";
                    echo $persona->dniEmple . "</td><td>";
                    echo $persona->nomEmple . "</td><td>";
                    echo $persona->apellEmple . "</td><td>";
                    echo $persona->telEmple . "</td>";
                    ?>
                    <td><a href="<?php echo "editar.php?id=" . $persona->idEmple ?>">Editar</a></td> <!-- en el td, envía el id del empleado para poder editarlo-->
                    <td><a href="<?php echo "eliminar.php?id=" . $persona->idEmple ?>">Eliminar</a></td> <!-- en el td, envía el id del empleado para poder eliminarlo-->
                    <?php 
                    echo '</tr>';
                }
                
            ?>
            </tbody>
    </table>