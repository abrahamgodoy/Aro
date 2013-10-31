<?php

class administrativoMdl{
	public $driver;
	function __construct(){
		$this -> driver = new mysqli('localhost', 'root', '486257913', 'user203');
		if($this -> driver -> connect_errno)
			die("<br>Error en la conexión");
	}
	
	function altaCiclo($ciclo, $fechai, $fechaf){
		$query =
			"INSERT INTO 
			ciclo(idCiclo, ciclo, fechaIni, fechaFin, codigo)
		  	VALUES(NULL,'$ciclo','$fechai','$fechaf',NULL)";
		$r = $this -> driver -> query($query);
		echo $query;
	}

	function altaMaestro($codigo, $nombre, $apellidop, $apellidom, $correo){
		$query =
			"INSERT INTO
			maestro(codigo, contraseña, nombre, apellidoP, apellidoM, correo)
			VALUES('$codigo', '1234', '$nombre', '$apellidop', '$apellidom', '$correo')";
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