<?php

class ControllerAdmision{
private $m;
    private $_SESSION;
    private $usuario = "man";

     public function __construct(){
        //session_start();

        $this->m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
            Config::$mvc_bd_clave, Config::$mvc_bd_hostname);  
     }
	
	public function admision(){

        if(isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['nhc'])){
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $nhc = $_POST['nhc'];
            $anotaciones = $_POST['anotaciones'];

            $result = $this->m->insertarPaciente($nombre, $apellidos, $telefono, $direccion, $nhc, $anotaciones);
            echo "<script type=\"text/javascript\">alert(\"Conexion establecida\");</script>";
            header('Location: index.php?ctl=admision');
        }

        $name = $this->usuario;

        require __DIR__ . '/Templates/admision.php';
    }
}
?>