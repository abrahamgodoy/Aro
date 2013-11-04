<?php

class administrativoMdl{
	public $driver;
	
	function __construct(){
		require_once('DataBase.php');
		$this -> driver = DataBase::getInstance();
	}
	
	function altaCiclo($ciclo, $fechai, $fechaf){
	}

	function altaMaestro($codigo, $contrasena, $nombre, $apellidop, $apellidom, $correo){
		$query =
			"INSERT INTO
			maestro(codigo, contrasena, nombre, apellidoP, apellidoM, correo)
			VALUES('$codigo', '$contrasena', '$nombre', '$apellidop', '$apellidom', '$correo')";
		$r = $this -> driver -> query($query);
	}

	function altaAlumno($codigo, $contrasena, $nombre, $apellidop, $apellidom, $carrera, $correo, $status){
		$query =
			"INSERT INTO
			alumno(codigo, contrasena, nombre, apellidoP, apellidoM, carrera, correo, status, Github, celular, WebPage)
			VALUES('$codigo', '$contrasena', '$nombre', '$apellidop', '$apellidom', '$carrera', '$correo', '$status', NULL, NULL, NULL)";
		return $r = $this -> driver -> query($query);
	}

	function listaAlumno(){
		//echo "<br>debug: Entro a la alta del alumno en el modelo";
		$query = 'SELECT * FROM alumno';

		$r = $this -> driver -> query($query);

		while($row = $r -> fetch_assoc())
			$rows[] = $row;

		return $rows;
	}

	function listaMaestros(){
		//echo "<br>debug: Entro a la alta del maestro en el modelo";
		$query = 'SELECT * FROM maestro';

		$r = $this -> driver -> query($query);

		while($row = $r -> fetch_assoc())
			$rows[] = $row;

		return $rows;
	}

	function eliminarAlumno($codigo){
		$query="DELETE FROM alumno WHERE codigo='$codigo' ";
		$r = $this -> driver -> query($query);
	}

	function eliminarMaestro($codigo){
		$query="DELETE FROM maestro WHERE codigo='$codigo' ";
		$r = $this -> driver -> query($query);
	}
}

?>