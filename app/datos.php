<?php

class datos{
	
	public $nombrePaciente ='pilila';
	public $nhcPaciente ='555';
	public $nombreUsuario = ' f';

	 public function __construct(){
        
     }

	public function setNombrePaciente($nombrePaciente){
		$this->nombrePaciente = $nombrePaciente;
	}

	public function setNhcPaciente($nhcPaciente){
		$this->nhcPaciente = $nhcPaciente;
	}

	public function setNombreUsuario($nombreUsuario){
		$this->nombreUsuario = $nombreUsuario;
	}

	public function getNombrePaciente(){
		return $this->nombrePaciente;
	}

	public function getNhcPaciente(){
		return $this->nhcPaciente;
	}

	public function getNombreUsuario(){
		return $this->nombreUsuario;
	}


}

	
?>