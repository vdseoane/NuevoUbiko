<?php

class Controller
{

	public function logIn(){
		$log =false;

	    $model= new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
	                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $log = $model->logIn($_POST['usuario'], $_POST['password']);
        }
        //echo "siiii";
        return $log;

	    require __DIR__ . '/templates/logIn.php';
	}

	public function logOut(){

		$model = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
	                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $logOut = $model->logOut();
        }
	}
}
?>