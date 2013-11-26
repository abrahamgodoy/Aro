<?php

require_once("Estandar.php");

class olvidasteoCtl extends CtlEstandar{
	private $modelo;

	function ejecutar(){
		require_once("Modelos/olvidasteMdl.php");
		$this -> modelo = new olvidasteMdl();

		if(empty($_POST))
			require_once("Vistas/OlvidasteContra.html");
		
		else{
			$correo = $_POST['correo'];
			$r=$this-> modelo -> getUser($correo);
			var_dump($r);

			if($r==false){
				
			}
		}

	}
}

?>