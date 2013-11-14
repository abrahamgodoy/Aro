<?php

class maestroMdl{
	public $driver;
	function __construct(){
		require_once('DataBase.php');
		$this -> driver = DataBase::getInstance();
	}
	
	function altaCurso($ciclo, $materia, $seccion, $nrc, $codigo){
		$query =
			"INSERT INTO 
			curso(idCurso, idMateria, seccion, NRC, idCiclo, codigo)
		  	VALUES('0','$materia','$seccion','$nrc','$ciclo','$codigo')";
		$r = $this -> driver -> query($query);

		var_dump($r);
		echo $query;

		$query= "SELECT MAX(idCurso) from curso";
		$r = $this -> driver -> query($query);		
		while($row = $r -> fetch_assoc())
			$rows[] = $row;
		var_dump($rows);


		$query= "SELECT * from curso";
		$r = $this -> driver -> query($query);

		while($row = $r -> fetch_assoc())
			$rows[] = $row;
		var_dump($rows);

		echo $query;
	}

	function horarioCurso($hora1, $hora2, $dia){
		$query = "INSERT INTO
			horariocurso(idHorario, dia, horaIni, horaFin, idCurso)
			VALUES('0','$dia','$hora1','$hora2',)";
	}

	function listaCurso(){
		$query = 'SELECT * FROM curso';
		$r = $this -> driver -> query($query);
		
		while($row = $r -> fetch_assoc())
			$rows[] = $row;

		return $rows;
	}

	function eliminarCurso($idCurso){
		$query =" DELETE FROM curso WHERE idCurso='$idCurso' ";
		return $r= $this -> driver -> query($query);
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

	function eliminarAlumno($codigo){
		$query="DELETE FROM alumno WHERE codigo='$codigo' ";
		return $r = $this -> driver -> query($query);
	}
}

?>