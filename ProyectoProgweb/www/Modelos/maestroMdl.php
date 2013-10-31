<?php

class maestroMdl{
	public $driver;
	function __construct(){
		$this -> driver = new mysqli('localhost', 'root', '486257913', 'user203');
		if($this -> driver -> connect_errno)
			die("<br>Error en la conexión");
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
			alumno(codigo, contraseña, nombre, apellidoP, apellidoM, carrera, correo, status, Github, celular, WebPage)
			VALUES('$codigo', '1234567890', '$nombre', '$apellidop', '$apellidom', '$carrera', '$correo', '$status', NULL, NULL, NULL)";
		$r = $this -> driver -> query($query);
	}
}

?>