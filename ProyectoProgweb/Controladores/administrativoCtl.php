<?php
class administrativoCtl{
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
		require_once("/Modelos/administrativoMdl.php");
		$this -> modelo = new administrativoMdl();
		switch($_GET['act']){
			case "altaCiclo":
				if(empty($_POST)){
					//Cargo la vista del formulario
					require_once("/Vistas/AdmiAltaCiclo.html");
					echo "empty";
				}
				else{
					$ciclo = $_POST["nciclo"];
					$fechai = $_POST["inicio"];
					$fechaf = $_POST["finalizacion"];
					$resultado = $this -> modelo -> altaCiclo($ciclo, $fechai, $fechaf);
				}
			break;
			case "altaMaestro":
				if(empty($_POST)){
					//Cargo la vista del formulario
					require_once("/Vistas/AdmiAltaMaestro.html");
					echo "empty";
				}
				else{
					$codigo = $_POST["codigo"];
					$nombre =  $_POST["nombre"];
					$apellidop = $_POST["apellidop"];
					$apellidom = $_POST["apellidom"];
					$correo = $_POST["correo"];
					$resultado = $this -> modelo -> altaMaestro($codigo, $nombre, $apellidop, $apellidom, $correo);
				}
			break;
			case "altaAlumno":
				if(empty($_POST)){
					//Cargo la vista del formulario
					require_once("./Vistas/AdmiAltaAlumno.html");
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


					if($resultado!==FALSE){
						//Procesar la vista

						//Obtener la vista
						$vista = file_get_contents("Vistas/AdmiListaAlumno.html");

						//Obtengo la fila de la tabla
						$inicio_fila = strrpos($vista,'<tr>');
						$final_fila = strrpos($vista,'</tr>') + 5;

						$fila = substr($vista,$inicio_fila,$final_fila-$inicio_fila);

						//Genero las filas
						$alumnos = $this -> modelo -> lista();

						$filas='';

						foreach ($alumnos as $row) {
							$new_fila = $fila;
							//$new_fila = str_replace('{codigo}', $row['codigo'], $new_fila);
							//$new_fila = str_replace('{nombre}', $row['nombre'], $new_fila);
							//$new_fila = str_replace('{carrera}', $row['carrera'], $new_fila);
							//Reemplazo con un diccionario
							$diccionario = array('{codigo}' => $row['codigo'], '{nombre}' => $row['nombre'],'{carrera}'=>$row['carrera']);
							$new_fila = strtr($new_fila,$diccionario);
							$filas .= $new_fila;
						}
						
						//Reemplazo en mi vista una fila por todas las filas
						$vista = str_replace($fila, $filas, $vista);

						//Mostrar la vista
						echo $vista;
					}
					else
						require_once("Vista/Error.html");


				}

		}
	}
}

?>