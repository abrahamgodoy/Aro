<?php

class cambiarContraMdl{
	public $driver;
	
	function __construct(){
		require_once('DataBase.php');
		$this -> driver = DataBase::getInstance();
	}

	function contraAdmi($codigo,$contrasena){
		$query =
			"UPDATE administrativo SET contrasena='$contrasena' where codigo='$codigo'";
		return $r = $this -> driver -> query($query);
	}

	function contraMaes($codigo,$contrasena){
		$query =
			"UPDATE maestro SET contrasena='$contrasena' where codigo='$codigo'";
		return $r = $this -> driver -> query($query);
	}

	function contraAlum($codigo,$contrasena){
		$query =
			"UPDATE alumno SET contrasena='$contrasena' where codigo='$codigo'";
		return $r = $this -> driver -> query($query);
	}
}

?>