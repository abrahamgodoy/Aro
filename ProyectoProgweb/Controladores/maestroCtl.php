<?php
class maestroCtl{
	private $modelo;
	private $mail;

	function enviarCorreo(){
		require_once("/Controladores/class.phpmailer.php");
		$mail = new phpmailer();	
		$mail->Mailer = "smtp";
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;
		$mail->Port = 587;		
		$mail->CharSet= "UTF-8";
		$mail->SMTPSecure = "tls";
		$mail->Username = "rober.msz@gmail.com";
		$mail->Password = "3661981285740.ro27";
		$mail->SMTPDebug = 2;
		$mail->Debugoutput = "html";

		$mail->From = "rober.msz@gmail.com";
		$mail->FromName = "Roberto Mendoza Sanchez";
		$mail->AddAddress("rober.msz@gmail.com","RMS");
		$mail->Subject = "Ejemplo de PHPMailer";
		$mail->Body = "<p>Esto es un <strong>ejemplo</strong> de correo.</p>";
		$mail->AltBody = "Esto es un ejemplo de correo.";
		$mail->IsHTML = (true);

		if($mail->Send())
		{
	   		echo "Mensaje enviado correctamente.";
		}
		else
		{
			echo "Ocurrió un error al enviar el correo electrónico.";
			echo "<br/><strong>Información:</strong><br/>".$mail->ErrorInfo;
		}
	}

	function ejecutar(){
		require_once("/Modelos/maestroMdl.php");
		$this -> modelo = new maestroMdl();
		switch($_GET['act']){
			case "altaCurso":
				if(empty($_POST)){
					//Cargo la vista del formulario
					require_once("/Vistas/MaesAltaCursos.html");
				}
				else{
					$nombre = $_POST["nombre"];
					$seccion = $_POST["seccion"];
					$nrc = $_POST["nrc"];
					$ciclo = $_POST["ciclo"];
					$resultado = $this -> modelo -> altaCurso($nombre, $seccion, $nrc, $ciclo);
				}
			break;
			case "altaAlumno":
				if(empty($_POST)){
					//Cargo la vista del formulario
					require_once("./Vistas/MaesAltaAlumno.html");
					echo "empty";
				}
				else{
					$codigo = $_POST["codigo"];
					$nombre = $_POST["nombre"];
					$apellidop = $_POST["apellidop"];
					$apellidom = $_POST["apellidom"];
					$carrera = $_POST["carrera"];
					$correo = $_POST["correo"];
					$status = $_POST["status"];
					$resultado = $this -> modelo -> altaAlumno($codigo, $nombre, $apellidop, $apellidom, $carrera, $correo, $status);
					//$this -> enviarCorreo();
				}
		}
	}
}

?>