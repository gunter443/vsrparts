<?php //aqui se hace la conexion
$usuario = "root";
$contraseña = "";
$dsn = 'mysql:host=localhost;dbname=vsr_parts';
    try {
	    $conexion = new PDO($dsn, $usuario, $contraseña);
    } catch(Exception $e) {
	    echo "No se ha podido conectar a la base de datos: " . $e->getMessage();
    }
?>