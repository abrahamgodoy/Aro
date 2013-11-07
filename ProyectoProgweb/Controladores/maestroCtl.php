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
					require_once("Vistas/MaesAltaCursos.html");
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