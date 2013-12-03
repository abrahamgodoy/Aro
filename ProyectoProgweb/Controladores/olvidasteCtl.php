<?php

require_once("Estandar.php");

class olvidasteoCtl extends CtlEstandar{
	private $modelo;

	function ejecutar(){
		require_once("Modelos/olvidasteMdl.php");
		$this -> modelo = new olvidasteMdl();

		require_once("Mailer.php");
		$this-> mailer = new Mailer();

		if(empty($_POST))
			require_once("Vistas/OlvidasteContra.html");
		
		else{
			$correo = $_POST['correo'];
			$r=$this-> modelo -> getUser($correo);

			if($r!=false){
				$pass=$this->generaPass();
				if(strcmp("admi", $r['is'])==0){
					$r=$this-> modelo -> contraAdmi($r['codigo'],sha1($pass));
				}
				if(strcmp("maes", $r['is'])==0){
					$this-> modelo -> contraMaes($r['codigo'],sha1($pass));
					
				}
				if(strcmp("alum", $r['is'])==0){
					$this-> modelo -> contraAlum($r['codigo'],sha1($pass));	
				}

				$subject = "Recuperar Contraseña";
				$body = "<h1>¡Hola {$r['nombre']}!</h1><p>Saludos te da <strong>Harvard University</strong>, has cambiado tu contraseña satisfactoriamente. Tu nueva contraseña es la siguiente <br /></p <p><br />Contraseña: {$pass}<br/>Codigo: {$r['codigo']}</p><p><br/>Te recordamos por seguridad cambiar tu contraseña cuando te encuentres loggeado en el sistema.</p>";
				$this->mailer->enviarCorreo($subject, $body, $correo);
			}

			header('Location: index.php');
		}

	}
}

?>