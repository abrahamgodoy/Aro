<?php

class administrativoMdl{
	public $driver;
	function __construct(){
		$this -> driver = new mysqli('localhost','root','', 'user203');
		if($this -> driver -> connect_errno)
			die("<br>Error en la conexión");
	}
	
	function altaCiclo($ciclo, $fechai, $fechaf){
		$query =
			"INSERT INTO 
			ciclo(idCiclo, ciclo, fechaIni, fechaFin, codigo)
		  	VALUES(NULL,'$ciclo','$fechai','$fechaf',NULL)";
		$r = $this -> driver -> query($query);
	}

	function altaMaestro($codigo, $nombre, $apellidop, $apellidom, $correo){
		$query =
			"INSERT INTO
			maestro(codigo, contrasena, nombre, apellidoP, apellidoM, correo)
			VALUES('$codigo', '126834', '$nombre', '$apellidop', '$apellidom', '$correo')";
		$r = $this -> driver -> query($query);
	}

	function altaAlumno($codigo, $nombre, $apellidop, $apellidom, $carrera, $correo, $status){
		$query =
			"INSERT INTO
			alumno(codigo, contrasena, nombre, apellidoP, apellidoM, carrera, correo, status, Github, celular, WebPage)
			VALUES('$codigo', '123445', '$nombre', '$apellidop', '$apellidom', '$carrera', '$correo', '$status', NULL, NULL, NULL)";
		$r = $this -> driver -> query($query);
	}

	function lista(){
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