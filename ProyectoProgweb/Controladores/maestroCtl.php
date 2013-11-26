<?php
class maestroCtl{
	private $modelo;
	private $mail;

	function ejecutar(){
		require_once("/Modelos/maestroMdl.php");
		$this -> modelo = new maestroMdl();
		switch($_GET['act']){
			case "altaCurso":
				if(empty($_POST)){
					//Cargo la vista del formulario
					$vista = file_get_contents("Vistas/MaesAltaCursos.html");

					//ciclos

					
					echo $vista;
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
				echo $vista;
				
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
					echo $vista;
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
					require_once("Vistas/MaesAltaAlumno.html");
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
						header('Location: index.php?ctl=maestro&act=listaAlumno');
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
					echo $vista;
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
					echo $vista;
				}

				else{
					$seleccionados = $_POST['seleccion'];
					for($i=0; $i < count($seleccionados); $i++){
    					$this -> modelo -> eliminarAlumno($seleccionados[$i]);
					}
					header('Location: index.php?ctl=maestro&act=listaAlumno');
				}	
			break;
		}
	}
}

?>