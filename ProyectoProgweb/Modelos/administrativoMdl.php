<?php

class administrativoMdl{
	public $driver;
	
	function __construct(){
		require_once('DataBase.php');
		$this -> driver = DataBase::getInstance();
	}
	
	function altaCiclo($ciclo, $fechai, $fechaf){
		$query =
			"INSERT INTO
			ciclo(idCiclo,ciclo, fechaIni, fechaFin)
			VALUES('0', '$ciclo', '$fechai', '$fechaf')";
		return $r = $this -> driver -> query($query);
	}

	function altaMaestro($codigo, $contrasena, $nombre, $apellidop, $apellidom, $correo){
		$query =
			"INSERT INTO
			maestro(codigo, contrasena, nombre, apellidoP, apellidoM, correo)
			VALUES('$codigo', '$contrasena', '$nombre', '$apellidop', '$apellidom', '$correo')";
		return $r = $this -> driver -> query($query);
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

	function listaCiclos(){
		//echo "<br>debug: Entro a la alta del maestro en el modelo";
		$query = 'SELECT * FROM ciclo';

		$r = $this -> driver -> query($query);

		while($row = $r -> fetch_assoc())
			$rows[] = $row;

		return $rows;
	}

	function eliminarAlumno($codigo){
		$query="DELETE FROM alumno WHERE codigo='$codigo' ";
		return $r = $this -> driver -> query($query);
	}

	function eliminarMaestro($codigo){
		$query="DELETE FROM maestro WHERE codigo='$codigo' ";
		return $r = $this -> driver -> query($query);
	}

	function eliminarCiclo($idCiclo){
		$query="DELETE FROM ciclo WHERE idCiclo='$idCiclo' ";
		return $r = $this -> driver -> query($query);
	}
}

?>