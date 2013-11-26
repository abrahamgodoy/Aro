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
			VALUES('0', '$contrasena', '$nombre', '$apellidop', '$apellidom', '$correo')";
		return $r = $this -> driver -> query($query);
	}

	function altaAlumno($contrasena, $nombre, $apellidop, $apellidom, $carrera, $correo, $status, $celular, $github, $webpage){
		$query =
			"INSERT INTO
			alumno(codigo, contrasena, nombre, apellidoP, apellidoM, carrera, correo, status, Github, celular, WebPage)
			VALUES('0', '$contrasena', '$nombre', '$apellidop', '$apellidom', '$carrera', '$correo', '$status', '$celular', '$github', '$webpage')";
		return $r = $this -> driver -> query($query);
	}

	function listaAlumno(){
		$query = 'SELECT * FROM alumno';

		$r = $this -> driver -> query($query);

		while($row = $r -> fetch_assoc())
			$rows[] = $row;

		return $rows;
	}

	function listaMaestros(){
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

	function obtenerAlumno($codigo){
		$query="SELECT * FROM alumno WHERE codigo = $codigo";
		$r = $this -> driver -> query($query);
		$arr = $r -> fetch_assoc();
		return $arr;
	}

	function obtenerMaestro($codigo){
		$query="SELECT * FROM maestro WHERE codigo = $codigo";
		$r = $this -> driver -> query($query);
		$arr = $r -> fetch_assoc();
		return $arr;
	}

	function obtenerCiclo($ciclo){
		$query="SELECT * FROM ciclo WHERE ciclo = '$ciclo'";
		$r = $this -> driver -> query($query);
		$arr = $r -> fetch_assoc();
		return $arr;
	}

	function modificarAlumno($codigo, $nombre, $apellidop, $apellidom, $carrera, $correo, $status){
		
		$query =
			"UPDATE alumno 
			SET	nombre = '$nombre', apellidoP = '$apellidop', apellidoM = '$apellidom', carrera = '$carrera', correo = '$correo', status = '$status', celular = NULL, github = NULL, webpage = NULL
			WHERE codigo = '$codigo'";

		return $r = $this -> driver -> query($query);
	}

	function modificarMaestro($codigo, $nombre, $apellidop, $apellidom, $correo){
		
		$query =
			"UPDATE maestro 
			SET	nombre = '$nombre', apellidoP = '$apellidop', apellidoM = '$apellidom', correo = '$correo'
			WHERE codigo = '$codigo'";

		return $r = $this -> driver -> query($query);
	}

	function modificarCiclo($ciclo, $fechai, $fechaf){
		
		$query =
			"UPDATE ciclo 
			SET	ciclo = '$ciclo', fechaIni = '$fechai', fechaFin = '$fechaf'
			WHERE ciclo = '$ciclo'";

		return $r = $this -> driver -> query($query);

		}
	}

?>