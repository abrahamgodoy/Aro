<?php
require_once("Estandar.php");

class maestroCtl extends CtlEstandar{
	private $modelo;
	private $mail;

	function ejecutar(){
	if($this->isLogged()==false)
			header('Location: index.php?ctl=login');

	else if($this->isTeacher()==false)
		require_once("Vistas/Error.html");
	else{

		require_once("Modelos/maestroMdl.php");
		$this -> modelo = new maestroMdl();
		switch($_GET['act']){
			case "altaCurso":
				if(empty($_POST)){
					$vista = file_get_contents("Vistas/MaesAltaCursos.html");

					//manipular ciclos
					$inicio_fila = stripos($vista,'<option value="{idCiclo}">');
					$final_fila = strrpos($vista,'{ciclo}</option>') + 16;
					$fila = substr($vista,$inicio_fila,$final_fila-$inicio_fila);
					$ciclos = $this -> modelo -> listaCiclos();
					$filas='';
					foreach ($ciclos as $row) {
						$new_fila = $fila;
						$diccionario = array('{ciclo}' => $row['ciclo'], '{idCiclo}' => $row['idCiclo']);
						$new_fila = strtr($new_fila,$diccionario);
						$filas .= $new_fila;
					}
					$vista = str_replace($fila, $filas, $vista);

					//manipular academias
					$inicio_fila = stripos($vista,'<option value="{idAcademia}">');
					$final_fila = strrpos($vista,'{nombre}</option>') + 17;
					$fila = substr($vista,$inicio_fila,$final_fila-$inicio_fila);
					$academia = $this -> modelo -> listaAcademia();
					$filas='';
					foreach ($academia as $row) {
						$new_fila = $fila;
						$diccionario = array('{idAcademia}' => $row['idAcademia'], '{nombre}' => $row['nombre']);
						$new_fila = strtr($new_fila,$diccionario);
						$filas .= $new_fila;
					}
					$vista = str_replace($fila, $filas, $vista);

					//Mostrar la vista
					echo $this->datosUsuarioVista($vista);
				}
				else{
					$ciclo = 45682;//$_POST["ciclo"];
					$academia = $_POST["academia"];
					$materia = 5;//$_POST["materia"];
					$seccion = $_POST["seccion"];
					$nrc = $_POST["nrc"];
					$hora1 = $_POST["hora1"];
					$hora2 = $_POST["hora2"];
					$dias = $_POST["dias"];
					$criterio = $_POST["criterio"];
					$pts = $_POST["pts"];

					$r = $this -> modelo -> altaCurso($ciclo, $materia, $seccion, $nrc,200000004);

					if($r == true){
						$idCurso = $this ->modelo -> getIdCurso();

						for($i=0; $i < count($hora1); $i++){
	    					$this -> modelo -> horarioCurso($idCurso, $hora1[$i], $hora2[$i], $dias[$i]);
						}

						for ($i=0; $i < count($criterio); $i++) {
							$this -> modelo -> criterioCurso($idCurso, $criterio[$i], $pts[$i]);
						}
						header('Location: index.php?ctl=maestro&act=listaCurso');
					}
					else
						require_once("Vistas/Error.html");
				}
			break;

			case 'listaCurso':
				$vista = file_get_contents("Vistas/MaesListaCurso.html");

				//Obtengo la fila de la tabla
				$inicio_fila = strrpos($vista,'<tr>');
				$final_fila = strrpos($vista,'</tr>') + 5;

				$fila = substr($vista,$inicio_fila,$final_fila-$inicio_fila);

				//Genero las filas
				$ciclos = $this -> modelo -> listaCurso();

				$filas='';

				foreach ($ciclos as $row) {
					$new_fila = $fila;
					$diccionario = array('{idCurso}' => $row['idCurso'], '{curso}' => $row['nombre'],'{seccion}'=>$row['seccion'], '{nrc}' => $row['NRC']);
					$new_fila = strtr($new_fila,$diccionario);
					$filas .= $new_fila;
				}
				
				//Reemplazo en mi vista una fila por todas las filas
				$vista = str_replace($fila, $filas, $vista);

				//Mostrar la vista
				echo $this->datosUsuarioVista($vista);
				
				break;

			case 'eliminarCurso':
				if(empty($_POST)){
					$vista = file_get_contents("Vistas/MaesEliminarCurso.html");

					//Obtengo la fila de la tabla
					$inicio_fila = strrpos($vista,'<tr>');
					$final_fila = strrpos($vista,'</tr>') + 5;

					$fila = substr($vista,$inicio_fila,$final_fila-$inicio_fila);

					//Genero las filas
					$ciclos = $this -> modelo -> listaCurso();

					$filas='';

					foreach ($ciclos as $row) {
						$new_fila = $fila;
						$diccionario = array('{idCurso}' => $row['idCurso'], '{curso}' => $row['nombre'],'{seccion}'=>$row['seccion'], '{nrc}' => $row['NRC']);
						$new_fila = strtr($new_fila,$diccionario);
						$filas .= $new_fila;
					}
					
					//Reemplazo en mi vista una fila por todas las filas
					$vista = str_replace($fila, $filas, $vista);

					//Mostrar la vista
					echo $this->datosUsuarioVista($vista);
				}

				else{
					$seleccionados = $_POST['seleccion'];
					for($i=0; $i < count($seleccionados); $i++){
    					$this -> modelo -> eliminarCurso($seleccionados[$i]);
					}
					header('Location: index.php?ctl=maestro&act=listaCurso');
				}	
				break;
			

			case "altaAlumno":
				if(empty($_POST)){
					$vista=$this->datosUsuarioVista(file_get_contents("Vistas/AdmiAltaAlumno.html"));
					echo $vista;
				}
				else{
					$nombre = $_POST["nombre"];
					$apellidop = $_POST["apellidop"];
					$apellidom = $_POST["apellidom"];
					$carrera = $_POST["carrera"];
					$correo = $_POST["correo"];
					$status = $_POST["status"];
					$celular = $_POST["celular"];
					$github = $_POST["github"];
					$webpage = $_POST["webpage"];
					$contra = $this->generaPass();

					if(!isset($_POST["tiene_celular"]))
						$celular=null;
					if(!isset($_POST["tiene_github"]))
						$github=null;
					if(!isset($_POST["tiene_pagina"]))
						$pagina=null;

					$codigo = $this -> modelo -> altaAlumno(sha1($contra), $nombre, $apellidop, $apellidom, $carrera, $correo, $status, $celular, $github, $webpage);

					if($codigo!=false){
						$subject = "Alta de alumno";
						$body = "<h1>¡Hola {$nombre}!</h1><p>Bienvenido a <strong>Harvard University</strong>, has sido dado de alta satisfactoriamente con los siguientes datos: <br /> {$nombre} {$apellidop} {$apellidom}<br />{$carrera}<br />{$correo}</p><p>Te recordamos que para ingresar a tu cuenta deberas loggearte con los siguientes datos:<br />Codigo: {$codigo} <br />Contraseña: {$contra}</p>";
						$this->mailer->enviarCorreo($subject, $body, $correo);
						
					
						header('Location: index.php?ctl=maestro&act=listaAlumno');
					}
					else
						require_once("Vistas/Error.html");
				}
				break;

			case 'listaAlumno':
				
					$vista = file_get_contents("Vistas/MaesListaAlumno.html");

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
					echo $this->datosUsuarioVista($vista);
				break;

			case 'eliminarAlumno':
				if(empty($_POST)){
					//Obtener la vista
					$vista = file_get_contents("Vistas/MaesEliminarAlumno.html");

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
					echo $this->datosUsuarioVista($vista);
				}

				else{
					$seleccionados = $_POST['seleccion'];
					for($i=0; $i < count($seleccionados); $i++){
    					$this -> modelo -> eliminarAlumno($seleccionados[$i]);
					}
					header('Location: index.php?ctl=maestro&act=listaAlumno');
				}	
			break;

			case 'matricular':
				$vista = file_get_contents('Vistas/MaesAltaAlumnosaCursos.html');
				$inicio_fila = strrpos($vista,'<option id="A">');
				$final_fila = strrpos($vista,'</option id="A">') + 16;
				$fila = substr($vista,$inicio_fila,$final_fila-$inicio_fila);
				$alumnos = $this -> modelo -> listaAlumno();
				$filas='';
				foreach ($alumnos as $row) {
					$new_fila = $fila;
					$diccionario = array('{alumno}' => $row['nombre']." ".$row['apellidoP']." ".$row['apellidoM']);
					$new_fila = strtr($new_fila,$diccionario);
					$filas .= $new_fila;;
				}
				$vista = str_replace($fila, $filas, $vista);
				//Obtener Materias para el select
				$inicio_lista = strrpos($vista,'<option id="M">');
				$final_lista = strrpos($vista,'</option id="M">') + 16;
				$lista = substr($vista,$inicio_lista,$final_lista-$inicio_lista);
				$cursos = $this -> modelo -> listaCurso();
				$listas='';
				foreach ($cursos as $row) {
					$new_lista = $lista;
					$diccionario = array('{materia}' => $row['idMateria']);
					$new_lista = strtr($new_lista,$diccionario);
					$listas .= $new_lista;
				}
				$vista = str_replace($lista, $listas, $vista);				
				echo $this->datosUsuarioVista($vista);
			break;
		}
	}

	}
}

?>