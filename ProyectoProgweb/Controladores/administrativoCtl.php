<?php
class administrativoCtl{
	private $modelo;
	private $mail;

	function enviarCorreo(){
		require_once("Controladores/class.phpmailer.php");
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

	function generaPass(){
		$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		$longitudCadena=strlen($cadena);
		$pass = "";
		$longitudPass=16;

		for($i=1 ; $i<=$longitudPass ; $i++){
			$pos=rand(0,$longitudCadena-1);
			$pass .= substr($cadena,$pos,1);
		}
		return $pass;
	}



	function ejecutar(){
		require_once("Modelos/administrativoMdl.php");
		$this -> modelo = new administrativoMdl();


		switch($_GET['act']){
			


			case "altaCiclo":
				if(empty($_POST)){
					//Cargo la vista del formulario
					require_once("Vistas/AdmiAltaCiclo.html");
				}
				else{
					$ciclo = $_POST["nciclo"];
					$fechai = $_POST["inicio"];
					$fechaf = $_POST["finalizacion"];
					$resultado = $this -> modelo -> altaCiclo($ciclo, $fechai, $fechaf);

					if($resultado!==FALSE){
						header('Location: index.php?ctl=administrativo&act=listaCiclo');
					}
					else
						require_once("Vistas/Error.html");
				}
			break;

			case 'listaCiclo':
				$vista = file_get_contents("Vistas/AdmiListaCiclo.html");

				//Obtengo la fila de la tabla
				$inicio_fila = strrpos($vista,'<tr>');
				$final_fila = strrpos($vista,'</tr>') + 5;

				$fila = substr($vista,$inicio_fila,$final_fila-$inicio_fila);

				//Genero las filas
				$ciclos = $this -> modelo -> listaCiclos();

				$filas='';

				foreach ($ciclos as $row) {
					$new_fila = $fila;
					$diccionario = array('{ciclo}' => $row['ciclo'], '{fechaini}' => $row['fechaIni'],'{fechafin}'=>$row['fechaFin']);
					$new_fila = strtr($new_fila,$diccionario);
					$filas .= $new_fila;
				}
				
				//Reemplazo en mi vista una fila por todas las filas
				$vista = str_replace($fila, $filas, $vista);

				//Mostrar la vista
				echo $vista;
				break;

			case 'eliminarCiclo':
				if(empty($_POST)){
					$vista = file_get_contents("Vistas/AdmiEliminarCiclo.html");

					//Obtengo la fila de la tabla
					$inicio_fila = strrpos($vista,'<tr>');
					$final_fila = strrpos($vista,'</tr>') + 5;

					$fila = substr($vista,$inicio_fila,$final_fila-$inicio_fila);

					//Genero las filas
					$ciclos = $this -> modelo -> listaCiclos();

					$filas='';

					foreach ($ciclos as $row) {
						$new_fila = $fila;
						$diccionario = array('{idCiclo}'=> $row['idCiclo'],'{ciclo}' => $row['ciclo'], '{fechaini}' => $row['fechaIni'],'{fechafin}'=>$row['fechaFin']);
						$new_fila = strtr($new_fila,$diccionario);
						$filas .= $new_fila;
					}
					
					//Reemplazo en mi vista una fila por todas las filas
					$vista = str_replace($fila, $filas, $vista);

					//Mostrar la vista
					echo $vista;
				}

				else{
					$seleccionados = $_POST['seleccion'];
					for($i=0 ; $i < count($seleccionados); $i++){
    					$this -> modelo -> eliminarCiclo($seleccionados[$i]);
					}
					header('Location: index.php?ctl=administrativo&act=listaCiclo');
				}
				break;
			
			case "altaMaestro":
				if(empty($_POST)){
					//Cargo la vista del formulario
					require_once("Vistas/AdmiAltaMaestro.html");
					echo "empty";
				}

				else{
					$codigo = $_POST["codigo"];
					$nombre =  $_POST["nombre"];
					$apellidop = $_POST["apellidop"];
					$apellidom = $_POST["apellidom"];
					$correo = $_POST["correo"];
					
					$resultado = $this -> modelo -> altaMaestro($codigo,$this->generaPass(), $nombre, $apellidop, $apellidom, $correo);

					if($resultado!==FALSE){
						header('Location: index.php?ctl=administrativo&act=listaMaestro');
					}
					else
						require_once("Vistas/Error.html");
				}

				break;

			case 'listaMaestro':
				$vista = file_get_contents("Vistas/AdmiListaMaestro.html");

				//Obtengo la fila de la tabla
				$inicio_fila = strrpos($vista,'<tr>');
				$final_fila = strrpos($vista,'</tr>') + 5;

				$fila = substr($vista,$inicio_fila,$final_fila-$inicio_fila);

				//Genero las filas
				$maestros = $this -> modelo -> listaMaestros();

				$filas='';

				foreach ($maestros as $row) {
					$new_fila = $fila;
					$diccionario = array('{codigo}' => $row['codigo'], '{nombre}' => $row['nombre']." ".$row['apellidoP']." ".$row['apellidoM']);
					$new_fila = strtr($new_fila,$diccionario);
					$filas .= $new_fila;
				}
				
				//Reemplazo en mi vista una fila por todas las filas
				$vista = str_replace($fila, $filas, $vista);

				//Mostrar la vista
				echo $vista;
				break;

			case 'eliminarMaestro':
				if(empty($_POST)){
					//Obtener la vista
					$vista = file_get_contents("Vistas/AdmiEliminarMaestro.html");

					//Obtengo la fila de la tabla
					$inicio_fila = strrpos($vista,'<tr>');
					$final_fila = strrpos($vista,'</tr>') + 5;

					$fila = substr($vista,$inicio_fila,$final_fila-$inicio_fila);

					//Genero las filas
					$maestros = $this -> modelo -> listaMaestros();

					$filas='';

					foreach ($maestros as $row) {
						$new_fila = $fila;
						$diccionario = array('{codigo}' => $row['codigo'], '{nombre}' => $row['nombre']." ".$row['apellidoP']." ".$row['apellidoM']);
						$new_fila = strtr($new_fila,$diccionario);
						$filas .= $new_fila;
					}
					
					//Reemplazo en mi vista una fila por todas las filas
					$vista = str_replace($fila, $filas, $vista);

					//Mostrar la vista
					echo $vista;
				}

				else{
					$seleccionados = $_POST['seleccion'];
					for($i=0; $i < count($seleccionados); $i++){
    					$this -> modelo -> eliminarMaestro($seleccionados[$i]);
					}
					header('Location: index.php?ctl=administrativo&act=listaMaestro');
				}	
			break;


			
			case "altaAlumno":
				if(empty($_POST)){
					//Cargo la vista del formulario
					require_once("Vistas/AdmiAltaAlumno.html");
				}
				else{
					$codigo = $_POST["codigo"];
					$nombre = $_POST["nombre"];
					$apellidop = $_POST["apellidop"];
					$apellidom = $_POST["apellidom"];
					$carrera = $_POST["carrera"];
					$correo = $_POST["correo"];
					$status = $_POST["status"];
					
					$resultado = $this -> modelo -> altaAlumno($codigo, $this->generaPass(), $nombre, $apellidop, $apellidom, $carrera, $correo, $status);
					//$this -> enviarCorreo();
					
					if($resultado!=false)
						header('Location: index.php?ctl=administrativo&act=listaAlumno');
					else
						require_once("Vistas/Error.html");
				}

				break;

			case 'listaAlumno':
				
						$vista = file_get_contents("Vistas/AdmiListaAlumno.html");

						//Obtengo la fila de la tabla
						$inicio_fila = strrpos($vista,'<tr>');
						$final_fila = strrpos($vista,'</tr>') + 5;

						$fila = substr($vista,$inicio_fila,$final_fila-$inicio_fila);

						//Genero las filas
						$alumnos = $this -> modelo -> listaAlumno();

						$filas='';

						foreach ($alumnos as $row) {
							$new_fila = $fila;
							$diccionario = array('{codigo}' => $row['codigo'], '{nombre}' => $row['nombre']." ".$row['apellidoP']." ".$row['apellidoM'],'{carrera}'=>$row['carrera']);
							$new_fila = strtr($new_fila,$diccionario);
							$filas .= $new_fila;
						}
						
						//Reemplazo en mi vista una fila por todas las filas
						$vista = str_replace($fila, $filas, $vista);

						//Mostrar la vista
						echo $vista;
				break;

			case 'eliminarAlumno':
				if(empty($_POST)){
					//Obtener la vista
					$vista = file_get_contents("Vistas/AdmiEliminarAlumno.html");

					//Obtengo la fila de la tabla
					$inicio_fila = strrpos($vista,'<tr>');
					$final_fila = strrpos($vista,'</tr>') + 5;

					$fila = substr($vista,$inicio_fila,$final_fila-$inicio_fila);

					//Genero las filas
					$alumnos = $this -> modelo -> listaAlumno();

					$filas='';

					foreach ($alumnos as $row) {
						$new_fila = $fila;
						$diccionario = array('{codigo}' => $row['codigo'], '{nombre}' => $row['nombre']." ".$row['apellidoP']." ".$row['apellidoM'],'{carrera}'=>$row['carrera']);
						$new_fila = strtr($new_fila,$diccionario);
						$filas .= $new_fila;
					}
					
					//Reemplazo en mi vista una fila por todas las filas
					$vista = str_replace($fila, $filas, $vista);

					//Mostrar la vista
					echo $vista;
				}

				else{
					$seleccionados = $_POST['seleccion'];
					for($i=0; $i < count($seleccionados); $i++){
    					$this -> modelo -> eliminarAlumno($seleccionados[$i]);
					}
					header('Location: index.php?ctl=administrativo&act=listaAlumno');
				}	
			break;
		}
	}
}

?>