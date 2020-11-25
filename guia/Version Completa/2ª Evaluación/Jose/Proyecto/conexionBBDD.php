<?php
    class Conet {
        public $usuario = "pepe";
        public $contraseña = "abc123..";
        public $dsn = 'mysql:host=localhost;dbname=empleados';
        
        public function conectarse(){
            try {
                $conexion = new PDO($this->dsn, $this->usuario, $this->contraseña);
                return $conexion;
            } catch(Exception $e) {
                echo "No se ha podido conectar a la base de datos: " . $e->getMessage();
                return $conexion=null;
            }
            
        }
          
    }
?>