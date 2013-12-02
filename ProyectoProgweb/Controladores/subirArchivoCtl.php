<?php

	//require_once('\Controladores\administrativoCtl.php');
	require_once("Modelos/administrativoMdl.php");
	require_once("Estandar.php");
	require_once("Mailer.php");

	class subirArchivo extends administrativoMdl{

		private $mdlAdmin;
		private $Estandar;
		private $mailer;
		
		function subirArch(){
		
		$this -> mdlAdmin = new administrativoMdl();
		$this -> Estandar = new CtlEstandar();
		$this -> mailer = new Mailer();
		$i = 0;

			$r = move_uploaded_file($_FILES['lista']['tmp_name'], $_FILES['lista']['name']);
			$archivo = $_FILES['lista']['name'];
			$arreglo = file($archivo);

			foreach ($arreglo as &$renglon) {
				$renglon = explode(',',$renglon);
				$contra = $this -> Estandar -> generaPass();
				$nombre = trim($renglon[0]); $apellidop = trim($renglon[1]); $apellidom = trim($renglon[2]); $carrera = trim($renglon[3]); $correo = trim($renglon[4]); $status = trim($renglon[5]); $celular = trim($renglon[6]); $github = trim($renglon[7]); $webpage = trim($renglon[8]);

				if(empty($celular))
					$celular = NULL;
				if(empty($github))
					$github = NULL;
				if(empty($webpage))
					$webpage = NULL;

				$codigo = $this -> mdlAdmin -> altaAlumno(sha1($contra), $nombre, $apellidop, $apellidom, $carrera, $correo, $status, $celular, $github, $webpage);

				if($codigo!=false){
					$subject = "Alta de alumno";
					$body = "<h1>¡Hola {$nombre}!</h1><p>Bienvenido a <strong>Harvard University</strong>, has sido dado de alta satisfactoriamente con los siguientes datos: <br /> {$nombre} {$apellidop} {$apellidom}<br />{$carrera}<br />{$correo}</p><p>Te recordamos que para ingresar a tu cuenta deberas loggearte con los siguientes datos:<br />Codigo: {$codigo} <br />Contraseña: {$contra}</p>";
					$this -> mailer -> enviarCorreo($subject, $body, $correo);
					header("Location: index.php?ctl=administrativo&act=listaAlumno");
				}
				else
					require_once("Vistas/Error.html");
				}
			}
	}
	$c = new subirArchivo();
	$c -> subirArch();
?>