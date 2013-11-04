<?php

class maestroMdl{
	public $driver;
	function __construct(){
		require_once('DataBase.php');
		$this -> driver = DataBase::getInstance();
	}
	
	function altaCurso($nombre, $seccion, $nrc, $ciclo){
		$query =
			"INSERT INTO 
			curso(idCurso, nombre, seccion, NRC, idCiclo, codigo)
		  	VALUES('1','$nombre','$seccion','$nrc','1239','9')";
		$r = $this -> driver -> query($query);
		echo $query;
	}

	function altaAlumno($codigo, $nombre, $apellidop, $apellidom, $carrera, $correo, $status){
		$query =
			"INSERT INTO
			alumno(codigo, contrasena, nombre, apellidoP, apellidoM, carrera, correo, status, Github, celular, WebPage)
			VALUES('$codigo', '12347890', '$nombre', '$apellidop', '$apellidom', '$carrera', '$correo', '$status', NULL, NULL, NULL)";
		$r = $this -> driver -> query($query);
	}

	function listAlumno(){
		//echo "<br>debug: Entro a la alta del alumno en el modelo";
		$query = 'SELECT * FROM alumno';

		$r = $this -> driver -> query($query);

		while($row = $r -> fetch_assoc())
			$rows[] = $row;

		return $rows;
	}

	function eliminarAlumno($codigo){
		$query="DELETE FROM alumno WHERE codigo='$codigo' ";
		$r = $this -> driver -> query($query);
	}
}

?>