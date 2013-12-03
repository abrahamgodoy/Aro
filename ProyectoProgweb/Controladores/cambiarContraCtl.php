<?php

require_once("Estandar.php");

class cambiarContraCtl extends CtlEstandar{
	function ejecutar(){
	if(!$this->isLogged())
		require_once('Vistas/Error.html');
	else{
		require_once("Modelos/cambiarContraMdl.php");
		$this -> modelo = new cambiarContraMdl();

		if(empty($_POST)){
			$vista=$this->datosUsuarioVista(file_get_contents("Vistas/CambiarContra.html"));
			echo $vista;
		}
		else{
			$vieja=$_POST['contraA'];
			$nueva=$_POST['contraN'];

			$user=$this->getUser();
			if(strcmp($vieja, $user['contrasena'])==0){

				if($this->isAdmi()){
					$r=$this -> modelo -> contraAdmi($user['codigo'],$nueva);
				}

				if($this->isTeacher()){
					$r=$this -> modelo -> contraMaes($user['codigo'],$nueva);
				}
				if($this->isStudent()){
					$r=$this -> modelo -> contraAlum($user['codigo'],$nueva);
				}
				if($r==false)
					require_once('Vistas/Error.html');

				else
					header('Location: index.php');

			}
			else{
				$vista=file_get_contents("Vistas/Error.html");
				echo $vista;
			}
		}

	}

	}
}

?>