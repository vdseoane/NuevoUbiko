<?php

class Model
{
 
	protected $conexion;

	public function __construct($dbname,$dbuser,$dbpass,$dbhost){
	    $mvc_bd_conexion = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

	    if ($mvc_bd_conexion->connect_errno) {
		    echo "Fallo al conectar a MySQL: (" . $mvc_bd_conexion->connect_errno . ") " . $mvc_bd_conexion->connect_error;
		}
	    mysqli_select_db($mvc_bd_conexion, $dbname);

	    mysqli_set_charset($mvc_bd_conexion, 'utf8');

	    $this->conexion = $mvc_bd_conexion;
   }

   public function logIn($usuario, $contrasenha){
   		$log = false;

   		$sql = "SELECT idUsuario, Password FROM usuario WHERE idUsuario = '".$usuario."'
			AND Password = '". $contrasenha."'";
		$resultado = $conexion->query($sql);

		if ($resultado->num_rows > 0) {
			echo "logeado";
			header('Location: /../Templates/admision.php');
		} else { 
		    echo "no logeado";
		}

   }

   public function logOut(){

   		session_destroy(); 
    	header('location: /../Templates/logIn.php'); 
   }
}
?>